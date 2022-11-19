import "./App.css";
import { Provider } from "react-redux";
import { BrowserRouter, Routes, Route, Link } from "react-router-dom";
import { Login } from "./pages/Login";
import { LupaPassword } from "./pages/lupaPassword";
import { DashboardAdmin } from "./pages/Admin/dashboardAdmin";
import { TanahIndukAdmin } from "./pages/Admin/tanahIndukAdmin";
import { DetailIndukAdmin } from "./pages/Admin/detailIndukAdmin";
import { DetailBagianSrAdmin } from "./pages/Admin/detailBagianSrAdmin";
import { DetailBagianPppsAdmin } from "./pages/Admin/detailBagianPppsAdmin";
import { TambahIndukAdmin } from "./pages/Admin/TambahAdmin/tambahIndukAdmin";
import { EditBagianSrAdmin } from "./pages/Admin/EditAdmin/editBagianSrAdmin";
import { EditBagianPppsAdmin } from "./pages/Admin/EditAdmin/editBagianPppsAdmin";
import { TambahBagianSrAdmin } from "./pages/Admin/TambahAdmin/tambahBagianSrAdmin";
import { TambahBagianPppsAdmin } from "./pages/Admin/TambahAdmin/tambahBagianPppsAdmin";
import { EditIndukAdmin } from "./pages/Admin/EditAdmin/editIndukAdmin";
import { DashboardUPT } from "./pages/UPT/dashboardUPT";
import { TanahIndukUPT } from "./pages/UPT/tanahIndukUPT";
import { DetailIndukUPT } from "./pages/UPT/detailIndukUPT";
import { TambahIndukUPT } from "./pages/UPT/TambahUPT/tambaIndukUPT";
import { EditIndukUPT } from "./pages/UPT/EditUPT/editIndukUPT";
import { DetailBagianSrUPT } from "./pages/UPT/detailBagianSrUPT";
import { TambahBagianSrUPT } from "./pages/UPT/TambahUPT/tambahBagianSrUPT";
import { EditBagianSrUPT } from "./pages/UPT/EditUPT/editBagianSrUPT";
import { DetailBagianPppsUPT } from "./pages/UPT/detailBagianPppsUPT";
import { TambahBagianPppsUPT } from "./pages/UPT/TambahUPT/tambahBagianPppsUPT";
import { EditBagianPppsUPT } from "./pages/UPT/EditUPT/editBagianPppsUPT";

function App() {
  return (
      <BrowserRouter>
        <Routes>
          <Route path="/" element={<Login />} />
          <Route path="/lupa-password" element={<LupaPassword />} />
          
          <Route path="/dashboard/admin" element={<DashboardAdmin />} />
          <Route path="/upt/:id/admin" element={<TanahIndukAdmin />} />
          <Route path="/upt/:id/admin/detail/:induk_id" element={<DetailIndukAdmin />} />
          <Route path="/upt/:id/admin/tambah-induk" element={<TambahIndukAdmin />} />
          <Route path="/upt/:id/admin/edit-induk" element={<EditIndukAdmin />} />
          <Route path="/upt/:id/admin/detail/tanah-bagian-sr" element={<DetailBagianSrAdmin />} />
          <Route path="/upt/:id/admin/detail/tambah-bagian-sr" element={<TambahBagianSrAdmin />} />
          <Route path="/upt/:id/admin/detail/tanah-bagian-sr/edit" element={<EditBagianSrAdmin />} />
          <Route path="/upt/:id/admin/detail/tanah-bagian-ppps" element={<DetailBagianPppsAdmin />} />
          <Route path="/upt/:id/admin/detail/tambah-bagian-ppps" element={<TambahBagianPppsAdmin />} />
          <Route path="/upt/:id/admin/detail/tanah-bagian-ppps/edit" element={<EditBagianPppsAdmin />} />

          <Route path="/dashboard/UPT" element={<DashboardUPT />} />
          <Route path="/upt/:id/UPT" element={<TanahIndukUPT />} />
          <Route path="/upt/:id/UPT/detail" element={<DetailIndukUPT />} />
          <Route path="/upt/:id/UPT/tambah-induk" element={<TambahIndukUPT />} />
          <Route path="/upt/:id/UPT/edit-induk" element={<EditIndukUPT />} />
          <Route path="/upt/:id/UPT/detail/tanah-bagian-sr" element={<DetailBagianSrUPT />} />
          <Route path="/upt/:id/UPT/detail/tambah-bagian-sr" element={<TambahBagianSrUPT />} />
          <Route path="/upt/:id/UPT/detail/tanah-bagian-sr/edit" element={<EditBagianSrUPT />} />
          <Route path="/upt/:id/UPT/detail/tanah-bagian-ppps" element={<DetailBagianPppsUPT />} />
          <Route path="/upt/:id/UPT/detail/tambah-bagian-ppps" element={<TambahBagianPppsUPT />} />
          <Route path="/upt/:id/UPT/detail/tanah-bagian-ppps/edit" element={<EditBagianPppsUPT />} />

          <Route
            path="*"
            element={
              <div className="text-center">
                <h3>404 Not Found</h3>
                <Link to="/dashboard">Go to Dashboard</Link>
              </div>
            }
          />
        </Routes>
      </BrowserRouter>
  );
}

export default App;
