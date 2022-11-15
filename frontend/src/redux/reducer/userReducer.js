import {
    GET_USER,
  } from "../types";
  
  const initialState = {
    data: [],
    isLoading: true,
    error: null,
  };
  
export const userReducer = (state = initialState, action) => {
    const { type, payload, error } = action;
    switch (type) {
      case `${GET_USER}_LOADING`:
        return {
          ...state,
        };
      case `${GET_USER}_FULFILLED`:
        return {
          ...state,
          data: payload,
          isLoading: false,
        };
      case `${GET_USER}_ERROR`:
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
  