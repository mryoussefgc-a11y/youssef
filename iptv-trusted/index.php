<?php
get_header();

/**
 * Centralized WhatsApp number.
 * Change it ONCE here — every WhatsApp link/button on this page updates automatically.
 */
$wa_number = '1234567890';
$wa_base   = 'https://wa.me/' . $wa_number;

/** Helper: build a WhatsApp link, optionally with a pre-filled message. */
if ( ! function_exists( 'iptv_wa_link' ) ) {
  function iptv_wa_link( $base, $message = '' ) {
    return $message ? esc_url( $base . '?text=' . rawurlencode( $message ) ) : esc_url( $base );
  }
}
?>

  <!-- ===================== HERO ===================== -->
  <section class="hero" id="home">
    <div class="container">
      <div class="hero-grid">
        <div class="hero-copy">
          <span class="hero-pill"><span class="dot"></span> Trusted by UK viewers</span>
          <h1>Stop Missing Big Matches <span class="accent">Because Of Unreliable IPTV.</span></h1>
          <p class="sub">Watch Premier League, Champions League, UFC, boxing, movies and series with reliable streaming, fast account delivery and real WhatsApp support when you need it.</p>

          <ul class="trust-points">
            <li><span class="tp-ic"><i class="fa-solid fa-check"></i></span><div><strong>No Scams</strong><small>Transparent service</small></div></li>
            <li><span class="tp-ic"><i class="fa-solid fa-check"></i></span><div><strong>No Buffering</strong><small>Stable servers</small></div></li>
            <li><span class="tp-ic"><i class="fa-solid fa-check"></i></span><div><strong>Real Support</strong><small>WhatsApp 24/7</small></div></li>
            <li><span class="tp-ic"><i class="fa-solid fa-check"></i></span><div><strong>Easy Setup</strong><small>Guided installation</small></div></li>
          </ul>

          <div class="hero-cta">
            <a href="#pricing" class="btn btn-blue btn-lg">View Plans <i class="fa-solid fa-arrow-right"></i></a>
            <p class="hero-note">Fast activation. No long-term contract.<br>UK-friendly support.</p>
          </div>

          <div class="hero-social">
            <div class="trustpilot">
              <span class="stars">★★★★★</span>
              <span><b>Rated 4.9/5</b> by happy customers</span>
            </div>
            <div class="avatars">
              <div class="stack">
                <span style="flex:0 0 34px;width:34px;height:34px;border-radius:50%;overflow:hidden;padding:0;"><img src="<?php echo iptv_media( 'iptv_hero_avatar_1', 'https://randomuser.me/api/portraits/men/32.jpg' ); ?>" alt="" style="width:100%;height:100%;object-fit:cover;display:block;" loading="lazy"></span>
                <span style="flex:0 0 34px;width:34px;height:34px;border-radius:50%;overflow:hidden;padding:0;"><img src="<?php echo iptv_media( 'iptv_hero_avatar_2', 'https://randomuser.me/api/portraits/women/44.jpg' ); ?>" alt="" style="width:100%;height:100%;object-fit:cover;display:block;" loading="lazy"></span>
                <span style="flex:0 0 34px;width:34px;height:34px;border-radius:50%;overflow:hidden;padding:0;"><img src="<?php echo iptv_media( 'iptv_hero_avatar_3', 'https://randomuser.me/api/portraits/men/51.jpg' ); ?>" alt="" style="width:100%;height:100%;object-fit:cover;display:block;" loading="lazy"></span>
                <span style="flex:0 0 34px;width:34px;height:34px;border-radius:50%;overflow:hidden;padding:0;"><img src="<?php echo iptv_media( 'iptv_hero_avatar_4', 'https://randomuser.me/api/portraits/women/68.jpg' ); ?>" alt="" style="width:100%;height:100%;object-fit:cover;display:block;" loading="lazy"></span>
                <span>+2k</span>
              </div>
              <small>Trusted by UK viewers</small>
            </div>
          </div>
        </div>

        <!-- Hero visual: fixed-size box so it never breaks the layout -->
        <div class="hero-visual">
          <div style="width:100%; aspect-ratio:4/3; border-radius:20px; overflow:hidden; background:#0b1120; box-shadow:var(--shadow-lg);">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGd2iLHbzyC9PLp1Gwk0mr0_WctRwLLYcQHw&s" alt="Watch live sports"
                 style="width:100%; height:100%; object-fit:cover; display:block;" loading="lazy">
          </div>
          <div class="float-badge fb-1"><span class="fb-ic"><i class="fa-solid fa-shield-halved"></i></span><div><b>Stable on Match Day</b><span>Optimized servers</span></div></div>
          <div class="float-badge fb-2"><span class="fb-ic"><i class="fa-brands fa-whatsapp"></i></span><div><b>Fast WhatsApp Setup</b><span>Real human help</span></div></div>
        </div>
      </div>

      <!-- trust logos strip -->
      <div class="logos-strip reveal">
        <p>Watch on every device you own</p>
        <div class="logos-row">
          <span><i class="fa-brands fa-apple"></i> Apple TV</span>
          <span><i class="fa-brands fa-android"></i> Android</span>
          <span><i class="fa-solid fa-tv"></i> Smart TV</span>
          <span><i class="fa-solid fa-mobile-screen"></i> Mobile</span>
          <span><i class="fa-solid fa-box"></i> IPTV Box</span>
          <span><i class="fa-solid fa-laptop"></i> Desktop</span>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== TRUST BAR (minimalist) ===================== -->
  <section class="trustbar" id="trustbar">
    <style>
      #trustbar { background:#fff; border-bottom:1px solid var(--line); }
      #trustbar .tb-grid { display:flex; flex-wrap:wrap; justify-content:center; align-items:center;
        gap:18px 40px; padding:24px 0; }
      #trustbar .tb-item { display:flex; align-items:center; gap:11px; }
      #trustbar .tb-ic { color:var(--blue); font-size:1.15rem; flex-shrink:0; }
      #trustbar .tb-tx b { display:block; font-size:0.95rem; font-weight:700; color:var(--ink); line-height:1.15; letter-spacing:-0.01em; }
      #trustbar .tb-tx span { display:block; font-size:0.76rem; color:var(--muted); }
      #trustbar .tb-sep { width:1px; height:30px; background:var(--line); }

      @media (max-width:768px){
        #trustbar .tb-grid { display:grid; grid-template-columns:1fr 1fr; gap:22px 10px; padding:26px 0; }
        #trustbar .tb-sep { display:none; }
        #trustbar .tb-item { justify-content:center; }
        #trustbar .tb-item:last-child { grid-column:1 / -1; }
        #trustbar .tb-tx b { font-size:0.9rem; }
        #trustbar .tb-tx span { font-size:0.72rem; }
      }
    </style>

    <div class="container">
      <div class="tb-grid">
        <div class="tb-item"><i class="fa-solid fa-star tb-ic"></i><div class="tb-tx"><b>4.9/5</b><span>Verified rating</span></div></div>
        <div class="tb-sep"></div>
        <div class="tb-item"><i class="fa-solid fa-shield-halved tb-ic"></i><div class="tb-tx"><b>Trusted</b><span>By UK viewers</span></div></div>
        <div class="tb-sep"></div>
        <div class="tb-item"><i class="fa-brands fa-whatsapp tb-ic"></i><div class="tb-tx"><b>Real human</b><span>WhatsApp support</span></div></div>
        <div class="tb-sep"></div>
        <div class="tb-item"><i class="fa-solid fa-bolt tb-ic"></i><div class="tb-tx"><b>Fast login</b><span>Instant delivery</span></div></div>
        <div class="tb-sep"></div>
        <div class="tb-item"><i class="fa-solid fa-tv tb-ic"></i><div class="tb-tx"><b>All devices</b><span>Supported</span></div></div>
      </div>
    </div>
  </section>

  <!-- ===================== UGC VIDEO PROOF ===================== -->
  <section class="section-pad">
    <style>
      .ugc-bg video { width:100%; height:100%; object-fit:cover; display:block; }
    </style>
    <div class="container">
      <div class="section-head reveal">
        <span class="eyebrow">Real proof</span>
        <h2>Real Viewers. <span class="accent">Real Setups.</span></h2>
        <p>See how simple it is to get connected on Firestick, Smart TV and mobile.</p>
      </div>
      <div class="ugc-grid">
        <div class="ugc-card reveal">
          <div class="ugc-bg g1"><video src="<?php echo iptv_media( 'iptv_video_1', 'https://darkred-gazelle-929999.hostingersite.com/wp-content/uploads/2026/06/snaptik_7652478384852749598_v3.mp4' ); ?>" autoplay muted loop playsinline preload="metadata"></video></div>
          <span class="ugc-verified"><i class="fa-solid fa-circle-check"></i> Verified viewer</span>
          <div class="ugc-foot"><div class="stars">★★★★★</div><b>Firestick setup in minutes</b></div>
        </div>
        <div class="ugc-card reveal">
          <!-- NOTE: this video URL looks like a placeholder filename — confirm the real uploaded file URL -->
          <div class="ugc-bg g2"><video src="<?php echo iptv_media( 'iptv_video_2', 'https://darkred-gazelle-929999.hostingersite.com/wp-content/uploads/video2.mp4' ); ?>" autoplay muted loop playsinline preload="metadata"></video></div>
          <span class="ugc-verified"><i class="fa-solid fa-circle-check"></i> Verified viewer</span>
          <div class="ugc-foot"><div class="stars">★★★★★</div><b>Premier League stream check</b></div>
        </div>
        <div class="ugc-card reveal">
          <!-- NOTE: placeholder filename, confirm real URL -->
          <div class="ugc-bg g3"><video src="<?php echo iptv_media( 'iptv_video_3', 'https://darkred-gazelle-929999.hostingersite.com/wp-content/uploads/video3.mp4' ); ?>" autoplay muted loop playsinline preload="metadata"></video></div>
          <span class="ugc-verified"><i class="fa-solid fa-circle-check"></i> Verified viewer</span>
          <div class="ugc-foot"><div class="stars">★★★★★</div><b>Smart TV installation</b></div>
        </div>
        <div class="ugc-card reveal">
          <!-- NOTE: placeholder filename, confirm real URL -->
          <div class="ugc-bg g4"><video src="<?php echo iptv_media( 'iptv_video_4', 'https://darkred-gazelle-929999.hostingersite.com/wp-content/uploads/video4.mp4' ); ?>" autoplay muted loop playsinline preload="metadata"></video></div>
          <span class="ugc-verified"><i class="fa-solid fa-circle-check"></i> Verified viewer</span>
          <div class="ugc-foot"><div class="stars">★★★★★</div><b>Boxing night test</b></div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== PROBLEM / SOLUTION ===================== -->
  <section class="section-pad compare" id="features">
    <style>
      #features .compare-table { max-width:1000px; margin:0 auto; border:1px solid var(--line); border-radius:var(--radius); overflow:hidden; box-shadow:var(--shadow-sm); background:#fff; }
      #features .compare-head, #features .compare-row { display:grid; grid-template-columns:1fr 1fr 54px 1fr 1fr; gap:22px; align-items:center; padding:22px 28px; border-bottom:1px solid var(--line); }
      #features .compare-row:nth-child(even) { background:var(--bg-soft); }
      #features .compare-row:last-child { border-bottom:none; }
      #features .ps-item { display:flex; gap:13px; align-items:flex-start; }
      #features .ps-item .ic { flex-shrink:0; width:38px; height:38px; border-radius:11px; display:grid; place-items:center; font-size:0.92rem; }
      #features .ps-item.bad .ic { background:#fef2f2; color:var(--red); }
      #features .ps-item.good .ic { background:var(--blue-soft); color:var(--blue); }
      #features .ps-item strong { display:block; font-size:0.96rem; font-weight:600; line-height:1.2; color:var(--ink); }
      #features .ps-item small { display:block; color:var(--muted); font-size:0.82rem; }
      #features .ps-arrow { display:grid; place-items:center; }
      #features .ps-arrow span { width:36px; height:36px; border-radius:50%; background:linear-gradient(135deg,var(--blue),var(--indigo)); color:#fff; display:grid; place-items:center; font-size:0.85rem; box-shadow:0 8px 18px rgba(29,78,216,0.35); }
      @media (max-width:768px){
        #features .compare-head { display:none; }
        #features .compare-row { grid-template-columns:1fr; gap:16px; padding:22px; }
        #features .ps-arrow { display:none; }
      }
    </style>

    <div class="container">
      <div class="section-head reveal">
        <span class="eyebrow">The difference</span>
        <h2>Why People <span class="accent-red">Leave</span> Their Current IPTV</h2>
        <p>Most services fail when it matters most. Here's how we do it differently.</p>
      </div>

      <div class="compare-table reveal">

        <div class="compare-head" style="background:#fff;">
          <div style="grid-column:1 / span 2; display:flex; align-items:center; gap:9px; font-size:0.8rem; font-weight:800; letter-spacing:0.14em; text-transform:uppercase; color:var(--red);">
            <span style="width:9px;height:9px;border-radius:50%;background:var(--red);"></span> Before
          </div>
          <div style="display:grid; place-items:center; color:var(--blue); font-size:1.05rem;"><i class="fa-solid fa-arrow-right"></i></div>
          <div style="grid-column:4 / span 2; display:flex; align-items:center; gap:9px; font-size:0.8rem; font-weight:800; letter-spacing:0.14em; text-transform:uppercase; color:var(--green);">
            <span style="width:9px;height:9px;border-radius:50%;background:var(--green);"></span> After
          </div>
        </div>

        <div class="compare-row">
          <div class="ps-item bad"><span class="ic"><i class="fa-solid fa-circle-xmark"></i></span><div><strong>Got Scammed</strong><small>Paid and lost money</small></div></div>
          <div class="ps-item bad"><span class="ic"><i class="fa-solid fa-spinner"></i></span><div><strong>Buffering During Matches</strong><small>Frustrating experience</small></div></div>
          <div class="ps-arrow"><span><i class="fa-solid fa-arrow-right"></i></span></div>
          <div class="ps-item good"><span class="ic"><i class="fa-solid fa-circle-check"></i></span><div><strong>Transparent Service</strong><small>Honest and reliable</small></div></div>
          <div class="ps-item good"><span class="ic"><i class="fa-solid fa-bolt"></i></span><div><strong>High Stability Servers</strong><small>Smooth streaming always</small></div></div>
        </div>
        <div class="compare-row">
          <div class="ps-item bad"><span class="ic"><i class="fa-solid fa-ghost"></i></span><div><strong>Provider Disappeared</strong><small>Service stopped suddenly</small></div></div>
          <div class="ps-item bad"><span class="ic"><i class="fa-solid fa-phone-slash"></i></span><div><strong>No Support</strong><small>No one answers</small></div></div>
          <div class="ps-arrow"><span><i class="fa-solid fa-arrow-right"></i></span></div>
          <div class="ps-item good"><span class="ic"><i class="fa-solid fa-infinity"></i></span><div><strong>Long-Term Active Service</strong><small>We are here for the long run</small></div></div>
          <div class="ps-item good"><span class="ic"><i class="fa-brands fa-whatsapp"></i></span><div><strong>WhatsApp Support</strong><small>Real people, real support</small></div></div>
        </div>
        <div class="compare-row">
          <div class="ps-item bad"><span class="ic"><i class="fa-solid fa-image"></i></span><div><strong>Fake 4K Quality</strong><small>Low quality streams</small></div></div>
          <div class="ps-item bad"><span class="ic"><i class="fa-solid fa-gears"></i></span><div><strong>Difficult Setup</strong><small>Confusing and hard</small></div></div>
          <div class="ps-arrow"><span><i class="fa-solid fa-arrow-right"></i></span></div>
          <div class="ps-item good"><span class="ic"><i class="fa-solid fa-gem"></i></span><div><strong>Real HD / 4K Streams</strong><small>High quality you can see</small></div></div>
          <div class="ps-item good"><span class="ic"><i class="fa-solid fa-wand-magic-sparkles"></i></span><div><strong>Guided Installation</strong><small>We help you step by step</small></div></div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== WHY SWITCH ===================== -->
  <section class="section-pad bg-alt" id="why">
    <style>
      #why.bg-alt { background: var(--bg-soft); }
      #why .switch-grid { display:grid; grid-template-columns:1fr 1fr; gap:24px; max-width:920px; margin:0 auto; }
      #why .switch-card { background:#fff; border:1px solid var(--line); border-radius:var(--radius); padding:36px 34px; }
      #why .switch-card.after { border-color:rgba(37,99,235,0.4);
        box-shadow:0 20px 50px rgba(37,99,235,0.15);
        background:linear-gradient(180deg, rgba(37,99,235,0.06), #fff); }
      #why .switch-card .sw-head h3 { color:var(--ink); }
      @media (max-width:768px){
        #why .switch-grid { grid-template-columns:1fr; }
        #why .switch-card { padding:28px 22px; }
      }
    </style>

    <div class="container">
      <div class="section-head reveal">
        <span class="eyebrow">The difference</span>
        <h2>Stop Paying For <span class="accent">IPTV</span> That Doesn't Work</h2>
        <p>Leave buffering, outages and disappearing sellers behind.</p>
      </div>
      <div class="switch-grid">
        <div class="switch-card before reveal">
          <div class="sw-head"><span class="tag">Before</span><h3>Other IPTV services</h3></div>
          <ul class="switch-list">
            <li><span class="si"><i class="fa-solid fa-xmark"></i></span> Missed goals because of buffering</li>
            <li><span class="si"><i class="fa-solid fa-xmark"></i></span> Support never replies</li>
            <li><span class="si"><i class="fa-solid fa-xmark"></i></span> Constant channel outages</li>
            <li><span class="si"><i class="fa-solid fa-xmark"></i></span> Complicated setup process</li>
            <li><span class="si"><i class="fa-solid fa-xmark"></i></span> Wasted money on bad IPTV</li>
          </ul>
        </div>
        <div class="switch-card after reveal">
          <div class="sw-head"><span class="tag">After</span><h3>IPTV Trusted</h3></div>
          <ul class="switch-list">
            <li><span class="si"><i class="fa-solid fa-check"></i></span> Smooth streaming on match day</li>
            <li><span class="si"><i class="fa-solid fa-check"></i></span> Real humans on WhatsApp</li>
            <li><span class="si"><i class="fa-solid fa-check"></i></span> Reliable channels every week</li>
            <li><span class="si"><i class="fa-solid fa-check"></i></span> Setup done in minutes</li>
            <li><span class="si"><i class="fa-solid fa-check"></i></span> Service you can trust</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== PRICING ===================== -->
  <section class="section-pad pricing" id="pricing">
    <div class="container">
      <div class="section-head reveal">
        <span class="eyebrow">Pricing</span>
        <h2>Choose <span class="accent">Your</span> Plan</h2>
        <p>Simple plans. No hidden fees. Cancel anytime.</p>
      </div>

      <?php
      // Same feature set shown on every plan — defined once to avoid copy-paste drift between cards.
      $plan_features = [
        'Login Details Delivered Fast',
        'Support That Actually Replies',
        'Sports, Movies &amp; Live TV',
        'Full HD / 4K Quality',
        'Fast Setup &amp; Activation',
        'Secure Payment Process',
        'Stable Streaming During Peak Hours',
        'Works On Firestick, Smart TV &amp; Mobile',
        'No Hidden Fees',
        'Best Long-Term Value',
      ];
      $render_features = function( $features ) {
        foreach ( $features as $f ) {
          echo '<li><span class="fc"><i class="fa-solid fa-check"></i></span> ' . $f . '</li>' . "\n            ";
        }
      };
      ?>

      <div class="pricing-grid">
        <div class="price-card reveal">
          <h3>Starter</h3>
          <div class="price"><span class="amount">£14.99</span><span class="period">/ month</span></div>
          <span class="price-best">Best for casual viewing</span>
          <ul class="feature-list">
            <?php $render_features( $plan_features ); ?>
          </ul>
          <a href="<?php echo iptv_wa_link( $wa_base, "I'm interested in the Starter plan" ); ?>" target="_blank" rel="noopener" class="btn btn-light btn-block"><i class="fa-brands fa-whatsapp"></i> Message On WhatsApp</a>
        </div>

        <div class="price-card featured reveal">
          <span class="price-badge">Most Popular</span>
          <h3>Premium</h3>
          <div class="price"><span class="amount">£29.99</span><span class="period">/ 3 months</span></div>
          <span class="price-best">Best for football, boxing &amp; UFC fans</span>
          <ul class="feature-list">
            <?php $render_features( $plan_features ); ?>
          </ul>
          <a href="<?php echo iptv_wa_link( $wa_base, "I'm interested in the Premium plan" ); ?>" target="_blank" rel="noopener" class="btn btn-blue btn-block"><i class="fa-brands fa-whatsapp"></i> Message On WhatsApp</a>
        </div>

        <div class="price-card reveal">
          <span class="price-badge">Best Value</span>
          <h3>Family</h3>
          <div class="price"><span class="amount">£59.99</span><span class="period">/ 12 months</span></div>
          <span class="price-best">Best for homes with multiple devices</span>
          <ul class="feature-list">
            <?php $render_features( $plan_features ); ?>
          </ul>
          <a href="<?php echo iptv_wa_link( $wa_base, "I'm interested in the Family plan" ); ?>" target="_blank" rel="noopener" class="btn btn-light btn-block"><i class="fa-brands fa-whatsapp"></i> Message On WhatsApp</a>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== CONTENT SHOWCASE ===================== -->
  <section class="section-pad bg-alt" id="showcase">
    <style>
      #showcase.bg-alt { background: var(--bg-soft); }
      #showcase .showcase-grid { display:grid; grid-template-columns:repeat(6,1fr); gap:16px; }
      #showcase .show-card img { width:100%; height:100%; object-fit:cover; display:block; }
      @media (max-width:980px){ #showcase .showcase-grid { grid-template-columns:repeat(3,1fr); } }
      @media (max-width:600px){ #showcase .showcase-grid { grid-template-columns:repeat(2,1fr); gap:12px; } }
    </style>

    <div class="container">
      <div class="section-head reveal">
        <span class="eyebrow">All in one</span>
        <h2>Everything You Love.<br>In One Place.</h2>
        <p>Sports, movies, series and family entertainment in one simple service.</p>
      </div>
      <div class="showcase-grid">
        <div class="show-card reveal"><span class="sc-bg pi a"><img src="<?php echo iptv_media( 'iptv_poster_sports', 'https://img.magnific.com/vecteurs-libre/concept-equipement-sport_1284-13034.jpg?semt=ais_hybrid&w=740&q=80' ); ?>" alt="" loading="lazy"></span><h4>Sports</h4></div>
        <div class="show-card reveal"><span class="sc-bg pi d"><img src="<?php echo iptv_media( 'iptv_poster_movies', 'https://metrofilms.com/media/120x160+LFDM+Salles+07_11.61fd378d-a704-445a-87ba-03d685c52740.jpg' ); ?>" alt="" loading="lazy"></span><h4>Movies</h4></div>
        <!-- These default to /images/*.jpg inside the theme, but can be replaced from
             Appearance → Customize → "IPTV Trusted — Media" → Categories — Posters. -->
        <div class="show-card reveal"><span class="sc-bg pi e"><img src="<?php echo iptv_media( 'iptv_poster_series', get_template_directory_uri() . '/images/series.jpg' ); ?>" alt="" loading="lazy"></span><h4>Series</h4></div>
        <div class="show-card reveal"><span class="sc-bg pi f"><img src="<?php echo iptv_media( 'iptv_poster_kids', get_template_directory_uri() . '/images/kids.jpg' ); ?>" alt="" loading="lazy"></span><h4>Kids</h4></div>
        <div class="show-card reveal"><span class="sc-bg pi b"><img src="<?php echo iptv_media( 'iptv_poster_entertainment', get_template_directory_uri() . '/images/entertainment.jpg' ); ?>" alt="" loading="lazy"></span><h4>Entertainment</h4></div>
        <div class="show-card reveal"><span class="sc-bg pi g"><img src="<?php echo iptv_media( 'iptv_poster_documentaries', get_template_directory_uri() . '/images/documentaries.jpg' ); ?>" alt="" loading="lazy"></span><h4>Documentaries</h4></div>
      </div>
    </div>
  </section>

  <!-- ===================== EVERYTHING YOU GET + STATS ===================== -->
  <section class="section-pad" id="channels" style="padding-top:0;">
    <style>
      .stats-grid { display:grid; grid-template-columns:repeat(4,1fr); gap:20px; }
      .stat-box { background:#fff; border:1px solid var(--line); border-radius:var(--radius); padding:32px 24px; text-align:center; box-shadow:var(--shadow-xs); transition:transform .35s var(--ease), box-shadow .35s var(--ease); }
      .stat-box:hover { transform:translateY(-6px); box-shadow:var(--shadow); }
      .stat-box .st-ic { width:56px; height:56px; margin:0 auto 16px; border-radius:16px; display:grid; place-items:center; font-size:1.5rem; color:#fff; background:linear-gradient(135deg, var(--blue), var(--indigo)); box-shadow:0 10px 22px rgba(29,78,216,0.35); }
      .stat-box .st-num { font-size:2.6rem; font-weight:800; letter-spacing:-0.04em; color:var(--ink); line-height:1; }
      .stat-box .st-num .plus { color:var(--blue); }
      .stat-box .st-label { margin-top:8px; font-size:0.95rem; font-weight:600; color:var(--muted); }
      .stats-extra { display:grid; grid-template-columns:repeat(3,1fr); gap:16px; margin-top:20px; }
      .stats-extra .se { display:flex; align-items:center; gap:12px; background:#fff; border:1px solid var(--line); border-radius:var(--radius-sm); padding:16px 18px; box-shadow:var(--shadow-xs); }
      .stats-extra .se .se-ic { width:42px; height:42px; flex-shrink:0; border-radius:11px; display:grid; place-items:center; font-size:1.1rem; color:var(--blue); background:var(--blue-soft); }
      .stats-extra .se b { display:block; font-size:0.98rem; font-weight:700; color:var(--ink); }
      .stats-extra .se small { color:var(--muted); font-size:0.84rem; }
      @media (max-width:900px){ .stats-grid { grid-template-columns:repeat(2,1fr); gap:16px; } .stats-extra { grid-template-columns:1fr; } }
      @media (max-width:420px){ .stats-grid { grid-template-columns:1fr; } }
    </style>

    <div class="container">
      <div class="section-head reveal">
        <span class="eyebrow">Everything you get</span>
        <h2>One Subscription. <span class="accent">Endless</span> Content.</h2>
        <p>A complete entertainment library, ready on day one.</p>
      </div>

      <div class="stats-grid">
        <div class="stat-box reveal">
          <div class="st-ic"><i class="fa-solid fa-tower-broadcast"></i></div>
          <div class="st-num"><span class="count" data-count="20000">20,000</span><span class="plus">+</span></div>
          <div class="st-label">Live Channels</div>
        </div>
        <div class="stat-box reveal">
          <div class="st-ic"><i class="fa-solid fa-film"></i></div>
          <div class="st-num"><span class="count" data-count="60000">60,000</span><span class="plus">+</span></div>
          <div class="st-label">Movies</div>
        </div>
        <div class="stat-box reveal">
          <div class="st-ic"><i class="fa-solid fa-clapperboard"></i></div>
          <div class="st-num"><span class="count" data-count="20000">20,000</span><span class="plus">+</span></div>
          <div class="st-label">Series</div>
        </div>
        <div class="stat-box reveal">
          <div class="st-ic"><i class="fa-solid fa-laptop-mobile"></i></div>
          <div class="st-num"><span class="count" data-count="15">15</span><span class="plus">+</span></div>
          <div class="st-label">Supported Devices</div>
        </div>
      </div>

      <div class="stats-extra">
        <div class="se reveal"><span class="se-ic"><i class="fa-solid fa-gem"></i></span><div><b>HD · 4K</b><small>Real high-definition</small></div></div>
        <div class="se reveal"><span class="se-ic"><i class="fa-solid fa-calendar-days"></i></span><div><b>7-Day TV Guide</b><small>Full EPG program guide</small></div></div>
        <div class="se reveal"><span class="se-ic"><i class="fa-solid fa-rotate"></i></span><div><b>Always Fresh</b><small>Regular content updates</small></div></div>
      </div>
    </div>

    <script>
      (function(){
        var counted = false;
        function animateCounts(){
          if (counted) return; counted = true;
          document.querySelectorAll('#channels .count').forEach(function(el){
            var target = +el.getAttribute('data-count'), cur = 0,
                step = Math.max(1, Math.ceil(target/60));
            var t = setInterval(function(){
              cur += step;
              if (cur >= target){ cur = target; clearInterval(t); }
              el.textContent = cur.toLocaleString('en-US');
            }, 25);
          });
        }
        var sec = document.getElementById('channels');
        if ('IntersectionObserver' in window && sec){
          new IntersectionObserver(function(entries, obs){
            entries.forEach(function(e){ if (e.isIntersecting){ animateCounts(); obs.disconnect(); } });
          }, { threshold:0.25 }).observe(sec);
        } else { animateCounts(); }
      })();
    </script>
  </section>

  <!-- ===================== NETWORK / SERVER STATUS ===================== -->
  <section class="section-pad" id="status" style="padding-top:0;">
    <style>
      .status-wrap { max-width:720px; margin:0 auto; }
      .status-panel { background:#fff; border:1px solid var(--line); border-radius:var(--radius); box-shadow:var(--shadow-sm); overflow:hidden; }
      .status-top { display:flex; align-items:center; gap:12px; padding:18px 24px; background:linear-gradient(135deg, rgba(22,163,74,0.08), rgba(22,163,74,0.02)); border-bottom:1px solid var(--line); }
      .status-top .pulse { width:11px; height:11px; border-radius:50%; background:#16a34a; box-shadow:0 0 0 0 rgba(22,163,74,0.5); animation:statusPulse 2s infinite; flex-shrink:0; }
      .status-top b { font-size:1rem; font-weight:700; color:var(--ink); }
      .status-top .when { margin-left:auto; font-size:0.8rem; color:var(--muted); }
      @keyframes statusPulse { 0%{ box-shadow:0 0 0 0 rgba(22,163,74,0.45);} 70%{ box-shadow:0 0 0 10px rgba(22,163,74,0);} 100%{ box-shadow:0 0 0 0 rgba(22,163,74,0);} }
      .status-row { display:flex; align-items:center; gap:14px; padding:17px 24px; border-bottom:1px solid var(--line); }
      .status-row:last-child { border-bottom:none; }
      .status-row .ic { width:40px; height:40px; flex-shrink:0; border-radius:11px; display:grid; place-items:center; font-size:1rem; color:var(--blue); background:var(--blue-soft); }
      .status-row .name { font-weight:600; color:var(--ink); font-size:0.98rem; }
      .status-row .name small { display:block; font-weight:400; color:var(--muted); font-size:0.8rem; }
      .status-row .state { margin-left:auto; display:flex; align-items:center; gap:8px; font-size:0.85rem; font-weight:600; color:#16a34a; }
      .status-row .state .dot { width:8px; height:8px; border-radius:50%; background:#16a34a; }
      .status-row .uptime { font-size:0.8rem; color:var(--muted); font-weight:500; min-width:54px; text-align:right; }
      @media (max-width:520px){ .status-row .uptime { display:none; } .status-top .when { display:none; } }
    </style>

    <div class="container">
      <div class="section-head reveal">
        <span class="eyebrow">System status</span>
        <h2>All Systems <span class="accent">Operational</span></h2>
        <p>Our network is monitored around the clock to keep your streams stable on match day.</p>
      </div>

      <div class="status-wrap reveal">
        <div class="status-panel">
          <div class="status-top">
            <span class="pulse"></span>
            <b>All systems operational</b>
            <span class="when">Updated just now</span>
          </div>

          <div class="status-row">
            <span class="ic"><i class="fa-solid fa-tower-broadcast"></i></span>
            <span class="name">Live TV <small>20,000+ live channels</small></span>
            <span class="uptime">99.9%</span>
            <span class="state"><span class="dot"></span> Operational</span>
          </div>
          <div class="status-row">
            <span class="ic"><i class="fa-solid fa-futbol"></i></span>
            <span class="name">Sports <small>Premier League · UFC · Boxing</small></span>
            <span class="uptime">99.9%</span>
            <span class="state"><span class="dot"></span> Operational</span>
          </div>
          <div class="status-row">
            <span class="ic"><i class="fa-solid fa-clapperboard"></i></span>
            <span class="name">VOD <small>80,000+ movies &amp; series</small></span>
            <span class="uptime">99.8%</span>
            <span class="state"><span class="dot"></span> Operational</span>
          </div>
          <div class="status-row">
            <span class="ic"><i class="fa-brands fa-whatsapp"></i></span>
            <span class="name">Support <small>WhatsApp 24/7</small></span>
            <span class="uptime">Online</span>
            <span class="state"><span class="dot"></span> Operational</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== DEVICE COMPATIBILITY ===================== -->
  <section class="section-pad" id="devices" style="padding-top:0;">
    <div class="container">
      <div class="section-head reveal">
        <span class="eyebrow">Compatibility</span>
        <h2>Works On All Your <span class="accent">Favourite</span> Devices</h2>
        <p>Easy setup for the devices UK customers use most.</p>
      </div>
      <div class="devices-grid">
        <div class="device-card reveal"><div class="dv-ic"><i class="fa-brands fa-amazon"></i></div><b>Firestick</b></div>
        <div class="device-card reveal"><div class="dv-ic"><i class="fa-solid fa-tv"></i></div><b>Samsung Smart TV</b></div>
        <div class="device-card reveal"><div class="dv-ic"><i class="fa-solid fa-tv"></i></div><b>LG Smart TV</b></div>
        <div class="device-card reveal"><div class="dv-ic"><i class="fa-brands fa-android"></i></div><b>Android TV</b></div>
        <div class="device-card reveal"><div class="dv-ic"><i class="fa-brands fa-apple"></i></div><b>iPhone / iPad</b></div>
        <div class="device-card reveal"><div class="dv-ic"><i class="fa-solid fa-mobile-screen"></i></div><b>Android Phone</b></div>
        <div class="device-card reveal"><div class="dv-ic"><i class="fa-brands fa-windows"></i></div><b>Windows</b></div>
        <div class="device-card reveal"><div class="dv-ic"><i class="fa-brands fa-apple"></i></div><b>Mac</b></div>
        <div class="device-card reveal"><div class="dv-ic"><i class="fa-solid fa-box"></i></div><b>MAG Box</b></div>
        <div class="device-card reveal"><div class="dv-ic"><i class="fa-solid fa-play"></i></div><b>IPTV Smarters</b></div>
        <div class="device-card reveal"><div class="dv-ic"><i class="fa-solid fa-clapperboard"></i></div><b>TiviMate</b></div>
        <div class="device-card reveal"><div class="dv-ic"><i class="fa-solid fa-circle-nodes"></i></div><b>And More</b></div>
      </div>
    </div>
  </section>

  <!-- ===================== REVIEW WALL ===================== -->
  <section class="section-pad" id="reviews" style="padding-top:0;">
    <style>
      @media (max-width: 768px){
        .hero { padding: 110px 0 30px; }
        .hero-visual { display: none; }
        .trustbar .trustbar-grid { padding: 22px 0; }
        .logos-strip { margin-top: 32px; padding-top: 24px; }
      }
      .wall-card .who { display:flex; align-items:center; gap:10px; margin-top:4px; }
      .wall-card .who img { width:40px; height:40px; border-radius:50%; object-fit:cover; flex:0 0 40px; }
      .wall-card .who .wn { display:flex; flex-direction:column; line-height:1.25; }
      .wall-card .who .wn b { color:var(--ink); font-weight:600; font-size:0.88rem; }
      .wall-card .who .wn small { font-size:0.76rem; color:var(--muted); }
      .wall-card .wv { margin-left:auto; display:inline-flex; align-items:center; gap:5px;
        font-size:0.68rem; font-weight:700; color:#16a34a; background:rgba(22,163,74,0.12);
        padding:4px 9px; border-radius:99px; white-space:nowrap; }
      .wall-card .wv i { font-size:0.74rem; }
      .wall-card p.clamped { display:-webkit-box; -webkit-line-clamp:4; -webkit-box-orient:vertical; overflow:hidden; }
      .wall-card .read-more { background:none; border:none; color:var(--blue); font-weight:600; font-size:0.82rem;
        cursor:pointer; padding:0; margin:2px 0 10px; font-family:inherit; }
      .wall-card .read-more:hover { text-decoration:underline; }
    </style>

    <div class="container">
      <div class="section-head reveal">
        <span class="eyebrow">Reviews</span>
        <h2>Why UK Viewers <span class="accent">Trust Us</span></h2>
        <p>Rated by happy customers across the UK.</p>
      </div>

      <!--
        "Read more / Read less" for these cards is handled once, globally, by footer.php
        (selector: .wall-card p). The two duplicate inline scripts that used to live here
        — including one that existed only to clean up buttons created by the first —
        have been removed since they did the same job twice and fought each other.
      -->
      <div class="wall-grid">
        <div class="wall-card reveal"><div class="stars">★★★★★</div><p>"I got scammed twice before finding this. Paid and actually received my login details within 10 minutes."</p><div class="who"><img src="<?php echo iptv_media( 'iptv_review_avatar_1', 'https://randomuser.me/api/portraits/men/1.jpg' ); ?>" alt="" loading="lazy"><span class="wn"><b>James</b><small>Manchester</small></span><span class="wv"><i class="fa-solid fa-circle-check"></i> Verified</span></div></div>
        <div class="wall-card reveal"><div class="stars">★★★★★</div><p>"The real test was Premier League weekend. No freezing when the match started."</p><div class="who"><img src="<?php echo iptv_media( 'iptv_review_avatar_2', 'https://randomuser.me/api/portraits/men/11.jpg' ); ?>" alt="" loading="lazy"><span class="wn"><b>Liam</b><small>London</small></span><span class="wv"><i class="fa-solid fa-circle-check"></i> Verified</span></div></div>
        <div class="wall-card reveal"><div class="stars">★★★★★</div><p>"My last provider disappeared after payment. Been using this for 4 months and support still replies every time."</p><div class="who"><img src="<?php echo iptv_media( 'iptv_review_avatar_3', 'https://randomuser.me/api/portraits/men/32.jpg' ); ?>" alt="" loading="lazy"><span class="wn"><b>Daniel</b><small>Birmingham</small></span><span class="wv"><i class="fa-solid fa-circle-check"></i> Verified</span></div></div>
        <div class="wall-card reveal"><div class="stars">★★★★★</div><p>"Finally an IPTV where WhatsApp support doesn't disappear after you pay."</p><div class="who"><img src="<?php echo iptv_media( 'iptv_review_avatar_4', 'https://randomuser.me/api/portraits/men/45.jpg' ); ?>" alt="" loading="lazy"><span class="wn"><b>Mark</b><small>Leeds</small></span><span class="wv"><i class="fa-solid fa-circle-check"></i> Verified</span></div></div>
        <div class="wall-card reveal"><div class="stars">★★★★★</div><p>"Setup took less than 5 minutes on my Firestick. Easier than I expected."</p><div class="who"><img src="<?php echo iptv_media( 'iptv_review_avatar_5', 'https://randomuser.me/api/portraits/men/51.jpg' ); ?>" alt="" loading="lazy"><span class="wn"><b>Ryan</b><small>Liverpool</small></span><span class="wv"><i class="fa-solid fa-circle-check"></i> Verified</span></div></div>
        <div class="wall-card reveal"><div class="stars">★★★★★</div><p>"I was worried about paying online. Ordered, got my login, and was watching football the same evening."</p><div class="who"><img src="<?php echo iptv_media( 'iptv_review_avatar_6', 'https://randomuser.me/api/portraits/men/63.jpg' ); ?>" alt="" loading="lazy"><span class="wn"><b>Adam</b><small>Glasgow</small></span><span class="wv"><i class="fa-solid fa-circle-check"></i> Verified</span></div></div>
        <div class="wall-card reveal"><div class="stars">★★★★★</div><p>"I started with a short plan because I didn't trust anyone anymore. Everything worked exactly as promised."</p><div class="who"><img src="<?php echo iptv_media( 'iptv_review_avatar_7', 'https://randomuser.me/api/portraits/men/72.jpg' ); ?>" alt="" loading="lazy"><span class="wn"><b>Tom</b><small>Bristol</small></span><span class="wv"><i class="fa-solid fa-circle-check"></i> Verified</span></div></div>
        <div class="wall-card reveal"><div class="stars">★★★★★</div><p>"Most IPTV sellers promise 80,000 channels and 4K. I just wanted something that worked on match day."</p><div class="who"><img src="<?php echo iptv_media( 'iptv_review_avatar_8', 'https://randomuser.me/api/portraits/men/85.jpg' ); ?>" alt="" loading="lazy"><span class="wn"><b>Chris</b><small>Sheffield</small></span><span class="wv"><i class="fa-solid fa-circle-check"></i> Verified</span></div></div>
        <div class="wall-card reveal"><div class="stars">★★★★★</div><p>"No endless buffering during boxing night. That's honestly all I care about."</p><div class="who"><img src="<?php echo iptv_media( 'iptv_review_avatar_9', 'https://randomuser.me/api/portraits/men/91.jpg' ); ?>" alt="" loading="lazy"><span class="wn"><b>Ben</b><small>Newcastle</small></span><span class="wv"><i class="fa-solid fa-circle-check"></i> Verified</span></div></div>
        <div class="wall-card reveal"><div class="stars">★★★★★</div><p>"What impressed me most wasn't the channels. It was getting a real reply on WhatsApp when I needed help."</p><div class="who"><img src="<?php echo iptv_media( 'iptv_review_avatar_10', 'https://randomuser.me/api/portraits/men/15.jpg' ); ?>" alt="" loading="lazy"><span class="wn"><b>Jack</b><small>Nottingham</small></span><span class="wv"><i class="fa-solid fa-circle-check"></i> Verified</span></div></div>
        <div class="wall-card reveal"><div class="stars">★★★★★</div><p>"After wasting money on providers that stopped working after a few weeks, I finally found one that stays reliable during the big games."</p><div class="who"><img src="<?php echo iptv_media( 'iptv_review_avatar_11', 'https://randomuser.me/api/portraits/men/22.jpg' ); ?>" alt="" loading="lazy"><span class="wn"><b>Oliver</b><small>Cardiff</small></span><span class="wv"><i class="fa-solid fa-circle-check"></i> Verified</span></div></div>
        <div class="wall-card reveal"><div class="stars">★★★★★</div><p>"The biggest difference is trust. They answer questions before and after payment."</p><div class="who"><img src="<?php echo iptv_media( 'iptv_review_avatar_12', 'https://randomuser.me/api/portraits/men/38.jpg' ); ?>" alt="" loading="lazy"><span class="wn"><b>Harry</b><small>Leicester</small></span><span class="wv"><i class="fa-solid fa-circle-check"></i> Verified</span></div></div>
      </div>
    </div>
  </section>

  <!-- ===================== WHATSAPP PROOF ===================== -->
  <section class="section-pad" style="padding-top:0;">
    <div class="container">
      <div class="section-head reveal">
        <span class="eyebrow">Support</span>
        <h2>Support That <span class="accent">Actually Replies.</span></h2>
        <p>Most IPTV providers disappear after payment. We stay available when you need help.</p>
      </div>
      <div class="waproof-grid">
        <div class="reveal">
          <ul class="wa-points">
            <li><span class="wp-ic"><i class="fa-solid fa-bolt"></i></span> Fast setup help</li>
            <li><span class="wp-ic"><i class="fa-solid fa-user-check"></i></span> Real human support</li>
            <li><span class="wp-ic"><i class="fa-solid fa-tv"></i></span> Clear instructions for Firestick and Smart TV</li>
            <li><span class="wp-ic"><i class="fa-solid fa-headset"></i></span> Help after purchase</li>
          </ul>
          <a href="<?php echo iptv_wa_link( $wa_base ); ?>" target="_blank" rel="noopener" class="btn btn-blue btn-lg" style="margin-top:26px;"><i class="fa-brands fa-whatsapp"></i> Message Us On WhatsApp</a>
        </div>
        <div class="reveal">
          <div style="max-width:340px; margin:0 auto; border-radius:30px; overflow:hidden; box-shadow:var(--shadow-lg); border:1px solid var(--line); background:#0b1120;">
            <img src="<?php echo iptv_media( 'iptv_wa_support', 'https://appollo-tv.com/wp-content/uploads/2024/01/testimoni3.jpg' ); ?>" alt="WhatsApp support chat" style="width:100%; height:auto; display:block;" loading="lazy">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== WHATSAPP SCREENSHOTS MARQUEE ===================== -->
  <section class="section-pad" style="padding-top:0;">
    <div class="container">
      <div class="section-head reveal">
        <span class="eyebrow">Real chats</span>
        <h2>Real Messages From <span class="accent">Real Customers</span></h2>
        <p>Genuine WhatsApp conversations from people we've helped.</p>
      </div>
    </div>

    <style>
      .wa-marquee { width:100%; overflow:hidden; padding:8px 0;
        -webkit-mask-image:linear-gradient(90deg, transparent, #000 6%, #000 94%, transparent);
        mask-image:linear-gradient(90deg, transparent, #000 6%, #000 94%, transparent); }
      .wa-track { display:flex; gap:22px; width:max-content; animation: wa-scroll 48s linear infinite; }
      .wa-marquee:hover .wa-track { animation-play-state: paused; }
      .wa-shot { flex:0 0 auto; width:264px; aspect-ratio:9/15; border-radius:26px; overflow:hidden;
        border:1px solid var(--line); box-shadow: var(--shadow); background:#ECE5DD; }
      .wa-shot img { width:100%; height:100%; object-fit:cover; display:block; }
      @keyframes wa-scroll { from { transform: translateX(0); } to { transform: translateX(-50%); } }
    </style>

    <div class="wa-marquee">
      <div class="wa-track" id="waTrack">
        <div class="wa-shot"><img src="<?php echo iptv_media( 'iptv_wa_chat_1', 'https://roomipty.com/wp-content/uploads/2025/08/testimoni4-min.jpg.webp' ); ?>" alt="WhatsApp chat" loading="lazy"></div>
        <div class="wa-shot"><img src="<?php echo iptv_media( 'iptv_wa_chat_2', 'https://roomipty.com/wp-content/uploads/2025/08/testimoni3-min.jpg.webp' ); ?>" alt="WhatsApp chat" loading="lazy"></div>
        <div class="wa-shot"><img src="<?php echo iptv_media( 'iptv_wa_chat_3', 'https://roomipty.com/wp-content/uploads/2025/08/testimoni2-min.jpg.webp' ); ?>" alt="WhatsApp chat" loading="lazy"></div>
        <div class="wa-shot"><img src="<?php echo iptv_media( 'iptv_wa_chat_4', 'https://roomipty.com/wp-content/uploads/2025/08/testimoni1-min.jpg.webp' ); ?>" alt="WhatsApp chat" loading="lazy"></div>
        <div class="wa-shot"><img src="<?php echo iptv_media( 'iptv_wa_chat_5', 'https://appollo-tv.com/wp-content/uploads/2024/01/testimoni3.jpg' ); ?>" alt="WhatsApp chat" loading="lazy"></div>
        <div class="wa-shot"><img src="<?php echo iptv_media( 'iptv_wa_chat_6', 'https://appollo-tv.com/wp-content/uploads/2024/01/testimoni6.jpg' ); ?>" alt="WhatsApp chat" loading="lazy"></div>
        <div class="wa-shot"><img src="<?php echo iptv_media( 'iptv_wa_chat_7', 'https://roomipty.com/wp-content/uploads/2025/08/testimoni3-min.jpg.webp' ); ?>" alt="WhatsApp chat" loading="lazy"></div>
        <div class="wa-shot"><img src="<?php echo iptv_media( 'iptv_wa_chat_8', 'https://appollo-tv.com/wp-content/uploads/2024/01/testimoni5.jpg' ); ?>" alt="WhatsApp chat" loading="lazy"></div>
      </div>
    </div>

    <script>
      // Duplicates the slide set so the marquee loop is seamless.
      (function(){
        var track = document.getElementById('waTrack');
        if (track){ track.innerHTML += track.innerHTML; }
      })();
    </script>
  </section>

  <!-- ===================== GUARANTEE ===================== -->
  <section class="guarantee">
    <div class="container">
      <div class="guarantee-banner reveal">
        <div class="g-head">
          <div class="g-icon"><i class="fa-solid fa-shield-halved"></i></div>
          <div>
            <h2>Our <span class="accent">Service</span> Promise</h2>
            <p>If you have trouble activating your service or setting up your device, our support team will help you until everything is working properly.</p>
          </div>
        </div>
        <ul class="guarantee-points">
          <li><span class="gp-ic"><i class="fa-solid fa-screwdriver-wrench"></i></span> Setup Help Included</li>
          <li><span class="gp-ic"><i class="fa-solid fa-tag"></i></span> Transparent Pricing</li>
          <li><span class="gp-ic"><i class="fa-solid fa-eye-slash"></i></span> No Hidden Fees</li>
          <li><span class="gp-ic"><i class="fa-brands fa-whatsapp"></i></span> Real WhatsApp Support</li>
          <li><span class="gp-ic"><i class="fa-solid fa-users-gear"></i></span> Active Service Team</li>
        </ul>
      </div>
    </div>
  </section>

  <!-- ===================== HOW IT WORKS ===================== -->
  <section class="section-pad" id="how" style="padding-top:0;">
    <div class="container">
      <div class="section-head reveal">
        <span class="eyebrow">How it works</span>
        <h2>Up And Running In <span class="accent">Minutes</span></h2>
        <p>Four simple steps from sign-up to watching.</p>
      </div>
      <div class="steps-grid">
        <div class="step-card reveal"><div class="step-num">1</div><h4>Choose Your Plan</h4><p>Select the plan that suits you.</p></div>
        <div class="step-card reveal"><div class="step-num">2</div><h4>Receive Login Details</h4><p>We send your login instantly.</p></div>
        <div class="step-card reveal"><div class="step-num">3</div><h4>Open Your App</h4><p>Use your favorite IPTV app.</p></div>
        <div class="step-card reveal"><div class="step-num">4</div><h4>Start Watching</h4><p>Enjoy content in the best quality.</p></div>
      </div>
    </div>
  </section>

  <!-- ===================== FAQ ===================== -->
  <section class="section-pad faq" id="faq">
    <div class="container">
      <div class="section-head reveal">
        <span class="eyebrow">FAQ</span>
        <h2>Questions, <span class="accent">Answered</span></h2>
        <p>Everything you need to know before getting started.</p>
      </div>
      <div class="faq-cols">
        <div class="faq-col">
          <div class="faq-item reveal"><button class="faq-q">Will it freeze during Premier League or Champions League matches? <i class="fa-solid fa-chevron-down"></i></button><div class="faq-a"><p>No streaming service can honestly guarantee zero buffering 100% of the time, but our service is optimized for peak viewing hours and major live events.</p></div></div>
          <div class="faq-item reveal"><button class="faq-q">What if I need help setting it up?<i class="fa-solid fa-chevron-down"></i></button><div class="faq-a"><p>You'll receive simple setup instructions, and our WhatsApp support team is available to help you get started.</p></div></div>
          <div class="faq-item reveal"><button class="faq-q">Do I need any technical knowledge? <i class="fa-solid fa-chevron-down"></i></button><div class="faq-a"><p>Not at all. Most customers are up and running in just a few minutes using our step-by-step guides.</p></div></div>
          <div class="faq-item reveal"><button class="faq-q">Is this compatible with my device?<i class="fa-solid fa-chevron-down"></i></button><div class="faq-a"><p>Yes. It works on Firestick, Android TV, Smart TVs, Android phones, iPhone, tablets and many other popular devices.</p></div></div>
        </div>
        <div class="faq-col">
          <div class="faq-item reveal"><button class="faq-q">Is payment secure?<i class="fa-solid fa-chevron-down"></i></button><div class="faq-a"><p>Yes. We use secure payment methods and never ask for sensitive information through WhatsApp messages.</p></div></div>
          <div class="faq-item reveal"><button class="faq-q">What happens if my service stops working?<i class="fa-solid fa-chevron-down"></i></button><div class="faq-a"><p>Contact our support team and we'll help resolve the issue as quickly as possible.</p></div></div>
          <div class="faq-item reveal"><button class="faq-q">Why are your prices higher than some IPTV sellers? <i class="fa-solid fa-chevron-down"></i></button><div class="faq-a"><p>Many ultra-cheap providers disappear after payment, offer poor support or struggle during major events. We focus on reliability, support and customer experience.</p></div></div>
          <div class="faq-item reveal"><button class="faq-q">Can I try the service before committing long term? <i class="fa-solid fa-chevron-down"></i></button><div class="faq-a"><p>We recommend starting with a shorter plan first. Upgrade anytime if you're happy with the service.</p></div></div>
          <div class="faq-item reveal"><button class="faq-q">Why do people switch to your service? <i class="fa-solid fa-chevron-down"></i></button><div class="faq-a"><p>Most customers come to us after experiencing buffering, unreliable providers, missing login details or support that stopped responding.</p></div></div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== INSTALLATION TUTORIALS ===================== -->
  <section class="section-pad" id="tutorials" style="padding-top:0;">
    <style>
      .tut-acc { max-width:760px; margin:0 auto; display:flex; flex-direction:column; gap:14px; }
      .tut-item { background:#fff; border:1px solid var(--line); border-radius:var(--radius-sm); overflow:hidden; transition:box-shadow .25s, border-color .25s; }
      .tut-item.open { box-shadow:var(--shadow-sm); border-color:#cfd9f5; }
      .tut-head { width:100%; display:flex; align-items:center; gap:14px; padding:18px 20px; background:none; border:none; cursor:pointer; font-family:inherit; text-align:left; }
      .tut-head .ic { width:42px; height:42px; flex-shrink:0; border-radius:11px; display:grid; place-items:center; font-size:1.1rem; color:var(--blue); background:var(--blue-soft); }
      .tut-head .tt { flex:1; }
      .tut-head .tt b { display:block; font-size:1.02rem; font-weight:700; color:var(--ink); }
      .tut-head .tt small { color:var(--muted); font-size:0.82rem; }
      .tut-head .chev { color:var(--blue); font-size:0.9rem; transition:transform .3s var(--ease); }
      .tut-item.open .chev { transform:rotate(180deg); }
      .tut-body { max-height:0; overflow:hidden; transition:max-height .35s var(--ease); }
      .tut-body-inner { padding:0 20px 20px 76px; }
      .tut-body ol { margin:0; padding-left:18px; color:var(--slate); font-size:0.94rem; line-height:1.7; }
      .tut-body ol li { margin-bottom:7px; }
      .tut-body .wa { display:inline-flex; align-items:center; gap:8px; margin-top:14px; padding:11px 18px; border-radius:10px; background:#25d366; color:#fff; font-weight:600; font-size:0.88rem; }
      @media (max-width:560px){ .tut-body-inner { padding:0 20px 20px 20px; } }
    </style>

    <div class="container">
      <div class="section-head reveal">
        <span class="eyebrow">Setup guides</span>
        <h2>Installation <span class="accent">Tutorials</span></h2>
        <p>Click your app to see the setup steps. Need help? We're on WhatsApp.</p>
      </div>

      <div class="tut-acc reveal">

        <div class="tut-item">
          <button class="tut-head" type="button">
            <span class="ic"><i class="fa-solid fa-play"></i></span>
            <span class="tt"><b>IBO Player Pro</b><small>MAC + Key activation</small></span>
            <i class="fa-solid fa-chevron-down chev"></i>
          </button>
          <div class="tut-body"><div class="tut-body-inner">
            <ol>
              <li>Open <b>IBO Player Pro</b> on your device.</li>
              <li>You'll see your <b>MAC address</b> and <b>Key</b> on screen.</li>
              <li>Send them to us on WhatsApp — we activate your playlist.</li>
              <li>Reopen the app and start watching. ✅</li>
            </ol>
            <a href="<?php echo iptv_wa_link( $wa_base ); ?>" target="_blank" rel="noopener" class="wa"><i class="fa-brands fa-whatsapp"></i> Send MAC &amp; Key</a>
          </div></div>
        </div>

        <div class="tut-item">
          <button class="tut-head" type="button">
            <span class="ic"><i class="fa-solid fa-bolt"></i></span>
            <span class="tt"><b>IPTV Smarters Pro</b><small>Xtream Codes login</small></span>
            <i class="fa-solid fa-chevron-down chev"></i>
          </button>
          <div class="tut-body"><div class="tut-body-inner">
            <ol>
              <li>Open <b>IPTV Smarters Pro</b> and choose <b>Login with Xtream Codes API</b>.</li>
              <li>Enter the <b>Username</b>, <b>Password</b> &amp; <b>Server URL</b> we send you.</li>
              <li>Tap <b>Add User</b> / Login.</li>
              <li>Wait a few seconds and start watching. ✅</li>
            </ol>
            <a href="<?php echo iptv_wa_link( $wa_base ); ?>" target="_blank" rel="noopener" class="wa"><i class="fa-brands fa-whatsapp"></i> Get my login</a>
          </div></div>
        </div>

        <div class="tut-item">
          <button class="tut-head" type="button">
            <span class="ic"><i class="fa-solid fa-tv"></i></span>
            <span class="tt"><b>XCIPTV Player</b><small>Xtream Codes login</small></span>
            <i class="fa-solid fa-chevron-down chev"></i>
          </button>
          <div class="tut-body"><div class="tut-body-inner">
            <ol>
              <li>Open <b>XCIPTV</b> and select <b>Xtream Codes / Stream API</b>.</li>
              <li>Enter the <b>Username</b>, <b>Password</b> &amp; <b>Server URL</b> we provide.</li>
              <li>Save and let it load your channels.</li>
              <li>Enjoy! ✅</li>
            </ol>
            <a href="<?php echo iptv_wa_link( $wa_base ); ?>" target="_blank" rel="noopener" class="wa"><i class="fa-brands fa-whatsapp"></i> Get my login</a>
          </div></div>
        </div>

        <div class="tut-item">
          <button class="tut-head" type="button">
            <span class="ic"><i class="fa-solid fa-circle-nodes"></i></span>
            <span class="tt"><b>Other Player</b><small>Any IPTV app</small></span>
            <i class="fa-solid fa-chevron-down chev"></i>
          </button>
          <div class="tut-body"><div class="tut-body-inner">
            <ol>
              <li>Tell us which app you use on WhatsApp.</li>
              <li>We send you the exact details (M3U link or Xtream login).</li>
              <li>We guide you step by step until it works.</li>
            </ol>
            <a href="<?php echo iptv_wa_link( $wa_base ); ?>" target="_blank" rel="noopener" class="wa"><i class="fa-brands fa-whatsapp"></i> Message us</a>
          </div></div>
        </div>

      </div>
    </div>

    <script>
      document.querySelectorAll('#tutorials .tut-item').forEach(function(item){
        item.querySelector('.tut-head').addEventListener('click', function(){
          var open = item.classList.contains('open');
          document.querySelectorAll('#tutorials .tut-item').forEach(function(o){
            o.classList.remove('open');
            o.querySelector('.tut-body').style.maxHeight = null;
          });
          if (!open){
            item.classList.add('open');
            var body = item.querySelector('.tut-body');
            body.style.maxHeight = body.scrollHeight + 'px';
          }
        });
      });
    </script>
  </section>

  <!-- ===================== FINAL CTA ===================== -->
  <section class="section-pad" id="contact">
    <div class="container">
      <div class="final-banner reveal">
        <h2>Stop Missing Big Matches Because Of Unreliable IPTV.</h2>
        <ul class="final-benefits">
          <li><i class="fa-solid fa-circle-check"></i> Better Match Day Stability</li>
          <li><i class="fa-solid fa-circle-check"></i> Easy Firestick Setup</li>
          <li><i class="fa-solid fa-circle-check"></i> Real WhatsApp Support</li>
          <li><i class="fa-solid fa-circle-check"></i> UK-Friendly Plans</li>
        </ul>
        <a href="<?php echo iptv_wa_link( $wa_base ); ?>" target="_blank" rel="noopener" class="btn btn-blue btn-lg"><i class="fa-brands fa-whatsapp"></i> Message Us On WhatsApp</a>
      </div>
    </div>
  </section>

<?php get_footer(); ?>