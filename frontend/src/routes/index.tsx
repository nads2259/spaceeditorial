import { Routes, Route } from 'react-router-dom';
import MainLayout from '../components/MainLayout';
import HomePage from '../pages/HomePage';
import SearchPage from '../pages/SearchPage';
import CategoryPage from '../pages/CategoryPage';
import BlogDetailPage from '../pages/BlogDetailPage';
import ContactPage from '../pages/ContactPage';
import LoginPage from '../pages/LoginPage';
import RegisterPage from '../pages/RegisterPage';
import SubscribePage from '../pages/SubscribePage';
import PrivacyPolicyPage from '../pages/PrivacyPolicyPage';
import TermsPage from '../pages/TermsPage';

function AppRoutes() {
  return (
    <Routes>
      <Route element={<MainLayout />}>
        <Route path="/" element={<HomePage />} />
        <Route path="/search" element={<SearchPage />} />
        <Route path="/category/:categorySlug" element={<CategoryPage />} />
        <Route path="/category/:categorySlug/:subcategorySlug" element={<CategoryPage />} />
        <Route path="/blog/:slug" element={<BlogDetailPage />} />
        <Route path="/contact" element={<ContactPage />} />
        <Route path="/login" element={<LoginPage />} />
        <Route path="/register" element={<RegisterPage />} />
        <Route path="/subscribe" element={<SubscribePage />} />
        <Route path="/privacy" element={<PrivacyPolicyPage />} />
        <Route path="/terms" element={<TermsPage />} />
      </Route>
    </Routes>
  );
}

export default AppRoutes;
