import { applyMiddleware, compose, createStore } from "redux";
import thunk from "redux-thunk";
import rootReducer from "./reducer/rootReducer";
import { createLogger } from "redux-logger";

const logger = createLogger();
const middlewares = [thunk, logger];
const composeEnhancer = window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__ || compose;

const store = createStore(
  rootReducer,
  composeEnhancer(applyMiddleware(...middlewares))
);

export default store;
