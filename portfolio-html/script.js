// ============================================================
// Youssef Bekkari — Portfolio scripts
// ============================================================

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

// Close the menu when a link is clicked
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
// Marketing Skill Map chart (Chart.js)
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

  // Gradient fill for the bars (accent → soft accent)
  const gradient = ctx.createLinearGradient(0, 400, 0, 0)
  gradient.addColorStop(0, '#2563EB')
  gradient.addColorStop(1, '#38BDF8')

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
          backgroundColor: 'rgba(11, 15, 25, 0.95)',
          borderColor: 'rgba(255, 255, 255, 0.1)',
          borderWidth: 1,
          titleColor: '#A1A1AA',
          bodyColor: '#38BDF8',
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
          ticks: { color: '#A1A1AA', font: { size: 11 } },
          border: { color: 'rgba(255, 255, 255, 0.1)' },
        },
        y: {
          min: 0,
          max: 100,
          grid: { color: 'rgba(255, 255, 255, 0.07)' },
          ticks: { color: '#A1A1AA', font: { size: 12 } },
          border: { display: false },
        },
      },
    },
  })
}

// Build the chart only when it scrolls into view (so the
// animation plays in front of the visitor)
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
