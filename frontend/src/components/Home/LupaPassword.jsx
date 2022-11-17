import { useState } from "react";
import { ModalResetPassword } from "../Modal/ModalResetPassword";

export const LupaPasswordForm = () => {
  const [show, setShow] = useState(false);

  const handleClose = () => setShow(false);
  const handleShow = () => setShow(true);
  return (
    <form className="d-flex flex-col justify-content-center align-items-center h-100 w-75 gap-1">
      <ModalResetPassword
        show={show}
        handleClose={handleClose}
        handleShow={handleShow}
      />
      <div className="form-group w-100">
        <label htmlFor="email">Email</label>
        <input
          className="rounded"
          type="email"
          name="email"
          id="email"
          placeholder="Masukkan Email"
        />
      </div>
      <div className="form-group w-100">
        <label htmlFor="password">Kata Sandi Baru</label>
        <input
          className="rounded"
          type="password"
          name="password"
          id="password"
          placeholder="Min. 8 karakter"
        />
      </div>
      <div className="form-group w-100">
        <label htmlFor="password">Konfirmasi Kata Sandi Baru</label>
        <input
          className="rounded"
          type="password"
          name="password"
          id="password"
          placeholder="Min. 8 karakter"
        />
      </div>
      <div
        className="form-group submit-btn w-100 gap-2 rounded bg-cyanblue text-light form-btn mt-2 font-semibold text-center"
        type="submit"
        onClick={() => {
          setShow(true);
        }}
      >
        Reset Kata Sandi
      </div>
    </form>
  );
};
