// ============================================================
// Youssef Bekkari — Portfolio
// Section order is defined here. All text/content lives in
// src/content.js — edit that file to change the website copy.
// ============================================================
import Navbar from './components/Navbar.jsx'
import Hero from './components/Hero.jsx'
import About from './components/About.jsx'
import Story from './components/Story.jsx'
import Services from './components/Services.jsx'
import Skills from './components/Skills.jsx'
import SkillChart from './components/SkillChart.jsx'
import Process from './components/Process.jsx'
import Industries from './components/Industries.jsx'
import Tools from './components/Tools.jsx'
import Work from './components/Work.jsx'
import Contact from './components/Contact.jsx'
import Footer from './components/Footer.jsx'

export default function App() {
  return (
    <div className="min-h-screen bg-base">
      <Navbar />
      <main>
        <Hero />
        <About />
        <Story />
        <Services />
        <Skills />
        <SkillChart />
        <Process />
        <Industries />
        <Tools />
        <Work />
        <Contact />
      </main>
      <Footer />
    </div>
  )
}
