import Reveal from './Reveal.jsx'

// Reusable section heading: small label + big title + optional subtitle
export default function SectionHeading({ label, title, subtitle, center = false }) {
  return (
    <Reveal className={center ? 'text-center' : ''}>
      {label && <span className="section-label">{label}</span>}
      <h2 className="text-3xl font-bold tracking-tight md:text-5xl">{title}</h2>
      {subtitle && (
        <p className={`mt-5 max-w-2xl text-base leading-relaxed text-secondary md:text-lg ${center ? 'mx-auto' : ''}`}>
          {subtitle}
        </p>
      )}
    </Reveal>
  )
}
