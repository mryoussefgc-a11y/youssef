# LittleEase — Shopify theme (Online Store 2.0)

A single high-converting product page for **LittleEase**, a UK natural baby
teething-relief roller. The creative spine of the page is the mechanism insight:
*most teething products treat the tooth — LittleEase treats the pathway* (the
trigeminal nerve that carries the pain from gum to jaw to ear).

## Install

1. Download / build `littleease.zip` (folders `layout`, `templates`, `sections`,
   `assets`, `config`, `locales` must sit at the **zip root**).
2. Shopify admin → **Online Store → Themes → Add theme → Upload zip file**.
3. Click **Customize** to confirm, then **Publish**.
4. Create one product (the LittleEase roller). The product page renders all 14
   sections automatically.

## Variants (for the 3-tier bundle)

The bundle section maps three tiers to three product variants:

| Tier   | Variant            | Suggested |
|--------|--------------------|-----------|
| Single | `variants[0]`      | 1 bottle  |
| Pair   | `variants[1]`      | 2 bottles |
| Family | `variants[2]`      | 4 bottles |

If fewer variants exist, missing tiers fall back to `variants[0]` so no CTA ever
breaks. Create variants under an option such as "Pack" (Single / Pair / Family).

## Images

Upload a product image and the hero + product-detail sections use it
automatically. With **no** image uploaded, the page shows hand-built inline-SVG
fallbacks (the nerve-pathway diagram in the hero, a bottle silhouette in the
product detail) — never a broken image icon.

## Notes

- Fonts: Fraunces (headlines) + Inter (body), loaded async with robust system
  fallbacks so layout does not shift before webfonts arrive.
- Colours and copy are editable per-section in the theme editor.
- The only JS is the FAQ accordion (`assets/theme.js`). The only animation is the
  hero nerve-pathway dash, disabled under `prefers-reduced-motion`.
- Renders without Liquid errors on a fresh store with zero products/variants/images.
