import {
  BarChart,
  Bar,
  XAxis,
  YAxis,
  CartesianGrid,
  Tooltip,
  ResponsiveContainer,
  Cell,
} from 'recharts'
import Reveal from './Reveal.jsx'
import SectionHeading from './SectionHeading.jsx'
import { chartData } from '../content.js'

// Custom dark-theme tooltip
function ChartTooltip({ active, payload, label }) {
  if (!active || !payload?.length) return null
  return (
    <div className="glass-card px-4 py-3 !bg-surface/95">
      <p className="text-xs text-secondary">{label}</p>
      <p className="text-base font-bold text-accent-soft">{payload[0].value}%</p>
    </div>
  )
}

export default function SkillChart() {
  return (
    <section id="skill-map" className="bg-surface/60">
      <div className="section">
        <SectionHeading
          label="Visualized"
          title="Marketing Skill Map"
          subtitle="A clear view of where my expertise is strongest."
          center
        />

        <Reveal delay={0.15}>
          <div className="glass-card mt-14 p-4 sm:p-8">
            <ResponsiveContainer width="100%" height={420}>
              <BarChart data={chartData} margin={{ top: 10, right: 10, left: -15, bottom: 10 }}>
                <defs>
                  {/* Gradient fill for the bars */}
                  <linearGradient id="barGradient" x1="0" y1="1" x2="0" y2="0">
                    <stop offset="0%" stopColor="#2563EB" />
                    <stop offset="100%" stopColor="#38BDF8" />
                  </linearGradient>
                </defs>
                <CartesianGrid strokeDasharray="3 3" stroke="rgba(255,255,255,0.07)" vertical={false} />
                <XAxis
                  dataKey="name"
                  tick={{ fill: '#A1A1AA', fontSize: 11 }}
                  axisLine={{ stroke: 'rgba(255,255,255,0.1)' }}
                  tickLine={false}
                  interval={0}
                  angle={-30}
                  textAnchor="end"
                  height={70}
                />
                <YAxis
                  domain={[0, 100]}
                  tick={{ fill: '#A1A1AA', fontSize: 12 }}
                  axisLine={false}
                  tickLine={false}
                />
                <Tooltip content={<ChartTooltip />} cursor={{ fill: 'rgba(255,255,255,0.04)' }} />
                <Bar dataKey="value" radius={[8, 8, 0, 0]} animationDuration={1400}>
                  {chartData.map((entry) => (
                    <Cell key={entry.name} fill="url(#barGradient)" />
                  ))}
                </Bar>
              </BarChart>
            </ResponsiveContainer>
          </div>
        </Reveal>
      </div>
    </section>
  )
}
