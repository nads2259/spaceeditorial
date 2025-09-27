import { Outlet } from 'react-router-dom';
import Header from './navigation/Header';
import Footer from './navigation/Footer';

function MainLayout() {
  return (
    <div className="min-h-screen flex flex-col bg-brand-light">
      <Header />
      <main className="flex-1">
        <div className="mx-auto flex max-w-7xl flex-col px-4 sm:px-6 lg:px-8">
          <Outlet />
        </div>
      </main>
      <Footer />
    </div>
  );
}

export default MainLayout;
