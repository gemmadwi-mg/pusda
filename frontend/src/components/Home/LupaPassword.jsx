import { Link } from "react-router-dom";

export const LupaPasswordForm = () => {
  return (
    <form className="d-flex flex-col justify-content-center align-items-center h-100 w-75 gap-1">
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
      <div className="form-group submit-btn w-100 gap-2">
        <Link to="/"
          type="submit"
          className="rounded bg-cyanblue text-light form-btn mt-2 font-semibold text-center"
        >
          Reset Kata Sandi 
        </Link>
      </div>
    </form>
  );
};
