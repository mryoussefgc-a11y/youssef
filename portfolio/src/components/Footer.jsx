import { site } from '../content.js'

export default function Footer() {
  return (
    <footer className="border-t border-white/10">
      <div className="mx-auto flex max-w-6xl flex-col items-center justify-between gap-4 px-6 py-8 sm:flex-row">
        <p className="text-sm text-secondary">
          © {new Date().getFullYear()} {site.name}. All rights reserved.
        </p>
        <p className="text-sm text-secondary">
          {site.role} · {site.location}
        </p>
      </div>
    </footer>
  )
}
