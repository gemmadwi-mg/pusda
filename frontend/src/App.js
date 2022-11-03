import './App.css';
import { BrowserRouter, Routes, Route, Link} from 'react-router-dom';
import { Home } from './pages/home';
import { Dashboard } from './pages/dashboard';
import { DashboardUPT } from './pages/dashboardUPT';
import { TambahTanahBagian } from './pages/tambahTanahBagian';
import { DetailTanah } from './pages/detailTanah';
import { TanahBagian } from './pages/informasiTanahBagian';
import { TambahInduk } from './pages/tambahTanahInduk';
import { EditTanahInduk } from './pages/editTanahInduk';
import { LupaPassword } from './pages/lupaPassword';
import { EditTanahBagian } from './pages/editTanahBagian';


function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<Home />} />
        <Route path="/lupa-password" element={<LupaPassword />} />
        <Route path="/dashboard" element={<Dashboard />} />
        <Route path='/dashboard/:id' element={<DashboardUPT />} />
        <Route path="/dashboard/tambah" element={<TambahInduk />} />
        <Route path="/dashboard/upt/edit-tanah-induk" element={<EditTanahInduk />} />
        <Route path="/dashboard/upt/detail" element={<DetailTanah />} />
        <Route path="/dashboard/upt/detail/tanah-bagian" element={<TanahBagian />} />
        <Route path="/dashboard/upt/detail/tanah-bagian/tambah" element={<TambahTanahBagian />} />
        <Route path="/dashboard/upt/detail/tanah-bagian/edit" element={<EditTanahBagian />} />
        <Route path="/dashboard/edit" element={<EditTanahInduk />} />
        <Route path="*" element={
        <div className='text-center'>
          <h3>404 Not Found</h3>
          <Link to="/dashboard">Go to Dashboard</Link>
        </div>
        } />
      </Routes>
    </BrowserRouter>
  );
}

export default App;
