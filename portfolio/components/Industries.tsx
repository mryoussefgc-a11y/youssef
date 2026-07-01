"use client";

import { motion } from "framer-motion";
import { useInView } from "framer-motion";
import { useRef } from "react";
import { Home, Cpu, Baby, Tv, Sun, Heart, GraduationCap, MapPin } from "lucide-react";

const industries = [
  {
    icon: Home,
    name: "Real Estate",
    desc: "Lead generation and buyer/seller funnels for agents and developers.",
    color: "from-amber-50 to-orange-50",
    border: "border-amber-100",
    iconBg: "bg-amber-100",
    iconColor: "text-amber-600",
  },
  {
    icon: Cpu,
    name: "SaaS",
    desc: "Trial signups, MRR growth, and retention marketing for software products.",
    color: "from-blue-50 to-indigo-50",
    border: "border-blue-100",
    iconBg: "bg-blue-100",
    iconColor: "text-blue-600",
  },
  {
    icon: Baby,
    name: "Baby & Parenting",
    desc: "Emotional-driven campaigns for new parents with trust-building creative.",
    color: "from-pink-50 to-rose-50",
    border: "border-pink-100",
    iconBg: "bg-pink-100",
    iconColor: "text-pink-500",
  },
  {
    icon: Tv,
    name: "IPTV",
    desc: "Subscription funnels and audience targeting for streaming services.",
    color: "from-purple-50 to-violet-50",
    border: "border-purple-100",
    iconBg: "bg-purple-100",
    iconColor: "text-purple-600",
  },
  {
    icon: Sun,
    name: "Solar Energy",
    desc: "High-intent lead generation and educational ad campaigns for solar installers.",
    color: "from-yellow-50 to-amber-50",
    border: "border-yellow-100",
    iconBg: "bg-yellow-100",
    iconColor: "text-yellow-600",
  },
  {
    icon: Heart,
    name: "Healthcare",
    desc: "Compliant, compassionate advertising for clinics and health brands.",
    color: "from-red-50 to-rose-50",
    border: "border-red-100",
    iconBg: "bg-red-100",
    iconColor: "text-red-500",
  },
  {
    icon: GraduationCap,
    name: "Education",
    desc: "Course sales, webinar funnels, and enrollment campaigns for ed-tech.",
    color: "from-teal-50 to-emerald-50",
    border: "border-teal-100",
    iconBg: "bg-teal-100",
    iconColor: "text-teal-600",
  },
  {
    icon: MapPin,
    name: "Local Businesses",
    desc: "Geo-targeted campaigns that drive foot traffic and local leads.",
    color: "from-slate-50 to-gray-50",
    border: "border-slate-100",
    iconBg: "bg-slate-100",
    iconColor: "text-slate-600",
  },
];

export default function Industries() {
  const ref = useRef(null);
  const inView = useInView(ref, { once: true, margin: "-80px" });

  return (
    <section id="research" ref={ref} className="py-32 bg-[#F8FAFC]">
      <div className="max-w-6xl mx-auto px-6">
        <div className="text-center mb-20">
          <motion.div
            initial={{ opacity: 0, y: 20 }}
            animate={inView ? { opacity: 1, y: 0 } : {}}
            transition={{ duration: 0.6 }}
            className="inline-flex items-center gap-2 px-3 py-1.5 bg-white border border-[#E5E7EB] rounded-full mb-5"
          >
            <span className="text-xs font-semibold text-[#6B7280] tracking-wider uppercase">Industries</span>
          </motion.div>
          <motion.h2
            initial={{ opacity: 0, y: 20 }}
            animate={inView ? { opacity: 1, y: 0 } : {}}
            transition={{ duration: 0.7, delay: 0.1 }}
            className="text-[clamp(2rem,4vw,3rem)] font-extrabold text-[#111827] tracking-tight mb-4"
          >
            Deep expertise across markets.
          </motion.h2>
          <motion.p
            initial={{ opacity: 0, y: 20 }}
            animate={inView ? { opacity: 1, y: 0 } : {}}
            transition={{ duration: 0.7, delay: 0.2 }}
            className="text-[#6B7280] text-lg max-w-xl mx-auto"
          >
            Every industry has its own language. I learn it before running a single ad.
          </motion.p>
        </div>

        <div className="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
          {industries.map((ind, i) => (
            <motion.div
              key={i}
              initial={{ opacity: 0, y: 24 }}
              animate={inView ? { opacity: 1, y: 0 } : {}}
              transition={{ duration: 0.6, delay: 0.05 * i, ease: [0.22, 1, 0.36, 1] }}
              whileHover={{ y: -6, boxShadow: "0 16px 48px rgba(0,0,0,0.1)" }}
              className={`group bg-gradient-to-br ${ind.color} border ${ind.border} rounded-2xl p-6 transition-all duration-300 cursor-default`}
            >
              <div className={`w-11 h-11 ${ind.iconBg} rounded-xl flex items-center justify-center mb-4`}>
                <ind.icon size={20} className={ind.iconColor} />
              </div>
              <h3 className="font-bold text-[#111827] mb-2">{ind.name}</h3>
              <p className="text-sm text-[#6B7280] leading-relaxed">{ind.desc}</p>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  );
}
