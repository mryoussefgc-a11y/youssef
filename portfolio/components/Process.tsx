"use client";

import { motion } from "framer-motion";
import { useInView } from "framer-motion";
import { useRef } from "react";

const steps = [
  { num: "01", title: "Business Goals", desc: "Understand KPIs, revenue targets, and what success looks like for the business." },
  { num: "02", title: "Market Research", desc: "Analyze market size, trends, seasonality, and category-level opportunities." },
  { num: "03", title: "Competitor Analysis", desc: "Audit competitor ads, landing pages, offers, and positioning using spy tools." },
  { num: "04", title: "Customer Research", desc: "Mine Reddit, reviews, forums, and social for real customer language and needs." },
  { num: "05", title: "Offer Creation", desc: "Build an irresistible offer stack with clear value, urgency, and differentiation." },
  { num: "06", title: "Copywriting", desc: "Write hooks, headlines, and body copy grounded in customer psychology." },
  { num: "07", title: "Landing Page", desc: "Design and optimize a conversion-focused page aligned with ad messaging." },
  { num: "08", title: "Media Buying", desc: "Launch campaigns on Meta and Google with precision targeting and structure." },
  { num: "09", title: "Optimization", desc: "Analyze data, kill losers, iterate on winners, improve creative and targeting." },
  { num: "10", title: "Scaling", desc: "Scale proven campaigns horizontally and vertically while maintaining efficiency." },
];

export default function Process() {
  const ref = useRef(null);
  const inView = useInView(ref, { once: true, margin: "-80px" });

  return (
    <section id="process" ref={ref} className="py-32 bg-[#F8FAFC]">
      <div className="max-w-6xl mx-auto px-6">
        {/* Header */}
        <div className="text-center mb-20">
          <motion.div
            initial={{ opacity: 0, y: 20 }}
            animate={inView ? { opacity: 1, y: 0 } : {}}
            transition={{ duration: 0.6, ease: [0.22, 1, 0.36, 1] }}
            className="inline-flex items-center gap-2 px-3 py-1.5 bg-white border border-[#E5E7EB] rounded-full mb-5"
          >
            <span className="text-xs font-semibold text-[#6B7280] tracking-wider uppercase">My Process</span>
          </motion.div>
          <motion.h2
            initial={{ opacity: 0, y: 20 }}
            animate={inView ? { opacity: 1, y: 0 } : {}}
            transition={{ duration: 0.7, delay: 0.1, ease: [0.22, 1, 0.36, 1] }}
            className="text-[clamp(2rem,4vw,3rem)] font-extrabold text-[#111827] tracking-tight"
          >
            From zero to scalable — systematically.
          </motion.h2>
          <motion.p
            initial={{ opacity: 0, y: 20 }}
            animate={inView ? { opacity: 1, y: 0 } : {}}
            transition={{ duration: 0.7, delay: 0.2, ease: [0.22, 1, 0.36, 1] }}
            className="text-[#6B7280] text-lg mt-4 max-w-xl mx-auto"
          >
            A repeatable 10-step framework I apply to every project to minimize risk and maximize ROI.
          </motion.p>
        </div>

        {/* Steps Grid */}
        <div className="grid md:grid-cols-2 gap-4">
          {steps.map((step, i) => (
            <motion.div
              key={i}
              initial={{ opacity: 0, y: 24 }}
              animate={inView ? { opacity: 1, y: 0 } : {}}
              transition={{ duration: 0.6, delay: 0.05 * i, ease: [0.22, 1, 0.36, 1] }}
              whileHover={{ y: -3, boxShadow: "0 8px 32px rgba(0,0,0,0.07)" }}
              className="group bg-white border border-[#E5E7EB] rounded-2xl p-6 flex gap-5 items-start transition-all duration-300 cursor-default"
            >
              <div className="flex-shrink-0 w-11 h-11 rounded-xl bg-[#EFF6FF] flex items-center justify-center group-hover:bg-[#2563EB] transition-colors duration-300">
                <span className="text-sm font-bold text-[#2563EB] group-hover:text-white transition-colors duration-300">
                  {step.num}
                </span>
              </div>
              <div>
                <h3 className="font-bold text-[#111827] mb-1.5 group-hover:text-[#2563EB] transition-colors duration-300">
                  {step.title}
                </h3>
                <p className="text-sm text-[#6B7280] leading-relaxed">{step.desc}</p>
              </div>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  );
}
