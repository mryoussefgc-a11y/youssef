import Navbar from "@/components/Navbar";
import Hero from "@/components/Hero";
import About from "@/components/About";
import Process from "@/components/Process";
import Skills from "@/components/Skills";
import Industries from "@/components/Industries";
import Tools from "@/components/Tools";
import Projects from "@/components/Projects";
import CaseStudies from "@/components/CaseStudies";
import CreativeAnalysis from "@/components/CreativeAnalysis";
import CustomerResearch from "@/components/CustomerResearch";
import Copywriting from "@/components/Copywriting";
import Testimonials from "@/components/Testimonials";
import Contact from "@/components/Contact";
import Footer from "@/components/Footer";

export default function Home() {
  return (
    <>
      <Navbar />
      <main>
        <Hero />
        <About />
        <Process />
        <Skills />
        <Industries />
        <Tools />
        <Projects />
        <CaseStudies />
        <CreativeAnalysis />
        <CustomerResearch />
        <Copywriting />
        <Testimonials />
        <Contact />
      </main>
      <Footer />
    </>
  );
}
