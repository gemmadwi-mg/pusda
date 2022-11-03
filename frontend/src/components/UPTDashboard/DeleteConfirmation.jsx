import Button from 'react-bootstrap/Button';
import Modal from 'react-bootstrap/Modal';

export const DeleteConfirmation = ({show, handleClose}) => {
  return (
    <>
      <Modal show={show} onHide={handleClose} className="d-flex justify-content-center align-items-center">
        <Modal.Header closeButton>
          <Modal.Title>Hapus Data</Modal.Title>
        </Modal.Header>
        <Modal.Body className='py-5'>Apakah anda yakin akan menghapus data ini?</Modal.Body>
        <Modal.Footer>
          <Button className="secondary-btn" onClick={handleClose}>
            Tidak
          </Button>
          <Button variant="danger" onClick={handleClose}>
            Yakin
          </Button>
        </Modal.Footer>
      </Modal>
    </>
  );
}

