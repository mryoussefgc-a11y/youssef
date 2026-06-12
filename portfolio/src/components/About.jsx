import Reveal from './Reveal.jsx'
import SectionHeading from './SectionHeading.jsx'
import { about } from '../content.js'

export default function About() {
  return (
    <section id="about" className="relative bg-surface/60">
      <div className="section">
        <SectionHeading label="Who I Am" title="About Me" subtitle={about.text} />

        {/* Trait cards */}
        <div className="mt-12 grid grid-cols-2 gap-4 md:grid-cols-4">
          {about.traits.map((trait, i) => (
            <Reveal key={trait.label} delay={i * 0.1}>
              <div className="glass-card glass-card-hover flex flex-col items-center gap-3 p-6 text-center">
                <span className="text-3xl">{trait.icon}</span>
                <p className="text-sm font-semibold">{trait.label}</p>
              </div>
            </Reveal>
          ))}
        </div>
      </div>
    </section>
  )
}
