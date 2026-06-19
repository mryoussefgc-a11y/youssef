  <!-- ===================== FOOTER ===================== -->
  <footer class="footer">
    <div class="container">
      <div class="footer-grid">
        <div>
          <a href="#home" class="logo">
            <img src="https://s3-eu-west-1.amazonaws.com/tpd/logos/690ba9cc3ef46c785bd2c9c6/0x0.png" alt="IPTV Trusted" style="height:44px;width:auto;display:block;">
          </a>
          <p>Reliable IPTV built on trust, stability, and real human support. The service that actually works — especially on match day.</p>
          <div class="footer-social">
            <a href="https://wa.me/1234567890" target="_blank" rel="noopener" aria-label="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
            <a href="#" aria-label="Telegram"><i class="fa-brands fa-telegram"></i></a>
            <a href="#" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
            <a href="#" aria-label="Facebook"><i class="fa-brands fa-facebook"></i></a>
          </div>
        </div>
        <div><h5>Product</h5><div class="footer-links"><a href="#features">Features</a><a href="#channels">Channels</a><a href="#pricing">Pricing</a><a href="#how">How It Works</a></div></div>
        <div><h5>Company</h5><div class="footer-links"><a href="#faq">FAQ</a><a href="#contact">Contact</a><a href="https://wa.me/1234567890" target="_blank" rel="noopener">Support</a></div></div>
        <div><h5>Get Started</h5><div class="footer-links"><a href="#pricing">View Plans</a><a href="https://wa.me/1234567890" target="_blank" rel="noopener">WhatsApp Us</a></div></div>
      </div>
      <div class="footer-bottom">
        <span>© 2026 IPTV Trusted. All rights reserved.</span>
        <span>Privacy Policy · Terms of Service</span>
      </div>
    </div>
  </footer>

  <a href="https://wa.me/1234567890" target="_blank" rel="noopener" class="fab" aria-label="Chat on WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>

  <!-- Sticky mobile bottom bar (mobile only) -->
  <div class="mobile-cta-bar">
    <a href="#pricing" class="btn btn-blue">View Plans</a>
    <a href="https://wa.me/1234567890" target="_blank" rel="noopener" class="btn btn-light"><i class="fa-brands fa-whatsapp"></i> WhatsApp Us</a>
  </div>

  <!-- ===================== JAVASCRIPT ===================== -->
  <script>
    const header = document.getElementById('header');
    const onScroll = () => header.classList.toggle('scrolled', window.scrollY > 24);
    window.addEventListener('scroll', onScroll); onScroll();

    const navToggle = document.getElementById('navToggle');
    const mobileMenu = document.getElementById('mobileMenu');
    navToggle.addEventListener('click', () => {
      const open = mobileMenu.classList.toggle('open');
      navToggle.innerHTML = open ? '<i class="fa-solid fa-xmark"></i>' : '<i class="fa-solid fa-bars"></i>';
    });
    mobileMenu.querySelectorAll('a').forEach(link => link.addEventListener('click', () => {
      mobileMenu.classList.remove('open');
      navToggle.innerHTML = '<i class="fa-solid fa-bars"></i>';
    }));

    document.querySelectorAll('.faq-item').forEach(item => {
      const q = item.querySelector('.faq-q');
      const a = item.querySelector('.faq-a');
      q.addEventListener('click', () => {
        const isActive = item.classList.contains('active');
        document.querySelectorAll('.faq-item').forEach(other => {
          other.classList.remove('active');
          other.querySelector('.faq-a').style.maxHeight = null;
        });
        if (!isActive) { item.classList.add('active'); a.style.maxHeight = a.scrollHeight + 'px'; }
      });
    });

    const navItems = [...document.querySelectorAll('.nav-links a')];
    const navMap = {};
    navItems.forEach(a => navMap[a.getAttribute('href').slice(1)] = a);
    const spy = new IntersectionObserver(entries => {
      entries.forEach(e => {
        if (e.isIntersecting && navMap[e.target.id]) {
          navItems.forEach(a => a.classList.remove('active'));
          navMap[e.target.id].classList.add('active');
        }
      });
    }, { rootMargin: '-45% 0px -50% 0px' });
    document.querySelectorAll('section[id]').forEach(s => spy.observe(s));

    const io = new IntersectionObserver((entries) => {
      entries.forEach(entry => { if (entry.isIntersecting) { entry.target.classList.add('in'); io.unobserve(entry.target); } });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
    document.querySelectorAll('.reveal').forEach(el => io.observe(el));

    // Read more / Read less للـ reviews الطوال
    document.querySelectorAll('.wall-card p').forEach(p => {
      p.classList.add('clamped');
      if (p.scrollHeight > p.clientHeight + 2) {          // غير إلا كان النص طويل
        const btn = document.createElement('button');
        btn.className = 'read-more';
        btn.textContent = 'Read more';
        p.after(btn);
        btn.addEventListener('click', () => {
          const isClamped = p.classList.toggle('clamped');
          btn.textContent = isClamped ? 'Read more' : 'Read less';
        });
      }
    });
  </script>

  <?php wp_footer(); ?>
</body>
</html>
