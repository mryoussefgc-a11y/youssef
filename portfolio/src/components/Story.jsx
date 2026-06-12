import { motion } from 'framer-motion'
import SectionHeading from './SectionHeading.jsx'
import { story } from '../content.js'

export default function Story() {
  return (
    <section id="story">
      <div className="section grid gap-14 md:grid-cols-2">
        <div>
          <SectionHeading label="The Journey" title="My Story" subtitle={story.text} />
        </div>

        {/* Timeline */}
        <div className="relative pl-8">
          {/* Vertical line */}
          <div className="absolute left-[7px] top-2 h-[calc(100%-16px)] w-px bg-gradient-to-b from-accent via-accent-soft/50 to-transparent" />

          <ul className="space-y-8">
            {story.timeline.map((step, i) => (
              <motion.li
                key={step}
                initial={{ opacity: 0, x: -20 }}
                whileInView={{ opacity: 1, x: 0 }}
                viewport={{ once: true, margin: '-60px' }}
                transition={{ duration: 0.5, delay: i * 0.12 }}
                className="relative"
              >
                {/* Dot */}
                <span className="absolute -left-8 top-1.5 flex h-4 w-4 items-center justify-center">
                  <span className="absolute h-4 w-4 rounded-full bg-accent/30" />
                  <span className="h-2 w-2 rounded-full bg-accent-soft" />
                </span>
                <p className="text-base font-medium leading-relaxed md:text-lg">{step}</p>
              </motion.li>
            ))}
          </ul>
        </div>
      </div>
    </section>
  )
}
