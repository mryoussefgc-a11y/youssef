"use client";

import { motion } from "framer-motion";
import { useInView } from "framer-motion";
import { useRef } from "react";
import { ArrowRight, Tv, Home, Baby, Layout, BarChart2 } from "lucide-react";

const projects = [
  {
    icon: Tv,
    category: "Media Strategy",
    title: "IPTV Marketing Strategy",
    desc: "Built a full acquisition funnel for an IPTV subscription service — from audience research to ad creative, resulting in a scalable growth engine.",
    tags: ["Meta Ads", "Copywriting", "Funnel Design"],
    color: "from-purple-50 to-indigo-50",
    border: "border-purple-100",
    iconBg: "bg-purple-100",
    iconColor: "text-purple-600",
    accentColor: "text-purple-700",
    highlight: "3.2x ROAS",
  },
  {
    icon: Home,
    category: "Lead Generation",
    title: "Real Estate Lead Gen",
    desc: "Designed a hyper-targeted local campaign for a real estate agency that cut cost-per-lead by 40% while tripling qualified inquiry volume.",
    tags: ["Google Ads", "Landing Page", "Local Targeting"],
    color: "from-amber-50 to-orange-50",
    border: "border-amber-100",
    iconBg: "bg-amber-100",
    iconColor: "text-amber-600",
    accentColor: "text-amber-700",
    highlight: "−40% CPL",
  },
  {
    icon: Baby,
    category: "Market Research",
    title: "Baby Brand Research",
    desc: "Conducted deep customer research across Reddit, Amazon, and parenting forums to uncover winning angles and product positioning for a new baby brand.",
    tags: ["Customer Research", "Positioning", "Reddit Mining"],
    color: "from-pink-50 to-rose-50",
    border: "border-pink-100",
    iconBg: "bg-pink-100",
    iconColor: "text-pink-500",
    accentColor: "text-pink-700",
    highlight: "12 Pain Points",
  },
  {
    icon: Layout,
    category: "CRO",
    title: "Landing Page Optimization",
    desc: "Audited and redesigned a SaaS landing page using heatmap data, session recordings, and copy testing — increasing conversion rate significantly.",
    tags: ["CRO", "A/B Testing", "Copywriting"],
    color: "from-teal-50 to-emerald-50",
    border: "border-teal-100",
    iconBg: "bg-teal-100",
    iconColor: "text-teal-600",
    accentColor: "text-teal-700",
    highlight: "+28% CVR",
  },
  {
    icon: BarChart2,
    category: "Creative Analysis",
    title: "Meta Ads Analysis",
    desc: "Analyzed 50+ competitor ads from the Meta Ads Library to extract winning creative formulas, hooks, and offer structures for a new campaign.",
    tags: ["Ads Library", "Creative Strategy", "Hooks"],
    color: "from-blue-50 to-sky-50",
    border: "border-blue-100",
    iconBg: "bg-blue-100",
    iconColor: "text-blue-600",
    accentColor: "text-blue-700",
    highlight: "50+ Ads Analyzed",
  },
];

