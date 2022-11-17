import { useNavigate } from "react-router-dom";
import LayoutUPT from "../../../components/Layout/layoutUPT";

export const TambahIndukUPT = () => {
  const navigate = useNavigate();

  return (
    <LayoutUPT>
      <div
        className="d-flex justify-content-between align-items-center mx-3 py-3"
        style={{
          borderBottom: "#BCBCBC 1px solid",
        }}
      >
        <div className="font-semibold" style={{ cursor: "pointer" }}>
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
        <div className="d-flex gap-2">
          <div
            className="text-center"
            style={{
              cursor: "pointer",
              border: "#DC2F2F 1px solid",
              padding: "5px 10px",
              borderRadius: "5px",
              color: "#DC2F2F",
              width: "120px",
            }}
            onClick={() => {
              navigate(-1);
            }}
          >
            Batal
          </div>
          <div className="primary-btn">Simpan</div>
        </div>
      </div>
      <div className="m-3">
        <h5 style={{ paddingBottom: "20px" }}>Tambah Tanah Induk</h5>
        <form className="form-tambah-tanah d-flex flex-col gap-3 px-5">
          <div>
            <label htmlFor="nama-jenis-barang">Nama/Jenis Barang</label>
            <input type="text" className="w-100" name="nama-jenis-barang" />
          </div>
          <div>
            <label htmlFor="nilai-aset">Nilai Aset</label>
            <input type="text" className="w-100" name="nilai-aset" />
          </div>
          <div>
            <p className="p-0 m-0">Sertifikat</p>
            <div className="d-flex gap-2">
              <div className="d-flex flex-col">
                <label htmlFor="sertifikat-nomor">Nomor</label>
                <input
                  type="text"
                  id="sertifikat-nomor"
                  style={{ width: "100px" }}
                />
              </div>
              <div className="d-flex flex-col">
                <label htmlFor="sertifikat-tanggal">Tanggal</label>
                <input
                  type="date"
                  id="sertifikat-tanggal"
                  style={{ width: "fit-content" }}
                />
              </div>
            </div>
          </div>
          <div>
            <label htmlFor="sertifikat-alamat">Alamat</label>
            <textarea name="sertifikat-alamat" className="w-100"></textarea>
          </div>
          <div>
            <label htmlFor="sertifikat-luas">Luas Induk</label>
            <input type="text" className="w-100" name="sertifikat-luas" />
          </div>
          <div>
            <label htmlFor="sertifikat-nilai">Nilai Aset</label>
            <input type="text" className="w-100" name="sertifikat-nilai" />
          </div>
        </form>
      </div>
    </LayoutUPT>
  );
};
