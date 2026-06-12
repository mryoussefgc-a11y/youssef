import Reveal from './Reveal.jsx'
import { contact, contactSection, site } from '../content.js'

export default function Contact() {
  return (
    <section id="contact" className="relative overflow-hidden">
      {/* Background glow */}
      <div className="pointer-events-none absolute bottom-0 left-1/2 h-[400px] w-[800px] -translate-x-1/2 bg-glow" />

      <div className="section">
        <Reveal>
          <div className="glass-card relative mx-auto max-w-3xl p-10 text-center md:p-16">
            <span className="section-label">Get In Touch</span>
            <h2 className="text-3xl font-bold tracking-tight md:text-5xl">
              {contactSection.title}
            </h2>
            <p className="mx-auto mt-5 max-w-xl text-base leading-relaxed text-secondary md:text-lg">
              {contactSection.text}
            </p>

            {/* Contact info — ✏️ edit values in src/content.js */}
            <div className="mt-10 grid gap-4 sm:grid-cols-3">
              <a
                href={`mailto:${contact.email}`}
                className="glass-card glass-card-hover p-5"
              >
                <p className="text-xs uppercase tracking-wider text-secondary">Email</p>
                <p className="mt-1.5 break-all text-sm font-medium">{contact.email}</p>
              </a>
              <a
                href={contact.whatsappLink}
                target="_blank"
                rel="noopener noreferrer"
                className="glass-card glass-card-hover p-5"
              >
                <p className="text-xs uppercase tracking-wider text-secondary">WhatsApp</p>
                <p className="mt-1.5 text-sm font-medium">{contact.whatsapp}</p>
              </a>
              <div className="glass-card p-5">
                <p className="text-xs uppercase tracking-wider text-secondary">Location</p>
                <p className="mt-1.5 text-sm font-medium">{site.location}</p>
              </div>
            </div>

            <a href={`mailto:${contact.email}`} className="btn-primary mt-10">
              Contact Me
              <svg className="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth={2}>
                <path strokeLinecap="round" strokeLinejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
              </svg>
            </a>
          </div>
        </Reveal>
      </div>
    </section>
  )
}
