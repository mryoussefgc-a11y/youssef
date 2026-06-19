<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<!DOCTYPE html>
<html lang="en" <?php language_attributes(); ?>>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="UK IPTV that works when match day matters. Watch Premier League, Champions League, Boxing and UFC with reliable streaming, easy Firestick & Smart TV setup, and real WhatsApp support." />
  <title>IPTV TRUSTED — UK IPTV For Premier League, Champions League, Boxing & UFC</title>

  <!-- Fonts: Inter (Stripe/SaaS feel) -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <!-- Font Awesome icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  <style>
    /* ============================================================
       Design Tokens
    ============================================================ */
    :root {
      --blue: #2563eb;
      --blue-dark: #1d4ed8;
      --blue-light: #60a5fa;
      --cyan: #06b6d4;
      --indigo: #4f46e5;
      --blue-soft: #eff4ff;

      --ink: #0a1024;
      --ink-2: #1e293b;
      --slate: #475569;
      --muted: #6b7689;
      --line: #e9edf4;
      --white: #ffffff;
      --bg-soft: #f6f8fc;
      --navy: #070b16;
      --navy-2: #0d1426;

      --green: #16a34a;
      --red: #ef4444;

      --radius: 24px;
      --radius-sm: 16px;
      --shadow-xs: 0 1px 2px rgba(10,16,36,0.06), 0 1px 1px rgba(10,16,36,0.04);
      --shadow-sm: 0 2px 8px rgba(10,16,36,0.05), 0 8px 24px rgba(10,16,36,0.06);
      --shadow: 0 8px 24px rgba(10,16,36,0.08), 0 24px 48px rgba(10,16,36,0.08);
      --shadow-lg: 0 30px 80px rgba(10,16,36,0.20);
      --maxw: 1140px;
      --ease: cubic-bezier(0.22, 1, 0.36, 1);
    }

    /* ============================================================
       Reset & Base
    ============================================================ */
    * { margin: 0; padding: 0; box-sizing: border-box; }
    html { scroll-behavior: smooth; scroll-padding-top: 90px; -webkit-text-size-adjust: 100%; }
    body {
      font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
      color: var(--ink);
      background: var(--white);
      line-height: 1.6;
      letter-spacing: -0.011em;
      -webkit-font-smoothing: antialiased;
      text-rendering: optimizeLegibility;
      overflow-x: hidden;
    }
    a { text-decoration: none; color: inherit; }
    ul { list-style: none; }
    img { max-width: 100%; display: block; }
    ::selection { background: rgba(37,99,235,0.18); }

    .container { width: 100%; max-width: var(--maxw); margin: 0 auto; padding: 0 24px; }
    section { position: relative; }
    .section-pad { padding: 120px 0; }

    .eyebrow {
      display: inline-flex; align-items: center; gap: 8px;
      font-size: 0.8rem; font-weight: 600; letter-spacing: 0.02em;
      color: var(--blue); margin-bottom: 18px;
    }
    .eyebrow::before { content:""; width: 22px; height: 2px; border-radius: 2px; background: var(--blue); }

    .section-head { max-width: 680px; margin: 0 auto 72px; text-align: center; }
    .section-head .eyebrow { justify-content: center; }
    .section-head h2 {
      font-size: clamp(2rem, 4.2vw, 3.1rem);
      font-weight: 800; letter-spacing: -0.035em; line-height: 1.05;
    }
    .section-head h2 .accent {
      background: linear-gradient(100deg, var(--blue), var(--cyan));
      -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;
    }
    .section-head h2 .accent-red { color: var(--red); }
    .section-head p { margin-top: 18px; font-size: 1.18rem; color: var(--muted); font-weight: 400; }

    /* ============================================================
       Buttons
    ============================================================ */
    .btn {
      display: inline-flex; align-items: center; gap: 9px;
      font-size: 0.98rem; font-weight: 600; font-family: inherit;
      padding: 14px 26px; border-radius: 999px; border: none; cursor: pointer;
      transition: transform .25s var(--ease), box-shadow .25s var(--ease), background .25s var(--ease), color .25s;
      white-space: nowrap; letter-spacing: -0.01em;
    }
    .btn i { transition: transform .25s var(--ease); }
    .btn:hover i.fa-arrow-right { transform: translateX(3px); }
    .btn-primary { background: var(--ink); color: #fff; box-shadow: var(--shadow-xs); }
    .btn-primary:hover { background: #000; transform: translateY(-2px); box-shadow: var(--shadow-sm); }
    .btn-blue { background: var(--blue); color: #fff; box-shadow: 0 8px 22px rgba(37,99,235,0.35); }
    .btn-blue:hover { background: var(--blue-dark); transform: translateY(-2px); box-shadow: 0 14px 30px rgba(37,99,235,0.42); }
    .btn-light { background: #fff; color: var(--ink); border: 1px solid var(--line); }
    .btn-light:hover { transform: translateY(-2px); box-shadow: var(--shadow-sm); border-color: #d6deea; }
    .btn-ghost { background: rgba(255,255,255,0.06); color: #fff; border: 1px solid rgba(255,255,255,0.16); backdrop-filter: blur(6px); }
    .btn-ghost:hover { background: rgba(255,255,255,0.12); transform: translateY(-2px); }
    .btn-block { width: 100%; justify-content: center; }
    .btn-lg { padding: 16px 30px; font-size: 1.02rem; }

    /* ============================================================
       Header
    ============================================================ */
    .header {
      position: fixed; top: 14px; left: 0; right: 0; z-index: 1000;
      transition: top .3s var(--ease);
    }
    .header-inner {
      max-width: var(--maxw); margin: 0 auto;
      display: flex; align-items: center; justify-content: space-between;
      height: 62px; padding: 0 14px 0 20px;
      border-radius: 999px;
      background: rgba(10,16,36,0.55);
      border: 1px solid rgba(255,255,255,0.08);
      backdrop-filter: saturate(180%) blur(20px);
      transition: background .3s var(--ease), box-shadow .3s var(--ease), border-color .3s;
    }
    .header.scrolled .header-inner {
      background: rgba(255,255,255,0.82);
      border-color: var(--line);
      box-shadow: var(--shadow-sm);
    }
    .logo { display: flex; align-items: center; gap: 11px; font-weight: 800; font-size: 1.06rem; color: #fff; line-height: 1; letter-spacing: -0.02em; }
    .header.scrolled .logo { color: var(--ink); }
    .logo .logo-mark {
      width: 34px; height: 34px; border-radius: 10px;
      background: linear-gradient(135deg, var(--blue), var(--indigo));
      display: grid; place-items: center; color: #fff; font-size: 0.85rem;
      box-shadow: 0 6px 16px rgba(37,99,235,0.45);
    }
    .logo small { display:block; font-size:0.56rem; font-weight:700; letter-spacing:0.24em; color: var(--blue-light); margin-top:3px; }
    .header.scrolled .logo small { color: var(--blue); }

    .nav-links { display: flex; align-items: center; gap: 6px; }
    .nav-links a {
      color: rgba(255,255,255,0.78); font-weight: 500; font-size: 0.9rem;
      padding: 8px 13px; border-radius: 999px; transition: color .2s, background .2s;
    }
    .nav-links a:hover, .nav-links a.active { color: #fff; background: rgba(255,255,255,0.08); }
    .header.scrolled .nav-links a { color: var(--slate); }
    .header.scrolled .nav-links a:hover, .header.scrolled .nav-links a.active { color: var(--ink); background: var(--bg-soft); }

    .nav-actions { display: flex; align-items: center; gap: 12px; }
    .whatsapp-badge { display: inline-flex; align-items: center; gap: 9px; color: #fff; padding: 6px 8px; }
    .header.scrolled .whatsapp-badge { color: var(--ink); }
    .whatsapp-badge .wa-ic { width: 30px; height: 30px; border-radius: 50%; display:grid; place-items:center; background: rgba(22,163,74,0.16); color: #16a34a; font-size: 1rem; }
    .whatsapp-badge .wa-txt b { display:block; font-size:0.8rem; font-weight:600; line-height:1.1; }
    .whatsapp-badge .wa-txt span { display:block; font-size:0.66rem; color: #16a34a; }

    .nav-toggle { display: none; background: none; border: none; color: #fff; font-size: 1.35rem; cursor: pointer; padding: 6px; }
    .header.scrolled .nav-toggle { color: var(--ink); }

    .mobile-menu {
      position: fixed; top: 84px; left: 14px; right: 14px;
      background: #fff; border: 1px solid var(--line); border-radius: 22px;
      box-shadow: var(--shadow); padding: 10px 12px 18px;
      transform: translateY(-130%) scale(0.98); opacity: 0; pointer-events: none;
      transition: transform .35s var(--ease), opacity .25s; z-index: 999;
    }
    .mobile-menu.open { transform: none; opacity: 1; pointer-events: auto; }
    .mobile-menu a { display: block; padding: 13px 14px; font-weight: 500; color: var(--ink); border-radius: 12px; }
    .mobile-menu a:hover { background: var(--bg-soft); }
    .mobile-menu .btn { margin-top: 10px; }

    /* ============================================================
       Hero — Stripe-style gradient
    ============================================================ */
    .hero { position: relative; background: var(--navy); color: #fff; padding: 168px 0 110px; overflow: hidden; }
    .hero::before {
      content:""; position:absolute; inset:-20% -10% auto -10%; height: 130%;
      background:
        radial-gradient(50% 50% at 78% 8%, rgba(37,99,235,0.55), transparent 60%),
        radial-gradient(45% 45% at 12% 12%, rgba(79,70,229,0.45), transparent 60%),
        radial-gradient(40% 40% at 60% 0%, rgba(6,182,212,0.30), transparent 55%);
      transform: skewY(-7deg); transform-origin: top left; pointer-events:none;
    }
    .hero::after {
      content:""; position:absolute; inset:0; pointer-events:none;
      background-image: linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px);
      background-size: 56px 56px; mask-image: radial-gradient(70% 60% at 50% 30%, #000, transparent 80%);
    }
    .hero .container { position: relative; z-index: 2; }
    .hero-grid { display: grid; grid-template-columns: 1fr 1.05fr; gap: 60px; align-items: center; }

    .hero-pill {
      display:inline-flex; align-items:center; gap:9px; font-size:0.82rem; font-weight:500;
      color: rgba(255,255,255,0.9);
      background: rgba(255,255,255,0.07); border:1px solid rgba(255,255,255,0.14);
      padding: 7px 14px; border-radius: 999px; margin-bottom: 26px; backdrop-filter: blur(6px);
    }
    .hero-pill .dot { width:7px; height:7px; border-radius:50%; background: #34d399; box-shadow: 0 0 0 4px rgba(52,211,153,0.2); }
    .hero h1 {
      font-size: clamp(2.7rem, 5.6vw, 4.4rem); font-weight: 800;
      line-height: 1.02; letter-spacing: -0.04em;
    }
    .hero h1 .accent {
      background: linear-gradient(100deg, #60a5fa, #22d3ee);
      -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;
    }
    .hero p.sub { margin-top: 22px; font-size: 1.16rem; color: rgba(255,255,255,0.72); font-weight: 400; max-width: 460px; }
    .hero p.sub span { display: block; }

    .trust-points { display: grid; grid-template-columns: repeat(2, 1fr); gap: 14px 24px; margin-top: 30px; max-width: 440px; }
    .trust-points li { display: flex; align-items: center; gap: 11px; }
    .trust-points .tp-ic { width: 28px; height: 28px; border-radius: 8px; background: rgba(37,99,235,0.22); color: var(--blue-light); display:grid; place-items:center; font-size:0.72rem; flex-shrink:0; }
    .trust-points strong { display:block; font-size: 0.9rem; font-weight: 600; line-height:1.1; }
    .trust-points small { display:block; font-size: 0.74rem; color: rgba(255,255,255,0.5); }

    .hero-cta { margin-top: 34px; display: flex; align-items: center; gap: 20px; flex-wrap: wrap; }
    .hero-note { font-size: 0.84rem; color: rgba(255,255,255,0.5); line-height:1.35; }

    .hero-social { margin-top: 34px; padding-top: 28px; border-top: 1px solid rgba(255,255,255,0.08); display: flex; align-items: center; gap: 28px; flex-wrap: wrap; }
    .trustpilot { display:flex; align-items:center; gap:9px; font-size:0.84rem; color: rgba(255,255,255,0.78); }
    .trustpilot .stars { color:#34d399; letter-spacing:1px; }
    .trustpilot b { color:#fff; font-weight:600; }
    .avatars { display:flex; align-items:center; gap:12px; }
    .avatars .stack { display:flex; }
    .avatars .stack span {
      width:32px; height:32px; border-radius:50%; margin-left:-9px;
      border:2px solid var(--navy); background: linear-gradient(135deg,var(--blue),var(--indigo));
      display:grid; place-items:center; color:#fff; font-size:0.74rem; font-weight:700;
    }
    .avatars .stack span:first-child { margin-left:0; }
    .avatars small { font-size:0.82rem; color: rgba(255,255,255,0.65); }

    /* ---- Hero Visual: premium IPTV dashboard mockup ---- */
    @keyframes floaty { 0%,100%{ transform: translateY(0);} 50%{ transform: translateY(-9px);} }
    .hero-visual { position: relative; padding: 6px 4px; }
    .tv {
      background: linear-gradient(180deg,#11151f,#05070d); border-radius: 20px; padding: 14px;
      box-shadow: var(--shadow-lg), inset 0 0 0 1px rgba(255,255,255,0.06);
      position: relative;
    }
    .tv-screen { border-radius: 12px; overflow: hidden; position: relative; aspect-ratio: 16 / 10; background: radial-gradient(120% 100% at 80% 0%, #18233f, #0a0f1c 62%); }
    .dash { display:grid; grid-template-columns: 96px 1fr; height:100%; }
    /* sidebar */
    .dash-side { background: rgba(255,255,255,0.025); border-right:1px solid rgba(255,255,255,0.06); padding:16px 10px; display:flex; flex-direction:column; gap:5px; }
    .dash-brand { display:flex; align-items:center; gap:7px; margin-bottom:14px; padding:0 4px; }
    .dash-brand .bd { width:18px; height:18px; border-radius:6px; background: linear-gradient(135deg,var(--blue),var(--indigo)); display:grid; place-items:center; color:#fff; font-size:0.46rem; }
    .dash-brand b { font-size:0.6rem; font-weight:700; color:#fff; letter-spacing:0.04em; }
    .dash-nav { display:flex; align-items:center; gap:9px; padding:8px 9px; border-radius:9px; color: rgba(255,255,255,0.52); font-size:0.64rem; font-weight:500; white-space:nowrap; }
    .dash-nav i { font-size:0.72rem; width:13px; text-align:center; }
    .dash-nav.active { background: linear-gradient(135deg, rgba(37,99,235,0.95), rgba(79,70,229,0.95)); color:#fff; box-shadow: 0 6px 14px rgba(37,99,235,0.35); }
    /* main */
    .dash-main { padding:15px; display:flex; flex-direction:column; gap:11px; min-width:0; }
    .dash-hero { position:relative; border-radius:12px; overflow:hidden; padding:15px; min-height:120px; display:flex; flex-direction:column; justify-content:flex-end; background: linear-gradient(135deg,#1d4ed8,#4f46e5); }
    .dash-hero::after { content:""; position:absolute; inset:0; background: radial-gradient(85% 130% at 100% 0%, rgba(255,255,255,0.2), transparent 60%); }
    .dash-hero .dh-tag { position:relative; z-index:1; display:inline-flex; align-items:center; gap:6px; align-self:flex-start; background: rgba(0,0,0,0.32); backdrop-filter: blur(4px); color:#fff; font-size:0.55rem; font-weight:700; padding:4px 9px; border-radius:99px; margin-bottom:auto; letter-spacing:0.04em; }
    .dash-hero .dh-tag .liveDot { width:5px; height:5px; border-radius:50%; background:#ff5470; box-shadow:0 0 0 3px rgba(255,84,112,0.25); }
    .dash-hero h5 { position:relative; z-index:1; color:#fff; font-size:1.1rem; font-weight:800; letter-spacing:-0.02em; }
    .dash-hero .dh-sub { position:relative; z-index:1; color: rgba(255,255,255,0.82); font-size:0.6rem; margin-top:3px; }
    .dash-hero .dh-play { position:absolute; right:14px; bottom:14px; z-index:1; width:36px; height:36px; border-radius:50%; background:#fff; color:var(--blue); display:grid; place-items:center; font-size:0.82rem; box-shadow:0 8px 18px rgba(0,0,0,0.4); }
    /* match strip */
    .dash-strip { display:flex; align-items:center; gap:9px; background: rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.07); border-radius:9px; padding:9px 12px; color: rgba(255,255,255,0.72); font-size:0.6rem; font-weight:600; }
    .dash-strip .pill { display:inline-flex; align-items:center; gap:5px; }
    .dash-strip .pill.live { color:#ff7a93; }
    .dash-strip .pill.live i { font-size:0.36rem; }
    .dash-strip .sep { width:3px; height:3px; border-radius:50%; background: rgba(255,255,255,0.25); }
    /* content cards */
    .dash-row { display:grid; grid-template-columns: repeat(4,1fr); gap:8px; margin-top:auto; }
    .dash-card { border-radius:9px; padding:11px 8px; background: rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.07); display:flex; flex-direction:column; gap:7px; }
    .dash-card i { color: var(--blue-light); font-size:0.8rem; }
    .dash-card b { font-size:0.58rem; font-weight:600; color: rgba(255,255,255,0.78); }
    /* floating trust badges */
    .float-badge { position:absolute; z-index:5; display:flex; align-items:center; gap:9px; background: rgba(255,255,255,0.96); border:1px solid rgba(255,255,255,0.7); border-radius:13px; padding:9px 13px; box-shadow: var(--shadow); backdrop-filter: blur(6px); }
    .float-badge .fb-ic { width:30px; height:30px; border-radius:9px; display:grid; place-items:center; color:#fff; font-size:0.78rem; flex-shrink:0; }
    .float-badge b { display:block; font-size:0.76rem; font-weight:700; color: var(--ink); line-height:1.15; }
    .float-badge span { display:block; font-size:0.62rem; color: var(--muted); }
    .float-badge.fb-1 { top:30px; left:-24px; animation: floaty 6s ease-in-out infinite; }
    .float-badge.fb-1 .fb-ic { background: linear-gradient(135deg,#15803d,#22c55e); }
    .float-badge.fb-2 { bottom:14px; right:-20px; animation: floaty 6s ease-in-out infinite; animation-delay:1.4s; }
    .float-badge.fb-2 .fb-ic { background:#25d366; }
    .tv-stand { width:120px; height:10px; background:#0c111c; margin:12px auto 0; border-radius:0 0 6px 6px; }
    .tv-base { width:230px; height:8px; background:#070b16; border-radius:99px; margin:0 auto; box-shadow:0 18px 34px rgba(0,0,0,0.55); }

    /* logos strip */
    .logos-strip { border-top: 1px solid rgba(255,255,255,0.08); margin-top: 76px; padding-top: 34px; }
    .logos-strip p { text-align:center; font-size:0.78rem; letter-spacing:0.08em; text-transform:uppercase; color: rgba(255,255,255,0.4); margin-bottom:20px; }
    .logos-row { display:flex; justify-content:center; align-items:center; gap:46px; flex-wrap:wrap; color: rgba(255,255,255,0.55); font-size:1.5rem; }
    .logos-row span { display:flex; align-items:center; gap:9px; font-size:0.95rem; font-weight:600; }

    /* ============================================================
       Problem / Solution
    ============================================================ */
    .compare { background:#fff; }
    .compare-table { max-width: 1000px; margin: 0 auto; border: 1px solid var(--line); border-radius: var(--radius); overflow: hidden; box-shadow: var(--shadow-sm); }
    .compare-row { display:grid; grid-template-columns: 1fr 1fr 54px 1fr 1fr; gap:22px; align-items:center; padding: 24px 28px; border-bottom:1px solid var(--line); }
    .compare-row:nth-child(even) { background: var(--bg-soft); }
    .compare-row:last-child { border-bottom:none; }
    .ps-item { display:flex; gap:13px; align-items:flex-start; }
    .ps-item .ic { flex-shrink:0; width:38px; height:38px; border-radius:11px; display:grid; place-items:center; font-size:0.92rem; }
    .ps-item.bad .ic { background:#fef2f2; color:var(--red); }
    .ps-item.good .ic { background:var(--blue-soft); color:var(--blue); }
    .ps-item strong { display:block; font-size:0.96rem; font-weight:600; line-height:1.2; }
    .ps-item small { display:block; color:var(--muted); font-size:0.82rem; }
    .ps-arrow { display:grid; place-items:center; }
    .ps-arrow span { width:36px; height:36px; border-radius:50%; background: linear-gradient(135deg,var(--blue),var(--indigo)); color:#fff; display:grid; place-items:center; font-size:0.85rem; box-shadow: 0 8px 18px rgba(37,99,235,0.35); }

    /* ============================================================
       Pricing
    ============================================================ */
    .pricing { background: var(--bg-soft); }
    .pricing-grid { display:grid; grid-template-columns: repeat(3, 1fr); gap:24px; align-items:stretch; }
    .price-card {
      background:#fff; border:1px solid var(--line); border-radius: var(--radius);
      padding:38px 34px; display:flex; flex-direction:column; box-shadow: var(--shadow-xs); position:relative;
      transition: transform .35s var(--ease), box-shadow .35s var(--ease);
    }
    .price-card:hover { transform: translateY(-6px); box-shadow: var(--shadow); }
    .price-card.featured { border:1.5px solid transparent; background: linear-gradient(#fff,#fff) padding-box, linear-gradient(135deg, var(--blue), var(--indigo)) border-box; box-shadow: var(--shadow); transform: scale(1.035); }
    .price-card.featured:hover { transform: scale(1.035) translateY(-6px); }
    .price-badge { position:absolute; top:-13px; left:50%; transform:translateX(-50%); background: linear-gradient(135deg, var(--blue), var(--indigo)); color:#fff; font-size:0.72rem; font-weight:700; letter-spacing:0.03em; padding:6px 16px; border-radius:999px; box-shadow: 0 8px 18px rgba(37,99,235,0.4); }
    .price-card h3 { font-size:1.1rem; font-weight:700; }
    .price-card .price { margin:16px 0 4px; display:flex; align-items:baseline; gap:6px; }
    .price-card .price .amount { font-size:3rem; font-weight:800; letter-spacing:-0.04em; }
    .price-card .price .period { color: var(--muted); font-weight:500; font-size:0.95rem; }
    .price-card .pdesc { color: var(--muted); font-size:0.9rem; margin-bottom:26px; }
    .feature-list { flex:1; margin-bottom:28px; }
    .feature-list li { display:flex; align-items:center; gap:12px; padding:8px 0; font-size:0.94rem; color: var(--slate); }
    .feature-list li .fc { width:20px; height:20px; border-radius:50%; background: var(--blue-soft); color: var(--blue); display:grid; place-items:center; font-size:0.62rem; flex-shrink:0; }

 /* ============================================================
       Content Showcase — Everything You Love
    ============================================================ */
    .showcase-grid { display:grid; grid-template-columns: repeat(6,1fr); gap:16px; }
    .show-card {
      position:relative; aspect-ratio: 3/4.2; border-radius: 16px; overflow:hidden;
      border:1px solid var(--line); display:flex; align-items:flex-end; padding:18px 16px;
      transition: transform .35s var(--ease), box-shadow .35s var(--ease);
    }
    .show-card:hover { transform: translateY(-6px); box-shadow: var(--shadow), var(--glow); }
    .show-card .sc-bg { position:absolute; inset:0; z-index:0; }
    .show-card .sc-bg::after { content:""; position:absolute; inset:0; background:linear-gradient(180deg, rgba(5,8,22,0.15) 30%, rgba(5,8,22,0.9)); }
    .show-card .sc-glyph { position:absolute; top:34%; left:50%; transform:translate(-50%,-50%); z-index:1; font-size:1.9rem; color:rgba(255,255,255,0.3); }
    .show-card h4 { position:relative; z-index:2; color:#fff; font-size:1.05rem; font-weight:700; }
    .show-card span { position:relative; z-index:2; }

 /* ============================================================
       Why Switch — before / after
    ============================================================ */
    .switch-grid { display:grid; grid-template-columns: 1fr 1fr; gap:24px; max-width:920px; margin:0 auto; }
    .switch-card { background: var(--surface); border:1px solid var(--line); border-radius: var(--radius); padding:36px 34px; }
    .switch-card.after { border-color: rgba(37,99,235,0.4); box-shadow: var(--glow); background: linear-gradient(180deg, rgba(37,99,235,0.08), var(--surface)); }
    .switch-card .sw-head { display:flex; align-items:center; gap:12px; margin-bottom:22px; }
    .switch-card .sw-head .tag { font-size:0.74rem; font-weight:700; letter-spacing:0.1em; text-transform:uppercase; padding:5px 12px; border-radius:99px; }
    .switch-card.before .tag { background: rgba(248,113,113,0.14); color: var(--red); }
    .switch-card.after .tag { background: rgba(34,197,94,0.16); color: var(--green); }
    .switch-card .sw-head h3 { font-size:1.15rem; font-weight:700; color:#fff; }
    .switch-list li { display:flex; align-items:center; gap:13px; padding:13px 0; border-bottom:1px solid var(--line); font-size:0.98rem; color: var(--slate); }
    .switch-list li:last-child { border-bottom:none; }
    .switch-list .si { width:26px; height:26px; flex-shrink:0; border-radius:50%; display:grid; place-items:center; font-size:0.72rem; }
    .switch-card.before .si { background: rgba(248,113,113,0.14); color: var(--red); }
    .switch-card.after .si { background: rgba(34,197,94,0.16); color: var(--green); }
    .switch-card.after .switch-list li { color: var(--ink-2); font-weight:500; }

/* ============================================================
       Match Day — premium sports cards
    ============================================================ */
    .sports-grid { display:grid; grid-template-columns: repeat(4,1fr); gap:18px; }
    .sport-card {
      position:relative; aspect-ratio: 3/4; border-radius:18px; overflow:hidden;
      border:1px solid var(--line); display:flex; flex-direction:column; justify-content:flex-end;
      padding:22px 20px; transition: transform .35s var(--ease), box-shadow .35s var(--ease);
    }
    .sport-card:hover { transform: translateY(-6px); box-shadow: var(--shadow), var(--glow); }
    .sport-card .sp-bg { position:absolute; inset:0; z-index:0; }
    .sport-card .sp-bg::after { content:""; position:absolute; inset:0; background:linear-gradient(180deg, rgba(5,8,22,0.1) 25%, rgba(5,8,22,0.92)); }
    .sport-card .sp-glyph { position:absolute; top:38%; left:50%; transform:translate(-50%,-50%); z-index:1; font-size:2.6rem; color:rgba(255,255,255,0.22); }
    .sport-card .sp-live { position:absolute; top:16px; left:16px; z-index:2; display:inline-flex; align-items:center; gap:6px; background:rgba(225,29,72,0.92); color:#fff; font-size:0.6rem; font-weight:800; letter-spacing:0.06em; padding:4px 9px; border-radius:99px; }
    .sport-card .sp-live .d { width:5px; height:5px; border-radius:50%; background:#fff; }
    .sport-card h4 { position:relative; z-index:2; color:#fff; font-size:1.12rem; font-weight:800; letter-spacing:-0.01em; }
    .sport-card small { position:relative; z-index:2; color: var(--slate); font-size:0.8rem; }
    .sp-bg.s1 { background: radial-gradient(70% 60% at 50% 25%, #1d4ed8, #060e1d); }
    .sp-bg.s2 { background: radial-gradient(70% 60% at 50% 25%, #16487f, #05101c); }
    .sp-bg.s3 { background: radial-gradient(70% 60% at 50% 25%, #14506b, #05121c); }
    .sp-bg.s4 { background: radial-gradient(70% 60% at 50% 25%, #173a5e, #060e1b); }

    .matchday-intro { max-width:680px; margin:0 auto 48px; text-align:center; }
    .matchday-intro .lines { margin-top:16px; color: var(--slate); font-size:1.05rem; }
    .matchday-intro .lines .em { color:#fff; font-weight:700; display:block; margin-top:10px; }

    /* ============================================================
       Everything You Get
    ============================================================ */
    .features-grid { display:grid; grid-template-columns: repeat(3,1fr); gap:20px; }
    .feature-card { background:#fff; border:1px solid var(--line); border-radius: var(--radius); padding:30px; box-shadow: var(--shadow-xs); transition: transform .35s var(--ease), box-shadow .35s var(--ease); }
    .feature-card:hover { transform: translateY(-5px); box-shadow: var(--shadow); }
    .feature-card .f-ic { width:54px; height:54px; border-radius:14px; display:grid; place-items:center; font-size:1.35rem; color: var(--blue); background: var(--blue-soft); margin-bottom:18px; }
    .feature-card h4 { font-size:1.45rem; font-weight:800; letter-spacing:-0.02em; }
    .feature-card p { color: var(--muted); margin-top:4px; font-size:0.96rem; }

    /* ============================================================
       Guarantee
    ============================================================ */
    .guarantee { padding: 0 0 120px; }
    .guarantee-banner { background: var(--bg-soft); border:1px solid var(--line); border-radius: var(--radius); padding: 50px 52px; display:grid; grid-template-columns: 1.3fr 1.4fr; gap:48px; align-items:center; }
    .guarantee-banner .g-head { display:flex; gap:22px; align-items:flex-start; }
    .guarantee-banner .g-icon { flex-shrink:0; width:64px; height:64px; border-radius:18px; background: linear-gradient(135deg, var(--blue), var(--indigo)); display:grid; place-items:center; font-size:1.6rem; color:#fff; box-shadow: 0 12px 26px rgba(37,99,235,0.4); }
    .guarantee-banner h2 { font-size: clamp(1.5rem,2.4vw,2rem); font-weight:800; letter-spacing:-0.03em; }
    .guarantee-banner h2 .accent { color: var(--blue); }
    .guarantee-banner p { margin-top:12px; color: var(--slate); font-size:0.98rem; }
    .guarantee-points { display:grid; grid-template-columns: repeat(2,1fr); gap:14px; }
    .guarantee-points li { display:flex; align-items:center; gap:12px; background:#fff; border:1px solid var(--line); border-radius:14px; padding:15px 16px; font-size:0.92rem; font-weight:500; }
    .guarantee-points .gp-ic { width:34px; height:34px; flex-shrink:0; border-radius:9px; display:grid; place-items:center; background: var(--blue-soft); color: var(--blue); font-size:0.9rem; }

    /* ============================================================
       How It Works
    ============================================================ */
    .steps-grid { display:grid; grid-template-columns: repeat(4,1fr); gap:0; position:relative; }
    .step-card { text-align:center; padding:0 20px; position:relative; }
    .step-card::after { content:""; position:absolute; top:27px; left:62%; right:-38%; height:2px; background-image: linear-gradient(90deg, var(--blue-light) 45%, transparent 0); background-size: 11px 2px; background-repeat: repeat-x; opacity:0.6; }
    .step-card:last-child::after { display:none; }
    .step-num { width:56px; height:56px; margin:0 auto 18px; position:relative; z-index:1; border-radius:18px; display:grid; place-items:center; font-size:1.25rem; font-weight:800; color:#fff; background: linear-gradient(135deg, var(--blue), var(--indigo)); box-shadow: 0 12px 24px rgba(37,99,235,0.4); }
    .step-card h4 { font-size:1.08rem; font-weight:700; }
    .step-card p { color: var(--muted); font-size:0.9rem; margin-top:6px; }

    /* ============================================================
       FAQ
    ============================================================ */
    .faq { background: var(--bg-soft); }
    .faq-cols { display:grid; grid-template-columns: 1fr 1fr; gap:16px; max-width: 960px; margin:0 auto; align-items:start; }
    .faq-item { background:#fff; border:1px solid var(--line); border-radius: var(--radius-sm); overflow:hidden; transition: box-shadow .25s, border-color .25s; }
    .faq-item.active { box-shadow: var(--shadow-sm); border-color:#cfe0ff; }
    .faq-q { width:100%; text-align:left; background:none; border:none; cursor:pointer; padding:20px 22px; display:flex; align-items:center; justify-content:space-between; gap:14px; font-size:0.98rem; font-weight:600; color: var(--ink); font-family: inherit; }
    .faq-q i { flex-shrink:0; color: var(--blue); font-size:0.85rem; transition: transform .3s var(--ease); }
    .faq-item.active .faq-q i { transform: rotate(180deg); }
    .faq-a { max-height:0; overflow:hidden; transition: max-height .35s var(--ease); }
    .faq-a p { padding:0 22px 22px; color: var(--muted); font-size:0.92rem; }

    /* ============================================================
       Final CTA
    ============================================================ */
    .final-banner {
      position:relative; overflow:hidden; text-align:center;
      background: radial-gradient(70% 120% at 50% 0%, rgba(37,99,235,0.35), transparent 65%), var(--surface);
      border:1px solid var(--line-2); border-radius: 28px; padding: 64px 56px;
      box-shadow: var(--shadow);
    }
    .final-banner h2 { font-size: clamp(1.9rem,3.4vw,2.7rem); font-weight:800; letter-spacing:-0.03em; line-height:1.1; color:#000000; max-width:720px; margin:0 auto; }
    .final-benefits { display:flex; gap:14px 26px; flex-wrap:wrap; justify-content:center; margin:26px 0 32px; }
    .final-benefits li { display:flex; align-items:center; gap:9px; font-weight:500; font-size:0.98rem; color: var(--ink-2); }
    .final-benefits i { color: var(--blue-light); }
    .final-banner .note { font-size:0.84rem; color: var(--muted); margin-top:16px; }

    /* ============================================================
       Footer
    ============================================================ */
    .footer { background: var(--navy); color: rgba(255,255,255,0.58); padding: 72px 0 30px; }
    .footer-grid { display:grid; grid-template-columns: 1.7fr 1fr 1fr 1fr; gap:44px; margin-bottom:48px; }
    .footer .logo { color:#fff; margin-bottom:18px; }
    .footer p { font-size:0.9rem; max-width:280px; line-height:1.7; }
    .footer h5 { color:#fff; font-size:0.82rem; font-weight:600; letter-spacing:0.04em; text-transform:uppercase; margin-bottom:16px; }
    .footer-links a { display:block; padding:7px 0; font-size:0.9rem; transition: color .2s; }
    .footer-links a:hover { color: var(--blue-light); }
    .footer-social { display:flex; gap:11px; margin-top:20px; }
    .footer-social a { width:38px; height:38px; border-radius:11px; background: rgba(255,255,255,0.06); display:grid; place-items:center; color:#fff; transition: background .2s, transform .2s; }
    .footer-social a:hover { background: var(--blue); transform: translateY(-3px); }
    .footer-bottom { border-top:1px solid rgba(255,255,255,0.08); padding-top:24px; display:flex; justify-content:space-between; gap:16px; flex-wrap:wrap; font-size:0.83rem; }

    .fab { position:fixed; bottom:24px; right:24px; z-index:900; width:58px; height:58px; border-radius:50%; background:#25d366; color:#fff; display:grid; place-items:center; font-size:1.6rem; box-shadow: 0 14px 30px rgba(37,211,102,0.5); transition: transform .25s var(--ease); }
    .fab:hover { transform: scale(1.08); }

    .reveal { opacity:0; transform: translateY(24px); transition: opacity .7s var(--ease), transform .7s var(--ease); }
    .reveal.in { opacity:1; transform: none; }

    /* ============================================================
       Trust Numbers Bar
    ============================================================ */
    .trustbar { border-bottom: 1px solid var(--line); background: #fff; }
    .trustbar-grid { display:grid; grid-template-columns: repeat(5,1fr); gap:24px; padding: 40px 0; }
    .trust-stat { text-align:center; position:relative; }
    .trust-stat:not(:last-child)::after { content:""; position:absolute; right:-12px; top:50%; transform:translateY(-50%); width:1px; height:38px; background: var(--line); }
    .trust-stat .ts-num { font-size:1.6rem; font-weight:800; letter-spacing:-0.03em; color: var(--ink); display:flex; align-items:center; justify-content:center; gap:8px; }
    .trust-stat .ts-num i { color: var(--blue); font-size:1.15rem; }
    .trust-stat .ts-num .stars { color:#f5a623; font-size:1rem; letter-spacing:1px; }
    .trust-stat p { margin-top:4px; font-size:0.84rem; color: var(--muted); }

    /* ============================================================
       Comparison Table
    ============================================================ */
    .comparison { background:#fff; }
    .cmp-table { max-width: 920px; margin:0 auto; border:1px solid var(--line); border-radius: var(--radius); overflow:hidden; box-shadow: var(--shadow-sm); }
    .cmp-head, .cmp-row { display:grid; grid-template-columns: 1.4fr 1fr 1fr; align-items:center; }
    .cmp-head { background: var(--ink); color:#fff; }
    .cmp-head > div { padding: 20px 24px; font-weight:600; font-size:0.95rem; }
    .cmp-head .col-us { background: linear-gradient(135deg, var(--blue), var(--indigo)); text-align:center; display:flex; align-items:center; justify-content:center; gap:8px; }
    .cmp-head .col-them { text-align:center; color: rgba(255,255,255,0.7); }
    .cmp-row { border-bottom:1px solid var(--line); }
    .cmp-row:last-child { border-bottom:none; }
    .cmp-row:nth-child(even) { background: var(--bg-soft); }
    .cmp-row > div { padding: 18px 24px; font-size:0.94rem; }
    .cmp-row .feat { font-weight:600; color: var(--ink); }
    .cmp-row .us, .cmp-row .them { text-align:center; display:flex; align-items:center; justify-content:center; gap:8px; }
    .cmp-row .us { color: var(--ink); font-weight:600; }
    .cmp-row .us i { color: var(--green); }
    .cmp-row .them { color: var(--muted); }
    .cmp-row .them i { color: #c2cad6; }

    /* ============================================================
       Customer Reviews
    ============================================================ */
    .reviews-grid { display:grid; grid-template-columns: repeat(3,1fr); gap:22px; }
    .review-card { background:#fff; border:1px solid var(--line); border-radius: var(--radius); padding:28px; box-shadow: var(--shadow-xs); transition: transform .35s var(--ease), box-shadow .35s var(--ease); }
    .review-card:hover { transform: translateY(-4px); box-shadow: var(--shadow); }
    .review-card .stars { color:#f5a623; font-size:0.9rem; letter-spacing:1px; margin-bottom:14px; }
    .review-card p { font-size:1rem; color: var(--ink-2); line-height:1.6; }
    .review-card .reviewer { display:flex; align-items:center; gap:11px; margin-top:18px; }
    .review-card .reviewer .ra { width:38px; height:38px; border-radius:50%; background: linear-gradient(135deg,var(--blue),var(--indigo)); color:#fff; display:grid; place-items:center; font-weight:700; font-size:0.9rem; flex-shrink:0; }
    .review-card .reviewer b { display:block; font-size:0.9rem; font-weight:600; }
    .review-card .reviewer span { display:block; font-size:0.8rem; color: var(--muted); }

    /* ============================================================
       Device Compatibility
    ============================================================ */
    .devices-grid { display:grid; grid-template-columns: repeat(6,1fr); gap:16px; }
    .device-card { background:#fff; border:1px solid var(--line); border-radius: var(--radius-sm); padding:22px 14px; text-align:center; box-shadow: var(--shadow-xs); transition: transform .3s var(--ease), box-shadow .3s var(--ease), border-color .3s; }
    .device-card:hover { transform: translateY(-4px); box-shadow: var(--shadow); border-color:#cfe0ff; }
    .device-card .dv-ic { width:46px; height:46px; margin:0 auto 12px; border-radius:12px; display:grid; place-items:center; font-size:1.3rem; color: var(--blue); background: var(--blue-soft); }
    .device-card b { font-size:0.86rem; font-weight:600; color: var(--ink-2); }

    /* ============================================================
       UGC Video Proof
    ============================================================ */
    .ugc-grid { display:grid; grid-template-columns: repeat(4,1fr); gap:22px; max-width: 940px; margin:0 auto; }
    .ugc-card { position:relative; border-radius: 22px; overflow:hidden; aspect-ratio: 9/16; border:1px solid var(--line); box-shadow: var(--shadow-sm); cursor:pointer; transition: transform .35s var(--ease), box-shadow .35s var(--ease); }
    .ugc-card:hover { transform: translateY(-5px); box-shadow: var(--shadow); }
    .ugc-card .ugc-bg { position:absolute; inset:0; }
    .ugc-card .ugc-bg::after { content:""; position:absolute; inset:0; background: linear-gradient(180deg, rgba(7,11,22,0.1) 30%, rgba(7,11,22,0.85)); }
    .ugc-bg.g1 { background: radial-gradient(circle at 50% 35%, #1e3a8a, #0a0f1c); }
    .ugc-bg.g2 { background: radial-gradient(circle at 50% 35%, #312e81, #0a0f1c); }
    .ugc-bg.g3 { background: radial-gradient(circle at 50% 35%, #0e7490, #0a0f1c); }
    .ugc-bg.g4 { background: radial-gradient(circle at 50% 35%, #4b1d1d, #0a0f1c); }
    .ugc-bg video { width:100%; height:100%; object-fit:cover; display:block; }
    .ugc-play { position:absolute; top:42%; left:50%; transform:translate(-50%,-50%); z-index:2; width:54px; height:54px; border-radius:50%; background: rgba(255,255,255,0.92); color: var(--blue); display:grid; place-items:center; font-size:1.1rem; box-shadow: 0 10px 24px rgba(0,0,0,0.35); transition: transform .3s var(--ease); }
    .ugc-card:hover .ugc-play { transform:translate(-50%,-50%) scale(1.08); }
    .ugc-verified { position:absolute; top:14px; left:14px; z-index:2; display:inline-flex; align-items:center; gap:6px; background: rgba(255,255,255,0.14); backdrop-filter: blur(6px); border:1px solid rgba(255,255,255,0.18); color:#fff; font-size:0.64rem; font-weight:600; padding:5px 10px; border-radius:99px; }
    .ugc-verified i { color:#34d399; }
    .ugc-foot { position:absolute; left:0; right:0; bottom:0; z-index:2; padding:16px 16px 18px; }
    .ugc-foot .stars { color:#f5a623; font-size:0.72rem; letter-spacing:1px; }
    .ugc-foot b { display:block; color:#fff; font-size:0.86rem; font-weight:600; margin-top:6px; line-height:1.25; }

    /* ============================================================
       WhatsApp Proof
    ============================================================ */
    .waproof-grid { display:grid; grid-template-columns: 1fr 1fr; gap:48px; align-items:center; }
    .wa-points { margin-top:6px; }
    .wa-points li { display:flex; align-items:center; gap:13px; padding:13px 0; border-bottom:1px solid var(--line); font-size:1rem; color: var(--ink-2); font-weight:500; }
    .wa-points li:last-child { border-bottom:none; }
    .wa-points .wp-ic { width:36px; height:36px; flex-shrink:0; border-radius:10px; background: rgba(22,163,74,0.12); color:#16a34a; display:grid; place-items:center; font-size:0.9rem; }
    .chat-phone { max-width: 340px; margin:0 auto; background: #0b1120; border-radius: 30px; padding: 14px; box-shadow: var(--shadow-lg); border:1px solid rgba(255,255,255,0.06); }
    .chat-top { display:flex; align-items:center; gap:11px; padding:8px 8px 14px; border-bottom:1px solid rgba(255,255,255,0.07); }
    .chat-top .ct-av { width:38px; height:38px; border-radius:50%; background:#25d366; color:#fff; display:grid; place-items:center; font-size:1rem; }
    .chat-top b { color:#fff; font-size:0.9rem; font-weight:600; display:block; }
    .chat-top span { color:#34d399; font-size:0.72rem; display:flex; align-items:center; gap:5px; }
    .chat-top span::before { content:""; width:6px; height:6px; border-radius:50%; background:#34d399; }
    .chat-body { padding:16px 6px 8px; display:flex; flex-direction:column; gap:11px; background: linear-gradient(180deg,#0e1626,#0b1120); }
    .bubble { max-width:80%; padding:10px 13px; border-radius:14px; font-size:0.82rem; line-height:1.4; position:relative; }
    .bubble.in { align-self:flex-start; background: rgba(255,255,255,0.08); color: rgba(255,255,255,0.92); border-bottom-left-radius:5px; }
    .bubble.out { align-self:flex-end; background: linear-gradient(135deg,#1d7a43,#25d366); color:#fff; border-bottom-right-radius:5px; }
    .bubble .t { display:block; font-size:0.6rem; opacity:0.6; margin-top:5px; text-align:right; }

    /* ============================================================
       Review Wall
    ============================================================ */
    .wall-grid { display:grid; grid-template-columns: repeat(4,1fr); gap:16px; }
    .wall-card { background:#fff; border:1px solid var(--line); border-radius: var(--radius-sm); padding:20px; box-shadow: var(--shadow-xs); transition: transform .3s var(--ease), box-shadow .3s var(--ease); }
    .wall-card:hover { transform: translateY(-3px); box-shadow: var(--shadow-sm); }
    .wall-card .stars { color:#f5a623; font-size:0.78rem; letter-spacing:1px; }
    .wall-card p { font-size:0.9rem; color: var(--ink-2); line-height:1.5; margin:10px 0 12px; }
    .wall-card .who { font-size:0.82rem; color: var(--muted); font-weight:500; }
    .wall-card .who b { color: var(--ink); font-weight:600; }

    /* Pricing "Best For" label */
    .price-best { font-size:0.78rem; font-weight:600; color: var(--blue); background: var(--blue-soft); border-radius:8px; padding:7px 12px; display:inline-block; margin-bottom:16px; }

    /* ============================================================
       Sticky Mobile Bottom Bar
    ============================================================ */
    .mobile-cta-bar { display:none; }

    /* ============================================================
       Responsive
    ============================================================ */
    @media (max-width: 980px) {
      .hero-grid { grid-template-columns: 1fr; gap: 60px; }
      .hero p.sub, .trust-points { max-width: none; }
      .matchday-banner, .guarantee-banner { grid-template-columns: 1fr; gap:34px; }
      .final-banner { grid-template-columns: 1fr; gap:28px; }
      .final-cta-col { text-align:left; }
      .footer-grid { grid-template-columns: 1fr 1fr; }
      .reviews-grid { grid-template-columns: repeat(2,1fr); }
      .devices-grid { grid-template-columns: repeat(4,1fr); }
      .ugc-grid { grid-template-columns: repeat(4,1fr); max-width:none; }
      .wall-grid { grid-template-columns: repeat(3,1fr); }
      .waproof-grid { grid-template-columns: 1fr; gap:40px; }
    }
    @media (max-width: 768px) {
      .section-pad { padding: 80px 0; }
      .nav-links { display:none; }
      .nav-actions .whatsapp-badge, .nav-actions .btn { display:none; }
      .nav-toggle { display:block; }
      .compare-row { grid-template-columns: 1fr; gap:16px; padding:22px; }
      .ps-arrow { display:none; }
      .pricing-grid { grid-template-columns: 1fr; }
      .price-card.featured { transform:none; }
      .price-card.featured:hover { transform: translateY(-6px); }
      .md-cards { grid-template-columns: repeat(2,1fr); }
      .features-grid { grid-template-columns: 1fr; }
      .guarantee-points { grid-template-columns: 1fr; }
      .steps-grid { grid-template-columns: 1fr 1fr; gap:36px 0; }
      .step-card::after { display:none; }
      .faq-cols { grid-template-columns: 1fr; }
      .logos-row { gap: 28px; }
      .trustbar-grid { grid-template-columns: repeat(2,1fr); gap:28px 16px; }
      .trust-stat:not(:last-child)::after { display:none; }
      .reviews-grid { grid-template-columns: 1fr; }
      .devices-grid { grid-template-columns: repeat(3,1fr); }
      .cmp-head > div, .cmp-row > div { padding:14px 12px; font-size:0.82rem; }
      .ugc-grid { grid-template-columns: repeat(2,1fr); gap:16px; }
      .wall-grid { grid-template-columns: repeat(2,1fr); }
      .float-badge.fb-1 { left:0; }
      .float-badge.fb-2 { right:0; }
      .mobile-cta-bar { display:grid; }
      body { padding-bottom: 76px; }
    }
    @media (max-width: 520px) {
      .container { padding: 0 18px; }
      .trust-points { grid-template-columns: 1fr; }
      .md-cards { grid-template-columns: 1fr 1fr; }
      .steps-grid { grid-template-columns: 1fr; }
      .matchday-banner, .guarantee-banner, .final-banner { padding: 36px 26px; border-radius: 24px; }
      .hero { padding-top: 140px; }
      .devices-grid { grid-template-columns: repeat(2,1fr); }
      .trust-stat .ts-num { font-size:1.35rem; }
      .dash { grid-template-columns: 78px 1fr; }
      .dash-nav { font-size:0.58rem; padding:7px; gap:6px; }
      .dash-hero h5 { font-size:0.95rem; }
      .float-badge { padding:7px 10px; }
      .float-badge b { font-size:0.68rem; }
      .float-badge span { font-size:0.58rem; }
      .wall-grid { grid-template-columns: 1fr; }
      .ugc-grid { grid-template-columns: repeat(2,1fr); }
    }

    /* Sticky mobile bottom bar */
    .mobile-cta-bar {
      position: fixed; bottom: 0; left: 0; right: 0; z-index: 950;
      grid-template-columns: 1fr 1fr; gap: 10px;
      padding: 10px 14px calc(10px + env(safe-area-inset-bottom));
      background: rgba(255,255,255,0.92); backdrop-filter: saturate(180%) blur(16px);
      border-top: 1px solid var(--line); box-shadow: 0 -6px 24px rgba(10,16,36,0.08);
    }
    .mobile-cta-bar .btn { padding: 13px 16px; font-size: 0.95rem; }
    @media (max-width: 768px) { .fab { display: none; } }
  </style>

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

  <!-- ===================== HEADER ===================== -->
  <?php $home = esc_url( home_url( '/' ) ); ?>
  <header class="header" id="header">
    <div class="header-inner">
      <a href="<?php echo $home; ?>" class="logo">
        <span class="logo-mark"><i class="fa-solid fa-play"></i></span>
        <span>IPTV<small>TRUSTED</small></span>
      </a>

      <nav class="nav-links">
        <a href="<?php echo $home; ?>#home" class="active">Home</a>
        <a href="<?php echo $home; ?>#features">Features</a>
        <a href="<?php echo $home; ?>#channels">Channels</a>
        <a href="<?php echo $home; ?>#how">How It Works</a>
        <a href="<?php echo $home; ?>#faq">FAQ</a>
        <a href="<?php echo $home; ?>#contact">Contact</a>
      </nav>

      <div class="nav-actions">
        <a href="https://wa.me/1234567890" target="_blank" rel="noopener" class="whatsapp-badge">
          <span class="wa-ic"><i class="fa-brands fa-whatsapp"></i></span>
          <span class="wa-txt"><b>WhatsApp Support</b><span>24/7 Online</span></span>
        </a>
        <a href="<?php echo $home; ?>#pricing" class="btn btn-blue">View Plans</a>
        <button class="nav-toggle" id="navToggle" aria-label="Open menu"><i class="fa-solid fa-bars"></i></button>
      </div>
    </div>
  </header>

  <div class="mobile-menu" id="mobileMenu">
    <a href="<?php echo $home; ?>#home">Home</a>
    <a href="<?php echo $home; ?>#features">Features</a>
    <a href="<?php echo $home; ?>#channels">Channels</a>
    <a href="<?php echo $home; ?>#how">How It Works</a>
    <a href="<?php echo $home; ?>#faq">FAQ</a>
    <a href="<?php echo $home; ?>#contact">Contact</a>
    <a href="https://wa.me/1234567890" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp" style="color:#16a34a"></i>&nbsp; WhatsApp Support</a>
    <a href="<?php echo $home; ?>#pricing" class="btn btn-blue btn-block">View Plans</a>
  </div>

