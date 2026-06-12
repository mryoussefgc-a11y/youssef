# Youssef Bekkari — Portfolio

Premium dark-mode portfolio built with **React + Vite + Tailwind CSS + Framer Motion + Recharts**.

## Run locally

```bash
npm install
npm run dev      # start dev server (http://localhost:5173)
npm run build    # production build → dist/
```

## ✏️ How to customize

| What | Where |
|------|-------|
| **All text** (headlines, about, story, services, skills, case studies) | `src/content.js` |
| **Email & WhatsApp** | `src/content.js` → `contact` |
| **Your photo** | Put image in `public/` (e.g. `public/youssef.jpg`), then set `hero.image = '/youssef.jpg'` in `src/content.js` |
| **Project images** | Put images in `public/`, then set `image: '/project-1.jpg'` in `caseStudies` in `src/content.js` |
| **Colors** | `tailwind.config.js` → `theme.extend.colors` |
| **Font** | `index.html` (Google Fonts link) + `tailwind.config.js` |
| **Page title / SEO** | `index.html` |
| **"Book a Call" link** (e.g. Calendly) | `src/content.js` → `contact.bookCallLink` |
| **Section order** | `src/App.jsx` |

## Deploy

Works out of the box on Vercel, Netlify, or GitHub Pages (`npm run build`, deploy the `dist/` folder).
