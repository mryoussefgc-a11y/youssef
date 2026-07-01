import type { Metadata } from "next";
import "./globals.css";

export const metadata: Metadata = {
  title: "Youssef | Performance Marketing & Media Buyer",
  description: "Senior Performance Marketer & Media Buyer specializing in Meta Ads, Google Ads, Lead Generation, and CRO. Helping brands scale with data-driven marketing strategies.",
  keywords: "performance marketing, media buyer, meta ads, google ads, lead generation, CRO, digital marketing",
  openGraph: {
    title: "Youssef | Performance Marketing & Media Buyer",
    description: "Senior Performance Marketer & Media Buyer specializing in Meta Ads, Google Ads, Lead Generation, and CRO.",
    type: "website",
  },
};

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html lang="en" className="h-full antialiased">
      <body className="min-h-full flex flex-col bg-white text-[#111827]">{children}</body>
    </html>
  );
}
