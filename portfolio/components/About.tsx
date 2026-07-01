"use client";

import { motion } from "framer-motion";
import { useInView } from "framer-motion";
import { useRef } from "react";
import { Target, TrendingUp, Brain, Users } from "lucide-react";

const ease = [0.22, 1, 0.36, 1] as [number, number, number, number];

const fadeUp = {
  hidden: { opacity: 0, y: 32 },
  visible: (i: number) => ({
    opacity: 1,
    y: 0,
    transition: { duration: 0.7, delay: i * 0.12, ease },
  }),
};

const principles = [
  {
    icon: Brain,
    title: "Research First",
    desc: "Every decision starts with deep market understanding, not assumptions.",
  },
  {
    icon: Target,
    title: "Precision Targeting",
    desc: "Reach the right audience at the right moment with the right message.",
  },
  {
    icon: TrendingUp,
    title: "Data-Driven Scaling",
    desc: "Scale what works, cut what doesn't — relentlessly and systematically.",
  },
  {
    icon: Users,
    title: "Customer-Centric",
    desc: "Every ad, copy, and page speaks directly to real customer pain points.",
  },
];

export default function About() {
  const ref = useRef(null);
  const inView = useInView(ref, { once: true, margin: "-100px" });

  return (
    <section id="about" ref={ref} className="py-32 bg-white">
      <div className="max-w-6xl mx-auto px-6">
        <div className="grid lg:grid-cols-2 gap-16 items-center">
          {/* Left: text */}
          <div>
            <motion.div
              custom={0}
              variants={fadeUp}
              initial="hidden"
              animate={inView ? "visible" : "hidden"}
              className="inline-flex items-center gap-2 px-3 py-1.5 bg-[#F8FAFC] border border-[#E5E7EB] rounded-full mb-5"
            >
              <span className="text-xs font-semibold text-[#6B7280] tracking-wider uppercase">About Me</span>
            </motion.div>

            <motion.h2
              custom={1}
              variants={fadeUp}
              initial="hidden"
              animate={inView ? "visible" : "hidden"}
              className="text-[clamp(2rem,4vw,3rem)] font-extrabold text-[#111827] tracking-tight leading-tight mb-6"
            >
              I turn ad spend into
              <br />
              <span className="text-[#2563EB]">predictable revenue.</span>
            </motion.h2>

            <motion.p
              custom={2}
              variants={fadeUp}
              initial="hidden"
              animate={inView ? "visible" : "hidden"}
              className="text-lg text-[#6B7280] leading-relaxed mb-6"
            >
              I&apos;m a Performance Marketing specialist and Media Buyer with hands-on experience
              across Meta Ads, Google Ads, and multi-channel paid strategies. I combine deep
              customer research with sharp creative direction and relentless optimization to
              build marketing systems that scale.
            </motion.p>

            <motion.p
              custom={3}
              variants={fadeUp}
              initial="hidden"
              animate={inView ? "visible" : "hidden"}
              className="text-lg text-[#6B7280] leading-relaxed mb-10"
            >
              My approach is simple: understand the market better than anyone else,
              build an irresistible offer, and then distribute it to exactly the right people
              at the right cost.
            </motion.p>

            <motion.div
              custom={4}
              variants={fadeUp}
              initial="hidden"
              animate={inView ? "visible" : "hidden"}
              className="flex flex-wrap gap-2"
            >
              {["Meta Ads", "Google Ads", "Lead Gen", "CRO", "Copywriting", "Analytics"].map((tag) => (
                <span
                  key={tag}
                  className="px-3 py-1.5 text-sm font-medium text-[#2563EB] bg-[#EFF6FF] border border-[#BFDBFE] rounded-full"
                >
                  {tag}
                </span>
              ))}
            </motion.div>
          </div>

          {/* Right: principles grid */}
          <div className="grid grid-cols-2 gap-4">
            {principles.map((p, i) => (
              <motion.div
                key={i}
                custom={i + 2}
                variants={fadeUp}
                initial="hidden"
                animate={inView ? "visible" : "hidden"}
                whileHover={{ y: -4, boxShadow: "0 12px 40px rgba(0,0,0,0.08)" }}
                className="p-6 bg-[#F8FAFC] border border-[#E5E7EB] rounded-2xl transition-all duration-300"
              >
                <div className="w-10 h-10 rounded-xl bg-[#EFF6FF] flex items-center justify-center mb-4">
                  <p.icon size={20} className="text-[#2563EB]" />
                </div>
                <h3 className="font-bold text-[#111827] mb-2">{p.title}</h3>
                <p className="text-sm text-[#6B7280] leading-relaxed">{p.desc}</p>
              </motion.div>
            ))}
          </div>
        </div>
      </div>
    </section>
  );
}
