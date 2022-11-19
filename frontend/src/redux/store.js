import { configureStore } from '@reduxjs/toolkit';
import authReducer from './auth/reducer';


const store = configureStore({
  reducer: {
    // categories: categoriesReducer,
    // notif: notifReducer,
    auth: authReducer,
    // talents: talentsReducer,
    // lists: listsReducer,
    // events: eventsReducer,
    // payments: paymentsReducer,
  },
});

export default store;