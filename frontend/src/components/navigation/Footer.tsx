import { Link } from 'react-router-dom';

function Footer() {
  return (
    <footer className="border-t border-slate-200 bg-white shadow-inner">
      <div className="mx-auto flex max-w-7xl items-center justify-center gap-2 px-4 py-4 text-sm text-slate-500">
        <Link to="/" className="font-medium text-brand-base hover:underline">
          © 2025 Space Editorial
        </Link>
        <span className="text-xs text-slate-300">•</span>
        <span className="text-xs text-slate-400">Curated space intelligence for decision makers.</span>
      </div>
    </footer>
  );
}

export default Footer;
