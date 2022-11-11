import axios from "axios";
import { LOGIN_SUCCESS, LOGIN_FAIL } from "../types";

export const authLogin = (email, password, navigate) => async (dispatch) => {
  try {
    let res = await axios({
      method: "POST",
      url: "https://backend-pusda.herokuapp.com/api/login",
      data: { email: email, password: password },
    });

    // const json = res.data;
    // const data = json.data;
    // const name = data.name;
    // console.log(json);

    if (res.status === 200) {
      dispatch({
        type: LOGIN_SUCCESS,
        payload: {
          data: res.data,
          errorMessage: false,
        },
      });
      localStorage.setItem("token", res.data.token);
      navigate("/dashboard");
    }
  } catch (err) {
    dispatch({
      type: LOGIN_FAIL,
      payload: {
        data: false,
        errorMessage: err,
      },
    });
  }
};

// export const logout = () => (dispatch) => {
//   Cookies.remove("token");
// };
