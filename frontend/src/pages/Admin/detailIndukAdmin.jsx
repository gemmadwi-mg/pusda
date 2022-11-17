import { useNavigate, Link, useParams } from "react-router-dom";
import { useState } from "react";
import LayoutAdmin from "../../components/Layout/layoutAdmin";
import { ModalTambahBagian } from "../../components/Modal/ModalTambahBagian";
import { ButtonDelete } from "../../components/Button/ButtonDelete";
import { TableBagian } from "../../components/Table/TableBagian";
import { TableBagianPinjamPakai } from "../../components/Table/TabelBagianPinjamPakai";

export const DetailIndukAdmin = ({ upt }) => {
  const navigate = useNavigate();
  const [show, setShow] = useState(false);
  const params = useParams();

  const handleClose = () => setShow(false);
  const handleShow = () => setShow(true);

  return (
    <LayoutAdmin>
      <ModalTambahBagian
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
          <h5>Informasi Tanah Bidang</h5>
          <div className="d-flex gap-2">
            <ButtonDelete />
            <Link
              to={"/upt/" + params.id + "/admin/edit-induk"}
              className="primary-btn px-4"
            >
              Ubah Data
            </Link>
          </div>
        </div>
        <div className="informasi-tanah">
          <div className="d-flex mx-4">
            <div className="left">
              <div>
                <p className="title p-0 m-0">Nama/Jenis Barang</p>
                <p className="font-semibold">Tanah</p>
              </div>
              <div>
                <p className="title p-0 m-0">Nilai Aset</p>
                <p className="font-semibold">Rp20.000.000</p>
              </div>
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
            </div>
            <div className="right">
              <div>
                <p className="title p-0 m-0">Luas Induk (m)</p>
                <p className="font-semibold">200</p>
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
              <div
                className="secondary-btn d-flex align-items-center me-2"
                style={{ padding: "0 15px" }}
              >
                Import
              </div>
              <div
                className="primary-btn d-flex justify-content-center align-items-center"
                onClick={() => {
                  setShow(true);
                }}
              >
                Tambah Bagian
              </div>
            </div>
          </div>
          <div className="table-tanah-bagian">
            <TableBagian upt={params.id} />
            <TableBagian upt={params.id} />
            <TableBagian upt={params.id} />
            <TableBagianPinjamPakai upt={params.id} />
            <TableBagianPinjamPakai upt={params.id} />
          </div>
        </div>
      </div>
    </LayoutAdmin>
  );
};
