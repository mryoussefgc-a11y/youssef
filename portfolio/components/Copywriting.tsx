"use client";

import { motion } from "framer-motion";
import { useInView } from "framer-motion";
import { useRef } from "react";

const examples = [
  {
    type: "Hook",
    label: "Pattern Interrupt",
    text: "I canceled Netflix, Disney+, and Hulu all in the same week. Here's what I switched to instead...",
    note: "Opens with curiosity, implies social proof, teases value",
  },
  {
    type: "Headline",
    label: "Problem-Solution",
    text: "Stop Paying for 3 Streaming Services You Only Use 20% Of",
    note: "Speaks directly to a specific, relatable frustration",
  },
  {
    type: "Offer",
    label: "Risk Reversal",
    text: "Try all 10,000 channels FREE for 7 days. No credit card. No commitment. Just press play.",
    note: "Removes every objection in a single sentence",
  },
  {
    type: "CTA",
    label: "Action-Oriented",
    text: "Start My Free Trial →",
    note: "First-person CTA increases conversion by removing friction",
  },
  {
    type: "UGC Script",
    label: "Testimonial Hook",
    text: "POV: You just realized you've been overpaying for TV by $80/month for years. [cut to reaction] This is what I found instead...",
    note: "Native-feeling, high-engagement format for Reels/TikTok",
  },
];

export default function Copywriting() {
  const ref = useRef(null);
  const inView = useInView(ref, { once: true, margin: "-80px" });

  return (
    <section id="copywriting" ref={ref} className="py-32 bg-white">
      <div className="max-w-5xl mx-auto px-6">
        <div className="text-center mb-20">
          <motion.div
            initial={{ opacity: 0, y: 20 }}
            animate={inView ? { opacity: 1, y: 0 } : {}}
            transition={{ duration: 0.6 }}
            className="inline-flex items-center gap-2 px-3 py-1.5 bg-[#F8FAFC] border border-[#E5E7EB] rounded-full mb-5"
          >
            <span className="text-xs font-semibold text-[#6B7280] tracking-wider uppercase">Copywriting</span>
          </motion.div>
          <motion.h2
            initial={{ opacity: 0, y: 20 }}
            animate={inView ? { opacity: 1, y: 0 } : {}}
            transition={{ duration: 0.7, delay: 0.1 }}
            className="text-[clamp(2rem,4vw,3rem)] font-extrabold text-[#111827] tracking-tight mb-4"
          >
            Words that make people act.
          </motion.h2>
          <motion.p
            initial={{ opacity: 0, y: 20 }}
            animate={inView ? { opacity: 1, y: 0 } : {}}
            transition={{ duration: 0.7, delay: 0.2 }}
            className="text-[#6B7280] text-lg max-w-xl mx-auto"
          >
            Every word is chosen to move the reader closer to a decision. Here are real examples from active campaigns.
          </motion.p>
        </div>

        <div className="space-y-4">
          {examples.map((ex, i) => (
            <motion.div
              key={i}
              initial={{ opacity: 0, x: -20 }}
              animate={inView ? { opacity: 1, x: 0 } : {}}
              transition={{ duration: 0.6, delay: 0.08 * i + 0.1 }}
              whileHover={{ x: 4 }}
              className="group flex gap-5 p-6 bg-[#F8FAFC] border border-[#E5E7EB] rounded-2xl hover:border-[#BFDBFE] hover:bg-[#EFF6FF] transition-all duration-300 cursor-default"
            >
              <div className="flex-shrink-0 flex flex-col gap-1 min-w-[90px]">
                <span className="px-2.5 py-1 text-xs font-bold text-[#2563EB] bg-[#DBEAFE] rounded-lg w-fit">
                  {ex.type}
                </span>
                <span className="text-xs text-[#9CA3AF] font-medium mt-1">{ex.label}</span>
              </div>
              <div className="flex-1 min-w-0">
                <p className="font-semibold text-[#111827] text-lg leading-snug mb-2 group-hover:text-[#1D4ED8] transition-colors duration-300">
                  &ldquo;{ex.text}&rdquo;
                </p>
                <p className="text-sm text-[#6B7280]">{ex.note}</p>
              </div>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  );
}
