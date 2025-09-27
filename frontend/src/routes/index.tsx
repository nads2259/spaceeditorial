import { Routes, Route } from 'react-router-dom';
import MainLayout from '../components/MainLayout';
import HomePage from '../pages/HomePage';
import SearchPage from '../pages/SearchPage';
import CategoryPage from '../pages/CategoryPage';
import BlogDetailPage from '../pages/BlogDetailPage';

function AppRoutes() {
  return (
    <Routes>
      <Route element={<MainLayout />}>
        <Route path="/" element={<HomePage />} />
        <Route path="/search" element={<SearchPage />} />
        <Route path="/category/:categorySlug" element={<CategoryPage />} />
        <Route path="/category/:categorySlug/:subcategorySlug" element={<CategoryPage />} />
        <Route path="/blog/:slug" element={<BlogDetailPage />} />
      </Route>
    </Routes>
  );
}

export default AppRoutes;
