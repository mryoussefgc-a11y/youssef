"use client";

import { motion } from "framer-motion";
import { useInView } from "framer-motion";
import { useRef } from "react";
import { Star } from "lucide-react";

const testimonials = [
  {
    name: "Ahmed K.",
    role: "Real Estate Agency Owner",
    text: "Youssef completely transformed our lead generation. Our cost per lead dropped by 40% in the first month, and the quality of leads improved dramatically. He doesn't just run ads — he understands the business.",
    stars: 5,
    initials: "AK",
    color: "bg-amber-100 text-amber-700",
  },
  {
    name: "Sara M.",
    role: "E-Commerce Founder, Baby Niche",
    text: "The customer research Youssef delivered was eye-opening. He uncovered angles and pain points we had never considered. Our conversion rate on the new landing page is 3x what it was before.",
    stars: 5,
    initials: "SM",
    color: "bg-pink-100 text-pink-700",
  },
  {
    name: "Karim B.",
    role: "IPTV Service — CEO",
    text: "We went from burning money on untargeted campaigns to a 3.2x ROAS in 30 days. Youssef's process is methodical, data-driven, and genuinely different from any marketer we've worked with before.",
    stars: 5,
    initials: "KB",
    color: "bg-purple-100 text-purple-700",
  },
  {
    name: "Laila F.",
    role: "SaaS Startup — Marketing Lead",
    text: "The landing page analysis was incredibly detailed. Youssef identified 12 conversion killers we had missed entirely. After implementing his recommendations, our trial signups jumped 28%.",
    stars: 5,
    initials: "LF",
    color: "bg-blue-100 text-blue-700",
  },
];

export default function Testimonials() {
  const ref = useRef(null);
  const inView = useInView(ref, { once: true, margin: "-80px" });

  return (
    <section id="testimonials" ref={ref} className="py-32 bg-[#F8FAFC]">
      <div className="max-w-6xl mx-auto px-6">
        <div className="text-center mb-20">
          <motion.div
            initial={{ opacity: 0, y: 20 }}
            animate={inView ? { opacity: 1, y: 0 } : {}}
            transition={{ duration: 0.6 }}
            className="inline-flex items-center gap-2 px-3 py-1.5 bg-white border border-[#E5E7EB] rounded-full mb-5"
          >
            <span className="text-xs font-semibold text-[#6B7280] tracking-wider uppercase">Testimonials</span>
          </motion.div>
          <motion.h2
            initial={{ opacity: 0, y: 20 }}
            animate={inView ? { opacity: 1, y: 0 } : {}}
            transition={{ duration: 0.7, delay: 0.1 }}
            className="text-[clamp(2rem,4vw,3rem)] font-extrabold text-[#111827] tracking-tight"
          >
            What clients say.
          </motion.h2>
        </div>

        <div className="grid md:grid-cols-2 gap-5">
          {testimonials.map((t, i) => (
            <motion.div
              key={i}
              initial={{ opacity: 0, y: 24 }}
              animate={inView ? { opacity: 1, y: 0 } : {}}
              transition={{ duration: 0.6, delay: 0.1 * i + 0.1 }}
              whileHover={{ y: -4, boxShadow: "0 16px 48px rgba(0,0,0,0.08)" }}
              className="bg-white border border-[#E5E7EB] rounded-2xl p-7 transition-all duration-300"
            >
              {/* Stars */}
              <div className="flex gap-1 mb-4">
                {Array.from({ length: t.stars }).map((_, j) => (
                  <Star key={j} size={14} fill="#F59E0B" className="text-amber-400" />
                ))}
              </div>

              <p className="text-[#374151] leading-relaxed mb-6 text-[15px]">&ldquo;{t.text}&rdquo;</p>

              <div className="flex items-center gap-3 pt-4 border-t border-[#E5E7EB]">
                <div className={`w-10 h-10 rounded-full ${t.color} flex items-center justify-center text-sm font-bold flex-shrink-0`}>
                  {t.initials}
                </div>
                <div>
                  <div className="font-semibold text-[#111827] text-sm">{t.name}</div>
                  <div className="text-xs text-[#6B7280]">{t.role}</div>
                </div>
              </div>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  );
}
