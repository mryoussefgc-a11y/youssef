import { motion } from 'framer-motion'
import { site, hero, contact } from '../content.js'

const container = {
  hidden: {},
  show: { transition: { staggerChildren: 0.12 } },
}

const item = {
  hidden: { opacity: 0, y: 30 },
  show: { opacity: 1, y: 0, transition: { duration: 0.7, ease: [0.21, 0.47, 0.32, 0.98] } },
}

export default function Hero() {
  return (
    <section id="home" className="relative overflow-hidden">
      {/* Background glow effects */}
      <div className="pointer-events-none absolute -top-40 left-1/2 h-[600px] w-[900px] -translate-x-1/2 bg-glow" />
      <div className="pointer-events-none absolute right-[-200px] top-40 h-[400px] w-[400px] rounded-full bg-accent-soft/10 blur-[120px]" />

      <div className="section grid items-center gap-14 pt-36 md:grid-cols-2 md:pt-44">
        {/* Left: text */}
        <motion.div variants={container} initial="hidden" animate="show">
          <motion.div variants={item} className="mb-6 inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-4 py-1.5 text-xs text-secondary backdrop-blur-md">
            <span className="h-2 w-2 animate-pulse rounded-full bg-accent-soft" />
            Available for new projects · {site.location}
          </motion.div>

          <motion.p variants={item} className="text-sm font-semibold uppercase tracking-[0.2em] text-accent-soft">
            {site.name}
          </motion.p>
          <motion.p variants={item} className="mt-2 text-sm text-secondary">
            {site.role}
          </motion.p>

          <motion.h1
            variants={item}
            className="mt-6 text-4xl font-extrabold leading-[1.1] tracking-tight md:text-6xl"
          >
            I Build <span className="gradient-text">Lead Generation Systems</span> That Turn
            Attention Into Customers.
          </motion.h1>

          <motion.p variants={item} className="mt-6 max-w-xl text-base leading-relaxed text-secondary md:text-lg">
            {hero.description}
          </motion.p>

          <motion.div variants={item} className="mt-10 flex flex-wrap gap-4">
            <a href={contact.bookCallLink} className="btn-primary">
              Book a Call
              <svg className="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth={2}>
                <path strokeLinecap="round" strokeLinejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
              </svg>
            </a>
            <a href="#work" className="btn-secondary">
              View My Work
            </a>
          </motion.div>
        </motion.div>

        {/* Right: image / placeholder card */}
        <motion.div
          initial={{ opacity: 0, scale: 0.92 }}
          animate={{ opacity: 1, scale: 1 }}
          transition={{ duration: 0.8, delay: 0.3 }}
          className="relative mx-auto w-full max-w-md"
        >
          {/* Glow behind the card */}
          <div className="absolute -inset-4 rounded-3xl bg-gradient-to-br from-accent/30 to-accent-soft/20 blur-2xl" />

          {/*
            ✏️ YOUR PHOTO:
            1. Put your image in the /public folder (e.g. public/youssef.jpg)
            2. In src/content.js set:  image: '/youssef.jpg'
            The placeholder below will be replaced automatically.
          */}
          {hero.image ? (
            <img
              src={hero.image}
              alt={site.name}
              className="relative aspect-[4/5] w-full rounded-3xl border border-white/10 object-cover"
            />
          ) : (
            <div className="glass-card relative flex aspect-[4/5] w-full flex-col items-center justify-center gap-4 bg-gradient-to-br from-accent/20 via-surface to-accent-soft/10">
              <div className="flex h-20 w-20 items-center justify-center rounded-full border border-white/15 bg-white/5">
                <svg className="h-10 w-10 text-white/40" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth={1.5}>
                  <path strokeLinecap="round" strokeLinejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a8.25 8.25 0 0115 0" />
                </svg>
              </div>
              <p className="text-sm font-medium text-white/50">Your Image Here</p>
              <p className="px-8 text-center text-xs text-white/30">
                Replace in src/content.js → hero.image
              </p>
            </div>
          )}

          {/* Floating stat badges */}
          <motion.div
            animate={{ y: [0, -10, 0] }}
            transition={{ duration: 4, repeat: Infinity, ease: 'easeInOut' }}
            className="glass-card absolute -left-6 top-10 hidden px-4 py-3 sm:block"
          >
            <p className="text-xs text-secondary">Focus</p>
            <p className="text-sm font-semibold">Qualified Leads 🎯</p>
          </motion.div>
          <motion.div
            animate={{ y: [0, 10, 0] }}
            transition={{ duration: 5, repeat: Infinity, ease: 'easeInOut' }}
            className="glass-card absolute -right-6 bottom-12 hidden px-4 py-3 sm:block"
          >
            <p className="text-xs text-secondary">Approach</p>
            <p className="text-sm font-semibold">Data Driven 📊</p>
          </motion.div>
        </motion.div>
      </div>
    </section>
  )
}
