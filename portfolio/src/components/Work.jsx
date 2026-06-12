import Reveal from './Reveal.jsx'
import SectionHeading from './SectionHeading.jsx'
import { caseStudies } from '../content.js'

export default function Work() {
  return (
    <section id="work" className="bg-surface/60">
      <div className="section">
        <SectionHeading
          label="Portfolio"
          title="Selected Work"
          subtitle="Case studies showing how research, ads, and landing pages come together."
          center
        />

        <div className="mt-14 grid gap-6 md:grid-cols-3">
          {caseStudies.map((project, i) => (
            <Reveal key={project.title} delay={i * 0.12}>
              <article className="glass-card glass-card-hover group h-full overflow-hidden">
                {/*
                  ✏️ PROJECT IMAGE:
                  1. Put the image in /public (e.g. public/project-1.jpg)
                  2. In src/content.js set:  image: '/project-1.jpg'
                */}
                {project.image ? (
                  <img
                    src={project.image}
                    alt={project.title}
                    className="aspect-video w-full object-cover"
                  />
                ) : (
                  <div className="flex aspect-video w-full flex-col items-center justify-center gap-2 bg-gradient-to-br from-accent/20 via-surface to-accent-soft/10">
                    <svg className="h-8 w-8 text-white/30" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth={1.5}>
                      <path strokeLinecap="round" strokeLinejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5A1.5 1.5 0 0021.75 19.5V4.5A1.5 1.5 0 0020.25 3H3.75A1.5 1.5 0 002.25 4.5v15A1.5 1.5 0 003.75 21z" />
                    </svg>
                    <p className="text-xs font-medium text-white/40">Project Image</p>
                  </div>
                )}

                <div className="p-6">
                  <span className="inline-block rounded-full border border-accent/30 bg-accent/10 px-3 py-1 text-[11px] font-semibold text-accent-soft">
                    {project.tag}
                  </span>
                  <h3 className="mt-4 text-lg font-semibold leading-snug">{project.title}</h3>
                  <p className="mt-3 text-sm leading-relaxed text-secondary">{project.result}</p>
                </div>
              </article>
            </Reveal>
          ))}
        </div>
      </div>
    </section>
  )
}
