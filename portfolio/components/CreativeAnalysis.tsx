"use client";

import { motion } from "framer-motion";
import { useInView } from "framer-motion";
import { useRef } from "react";
import { ArrowRight, X, Check } from "lucide-react";

const comparisons = [
  {
    label: "Ad Hook",
    before: {
      text: "Best IPTV Service — Watch 10,000 Channels!",
      issues: ["No emotional hook", "Sounds like spam", "No curiosity gap"],
    },
    after: {
      text: "I canceled Netflix last month. Here's what I use now instead (and it's cheaper).",
      wins: ["Curiosity-driven", "First-person authority", "Implies cost saving"],
    },
  },
  {
    label: "CTA Copy",
    before: {
      text: "Click Here to Subscribe",
      issues: ["Generic", "No value in the action", "Passive language"],
    },
    after: {
      text: "Start Watching Free for 7 Days →",
      wins: ["Outcome-focused", "Risk-free framing", "Action + benefit"],
    },
  },
  {
    label: "Ad Visual",
    before: {
      text: "Stock photo of a remote control with logo overlay",
      issues: ["Ignored in feed", "No context", "Feels corporate"],
    },
    after: {
      text: "Person reacting to their TV bill, then smiling with phone — UGC-style video",
      wins: ["Native to platform", "Emotional storytelling", "High-scroll-stop power"],
    },
  },
];

export default function CreativeAnalysis() {
  const ref = useRef(null);
  const inView = useInView(ref, { once: true, margin: "-80px" });

  return (
    <section id="creative-analysis" ref={ref} className="py-32 bg-white">
      <div className="max-w-6xl mx-auto px-6">
        <div className="text-center mb-20">
          <motion.div
            initial={{ opacity: 0, y: 20 }}
            animate={inView ? { opacity: 1, y: 0 } : {}}
            transition={{ duration: 0.6 }}
            className="inline-flex items-center gap-2 px-3 py-1.5 bg-[#F8FAFC] border border-[#E5E7EB] rounded-full mb-5"
          >
            <span className="text-xs font-semibold text-[#6B7280] tracking-wider uppercase">Creative Analysis</span>
          </motion.div>
          <motion.h2
            initial={{ opacity: 0, y: 20 }}
            animate={inView ? { opacity: 1, y: 0 } : {}}
            transition={{ duration: 0.7, delay: 0.1 }}
            className="text-[clamp(2rem,4vw,3rem)] font-extrabold text-[#111827] tracking-tight mb-4"
          >
            Before & after — the difference detail makes.
          </motion.h2>
          <motion.p
            initial={{ opacity: 0, y: 20 }}
            animate={inView ? { opacity: 1, y: 0 } : {}}
            transition={{ duration: 0.7, delay: 0.2 }}
            className="text-[#6B7280] text-lg max-w-xl mx-auto"
          >
            Small creative changes compound into big performance differences. Here&apos;s how I think about it.
          </motion.p>
        </div>

        <div className="space-y-5">
          {comparisons.map((comp, i) => (
            <motion.div
              key={i}
              initial={{ opacity: 0, y: 24 }}
              animate={inView ? { opacity: 1, y: 0 } : {}}
              transition={{ duration: 0.6, delay: 0.1 * i + 0.1 }}
              className="border border-[#E5E7EB] rounded-2xl overflow-hidden"
            >
              {/* Label bar */}
              <div className="px-6 py-3 bg-[#F8FAFC] border-b border-[#E5E7EB] flex items-center gap-3">
                <span className="text-xs font-bold text-[#6B7280] uppercase tracking-wider">{comp.label}</span>
              </div>

              <div className="grid md:grid-cols-2">
                {/* Before */}
                <div className="p-6 border-b md:border-b-0 md:border-r border-[#E5E7EB] bg-red-50/30">
                  <div className="flex items-center gap-2 mb-4">
                    <div className="w-6 h-6 rounded-full bg-red-100 flex items-center justify-center">
                      <X size={12} className="text-red-500" />
                    </div>
                    <span className="text-xs font-bold text-red-500 uppercase tracking-wider">Before</span>
                  </div>
                  <p className="font-semibold text-[#111827] mb-4 leading-snug">&ldquo;{comp.before.text}&rdquo;</p>
                  <ul className="space-y-2">
                    {comp.before.issues.map((issue, j) => (
                      <li key={j} className="flex items-center gap-2 text-sm text-red-600">
                        <span className="w-1.5 h-1.5 rounded-full bg-red-400 flex-shrink-0" />
                        {issue}
                      </li>
                    ))}
                  </ul>
                </div>

                {/* Arrow */}
                <div className="hidden md:flex absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 z-10 pointer-events-none">
                  <div className="w-8 h-8 rounded-full bg-white border border-[#E5E7EB] flex items-center justify-center shadow-sm">
                    <ArrowRight size={14} className="text-[#2563EB]" />
                  </div>
                </div>

                {/* After */}
                <div className="p-6 bg-green-50/30 relative">
                  <div className="flex items-center gap-2 mb-4">
                    <div className="w-6 h-6 rounded-full bg-green-100 flex items-center justify-center">
                      <Check size={12} className="text-green-600" />
                    </div>
                    <span className="text-xs font-bold text-green-600 uppercase tracking-wider">After</span>
                  </div>
                  <p className="font-semibold text-[#111827] mb-4 leading-snug">&ldquo;{comp.after.text}&rdquo;</p>
                  <ul className="space-y-2">
                    {comp.after.wins.map((win, j) => (
                      <li key={j} className="flex items-center gap-2 text-sm text-green-700">
                        <span className="w-1.5 h-1.5 rounded-full bg-green-500 flex-shrink-0" />
                        {win}
                      </li>
                    ))}
                  </ul>
                </div>
              </div>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  );
}
