import { Navbar } from "../components/Navbar";
import { SideMenu } from "../components/SideMenu";
import { useNavigate, Link } from "react-router-dom";
import { TableBagian } from "../components/TableBagian";
import { DeleteConfirmation } from "../components/UPTDashboard/DeleteConfirmation";
import { useState } from "react";
import { ButtonDelete } from "../components/Button/ButtonDelete";

export const DetailTanah = () => {
  const navigate = useNavigate();
  const [show, setShow] = useState(false);

  const handleClose = () => setShow(false);
  const handleShow = () => setShow(true);

  return (
    <div className="d-flex ">
      <SideMenu />
      <div className="w-100">
        <Navbar />
        <main className="bg-light-gray h-100 ">
          <DeleteConfirmation
            show={show}
            handleClose={handleClose}
            handleShow={handleShow}
          />
          <div className="mx-3">
            <div
              className="d-flex justify-content-between align-items-center mx-3 py-3"
              style={{
                borderBottom: "#BCBCBC 1px solid",
              }}
            >
              <div
                className="font-semibold"
                style={{ cursor: "pointer" }}
                onClick={() => {
                  navigate(-1);
                }}
              >
                &larr; &emsp; Kembali
              </div>
            </div>
            <div
              className="d-flex justify-content-between mx-3"
              style={{ paddingBottom: "20px", paddingTop: "10px" }}
            >
              <h5>Informasi Tanah Induk</h5>
              <div className="d-flex gap-2">
                <ButtonDelete />
                <Link
                  to="/dashboard/upt/edit-tanah-induk"
                  className="primary-btn px-4"
                >
                  Ubah Data
                </Link>
              </div>
            </div>
            <div className="informasi-tanah">
              <div className="d-flex mx-4">
                <div className="left">
                  <h6>Sertifikat</h6>
                  <div className="d-flex gap-5">
                    <div className="left">
                      <p className="title p-0 m-0">Nomor</p>
                      <p className="font-semibold">39</p>
                    </div>
                    <div className="right">
                      <p className="title p-0 m-0">Tanggal</p>
                      <p className="font-semibold">22/08/2011</p>
                    </div>
                  </div>
                  <div>
                    <p className="title p-0 m-0">Luas Induk (m)</p>
                    <p className="font-semibold">200</p>
                  </div>
                  <div>
                    <p className="title p-0 m-0">Nilai Aset</p>
                    <p className="font-semibold">Rp39.000.000</p>
                  </div>
                </div>
                <div className="right">
                  <div>
                    <p className="title p-0 m-0">Jenis Pemanfaatan</p>
                    <p className="font-semibold">Jenis Perikatan</p>
                  </div>
                  <div>
                    <p className="title p-0 m-0">Alamat</p>
                    <p className="font-semibold">
                      Jl. TRUNOJOYO NO.3, KEPATIHAN, KEC. BOJONEGORO, JAWA TIMUR
                      62111
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div
              className="d-flex justify-content-between align-items-center mx-3 py-3"
              style={{
                borderBottom: "#BCBCBC 1px solid",
              }}
            ></div>
            <div className="mx-3">
              <div
                className="d-flex flex-row justify-content-between px-3 py-3"
                style={{ marginTop: "30px" }}
              >
                <h5>Tanah Bagian</h5>
                <div className="d-flex">
                  <input
                    className="form-control me-2 bg-none"
                    style={{ width: "200px" }}
                    type="search"
                    placeholder="Search"
                    aria-label="Search"
                  ></input>
                  <Link
                    to="/dashboard/upt/detail/tanah-bagian/tambah"
                    className="primary-btn d-flex justify-content-center align-items-center"
                  >
                    Tambah Bagian
                  </Link>
                </div>
              </div>
              <div className="table-tanah-bagian">
                <TableBagian />
                <TableBagian />
                <TableBagian />
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
  );
};
