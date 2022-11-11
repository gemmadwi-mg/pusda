import { Navbar } from "../components/Navbar";
import { SideMenu } from "../components/SideMenu";
import { useNavigate, Link, useParams } from "react-router-dom";
import { ButtonDelete } from "../components/Button/ButtonDelete";

export const DetailTanahBagian = () => {
  const navigate = useNavigate();
  const params = useParams();
  return (
    <div className="d-flex ">
      <SideMenu />
      <div className="w-100">
        <Navbar />
        <main className="bg-light-gray h-100 ">
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
                to={"/upt/"+params.id+"/detail/tanah-bagian/edit"}
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
                  <label htmlFor="nilai-sewa">
                    Jenis Perikatan Pemanfaatan
                  </label>
                  <h5>Pakai Sendiri / Pinjam Pakai</h5>
                </div>
                <div>
                  <label htmlFor="berlaku-dari">Peruntukkan Pemanfaatan</label>
                  <h5>Kantor Aktif</h5>
                </div>
                <div>
                  <label htmlFor="luas-bagian">Luas Bagian (m)</label>
                  <h5>39</h5>
                </div>
              </div>
              <div
                className="right-form d-flex flex-col gap-3"
                style={{ paddingRight: "100px" }}
              >
                <div>
                <label htmlFor="nilai-asset">
                    Nilai Asset (Rp/Tahun)
                  </label>
                  <h5>Rp20.000.000</h5>
                </div>
                <div>
                <label htmlFor="koordinat">Koordinat (LS BT)</label>
                  <h5>123124135235345345</h5>
                </div>
                <div>
                  <label htmlFor="keterangan">Keterangan</label>
                  <h5>Berisi Keterangan</h5>
                </div>
              </div>
            </div>
            <div
              className="d-flex justify-content-between align-items-center py-3"
              style={{
                borderBottom: "#BCBCBC 1px solid",
              }}
            ></div>
          </div>
        </main>
      </div>
    </div>
  );
};
