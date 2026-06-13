// ============================================================
// Youssef Bekkari — Portfolio scripts
// ============================================================

// ------------------------------------------------------------
// ✏️ EDIT: YOUR CONTACT DETAILS — the form sends here.
// WhatsApp number: digits only, with country code, no spaces.
// Example: '212612345678'
// ------------------------------------------------------------
const WHATSAPP_NUMBER = '212610369508'
const CONTACT_EMAIL = 'contact@youssefbekkari.io'

// ------------------------------------------------------------
// Navbar: solid background after scrolling
// ------------------------------------------------------------
const navbar = document.getElementById('navbar')
window.addEventListener('scroll', () => {
  navbar.classList.toggle('scrolled', window.scrollY > 24)
})

// ------------------------------------------------------------
// Mobile menu toggle
// ------------------------------------------------------------
const menuToggle = document.getElementById('menu-toggle')
const mobileMenu = document.getElementById('mobile-menu')

menuToggle.addEventListener('click', () => {
  menuToggle.classList.toggle('open')
  mobileMenu.classList.toggle('open')
})

mobileMenu.querySelectorAll('a').forEach((link) => {
  link.addEventListener('click', () => {
    menuToggle.classList.remove('open')
    mobileMenu.classList.remove('open')
  })
})

// ------------------------------------------------------------
// Scroll reveal animations (.reveal elements fade in)
// ------------------------------------------------------------
const revealObserver = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible')
        revealObserver.unobserve(entry.target)
      }
    })
  },
  { threshold: 0.15 }
)

document.querySelectorAll('.reveal').forEach((el) => revealObserver.observe(el))

// ------------------------------------------------------------
// My Story — year tabs (2023 / 2024 / 2025 / 2026)
// Clicking a year shows its panel.
// ------------------------------------------------------------
const storyTabs = document.querySelectorAll('.story-tab')
const storyPanels = document.querySelectorAll('.story-panel')

storyTabs.forEach((tab) => {
  tab.addEventListener('click', () => {
    const year = tab.dataset.year
    storyTabs.forEach((t) => t.classList.toggle('active', t === tab))
    storyPanels.forEach((p) => p.classList.toggle('active', p.dataset.year === year))
  })
})

// ------------------------------------------------------------
// Animated skill bars (fill when scrolled into view)
// ------------------------------------------------------------
const barObserver = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        const fill = entry.target
        fill.style.width = fill.dataset.value + '%'
        barObserver.unobserve(fill)
      }
    })
  },
  { threshold: 0.4 }
)

document.querySelectorAll('.bar-fill').forEach((el) => barObserver.observe(el))

// ------------------------------------------------------------
// Contact form (name, email, phone, message)
// On submit it opens WhatsApp with the details pre-filled.
// If WHATSAPP_NUMBER is not set yet, it falls back to email.
// ------------------------------------------------------------
const form = document.getElementById('contact-form')
const formNote = document.getElementById('form-note')

form.addEventListener('submit', (e) => {
  e.preventDefault()

  const name = document.getElementById('form-name').value.trim()
  const email = document.getElementById('form-email').value.trim()
  const phone = document.getElementById('form-phone').value.trim()
  const message = document.getElementById('form-message').value.trim()

  const text =
    `Hello Youssef! I'm interested in working with you.\n\n` +
    `Name: ${name}\n` +
    `Email: ${email}\n` +
    `Phone: ${phone}` +
    (message ? `\n\nMessage: ${message}` : '')

  // Use WhatsApp if the number is configured, otherwise email
  if (!WHATSAPP_NUMBER.includes('X')) {
    window.open(
      `https://wa.me/${WHATSAPP_NUMBER}?text=${encodeURIComponent(text)}`,
      '_blank'
    )
    formNote.textContent = 'Opening WhatsApp… ✓'
  } else {
    window.location.href =
      `mailto:${CONTACT_EMAIL}?subject=${encodeURIComponent('New project inquiry from ' + name)}` +
      `&body=${encodeURIComponent(text)}`
    formNote.textContent = 'Opening your email app… ✓'
  }

  form.reset()
})

// ------------------------------------------------------------
// Marketing Skill Map chart (Chart.js) — light theme
// ✏️ EDIT: change your skill names and values here
// ------------------------------------------------------------
const chartLabels = [
  'Meta Ads',
  'Lead Generation',
  'Market Research',
  'Copywriting',
  'Landing Pages',
  'WordPress',
  'Google Ads',
  'SEO',
]
const chartValues = [95, 95, 90, 85, 85, 80, 75, 70]

const canvas = document.getElementById('skillChart')

function buildChart() {
  const ctx = canvas.getContext('2d')

  // Gradient fill for the bars (black → terracotta accent)
  const gradient = ctx.createLinearGradient(0, 400, 0, 0)
  gradient.addColorStop(0, '#141413')
  gradient.addColorStop(1, '#CC785C')

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: chartLabels,
      datasets: [
        {
          data: chartValues,
          backgroundColor: gradient,
          borderRadius: 8,
          borderSkipped: false,
          maxBarThickness: 64,
        },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      animation: {
        duration: 1400,
        easing: 'easeOutQuart',
      },
      plugins: {
        legend: { display: false },
        tooltip: {
          backgroundColor: '#141413',
          titleColor: '#A8A49B',
          bodyColor: '#E0B084',
          bodyFont: { size: 15, weight: 'bold' },
          padding: 12,
          cornerRadius: 10,
          displayColors: false,
          callbacks: {
            label: (item) => item.parsed.y + '%',
          },
        },
      },
      scales: {
        x: {
          grid: { display: false },
          ticks: { color: '#5E5A52', font: { size: 11 } },
          border: { color: 'rgba(20, 20, 19, 0.15)' },
        },
        y: {
          min: 0,
          max: 100,
          grid: { color: 'rgba(20, 20, 19, 0.07)' },
          ticks: { color: '#5E5A52', font: { size: 12 } },
          border: { display: false },
        },
      },
    },
  })
}

// Build the chart only when it scrolls into view
if (canvas && typeof Chart !== 'undefined') {
  const chartObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          buildChart()
          chartObserver.unobserve(canvas)
        }
      })
    },
    { threshold: 0.3 }
  )
  chartObserver.observe(canvas)
}

// ------------------------------------------------------------
// Footer year (updates automatically)
// ------------------------------------------------------------
document.getElementById('year').textContent = new Date().getFullYear()
