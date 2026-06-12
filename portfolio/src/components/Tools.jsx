import { motion } from 'framer-motion'
import SectionHeading from './SectionHeading.jsx'
import { tools } from '../content.js'

export default function Tools() {
  return (
    <section id="tools">
      <div className="section">
        <SectionHeading
          label="Stack"
          title="Tools I Work With"
          center
        />

        <div className="mx-auto mt-12 flex max-w-3xl flex-wrap justify-center gap-3">
          {tools.map((tool, i) => (
            <motion.span
              key={tool}
              initial={{ opacity: 0, scale: 0.85 }}
              whileInView={{ opacity: 1, scale: 1 }}
              viewport={{ once: true, margin: '-60px' }}
              transition={{ duration: 0.4, delay: i * 0.05 }}
              whileHover={{ scale: 1.06, y: -2 }}
              className="glass-card cursor-default px-5 py-2.5 text-sm font-medium text-secondary transition-colors hover:border-accent/40 hover:text-white"
            >
              {tool}
            </motion.span>
          ))}
        </div>
      </div>
    </section>
  )
}
