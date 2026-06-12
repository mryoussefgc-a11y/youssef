import Reveal from './Reveal.jsx'
import SectionHeading from './SectionHeading.jsx'
import { services } from '../content.js'

export default function Services() {
  return (
    <section id="services" className="bg-surface/60">
      <div className="section">
        <SectionHeading
          label="What I Do"
          title="Services"
          subtitle="Everything a business needs to attract attention and turn it into qualified leads."
          center
        />

        <div className="mt-14 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
          {services.map((service, i) => (
            <Reveal key={service.title} delay={(i % 3) * 0.1}>
              <div className="glass-card glass-card-hover group h-full p-7">
                <div className="mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-accent/15 text-2xl transition-colors duration-300 group-hover:bg-accent/30">
                  {service.icon}
                </div>
                <h3 className="text-lg font-semibold">{service.title}</h3>
                <p className="mt-3 text-sm leading-relaxed text-secondary">
                  {service.description}
                </p>
              </div>
            </Reveal>
          ))}
        </div>
      </div>
    </section>
  )
}
