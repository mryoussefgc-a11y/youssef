"use client";

import { motion } from "framer-motion";
import { useInView } from "framer-motion";
import { useRef } from "react";
import { MessageSquare, AlertTriangle, ShoppingBag, Lightbulb } from "lucide-react";

const sources = [
  { name: "Reddit", color: "#FF4500", bg: "#FFF4F0", desc: "Organic conversations, honest opinions, niche communities" },
  { name: "Trustpilot", color: "#00B67A", bg: "#F0FBF6", desc: "Verified reviews with detailed buying journeys" },
  { name: "Amazon Reviews", color: "#FF9900", bg: "#FFFBF0", desc: "High-volume product feedback and star distribution analysis" },
  { name: "Google Reviews", color: "#4285F4", bg: "#F0F5FF", desc: "Local trust signals and recurring themes" },
  { name: "Facebook Groups", color: "#1877F2", bg: "#EEF5FF", desc: "Community Q&A and peer-to-peer recommendations" },
  { name: "YouTube Comments", color: "#FF0000", bg: "#FFF0F0", desc: "Emotional reactions and deep engagement signals" },
];

const insights = [
  {
    icon: AlertTriangle,
    title: "Pain Points",
    items: ["Unreliable providers breaking trust", "Complex cancellation processes", "Hidden fees discovered post-purchase", "Poor customer support response times"],
    color: "text-red-500",
    bg: "bg-red-50",
    border: "border-red-100",
  },
  {
    icon: MessageSquare,
    title: "Objections",
    items: ["'Is this even legal?'", "'Will it work on my device?'", "'What if the quality is bad?'", "'I've been burned before by similar services'"],
    color: "text-amber-600",
    bg: "bg-amber-50",
    border: "border-amber-100",
  },
  {
    icon: ShoppingBag,
    title: "Buying Triggers",
    items: ["Free trial with no credit card", "Social proof from community", "Large content library emphasized", "Simple setup and onboarding"],
    color: "text-blue-600",
    bg: "bg-blue-50",
    border: "border-blue-100",
  },
  {
    icon: Lightbulb,
    title: "Key Insights",
    items: ["Reliability beats price in decision-making", "Community trust is the #1 conversion lever", "Technical ease removes the biggest objection", "'Cancel anytime' doubles trial signups"],
    color: "text-purple-600",
    bg: "bg-purple-50",
    border: "border-purple-100",
  },
];

export default function CustomerResearch() {
  const ref = useRef(null);
  const inView = useInView(ref, { once: true, margin: "-80px" });

  return (
    <section id="customer-research" ref={ref} className="py-32 bg-[#F8FAFC]">
      <div className="max-w-6xl mx-auto px-6">
        <div className="text-center mb-20">
          <motion.div
            initial={{ opacity: 0, y: 20 }}
            animate={inView ? { opacity: 1, y: 0 } : {}}
            transition={{ duration: 0.6 }}
            className="inline-flex items-center gap-2 px-3 py-1.5 bg-white border border-[#E5E7EB] rounded-full mb-5"
          >
            <span className="text-xs font-semibold text-[#6B7280] tracking-wider uppercase">Customer Research</span>
          </motion.div>
          <motion.h2
            initial={{ opacity: 0, y: 20 }}
            animate={inView ? { opacity: 1, y: 0 } : {}}
            transition={{ duration: 0.7, delay: 0.1 }}
            className="text-[clamp(2rem,4vw,3rem)] font-extrabold text-[#111827] tracking-tight mb-4"
          >
            I listen before I speak.
          </motion.h2>
          <motion.p
            initial={{ opacity: 0, y: 20 }}
            animate={inView ? { opacity: 1, y: 0 } : {}}
            transition={{ duration: 0.7, delay: 0.2 }}
            className="text-[#6B7280] text-lg max-w-xl mx-auto"
          >
            Great marketing starts with understanding real people — their fears, desires, and exact words.
          </motion.p>
        </div>

        {/* Sources */}
        <div className="grid grid-cols-2 md:grid-cols-3 gap-4 mb-14">
          {sources.map((source, i) => (
            <motion.div
              key={i}
              initial={{ opacity: 0, y: 20 }}
              animate={inView ? { opacity: 1, y: 0 } : {}}
              transition={{ duration: 0.5, delay: 0.05 * i + 0.1 }}
              whileHover={{ y: -3 }}
              className="bg-white border border-[#E5E7EB] rounded-2xl p-5 transition-all duration-200"
            >
              <div
                className="inline-block px-3 py-1 rounded-lg text-xs font-bold mb-3"
                style={{ background: source.bg, color: source.color }}
              >
                {source.name}
              </div>
              <p className="text-xs text-[#6B7280] leading-relaxed">{source.desc}</p>
            </motion.div>
          ))}
        </div>

        {/* Insights grid */}
        <div className="grid sm:grid-cols-2 gap-5">
          {insights.map((insight, i) => (
            <motion.div
              key={i}
              initial={{ opacity: 0, y: 24 }}
              animate={inView ? { opacity: 1, y: 0 } : {}}
              transition={{ duration: 0.6, delay: 0.1 * i + 0.3 }}
              whileHover={{ y: -4, boxShadow: "0 12px 40px rgba(0,0,0,0.07)" }}
              className={`bg-white border ${insight.border} rounded-2xl p-6 transition-all duration-300`}
            >
              <div className={`w-10 h-10 ${insight.bg} rounded-xl flex items-center justify-center mb-4`}>
                <insight.icon size={18} className={insight.color} />
              </div>
              <h3 className="font-bold text-[#111827] mb-4">{insight.title}</h3>
              <ul className="space-y-2.5">
                {insight.items.map((item, j) => (
                  <li key={j} className="flex items-start gap-3 text-sm text-[#6B7280]">
                    <span className={`w-1.5 h-1.5 rounded-full mt-2 flex-shrink-0 ${insight.bg.replace("bg-", "bg-").replace("50", "400")}`}
                      style={{ background: "currentColor" }}
                    />
                    {item}
                  </li>
                ))}
              </ul>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  );
}
