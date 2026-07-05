/* ============================================================
   MY1MDOLLAR — background.js (service worker)
   L'export kaykhdem hna f background — sedd l'popup bla mochkil.
   Progress kaytsjjel f chrome.storage.session + badge 3la icon.
   ============================================================ */

const BUY_SIGNALS = [
  "game changer", "worth every penny", "life saver", "lifesaver",
  "i bought", "just bought", "best purchase", "highly recommend",
  "changed my life", "can't live without", "cant live without",
  "10/10", "best thing i", "so glad i bought", "worth it",
  "best investment", "no regrets", "must have",
];
const ASK_SIGNALS = [
  "does anyone know", "is there a product", "i wish there was",
  "wish there was", "any recommendations", "recommend me",
  "where can i buy", "where can i find", "what do you use",
  "looking for something", "any product", "what's the best",
  "whats the best", "need something",
];
const PAIN_SIGNALS = [
  "driving me crazy", "so frustrating", "i hate", "can't stand",
  "cant stand", "tried everything", "nothing works", "struggling with",
  "sick of", "fed up", "annoying", "biggest problem", "so annoying",
  "waste of money", "doesn't work", "doesnt work", "impossible to",
];

/* ---------------- Time ranges ----------------
   Reddit API kay'supporti ghir t=hour/day/week/month/year/all.
   L ranges customs (2/3/6 months, 2 years) kanjbdo b range akbar
   mn Reddit w kanfiltriw l'posts b created_utc hna. */
const TIME_RANGES = {
  month:     { t: "month", days: 31 },
  "2months": { t: "year",  days: 62 },
  "3months": { t: "year",  days: 93 },
  "6months": { t: "year",  days: 186 },
  year:      { t: "year",  days: 366 },
  "2years":  { t: "all",   days: 732 },
  all:       { t: "all",   days: null },
};

const sleep = (ms) => new Promise((r) => setTimeout(r, ms));
let jobRunning = false;

/* ---------------- Progress state ---------------- */
async function setJob(state) {
  await chrome.storage.session.set({ job: state });
  // Badge 3la icon bach tchouf progress bla ma t7ell popup
  if (state.status === "running") {
    chrome.action.setBadgeBackgroundColor({ color: "#FF4500" });
    chrome.action.setBadgeText({ text: state.pct + "%" });
  } else if (state.status === "done") {
    chrome.action.setBadgeBackgroundColor({ color: "#46D160" });
    chrome.action.setBadgeText({ text: "OK" });
    setTimeout(() => chrome.action.setBadgeText({ text: "" }), 15000);
  } else if (state.status === "error") {
    chrome.action.setBadgeBackgroundColor({ color: "#FF6B6B" });
    chrome.action.setBadgeText({ text: "ERR" });
    setTimeout(() => chrome.action.setBadgeText({ text: "" }), 15000);
  } else {
    chrome.action.setBadgeText({ text: "" });
  }
}

/* ---------------- Signal detection ---------------- */
function detectSignals(text) {
  const lower = text.toLowerCase();
  let buy = false, ask = false, pain = false;
  for (const s of BUY_SIGNALS) if (lower.includes(s)) { buy = true; break; }
  for (const s of ASK_SIGNALS) if (lower.includes(s)) { ask = true; break; }
  for (const s of PAIN_SIGNALS) if (lower.includes(s)) { pain = true; break; }
  const tags = [];
  if (buy) tags.push("$$ BUY");
  if (ask) tags.push("DEMAND");
  if (pain) tags.push("PAIN");
  return tags;
}

/* ---------------- Reddit fetching ---------------- */
async function fetchJSON(url) {
  const res = await fetch(url, { headers: { Accept: "application/json" } });
  if (res.status === 429) throw new Error("Rate limited mn Reddit — tsenna chi d9i9a w 3awd jerreb b max posts a9al.");
  if (!res.ok) throw new Error("Reddit jaweb b " + res.status);
  return res.json();
}

