import { Link } from "react-router-dom";

export const LoginForm = () => {
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
        <label htmlFor="password">Kata Sandi</label>
        <input
          className="rounded"
          type="password"
          name="password"
          id="password"
          placeholder="Masukkan Kata Sandi"
        />
      </div>
      <div className="form-group submit-btn w-100 gap-2">
        <Link to="/dashboard"
          type="submit"
          className="rounded bg-cyanblue text-light form-btn mt-2 font-semibold text-center"
        >
          MASUK
        </Link>
        <Link to="/lupa-password" className="rounded text-cyanblue form-btn bg-none font-semibold text-center">
          Forgot Password?
        </Link>
      </div>
    </form>
  );
};
