# LittleEase — Shopify Product Page Theme

A polished, conversion-focused **Online Store 2.0** theme for a single high-converting
product page: a natural baby teething relief roller. Built for UK direct-response traffic
(Facebook / TikTok), styled after premium DTC baby brands — soft sage + cream, Playfair
Display headlines, Inter body, custom inline SVG line icons, zero icon/image requests.

## What's inside

```
layout/theme.liquid           Document shell, fonts, header/footer/announcement
templates/product.json        The full product page (12 ordered sections, content pre-filled)
templates/index.json          Brand homepage (links to the product)
templates/*.liquid            Graceful fallbacks: cart, page, search, collection, blog, 404, etc.
sections/*.liquid             15 sections, each with a valid {% schema %} (editable in Theme Editor)
snippets/                     icon, stars, product-image (CSS fallback bottle), add-to-cart
assets/theme.css              Entire design system via :root tokens — re-theme in ~10 lines
assets/theme.js               Vanilla JS: FAQ accordion, sticky header, smooth anchor scroll
config/                       Theme settings + saved data
locales/en.default.json       British English strings
```

## Install (2 minutes)

1. Download **`littleease-theme.zip`** (in the repo root).
2. Shopify admin → **Online Store → Themes → Add theme → Upload zip file**.
3. Click **Customize** to edit any copy, or **Publish** when ready.

The page renders correctly **immediately** — even with no products, images or variants set up
yet (it draws a CSS fallback bottle and uses placeholder pricing).

## Connect your real product (recommended)

1. **Products → Add product**. Name it *LittleEase Teething Relief Roller*, add photos.
2. Add **three variants** (e.g. an option called *Pack* → `1 Roller`, `2 Rollers`, `3 Rollers`)
   with the prices/compare-at prices you want. The bundle tiers map in order:
   - Tier 1 (Starter) → `product.variants[0]`
   - Tier 2 (Value, "Most popular") → `product.variants[1]`
   - Tier 3 (Family) → `product.variants[2]`
   If there are fewer than three variants, tiers safely fall back to the last variant and to the
   manual "fallback price" set on each tier block in the Theme Editor.
3. Set the product as the store's featured/first product so the homepage links to it.
4. **Online Store → Preferences**: set the product page as needed, and create your
   **Policies** (Settings → Policies) so the footer links populate automatically.

## Re-theming

Open `assets/theme.css` and edit the `:root` block — colours, fonts and spacing are all tokens
(`--le-sage`, `--le-cream`, `--le-font-serif`, etc.). Nothing else needs to change.

## Notes

- All "Add to basket" buttons are **real** Shopify `{% form 'product' %}` forms.
- Fully responsive; grids collapse to a single column under ~960px; nav trust badges hide on mobile.
- Fonts load asynchronously with a system-font fallback for fast first paint.
- British English throughout, £ currency, "UK shipping" messaging.
