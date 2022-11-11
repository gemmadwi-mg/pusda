import { useState } from "react";
import { Button } from "react-bootstrap";
import { useDispatch, useSelector } from "react-redux";
import { Link, useNavigate } from "react-router-dom";
import { authLogin } from "../../redux/action/authAction";

export const LoginForm = () => {
  const navigate = useNavigate();
  const [input, setInput] = useState({
    email: "",
    password: "",
  });
  
 const dispatch = useDispatch();
  const { isLoading, dataAuth, error } = useSelector((state) => state.auth);

  const handleSubmit = () => {
    const action = authLogin(input.email, input.password, navigate);
    dispatch(action);
  };

  return (
    <form  onSubmit="return false;" className="d-flex flex-col justify-content-center align-items-center h-100 w-75 gap-1">
      <div className="form-group w-100">
        <label htmlFor="email">Email</label>
        <input
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
      </div>
      <div className="form-group w-100">
        <label htmlFor="password">Kata Sandi</label>
        <input
          className="rounded"
          type="password"
          name="password"
          id="password"
          placeholder="Masukkan Kata Sandi"
          value={input.password}
          onChange={(e) =>
            setInput({
              ...input,
              password: e.target.value,
            })
          }
          required
        />
      </div>
      <div className="form-group submit-btn w-100 gap-2">
        <Button
          type="button"
          className="rounded bg-cyanblue text-light form-btn mt-2 font-semibold text-center"
          onClick={handleSubmit}
          loading={isLoading}
        >
          MASUK
        </Button>
        <Link to="/lupa-password" className="rounded text-cyanblue form-btn bg-none font-semibold text-center">
          Forgot Password?
        </Link>
      </div>
    </form>
  );
};
