import Button from "react-bootstrap/Button";
import Modal from "react-bootstrap/Modal";

export const ModalResetPassword = ({ show, handleClose }) => {
  return (
    <>
      <Modal
        show={show}
        onHide={handleClose}
        className="d-flex justify-content-center align-items-center"
      >
        <Modal.Header closeButton>
          <Modal.Title className="fw-bold">
            Selamat anda berhasil mengubah kata sandi
          </Modal.Title>
        </Modal.Header>
        <Modal.Body className="py-5">
          <p>Kata sandi baru milik anda adalah</p>
          <p>1232423523</p>
          <div>Mohon untuk mengingat dan mencatat kata sandi baru anda</div>
        </Modal.Body>
        <Modal.Footer>
          <Button className="primary-btn" onClick={handleClose}>
            Kembali ke Halaman Login
          </Button>
        </Modal.Footer>
      </Modal>
    </>
  );
};
