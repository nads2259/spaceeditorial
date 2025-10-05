import { Link } from 'react-router-dom';

function Footer() {
  return (
    <footer className="mt-12 border-t border-slate-200 bg-white shadow-inner">
      <div className="mx-auto flex max-w-7xl flex-col gap-3 px-4 py-6 text-sm text-slate-500 sm:flex-row sm:items-center sm:justify-between">
        <div className="flex flex-wrap items-center gap-x-3 gap-y-1 text-xs uppercase tracking-[0.2em] text-slate-400">
          <Link to="/" className="font-semibold text-brand-base">
            © {new Date().getFullYear()} Space Editorial
          </Link>
          <span className="hidden sm:inline">•</span>
          <span>Curated space intelligence for decision makers.</span>
        </div>
        <nav className="flex flex-wrap items-center gap-4 text-sm">
          <Link to="/subscribe" className="text-slate-500 transition hover:text-brand-base">
            Subscribe
          </Link>
          <Link to="/contact" className="text-slate-500 transition hover:text-brand-base">
            Contact
          </Link>
          <Link to="/privacy" className="text-slate-500 transition hover:text-brand-base">
            Privacy
          </Link>
          <Link to="/terms" className="text-slate-500 transition hover:text-brand-base">
            Terms
          </Link>
        </nav>
      </div>
    </footer>
  );
}

export default Footer;
