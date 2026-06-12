/** @type {import('tailwindcss').Config} */

// ============================================================
// 🎨 BRAND COLORS — change your brand colors here
// ============================================================
export default {
  content: ['./index.html', './src/**/*.{js,jsx}'],
  theme: {
    extend: {
      colors: {
        // Backgrounds
        'base': '#050505',        // main page background
        'surface': '#0B0F19',     // alternate section background
        // Text
        'primary': '#FFFFFF',     // main text
        'secondary': '#A1A1AA',   // secondary / muted text
        // Accents
        'accent': '#2563EB',      // primary accent (buttons, highlights)
        'accent-soft': '#38BDF8', // soft accent (gradients, glows)
      },
      fontFamily: {
        // Font is loaded in index.html — change it there too if needed
        sans: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
      },
      backgroundImage: {
        'glow': 'radial-gradient(ellipse at center, rgba(37,99,235,0.15), transparent 70%)',
      },
      animation: {
        'fade-in': 'fadeIn 0.8s ease-out forwards',
      },
      keyframes: {
        fadeIn: {
          '0%': { opacity: '0', transform: 'translateY(20px)' },
          '100%': { opacity: '1', transform: 'translateY(0)' },
        },
      },
    },
  },
  plugins: [],
}
