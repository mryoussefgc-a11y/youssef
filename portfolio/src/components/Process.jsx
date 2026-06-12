import Reveal from './Reveal.jsx'
import SectionHeading from './SectionHeading.jsx'
import { process } from '../content.js'

export default function Process() {
  return (
    <section id="process">
      <div className="section">
        <SectionHeading
          label="How I Work"
          title="My Process"
          subtitle="A simple, repeatable system — from research to scale."
          center
        />

        <div className="mt-14 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
          {process.map((step, i) => (
            <Reveal key={step.step} delay={i * 0.12}>
              <div className="glass-card glass-card-hover relative h-full overflow-hidden p-7">
                {/* Big step number in the background */}
                <span className="pointer-events-none absolute -right-2 -top-6 text-[90px] font-extrabold leading-none text-white/5">
                  {step.step}
                </span>
                <span className="gradient-text text-sm font-bold">{step.step}</span>
                <h3 className="mt-3 text-lg font-semibold">{step.title}</h3>
                <p className="mt-3 text-sm leading-relaxed text-secondary">{step.description}</p>
              </div>
            </Reveal>
          ))}
        </div>
      </div>
    </section>
  )
}
