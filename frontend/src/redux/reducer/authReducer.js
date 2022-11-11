import { LOGIN_SUCCESS, LOGIN_FAIL } from "../types";

const initialState = {
  dataAuth: [],
  input: [],
  isLoading: false,
  error: null,
};

const authReducer = (state = initialState, action) => {
  const { type, payload, error, input } = action;
  switch (type) {
    case `LOADING`:
      return {
        ...state,
        isLoading: true,
      };
    case `${LOGIN_SUCCESS}`:
      return {
        ...state,
        isLoading: false,
        input: input,
        dataAuth: payload,
      };
    case `${LOGIN_FAIL}`:
      return {
        ...state,
        isLoading: false,
        error: error,
      };
    default:
      return {
        ...state,
      };
  }
};

export default authReducer;
