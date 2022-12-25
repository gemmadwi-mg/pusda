import Button from "react-bootstrap/Button";
import { Modal, Form } from "react-bootstrap";
import { useNavigate } from "react-router-dom";
import Swal from "sweetalert2";
import { useState } from "react";

export const ModalEmail = ({ show, handleClose }) => {
  const apiUrl = process.env.REACT_APP_API_URL;

  const navigate = useNavigate();
  const [input, setInput] = useState({
    email: "",
  });

  const handleSubmit = async (e) => {
    e.preventDefault();

    try {
      let res = await fetch(apiUrl + "password/email", {
        method: "POST",
        body: JSON.stringify(input),
        headers: {
          "Content-type": "application/json; charset=UTF-8",
        },
      });

      let resJson = await res.json();

      if (res.status != 200) {
        let message = resJson.message;

        if (!Array.isArray(message)) message = [resJson.message];

        // Jika ingin menggunakan sweetalert2 untuk menampilkan pesan error 
        let messageList = "";
        message.forEach((item) => {
          messageList += "<li>" + item + "</li>";
        });

        return Swal.fire({
          icon: "error",
          title: "Oops...",
          html: messageList,
          // text: messageList,
          // timer: 1000,
        });

        // return setMessage(message);
      } else {
        Swal.fire({
          title: "Berhasil Cek Email Anda",
          icon: "success",
          timer: 1000,
          // showConfirmButton: false,
          // backdrop: false,
          // position: 'top',
        });
        return navigate("/lupa-password");
      }
    } catch (error) {
      console.log(error);
    }
  };

  return (
    <>
      <Modal
        show={show}
        onHide={handleClose}
        className="d-flex justify-content-center align-items-center"
      >
        <Modal.Header>
          <Modal.Title className="px-1 ">
            <h3>Lupa Kata Sandi?</h3>
          </Modal.Title>
        </Modal.Header>
        <Modal.Body className="py-5">
          <p className="d-flex justify-content-center">
            Masukkan Email yang terdaftar untuk mendapatkan link reset kata
            sandi.
          </p>
          <Form onSubmit={handleSubmit}>
            <Form.Group controlId="formBasicEmail">
              <Form.Label>Email</Form.Label>
              <Form.Control
                className="rounded"
                type="email"
                name="email"
                id="email"
                placeholder="Masukkan Email"
                value={input.email}
                onChange={(e) =>
                  setInput({
                    ...input,
                    email: e.target.value,
                  })
                }
                required
              />
            </Form.Group>
          </Form>
        </Modal.Body>
        <Modal.Footer className="d-flex justify-content-center">
          <Button
            className="primary-btn"
            type="submit"
          >
            Kirim Link
          </Button>
        </Modal.Footer>
      </Modal>
    </>
  );
};
