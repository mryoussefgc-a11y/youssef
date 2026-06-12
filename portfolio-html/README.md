# Youssef Bekkari — Portfolio (HTML/CSS version)

Pure HTML + CSS + vanilla JavaScript. No build tools, no npm —
just open `index.html` in your browser, or upload the folder to any hosting.

## Files

- `index.html` — all the content (text, sections, contact info)
- `style.css` — all the styling (colors at the top of the file)
- `script.js` — animations, mobile menu, and the skill chart data

## ✏️ How to customize

| What | Where |
|------|-------|
| **All text** (headlines, about, services, case studies…) | `index.html` — look for the `✏️ EDIT` comments |
| **Email & WhatsApp** | `index.html` → Contact section (`✏️ EDIT` comment) |
| **Your photo** | `index.html` → Hero section: replace the placeholder `<div>` with `<img src="youssef.jpg" class="hero-photo" />` (instructions in the comment) |
| **Project images** | `index.html` → Selected Work: replace each placeholder with `<img src="project-1.jpg" class="project-img" />` |
| **Colors** | `style.css` → the `:root { ... }` block at the very top |
| **Font** | `index.html` (Google Fonts link) + `style.css` `font-family` |
| **Chart data** | `script.js` → `chartLabels` / `chartValues` |
| **Skill bar values** | `index.html` → Skills section (`data-value` + the % text) |

## Deploy

Upload the whole folder to Netlify Drop, Vercel, GitHub Pages, or any
classic web hosting (cPanel etc.). No build step needed.