async function fetchPosts(params) {
  const { mode, query, sort, time, maxPosts } = params;
  const range = TIME_RANGES[time] || TIME_RANGES.all;
  const cutoff = range.days ? Date.now() / 1000 - range.days * 86400 : null;
  const posts = [];
  let after = null;
  let tooOldStreak = 0;
  while (posts.length < maxPosts) {
    const limit = cutoff ? 100 : Math.min(100, maxPosts - posts.length);
    let url;
    if (mode === "keyword") {
      const sortParam = sort === "comments" ? "comments" : sort;
      url = `https://www.reddit.com/search.json?q=${encodeURIComponent(query)}&sort=${sortParam}&t=${range.t}&limit=${limit}&raw_json=1`;
    } else {
      const listing = sort === "relevance" || sort === "comments" ? "top" : sort;
      url = `https://www.reddit.com/r/${encodeURIComponent(query)}/${listing}.json?t=${range.t}&limit=${limit}&raw_json=1`;
    }
    if (after) url += `&after=${after}`;
    const data = await fetchJSON(url);
    const children = data?.data?.children || [];
    if (!children.length) break;
    let anyKept = false;
    for (const c of children) {
      if (posts.length >= maxPosts) break;
      if (cutoff && c.data.created_utc < cutoff) continue;
      posts.push(c.data);
      anyKept = true;
    }
    // B sort "new" l'posts msttfin new → old: ila page kamla khrjat mn
    // range, ma bqach 3lach nkemmlo pagination.
    tooOldStreak = anyKept ? 0 : tooOldStreak + 1;
    if (cutoff && sort === "new" && tooOldStreak >= 1) break;
    if (cutoff && tooOldStreak >= 3) break;
    after = data.data.after;
    if (!after) break;
    await sleep(700);
  }
  return posts.slice(0, maxPosts);
}

async function fetchComments(permalink) {
  const url = `https://www.reddit.com${permalink}.json?limit=100&raw_json=1`;
  const data = await fetchJSON(url);
  return data?.[1]?.data?.children || [];
}

/* ---------------- Comment tree → text ---------------- */
function renderCommentTree(children, tagOn, depth = 0, lines = []) {
  for (const child of children) {
    if (child.kind !== "t1") continue;
    const c = child.data;
    const body = (c.body || "").trim();
    if (!body || body === "[deleted]" || body === "[removed]") continue;
    if (c.author === "AutoModerator") continue;

    const indent = "    ".repeat(depth);
    const tags = tagOn ? detectSignals(body) : [];
    const tagStr = tags.length ? tags.map((t) => `[${t}]`).join("") + " " : "";
    const textIndented = body.split("\n").map((l) => indent + "   " + l).join("\n");
    lines.push(`${indent}└─ ${tagStr}u/${c.author} (${c.score} pts):`);
    lines.push(textIndented);

    if (c.replies && c.replies.data && c.replies.data.children) {
      renderCommentTree(c.replies.data.children, tagOn, depth + 1, lines);
    }
  }
  return lines;
}

/* ---------------- Export builder ---------------- */
function buildExport(params, posts, allComments) {
  const { mode, query, sort, tagOn } = params;
  const lines = [
    "MY1MDOLLAR EXPORT",
    (mode === "keyword" ? "Keyword: " : "Subreddit: r/") + query,
    "Sort: " + sort,
    "Generated: " + new Date().toISOString(),
    "Posts exported: " + posts.length,
    "",
  ];

  posts.forEach((p, i) => {
    lines.push("=".repeat(70));
    const titleTags = tagOn ? detectSignals((p.title || "") + " " + (p.selftext || "")) : [];
    const tagStr = titleTags.length ? titleTags.map((t) => `[${t}]`).join("") + " " : "";
    lines.push("TITLE: " + tagStr + p.title);
    lines.push("SUBREDDIT: r/" + p.subreddit);
    lines.push("AUTHOR: u/" + p.author);
    lines.push(`SCORE: ${p.score}  |  COMMENTS: ${p.num_comments}`);
    lines.push("POSTED: " + new Date(p.created_utc * 1000).toISOString());
    lines.push("PERMALINK: https://www.reddit.com" + p.permalink);
    if (p.url && !p.url.includes(p.permalink)) lines.push("LINK: " + p.url);
    lines.push("-".repeat(70));
    if (p.selftext && p.selftext.trim()) {
      lines.push(p.selftext.trim());
      lines.push("-".repeat(70));
    }
    const comments = allComments[i] || [];
    if (comments.length) {
      lines.push("COMMENTS:");
      renderCommentTree(comments, params.tagOn, 0, lines);
    } else {
      lines.push("COMMENTS (none):");
    }
    lines.push("");
  });

  return lines.join("\n");
}

