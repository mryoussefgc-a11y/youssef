/* ============================================================
   MY1MDOLLAR — popup.js
   L'popup ghir kaysift l'job l background w kaywerri progress.
   T9der tsedd l'popup — l'export ghadi ykemmel bo7do.
   ============================================================ */

const $ = (id) => document.getElementById(id);
let mode = "keyword";

/* ---------------- Tabs ---------------- */
document.querySelectorAll(".tab").forEach((tab) => {
  tab.addEventListener("click", () => {
    document.querySelectorAll(".tab").forEach((t) => t.classList.remove("active"));
    tab.classList.add("active");
    mode = tab.dataset.mode;
    $("keywordField").hidden = mode !== "keyword";
    $("subredditField").hidden = mode !== "subreddit";
    const sortSelect = $("sortSelect");
    const relevanceOpt = sortSelect.querySelector('option[value="relevance"]');
    if (mode === "subreddit") {
      relevanceOpt.disabled = true;
      if (sortSelect.value === "relevance") sortSelect.value = "top";
    } else {
      relevanceOpt.disabled = false;
    }
  });
});

/* ---------------- Progress display ---------------- */
function showJob(job) {
  if (!job) return;
  $("progressWrap").hidden = false;
  $("progressFill").style.width = (job.pct || 0) + "%";
  const t = $("progressText");
  t.textContent = job.text || "...";
  t.className = "progress-text" + (job.status === "done" ? " done" : job.status === "error" ? " error" : "");

  const btn = $("searchBtn");
  if (job.status === "running") {
    btn.disabled = true;
    btn.textContent = "Kaykhdem f background...";
    $("bgNote").hidden = false;
  } else {
    btn.disabled = false;
    btn.textContent = "Search & export";
    $("bgNote").hidden = true;
  }
}

/* Melli t7ell popup: chouf wach kayn job khddam wla sala */
chrome.runtime.sendMessage({ type: "getStatus" }, (res) => {
  if (res && res.job) showJob(res.job);
});

/* Live updates: kolma background ybeddel l'job f storage */
chrome.storage.session.onChanged.addListener((changes) => {
  if (changes.job) showJob(changes.job.newValue);
});

/* ---------------- Start export ---------------- */
$("searchBtn").addEventListener("click", () => {
  const query = mode === "keyword"
    ? $("keywordInput").value.trim()
    : $("subredditInput").value.trim().replace(/^r\//i, "");

  if (!query) {
    showJob({ status: "error", pct: 0, text: mode === "keyword" ? "Dkhel keyword b3da!" : "Dkhel smiya dyal subreddit b3da!" });
    return;
  }

  const params = {
    mode,
    query,
    sort: $("sortSelect").value,
    time: $("timeSelect").value,
    maxPosts: Math.max(1, Math.min(100, parseInt($("maxPosts").value || "25", 10))),
    minScore: parseInt($("minScore").value || "0", 10),
    tagOn: $("tagSignals").checked,
  };

  chrome.runtime.sendMessage({ type: "startExport", params }, (res) => {
    if (res && res.ok) {
      showJob({ status: "running", pct: 2, text: "Bda l'export f background..." });
    } else if (res && res.reason === "busy") {
      showJob({ status: "error", pct: 0, text: "Kayn deja export khddam — tsenna ysali b3da." });
    }
  });
});

/* Enter key = search */
["keywordInput", "subredditInput"].forEach((id) => {
  $(id).addEventListener("keydown", (e) => {
    if (e.key === "Enter") $("searchBtn").click();
  });
});
