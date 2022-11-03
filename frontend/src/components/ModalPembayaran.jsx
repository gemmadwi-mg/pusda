import Button from "react-bootstrap/Button";
import Modal from "react-bootstrap/Modal";

export const ModalPembayaran = ({ show, handleClose }) => {
  return (
    <>
      <Modal
        show={show}
        onHide={handleClose}
        className="d-flex justify-content-center align-items-center"
      >
        <Modal.Header closeButton>
          <Modal.Title>Informasi Pembayaran</Modal.Title>
        </Modal.Header>
        <Modal.Body className="py-3">
          <form className="d-flex flex-col form-tambah-tanah gap-2">
            <div>
              <label htmlFor="nilai-sewa">Tahun</label>
              <input
                type="text"
                className="w-100"
                name="nilai-sewa"
                value={2020}
              />
            </div>
            <div>
              <label htmlFor="nilai-sewa">Jumlah Pembayaran</label>
              <input
                type="text"
                className="w-100"
                name="nilai-sewa"
                value="Rp2.000.000"
              />
            </div>
            <div className="d-flex flex-col">
              <label className="font-semibold">Bukti Pembayaran</label>
              <label
                htmlFor="surat-permohonan"
                className="font-semibold file-input d-flex flex-col justify-content-center align-items-center"
              >
                <img src="/upload.png" width={80} />
                <p className="p-0 m-0">
                  Drag & drop files or{" "}
                  <span style={{ color: "#483EA8" }}>Browse</span>
                </p>
                <p className="secondary-text">
                  Supported formates: JPEG, PNG, GIF, MP4, PDF, PSD, AI, Word,
                  PPT
                </p>
              </label>
              <input type="file" className="d-none" id="surat-permohonan" />
            </div>
          </form>
        </Modal.Body>
        <Modal.Footer className="d-flex justify-content-center">
          <Button className="primary-btn px-5" onClick={handleClose}>
            Simpan Data
          </Button>
        </Modal.Footer>
      </Modal>
    </>
  );
};
