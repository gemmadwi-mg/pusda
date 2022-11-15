import "./App.css";
import store from "./redux/store";
import { Provider } from "react-redux";
import { BrowserRouter, Routes, Route, Link } from "react-router-dom";
import { Login } from "./pages/Login";
import { Dashboard } from "./pages/dashboard";
import { DashboardUPT } from "./pages/dashboardUPT";
import { DetailTanah } from "./pages/detailTanahInduk";
import { TanahBagian } from "./pages/informasiTanahBagian";
import { TambahInduk } from "./pages/Tambah/tambahTanahInduk";
import { LupaPassword } from "./pages/lupaPassword";
import { DetailTanahBagian } from "./pages/detailTanahBagian";
import { EditBagianPinjamPakai } from "./pages/Edit/editBagianPinjamPakai";
import { EditTanahBagian } from "./pages/Edit/editTanahBagian";
import { EditTanahInduk } from "./pages/Edit/editTanahInduk";
import { TambahTanahBagian } from "./pages/Tambah/tambahTanahBagian";
import { TambahBagianPinjamPakai } from "./pages/Tambah/tambahBagianPinjamPakai";

function App() {
  return (
    <Provider store={store}>
      <BrowserRouter>
        <Routes>
          <Route path="/" element={<Login />} />
          <Route path="/lupa-password" element={<LupaPassword />} />
          <Route path="/dashboard" element={<Dashboard />} />
          <Route path="/upt/:id" exact={false} element={<DashboardUPT />} />
          <Route path="/upt/:id/tambah" element={<TambahInduk />} />
          <Route
            path="/upt/:id/edit-tanah-induk"
            element={<EditTanahInduk />}
          />
          <Route path="/upt/:id/detail" element={<DetailTanah />} />
          <Route
            path="/upt/:id/detail/tanah-bagian2"
            element={<DetailTanahBagian />}
          />
          <Route
            path="/upt/:id/detail/tanah-bagian"
            element={<TanahBagian />}
          />
          <Route
            path="/upt/:id/detail/tanah-bagian/tambah2"
            element={<TambahTanahBagian />}
          />
          <Route
            path="/upt/:id/detail/tanah-bagian/tambah"
            element={<TambahBagianPinjamPakai />}
          />
          <Route
            path="/upt/:id/detail/tanah-bagian/edit2"
            element={<EditTanahBagian />}
          />
          <Route
            path="/upt/:id/detail/tanah-bagian/edit"
            element={<EditBagianPinjamPakai />}
          />
          <Route path="/edit" element={<EditTanahInduk />} />
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
    </Provider>
  );
}

export default App;
