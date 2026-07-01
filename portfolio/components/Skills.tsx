"use client";

import { motion } from "framer-motion";
import { useInView } from "framer-motion";
import { useRef } from "react";
import {
  BarChart2, Globe, Zap, Search, Layout, PenTool, TrendingUp, Target, Cpu, Code, Activity, Bot
} from "lucide-react";

const skills = [
  { icon: Target, title: "Paid Advertising", level: 95, tags: ["Meta Ads", "Google Ads", "TikTok"] },
  { icon: Zap, title: "Lead Generation", level: 92, tags: ["B2C", "B2B", "Real Estate"] },
  { icon: Search, title: "SEO", level: 78, tags: ["On-Page", "Technical", "Local"] },
  { icon: Layout, title: "Landing Pages", level: 90, tags: ["CRO", "A/B Testing", "UX"] },
  { icon: PenTool, title: "Copywriting", level: 88, tags: ["Direct Response", "UGC", "Email"] },
  { icon: TrendingUp, title: "CRO", level: 85, tags: ["Heatmaps", "Funnels", "Testing"] },
  { icon: Globe, title: "Marketing Strategy", level: 93, tags: ["GTM", "Positioning", "Offers"] },
  { icon: Code, title: "WordPress", level: 80, tags: ["Elementor", "WooCommerce", "Speed"] },
  { icon: BarChart2, title: "Analytics", level: 88, tags: ["GA4", "GTM", "Reporting"] },
  { icon: Bot, title: "AI Tools", level: 87, tags: ["ChatGPT", "Claude", "Automation"] },
  { icon: Activity, title: "Marketing Research", level: 94, tags: ["Reddit", "Reviews", "Surveys"] },
  { icon: Cpu, title: "Creative Direction", level: 83, tags: ["Ad Creative", "Hooks", "Angles"] },
];

export default function Skills() {
  const ref = useRef(null);
  const inView = useInView(ref, { once: true, margin: "-80px" });

  return (
    <section id="skills" ref={ref} className="py-32 bg-white">
      <div className="max-w-6xl mx-auto px-6">
        <div className="text-center mb-20">
          <motion.div
            initial={{ opacity: 0, y: 20 }}
            animate={inView ? { opacity: 1, y: 0 } : {}}
            transition={{ duration: 0.6 }}
            className="inline-flex items-center gap-2 px-3 py-1.5 bg-[#F8FAFC] border border-[#E5E7EB] rounded-full mb-5"
          >
            <span className="text-xs font-semibold text-[#6B7280] tracking-wider uppercase">Skills</span>
          </motion.div>
          <motion.h2
            initial={{ opacity: 0, y: 20 }}
            animate={inView ? { opacity: 1, y: 0 } : {}}
            transition={{ duration: 0.7, delay: 0.1 }}
            className="text-[clamp(2rem,4vw,3rem)] font-extrabold text-[#111827] tracking-tight"
          >
            Full-stack marketing expertise.
          </motion.h2>
        </div>

        <div className="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
          {skills.map((skill, i) => (
            <motion.div
              key={i}
              initial={{ opacity: 0, y: 24 }}
              animate={inView ? { opacity: 1, y: 0 } : {}}
              transition={{ duration: 0.6, delay: 0.04 * i, ease: [0.22, 1, 0.36, 1] }}
              whileHover={{ y: -4, boxShadow: "0 12px 40px rgba(0,0,0,0.08)" }}
              className="group bg-white border border-[#E5E7EB] rounded-2xl p-6 transition-all duration-300"
            >
              <div className="flex items-start justify-between mb-4">
                <div className="w-10 h-10 rounded-xl bg-[#EFF6FF] flex items-center justify-center group-hover:bg-[#2563EB] transition-colors duration-300">
                  <skill.icon size={18} className="text-[#2563EB] group-hover:text-white transition-colors duration-300" />
                </div>
                <span className="text-2xl font-bold text-[#111827]">{skill.level}%</span>
              </div>

              <h3 className="font-bold text-[#111827] mb-3">{skill.title}</h3>

              {/* Progress bar */}
              <div className="h-1 bg-[#F1F5F9] rounded-full mb-4 overflow-hidden">
                <motion.div
                  initial={{ width: 0 }}
                  animate={inView ? { width: `${skill.level}%` } : {}}
                  transition={{ duration: 1.2, delay: 0.1 * i + 0.3, ease: [0.22, 1, 0.36, 1] }}
                  className="h-full bg-[#2563EB] rounded-full"
                />
              </div>

              <div className="flex flex-wrap gap-1.5">
                {skill.tags.map((tag) => (
                  <span
                    key={tag}
                    className="px-2.5 py-1 text-xs font-medium text-[#6B7280] bg-[#F8FAFC] border border-[#E5E7EB] rounded-lg"
                  >
                    {tag}
                  </span>
                ))}
              </div>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  );
}
