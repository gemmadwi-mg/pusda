import { useNavigate, Link, useParams } from "react-router-dom";
import { useState } from "react";
import LayoutAdmin from "../../components/Layout/layoutAdmin";
import { ModalPembayaran } from "../../components/Modal/ModalPembayaran";
import { ButtonDelete } from "../../components/Button/ButtonDelete";
import { TablePembayaran } from "../../components/Table/TablePembayaran";

export const DetailBagianSrAdmin = () => {
  const navigate = useNavigate();
  const [show, setShow] = useState(false);
  const params = useParams();

  const handleClose = () => setShow(false);
  const handleShow = () => setShow(true);
  return (
    <LayoutAdmin>
      <ModalPembayaran
        show={show}
        handleClose={handleClose}
        handleShow={handleShow}
      />
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
        <div className="d-flex gap-2">
          <ButtonDelete />
          <Link
            to={"/upt/" + params.id + "/detail/tanah-bagian/edit2"}
            className="primary-btn"
          >
            Ubah Data
          </Link>
        </div>
      </div>
      <div className="mx-5">
        <h5 style={{ paddingBottom: "20px", paddingTop: "10px" }}>
          Informasi Tanah Bagian
        </h5>
        <div className="d-flex informasi-tanah-bagian gap-5 justify-content-between">
          <div className="left-form d-flex flex-col gap-3 ">
            <div>
              <label htmlFor="nilai-sewa">Jenis Perikatan Pemanfaatan</label>
              <h5>Sewa/SIP BMD</h5>
            </div>
            <div>
              <label htmlFor="jenis-pemanfaatan">Atas Nama</label>
              <h5>Bella Salsa</h5>
            </div>
            <div>
              <label htmlFor="berlaku-dari">Peruntukkan Pemanfaatan</label>
              <h5>Rumah Tinggal</h5>
            </div>
            <div>
              <label htmlFor="koordinat">Koordinat (LS BT)</label>
              <h5>123124135235345345</h5>
            </div>
            <div>
              <label htmlFor="luas-bagian">Luas Induk (m)</label>
              <h5>39</h5>
            </div>
            <div>
              <label htmlFor="luas-bagian">
                Nilai Sewa/Retribusi (Rp/Tahun)
              </label>
              <h5>Rp20.000.000</h5>
            </div>
          </div>
          <div
            className="right-form d-flex flex-col gap-3"
            style={{ paddingRight: "100px" }}
          >
            <div>
              <label htmlFor="nomor-perikatan">Masa Berlaku</label>
              <h5>02/09/2022-22/09/2025</h5>
            </div>
            <div>
              <label htmlFor="nomor-perikatan">Nomor Perikatan</label>
              <h5>XXX/ZZZ/104.5/2022</h5>
            </div>
            <div>
              <label htmlFor="tanggal-perikatan">Tanggal Perikatan</label>
              <h5>02/09/2022</h5>
            </div>
            <div className="d-flex flex-col">
              <label className="font-semibold">Surat Perjanjian</label>
              <h5 className="filename">SURAT PERJANJIAN-1.PDF</h5>
            </div>
            <div className="d-flex flex-col">
              <label className="font-semibold">Surat Permohonan</label>
              <h5 className="filename">SURAT PERMOHONAN-1.PDF</h5>
            </div>
          </div>
        </div>
        <div
          className="d-flex justify-content-between align-items-center py-3"
          style={{
            borderBottom: "#BCBCBC 1px solid",
          }}
        ></div>
        <div className="mx-3">
          <div
            className="d-flex flex-row justify-content-between px-3 py-3"
            style={{ marginTop: "30px" }}
          >
            <h5>Informasi Pembayaran</h5>
            <div className="d-flex">
              <div
                to="/upt/tambah"
                className="primary-btn d-flex justify-content-center align-items-center"
                onClick={() => {
                  setShow(true);
                }}
              >
                Tambah Data
              </div>
            </div>
          </div>
          <div className="table-informasi-pembayaran">
            <TablePembayaran />
            <TablePembayaran />
          </div>
        </div>
      </div>
    </LayoutAdmin>
  );
};