export default function Projects() {
  const ref = useRef(null);
  const inView = useInView(ref, { once: true, margin: "-80px" });

  return (
    <section id="projects" ref={ref} className="py-32 bg-[#F8FAFC]">
      <div className="max-w-6xl mx-auto px-6">
        <div className="text-center mb-20">
          <motion.div
            initial={{ opacity: 0, y: 20 }}
            animate={inView ? { opacity: 1, y: 0 } : {}}
            transition={{ duration: 0.6 }}
            className="inline-flex items-center gap-2 px-3 py-1.5 bg-white border border-[#E5E7EB] rounded-full mb-5"
          >
            <span className="text-xs font-semibold text-[#6B7280] tracking-wider uppercase">Projects</span>
          </motion.div>
          <motion.h2
            initial={{ opacity: 0, y: 20 }}
            animate={inView ? { opacity: 1, y: 0 } : {}}
            transition={{ duration: 0.7, delay: 0.1 }}
            className="text-[clamp(2rem,4vw,3rem)] font-extrabold text-[#111827] tracking-tight mb-4"
          >
            Work that speaks for itself.
          </motion.h2>
          <motion.p
            initial={{ opacity: 0, y: 20 }}
            animate={inView ? { opacity: 1, y: 0 } : {}}
            transition={{ duration: 0.7, delay: 0.2 }}
            className="text-[#6B7280] text-lg max-w-xl mx-auto"
          >
            A selection of projects across industries, each one built from research to results.
          </motion.p>
        </div>

        {/* Featured large card */}
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          animate={inView ? { opacity: 1, y: 0 } : {}}
          transition={{ duration: 0.7, delay: 0.15 }}
          whileHover={{ y: -4, boxShadow: "0 20px 60px rgba(0,0,0,0.1)" }}
          className={`group bg-gradient-to-br ${projects[0].color} border ${projects[0].border} rounded-3xl p-8 md:p-10 mb-5 transition-all duration-300 cursor-pointer`}
        >
          <div className="flex flex-col md:flex-row md:items-center gap-6">
            <div className="flex-1">
              <div className="flex items-center gap-3 mb-4">
                {(() => { const Icon = projects[0].icon; return <div className={`w-12 h-12 ${projects[0].iconBg} rounded-2xl flex items-center justify-center`}><Icon size={22} className={projects[0].iconColor} /></div>; })()}
                <span className={`text-sm font-semibold ${projects[0].accentColor} uppercase tracking-wide`}>
                  {projects[0].category}
                </span>
              </div>
              <h3 className="text-2xl font-bold text-[#111827] mb-3">{projects[0].title}</h3>
              <p className="text-[#6B7280] leading-relaxed mb-5 max-w-xl">{projects[0].desc}</p>
              <div className="flex flex-wrap gap-2">
                {projects[0].tags.map((tag) => (
                  <span key={tag} className="px-3 py-1.5 text-xs font-medium text-[#6B7280] bg-white/80 border border-white rounded-lg">
                    {tag}
                  </span>
                ))}
              </div>
            </div>
            <div className="md:text-right flex md:flex-col gap-4 md:gap-2 items-center md:items-end">
              <div className="text-3xl font-bold text-[#111827]">{projects[0].highlight}</div>
              <motion.button
                whileHover={{ x: 4 }}
                className={`inline-flex items-center gap-2 text-sm font-semibold ${projects[0].accentColor} cursor-pointer`}
              >
                View Case Study <ArrowRight size={16} />
              </motion.button>
            </div>
          </div>
        </motion.div>

        {/* Grid of remaining cards */}
        <div className="grid sm:grid-cols-2 gap-5">
          {projects.slice(1).map((project, i) => (
            <motion.div
              key={i}
              initial={{ opacity: 0, y: 24 }}
              animate={inView ? { opacity: 1, y: 0 } : {}}
              transition={{ duration: 0.6, delay: 0.1 * (i + 2), ease: [0.22, 1, 0.36, 1] }}
              whileHover={{ y: -4, boxShadow: "0 16px 48px rgba(0,0,0,0.09)" }}
              className={`group bg-gradient-to-br ${project.color} border ${project.border} rounded-2xl p-6 transition-all duration-300 cursor-pointer`}
            >
              <div className="flex items-center gap-3 mb-4">
                <div className={`w-10 h-10 ${project.iconBg} rounded-xl flex items-center justify-center`}>
                  <project.icon size={18} className={project.iconColor} />
                </div>
                <span className={`text-xs font-semibold ${project.accentColor} uppercase tracking-wide`}>
                  {project.category}
                </span>
              </div>
              <div className="flex items-start justify-between gap-4 mb-3">
                <h3 className="font-bold text-[#111827]">{project.title}</h3>
                <span className="text-sm font-bold text-[#111827] whitespace-nowrap flex-shrink-0">{project.highlight}</span>
              </div>
              <p className="text-sm text-[#6B7280] leading-relaxed mb-4">{project.desc}</p>
              <div className="flex flex-wrap gap-1.5 mb-4">
                {project.tags.map((tag) => (
                  <span key={tag} className="px-2.5 py-1 text-xs font-medium text-[#6B7280] bg-white/80 border border-white rounded-lg">
                    {tag}
                  </span>
                ))}
              </div>
              <motion.button
                whileHover={{ x: 4 }}
                className={`inline-flex items-center gap-1.5 text-xs font-semibold ${project.accentColor} cursor-pointer`}
              >
                View Case Study <ArrowRight size={14} />
              </motion.button>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  );
}
