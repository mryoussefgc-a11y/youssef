<?php
/**
 * Default Page template.
 * Any Page you create in WordPress (Pages → Add New) will use this and
 * automatically get the same header, footer, fonts, colors and buttons.
 */
get_header(); ?>

<style>
  /* Page title banner + content typography (matches the site style) */
  .page-hero { position:relative; background:var(--navy); color:#fff; padding:150px 0 70px; overflow:hidden; }
  .page-hero::before {
    content:""; position:absolute; inset:-20% -10% auto -10%; height:160%;
    background:
      radial-gradient(50% 50% at 78% 8%, rgba(37,99,235,0.55), transparent 60%),
      radial-gradient(45% 45% at 12% 12%, rgba(79,70,229,0.45), transparent 60%);
    transform:skewY(-7deg); transform-origin:top left; pointer-events:none;
  }
  .page-hero .container { position:relative; z-index:2; }
  .page-hero h1 { font-size:clamp(2rem,5vw,3.2rem); font-weight:800; letter-spacing:-0.035em; line-height:1.05; }
  .page-hero .crumb { color:rgba(255,255,255,0.6); font-size:0.9rem; margin-top:10px; }

  .page-body { padding:70px 0 110px; }
  .page-content { max-width:820px; margin:0 auto; color:var(--slate); font-size:1.05rem; line-height:1.75; }
  .page-content h2 { color:var(--ink); font-size:1.7rem; font-weight:800; letter-spacing:-0.02em; margin:32px 0 12px; }
  .page-content h3 { color:var(--ink); font-size:1.3rem; font-weight:700; margin:26px 0 10px; }
  .page-content p { margin:0 0 18px; }
  .page-content ul, .page-content ol { margin:0 0 18px 22px; }
  .page-content li { margin-bottom:8px; }
  .page-content a { color:var(--blue); font-weight:600; text-decoration:underline; }
  .page-content img { border-radius:var(--radius-sm); margin:18px 0; box-shadow:var(--shadow-sm); }
  .page-content blockquote { border-left:3px solid var(--blue); padding:8px 18px; margin:18px 0; background:var(--bg-soft); border-radius:8px; color:var(--ink-2); }
</style>

<section class="page-hero">
  <div class="container">
    <h1><?php the_title(); ?></h1>
    <div class="crumb"><a href="<?php echo esc_url( home_url('/') ); ?>" style="color:inherit;">Home</a> &nbsp;/&nbsp; <?php the_title(); ?></div>
  </div>
</section>

<section class="page-body">
  <div class="container">
    <div class="page-content">
      <?php
      while ( have_posts() ) :
        the_post();
        the_content();
      endwhile;
      ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>
