import axios from "axios";
import {
  GET_USER,
} from "../types";

let token = localStorage.getItem("token");

export const getUser = () => {
    return (dispatch) => {
      dispatch({ type: `${GET_USER}_LOADING` });
  
      axios({
        method: "GET",
        url: "https://backend-pusda.herokuapp.com/api/user/all",
        headers: {
          Authorization: `Bearer ${token}`,
        },
      })
        .then((response) => {
          dispatch({
            type: `${GET_USER}_FULFILLED`,
            payload: response.data.data,
          });
        })
        .catch((error) => {
          dispatch({
            type: `${GET_USER}_ERROR`,
            error: error.message,
          });
        });
    };
  };
  