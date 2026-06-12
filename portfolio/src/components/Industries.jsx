import Reveal from './Reveal.jsx'
import SectionHeading from './SectionHeading.jsx'
import { industries } from '../content.js'

export default function Industries() {
  return (
    <section id="industries" className="bg-surface/60">
      <div className="section">
        <SectionHeading
          label="Sectors"
          title="Industries I Can Help"
          subtitle="Lead generation systems adapted to each industry's customers and offers."
          center
        />

        <div className="mt-14 grid grid-cols-2 gap-4 sm:grid-cols-3">
          {industries.map((industry, i) => (
            <Reveal key={industry.label} delay={(i % 3) * 0.08}>
              <div className="glass-card glass-card-hover flex items-center gap-4 p-5">
                <span className="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-accent/15 text-xl">
                  {industry.icon}
                </span>
                <p className="text-sm font-medium">{industry.label}</p>
              </div>
            </Reveal>
          ))}
        </div>
      </div>
    </section>
  )
}
