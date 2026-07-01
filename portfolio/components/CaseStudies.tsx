"use client";

import { motion } from "framer-motion";
import { useInView } from "framer-motion";
import { useRef, useState } from "react";
import { ChevronDown, ChevronUp } from "lucide-react";

const caseStudy = {
  title: "IPTV Marketing Strategy",
  category: "Full-Funnel Campaign",
  subtitle: "How I built a scalable acquisition system for an IPTV subscription brand from scratch.",
  sections: [
    {
      label: "The Problem",
      content: "The client had a quality product but zero marketing infrastructure. No defined audience, no tested creative angles, and no conversion funnel. They were losing money on untargeted Meta campaigns with a 0.8% CTR and 1.1x ROAS.",
    },
    {
      label: "Research & Analysis",
      content: "I spent 3 days mining Reddit (r/cordcutters, r/IPTV), Facebook groups, Trustpilot, and YouTube comments. I extracted 47 unique customer pain points, objections, and buying triggers. The #1 insight: customers didn't care about price — they cared about reliability and content variety.",
    },
    {
      label: "Competitor Analysis",
      content: "Analyzed 60+ ads from the Meta Ads Library. Identified 3 dominant creative angles: price comparison, channel list showcase, and free trial hooks. Found a gap: nobody was addressing the 'cutting the cable' emotional story angle.",
    },
    {
      label: "Strategy & Offer",
      content: "Repositioned the offer from 'cheap IPTV' to 'never miss your favorite shows again.' Built a 7-day free trial funnel with a risk-reversal guarantee. Created 3 ad angles: emotional story, logical comparison, and social proof.",
    },
    {
      label: "Creative Direction",
      content: "Scripted 6 UGC-style video ads and 4 static creatives. Hooks tested: 'I canceled Netflix after this...', 'Watch 10,000+ channels for less than your morning coffee', and '7 days free — no credit card needed.'",
    },
    {
      label: "Results & KPIs",
      content: "After 30 days: CTR improved from 0.8% to 2.4%. CPA dropped 38%. ROAS reached 3.2x. The winning ad was the emotional cable-cutting story. Free trial-to-paid conversion rate: 34%.",
    },
  ],
};

export default function CaseStudies() {
  const ref = useRef(null);
  const inView = useInView(ref, { once: true, margin: "-80px" });
  const [openIdx, setOpenIdx] = useState<number | null>(0);

  return (
    <section id="case-studies" ref={ref} className="py-32 bg-white">
      <div className="max-w-5xl mx-auto px-6">
        <div className="text-center mb-20">
          <motion.div
            initial={{ opacity: 0, y: 20 }}
            animate={inView ? { opacity: 1, y: 0 } : {}}
            transition={{ duration: 0.6 }}
            className="inline-flex items-center gap-2 px-3 py-1.5 bg-[#F8FAFC] border border-[#E5E7EB] rounded-full mb-5"
          >
            <span className="text-xs font-semibold text-[#6B7280] tracking-wider uppercase">Case Study</span>
          </motion.div>
          <motion.h2
            initial={{ opacity: 0, y: 20 }}
            animate={inView ? { opacity: 1, y: 0 } : {}}
            transition={{ duration: 0.7, delay: 0.1 }}
            className="text-[clamp(2rem,4vw,3rem)] font-extrabold text-[#111827] tracking-tight mb-4"
          >
            {caseStudy.title}
          </motion.h2>
          <motion.p
            initial={{ opacity: 0, y: 20 }}
            animate={inView ? { opacity: 1, y: 0 } : {}}
            transition={{ duration: 0.7, delay: 0.2 }}
            className="text-[#6B7280] text-lg max-w-2xl mx-auto"
          >
            {caseStudy.subtitle}
          </motion.p>
        </div>

        {/* Metrics bar */}
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          animate={inView ? { opacity: 1, y: 0 } : {}}
          transition={{ duration: 0.7, delay: 0.25 }}
          className="grid grid-cols-3 gap-px bg-[#E5E7EB] rounded-2xl overflow-hidden border border-[#E5E7EB] mb-10"
        >
          {[
            { label: "CTR Improvement", value: "+200%" },
            { label: "Final ROAS", value: "3.2x" },
            { label: "CPA Reduction", value: "−38%" },
          ].map((m, i) => (
            <div key={i} className="bg-white py-6 text-center">
              <div className="text-2xl font-bold text-[#2563EB]">{m.value}</div>
              <div className="text-xs font-medium text-[#6B7280] mt-1">{m.label}</div>
            </div>
          ))}
        </motion.div>

        {/* Accordion sections */}
        <div className="space-y-3">
          {caseStudy.sections.map((section, i) => (
            <motion.div
              key={i}
              initial={{ opacity: 0, y: 16 }}
              animate={inView ? { opacity: 1, y: 0 } : {}}
              transition={{ duration: 0.5, delay: 0.05 * i + 0.3 }}
              className="border border-[#E5E7EB] rounded-2xl overflow-hidden"
            >
              <button
                onClick={() => setOpenIdx(openIdx === i ? null : i)}
                className="w-full flex items-center justify-between p-5 text-left bg-white hover:bg-[#F8FAFC] transition-colors cursor-pointer"
              >
                <div className="flex items-center gap-4">
                  <span className="w-7 h-7 rounded-lg bg-[#EFF6FF] text-[#2563EB] text-xs font-bold flex items-center justify-center flex-shrink-0">
                    {String(i + 1).padStart(2, "0")}
                  </span>
                  <span className="font-semibold text-[#111827]">{section.label}</span>
                </div>
                {openIdx === i ? (
                  <ChevronUp size={16} className="text-[#6B7280] flex-shrink-0" />
                ) : (
                  <ChevronDown size={16} className="text-[#6B7280] flex-shrink-0" />
                )}
              </button>
              <motion.div
                initial={false}
                animate={{ height: openIdx === i ? "auto" : 0, opacity: openIdx === i ? 1 : 0 }}
                transition={{ duration: 0.3, ease: [0.22, 1, 0.36, 1] }}
                className="overflow-hidden"
              >
                <div className="px-5 pb-5 pt-1 text-[#6B7280] leading-relaxed border-t border-[#E5E7EB]">
                  {section.content}
                </div>
              </motion.div>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  );
}
