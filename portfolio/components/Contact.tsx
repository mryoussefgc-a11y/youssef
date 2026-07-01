"use client";

import { motion } from "framer-motion";
import { useInView } from "framer-motion";
import { useRef } from "react";
import { Mail, Phone, Download, ArrowRight, ExternalLink } from "lucide-react";

const contactItems = [
  {
    icon: Mail,
    label: "Email",
    value: "hello@youssef.com",
    href: "mailto:hello@youssef.com",
  },
  {
    icon: ExternalLink,
    label: "LinkedIn",
    value: "linkedin.com/in/youssef",
    href: "https://linkedin.com/in/youssef",
  },
  {
    icon: Phone,
    label: "WhatsApp",
    value: "+212 600 000 000",
    href: "https://wa.me/212600000000",
  },
];

export default function Contact() {
  const ref = useRef(null);
  const inView = useInView(ref, { once: true, margin: "-80px" });

  return (
    <section id="contact" ref={ref} className="py-32 bg-white">
      <div className="max-w-4xl mx-auto px-6">
        {/* CTA Banner */}
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          animate={inView ? { opacity: 1, y: 0 } : {}}
          transition={{ duration: 0.8, ease: [0.22, 1, 0.36, 1] }}
          className="relative overflow-hidden bg-[#111827] rounded-3xl p-10 md:p-14 mb-14 text-center"
        >
          {/* Subtle grid */}
          <div
            className="absolute inset-0 opacity-[0.04]"
            style={{
              backgroundImage: `
                linear-gradient(white 1px, transparent 1px),
                linear-gradient(90deg, white 1px, transparent 1px)
              `,
              backgroundSize: "40px 40px",
            }}
          />
          {/* Glow */}
          <div className="absolute top-0 left-1/2 -translate-x-1/2 w-96 h-48 bg-[#2563EB] opacity-20 blur-3xl rounded-full" />

          <div className="relative z-10">
            <motion.div
              initial={{ opacity: 0, y: 10 }}
              animate={inView ? { opacity: 1, y: 0 } : {}}
              transition={{ delay: 0.2 }}
              className="inline-flex items-center gap-2 px-3 py-1.5 bg-white/10 border border-white/20 rounded-full mb-6"
            >
              <span className="w-2 h-2 rounded-full bg-[#4ADE80] animate-pulse" />
              <span className="text-sm font-medium text-white/80">Available for new projects</span>
            </motion.div>
            <h2 className="text-4xl md:text-5xl font-extrabold text-white tracking-tight mb-4">
              Ready to scale?
            </h2>
            <p className="text-lg text-white/60 max-w-xl mx-auto mb-8">
              Let&apos;s build a marketing system that turns every dollar into measurable growth.
            </p>
            <motion.a
              href="mailto:hello@youssef.com"
              whileHover={{ scale: 1.04, boxShadow: "0 8px 32px rgba(37,99,235,0.5)" }}
              whileTap={{ scale: 0.97 }}
              className="inline-flex items-center gap-2 px-8 py-4 bg-[#2563EB] text-white font-bold rounded-2xl transition-all cursor-pointer"
            >
              Start a Conversation <ArrowRight size={18} />
            </motion.a>
          </div>
        </motion.div>

        {/* Contact links */}
        <div className="grid md:grid-cols-3 gap-4 mb-8">
          {contactItems.map((item, i) => (
            <motion.a
              key={i}
              href={item.href}
              initial={{ opacity: 0, y: 20 }}
              animate={inView ? { opacity: 1, y: 0 } : {}}
              transition={{ duration: 0.5, delay: 0.1 * i + 0.3 }}
              whileHover={{ y: -4, boxShadow: "0 12px 40px rgba(0,0,0,0.08)" }}
              className="flex items-center gap-4 p-5 bg-[#F8FAFC] border border-[#E5E7EB] rounded-2xl hover:border-[#BFDBFE] hover:bg-[#EFF6FF] transition-all duration-300 group cursor-pointer"
            >
              <div className="w-10 h-10 bg-white border border-[#E5E7EB] rounded-xl flex items-center justify-center flex-shrink-0 group-hover:border-[#2563EB] transition-colors duration-300">
                <item.icon size={18} className="text-[#6B7280] group-hover:text-[#2563EB] transition-colors duration-300" />
              </div>
              <div>
                <div className="text-xs font-medium text-[#9CA3AF]">{item.label}</div>
                <div className="text-sm font-semibold text-[#111827] group-hover:text-[#2563EB] transition-colors duration-300">{item.value}</div>
              </div>
            </motion.a>
          ))}
        </div>

        {/* Download CV */}
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          animate={inView ? { opacity: 1, y: 0 } : {}}
          transition={{ duration: 0.5, delay: 0.5 }}
          className="text-center"
        >
          <motion.a
            href="/cv.pdf"
            whileHover={{ scale: 1.03 }}
            whileTap={{ scale: 0.97 }}
            className="inline-flex items-center gap-2 px-7 py-3.5 bg-white text-[#111827] font-semibold rounded-2xl border border-[#E5E7EB] cursor-pointer hover:border-[#2563EB] hover:text-[#2563EB] transition-colors shadow-sm"
          >
            <Download size={16} />
            Download Resume
          </motion.a>
        </motion.div>
      </div>
    </section>
  );
}