/* ---------------- Main job ---------------- */
async function runJob(params) {
  jobRunning = true;
  try {
    await setJob({ status: "running", pct: 5, text: "Kayjib posts mn Reddit...", query: params.query });

    let posts = await fetchPosts(params);
    if (params.minScore > 0) posts = posts.filter((p) => p.score >= params.minScore);

    if (!posts.length) {
      await setJob({ status: "error", pct: 0, text: "Ma l9a 7ta post. Jerreb keyword akhor wla n9es min upvotes." });
      return;
    }

    const allComments = [];
    for (let i = 0; i < posts.length; i++) {
      await setJob({
        status: "running",
        pct: 10 + Math.round((i / posts.length) * 85),
        text: `Kayjbed comments: post ${i + 1}/${posts.length}...`,
        query: params.query,
      });
      try {
        allComments.push(await fetchComments(posts[i].permalink));
      } catch {
        allComments.push([]);
      }
      await sleep(650);
    }

    await setJob({ status: "running", pct: 97, text: "Kaybni l'fichier...", query: params.query });
    const txt = buildExport(params, posts, allComments);

    let signalCount = 0;
    if (params.tagOn) {
      const matches = txt.match(/\[(\$\$ BUY|DEMAND|PAIN)\]/g);
      signalCount = matches ? matches.length : 0;
    }

    // Service worker ma 3ndoch URL.createObjectURL → data URL
    const dataUrl = "data:text/plain;charset=utf-8," + encodeURIComponent(txt);
    const filename = `my1mdollar_${params.query.replace(/[^\w-]+/g, "_")}_${Date.now()}.txt`;
    await chrome.downloads.download({ url: dataUrl, filename, saveAs: false });

    const doneText = `Salina! ${posts.length} posts` + (params.tagOn ? ` · ${signalCount} signals 💰` : "") + " — l'fichier tteldownloada.";
    await setJob({ status: "done", pct: 100, text: doneText, query: params.query });

    chrome.notifications.create({
      type: "basic",
      iconUrl: "icons/icon128.png",
      title: "My1MDollar — Export sala ✅",
      message: `"${params.query}": ${posts.length} posts` + (params.tagOn ? `, ${signalCount} signals` : "") + ". L'fichier f Downloads.",
    });
  } catch (err) {
    await setJob({ status: "error", pct: 0, text: "Ghalat: " + (err.message || "chi haja ma mchatch mzian") });
    chrome.notifications.create({
      type: "basic",
      iconUrl: "icons/icon128.png",
      title: "My1MDollar — Export ma salach ❌",
      message: err.message || "Chi haja ma mchatch mzian, 3awd jerreb.",
    });
  } finally {
    jobRunning = false;
  }
}

/* ---------------- Messages mn popup ---------------- */
chrome.runtime.onMessage.addListener((msg, sender, sendResponse) => {
  if (msg.type === "startExport") {
    if (jobRunning) {
      sendResponse({ ok: false, reason: "busy" });
      return true;
    }
    runJob(msg.params); // machi await — khliha tkhdem f background
    sendResponse({ ok: true });
    return true;
  }
  if (msg.type === "getStatus") {
    chrome.storage.session.get("job").then(({ job }) => {
      sendResponse({ job: job || null, running: jobRunning });
    });
    return true; // async response
  }
});
