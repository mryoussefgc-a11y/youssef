import { motion } from 'framer-motion'
import Reveal from './Reveal.jsx'
import SectionHeading from './SectionHeading.jsx'
import { skills } from '../content.js'

export default function Skills() {
  return (
    <section id="skills">
      <div className="section">
        <SectionHeading
          label="Expertise"
          title="Skills"
          subtitle="The core skills I use to research markets, run ads, and generate leads."
        />

        <div className="mt-14 grid gap-x-12 gap-y-8 md:grid-cols-2">
          {skills.map((skill, i) => (
            <Reveal key={skill.name} delay={(i % 2) * 0.08}>
              <div>
                <div className="mb-2.5 flex items-center justify-between">
                  <span className="text-sm font-medium">{skill.name}</span>
                  <span className="text-sm font-semibold text-accent-soft">{skill.value}%</span>
                </div>
                <div className="h-2 overflow-hidden rounded-full bg-white/10">
                  {/* Animated progress bar — fills when scrolled into view */}
                  <motion.div
                    className="h-full rounded-full bg-gradient-to-r from-accent to-accent-soft"
                    initial={{ width: 0 }}
                    whileInView={{ width: `${skill.value}%` }}
                    viewport={{ once: true, margin: '-60px' }}
                    transition={{ duration: 1.2, delay: 0.2, ease: [0.21, 0.47, 0.32, 0.98] }}
                  />
                </div>
              </div>
            </Reveal>
          ))}
        </div>
      </div>
    </section>
  )
}
