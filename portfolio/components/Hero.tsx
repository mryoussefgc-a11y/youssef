"use client";

import { motion, useScroll, useTransform } from "framer-motion";
import { ArrowDown, Download, ExternalLink } from "lucide-react";
import { useRef } from "react";

const stats = [
  { value: "50+", label: "Campaigns Launched" },
  { value: "3x", label: "Avg. ROAS Delivered" },
  { value: "8", label: "Industries Covered" },
  { value: "100%", label: "Data-Driven" },
];

export default function Hero() {
  const ref = useRef<HTMLElement>(null);
  const { scrollYProgress } = useScroll({ target: ref, offset: ["start start", "end start"] });
  const y = useTransform(scrollYProgress, [0, 1], [0, 80]);
  const opacity = useTransform(scrollYProgress, [0, 0.6], [1, 0]);

  return (
    <section ref={ref} className="relative min-h-screen flex flex-col items-center justify-center overflow-hidden bg-white pt-16">
      {/* Subtle grid background */}
      <div
        className="absolute inset-0 opacity-[0.025]"
        style={{
          backgroundImage: `
            linear-gradient(#111827 1px, transparent 1px),
            linear-gradient(90deg, #111827 1px, transparent 1px)
          `,
          backgroundSize: "64px 64px",
        }}
      />

      {/* Subtle radial glow */}
      <div className="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] rounded-full bg-[#EFF6FF] opacity-60 blur-3xl pointer-events-none" />

      <motion.div
        style={{ y, opacity }}
        className="relative z-10 max-w-5xl mx-auto px-6 text-center"
      >
        {/* Badge */}
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.6, ease: [0.22, 1, 0.36, 1] }}
          className="inline-flex items-center gap-2 px-4 py-2 bg-[#EFF6FF] border border-[#BFDBFE] rounded-full mb-8"
        >
          <span className="w-2 h-2 rounded-full bg-[#2563EB] animate-pulse" />
          <span className="text-sm font-medium text-[#1D4ED8]">Available for new projects</span>
        </motion.div>

        {/* Main headline */}
        <motion.h1
          initial={{ opacity: 0, y: 30 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8, delay: 0.1, ease: [0.22, 1, 0.36, 1] }}
          className="text-[clamp(2.5rem,6vw,5rem)] font-extrabold text-[#111827] tracking-tight leading-[1.08] mb-6"
        >
          Performance Marketing
          <br />
          <span className="text-[#2563EB]">That Actually Scales.</span>
        </motion.h1>

        {/* Sub headline */}
        <motion.p
          initial={{ opacity: 0, y: 20 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8, delay: 0.2, ease: [0.22, 1, 0.36, 1] }}
          className="text-[clamp(1rem,2vw,1.25rem)] text-[#6B7280] max-w-2xl mx-auto mb-10 leading-relaxed"
        >
          I help brands grow through data-driven paid media, deep market research,
          and conversion-focused strategy — from first ad to profitable scale.
        </motion.p>

        {/* CTA Buttons */}
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8, delay: 0.3, ease: [0.22, 1, 0.36, 1] }}
          className="flex flex-wrap items-center justify-center gap-4 mb-20"
        >
          <motion.a
            href="#projects"
            onClick={(e) => { e.preventDefault(); document.querySelector("#projects")?.scrollIntoView({ behavior: "smooth" }); }}
            whileHover={{ scale: 1.04, boxShadow: "0 8px 30px rgba(37,99,235,0.3)" }}
            whileTap={{ scale: 0.97 }}
            className="inline-flex items-center gap-2 px-7 py-3.5 bg-[#2563EB] text-white font-semibold rounded-2xl cursor-pointer transition-colors hover:bg-[#1D4ED8]"
          >
            <ExternalLink size={16} />
            View Projects
          </motion.a>
          <motion.a
            href="/cv.pdf"
            whileHover={{ scale: 1.04 }}
            whileTap={{ scale: 0.97 }}
            className="inline-flex items-center gap-2 px-7 py-3.5 bg-white text-[#111827] font-semibold rounded-2xl border border-[#E5E7EB] cursor-pointer hover:border-[#2563EB] hover:text-[#2563EB] transition-colors shadow-sm"
          >
            <Download size={16} />
            Download CV
          </motion.a>
        </motion.div>

        {/* Stats Row */}
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8, delay: 0.45, ease: [0.22, 1, 0.36, 1] }}
          className="grid grid-cols-2 md:grid-cols-4 gap-px bg-[#E5E7EB] rounded-2xl overflow-hidden border border-[#E5E7EB]"
        >
          {stats.map((stat, i) => (
            <motion.div
              key={i}
              whileHover={{ backgroundColor: "#F8FAFC" }}
              className="bg-white px-6 py-5 text-center transition-colors"
            >
              <div className="text-3xl font-bold text-[#111827] tracking-tight">{stat.value}</div>
              <div className="text-xs font-medium text-[#6B7280] mt-1">{stat.label}</div>
            </motion.div>
          ))}
        </motion.div>
      </motion.div>

      {/* Scroll indicator */}
      <motion.div
        initial={{ opacity: 0 }}
        animate={{ opacity: 1 }}
        transition={{ delay: 1.2 }}
        className="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2"
      >
        <span className="text-xs font-medium text-[#9CA3AF] tracking-wider uppercase">Scroll</span>
        <motion.div
          animate={{ y: [0, 6, 0] }}
          transition={{ repeat: Infinity, duration: 1.6, ease: "easeInOut" }}
        >
          <ArrowDown size={16} className="text-[#9CA3AF]" />
        </motion.div>
      </motion.div>
    </section>
  );
}
