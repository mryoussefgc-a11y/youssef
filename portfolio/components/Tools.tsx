"use client";

import { motion } from "framer-motion";
import { useInView } from "framer-motion";
import { useRef } from "react";

const tools = [
  { name: "Meta Ads", icon: "M", color: "#1877F2", bg: "#EBF5FB" },
  { name: "Google Ads", icon: "G", color: "#EA4335", bg: "#FEF2F2" },
  { name: "GA4", icon: "A", color: "#F57C00", bg: "#FFF3E0" },
  { name: "Tag Manager", icon: "T", color: "#00897B", bg: "#E0F2F1" },
  { name: "WordPress", icon: "W", color: "#21759B", bg: "#E8F4F8" },
  { name: "Canva", icon: "C", color: "#7C3AED", bg: "#F3E8FF" },
  { name: "Figma", icon: "F", color: "#F24E1E", bg: "#FFF0EE" },
  { name: "Notion", icon: "N", color: "#111827", bg: "#F8FAFC" },
  { name: "ChatGPT", icon: "⊕", color: "#10A37F", bg: "#E8F8F4" },
  { name: "Claude", icon: "◆", color: "#D97706", bg: "#FFFBEB" },
  { name: "Perplexity", icon: "P", color: "#5B21B6", bg: "#F5F3FF" },
  { name: "Google Trends", icon: "↗", color: "#1A73E8", bg: "#EFF6FF" },
  { name: "Ads Library", icon: "L", color: "#1877F2", bg: "#EBF5FB" },
  { name: "SEMrush", icon: "S", color: "#FF642D", bg: "#FFF4EF" },
];

export default function Tools() {
  const ref = useRef(null);
  const inView = useInView(ref, { once: true, margin: "-80px" });

  return (
    <section id="tools" ref={ref} className="py-32 bg-white">
      <div className="max-w-6xl mx-auto px-6">
        <div className="text-center mb-20">
          <motion.div
            initial={{ opacity: 0, y: 20 }}
            animate={inView ? { opacity: 1, y: 0 } : {}}
            transition={{ duration: 0.6 }}
            className="inline-flex items-center gap-2 px-3 py-1.5 bg-[#F8FAFC] border border-[#E5E7EB] rounded-full mb-5"
          >
            <span className="text-xs font-semibold text-[#6B7280] tracking-wider uppercase">Tools</span>
          </motion.div>
          <motion.h2
            initial={{ opacity: 0, y: 20 }}
            animate={inView ? { opacity: 1, y: 0 } : {}}
            transition={{ duration: 0.7, delay: 0.1 }}
            className="text-[clamp(2rem,4vw,3rem)] font-extrabold text-[#111827] tracking-tight"
          >
            The stack I rely on.
          </motion.h2>
        </div>

        <motion.div
          initial={{ opacity: 0 }}
          animate={inView ? { opacity: 1 } : {}}
          transition={{ duration: 0.6, delay: 0.2 }}
          className="flex flex-wrap justify-center gap-4"
        >
          {tools.map((tool, i) => (
            <motion.div
              key={i}
              initial={{ opacity: 0, scale: 0.85 }}
              animate={inView ? { opacity: 1, scale: 1 } : {}}
              transition={{ duration: 0.5, delay: 0.04 * i, ease: [0.22, 1, 0.36, 1] }}
              whileHover={{ scale: 1.08, y: -4, boxShadow: "0 12px 32px rgba(0,0,0,0.1)" }}
              className="flex items-center gap-3 px-5 py-3.5 bg-white border border-[#E5E7EB] rounded-2xl transition-all duration-200 cursor-default"
            >
              <div
                className="w-9 h-9 rounded-xl flex items-center justify-center text-base font-bold flex-shrink-0"
                style={{ background: tool.bg, color: tool.color }}
              >
                {tool.icon}
              </div>
              <span className="text-sm font-semibold text-[#111827]">{tool.name}</span>
            </motion.div>
          ))}
        </motion.div>
      </div>
    </section>
  );
}
