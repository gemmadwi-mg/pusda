import { Navigate, Route, Routes } from 'react-router-dom';
import GuestOnlyRoute from '../components/GuestOnlyRoute';
import GuardRoute from '../components/GuardRoute';

import Login from '../pages/Signin';

// import { OrdersRoute } from './OrdersRoute';

export function AppRoutes() {
  return (
    <Routes>
      <Route
        path='signin'
        element={
          <GuestOnlyRoute>
            <Login />
          </GuestOnlyRoute>
        }
      />
      <Route
        path='/'
        element={
          <>
            {/* <SNavbar /> */}
            <GuardRoute />
          </>
        }
      ></Route>
    </Routes>
  );
}