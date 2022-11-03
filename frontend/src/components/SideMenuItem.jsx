import { Link, useLocation } from "react-router-dom";

export const SideMenuItem = ({ title, id }) => {
  const location = useLocation();
  // console.log(params)
  // console.log(location.pathname);
  if(location.pathname === "/dashboard/" + id) {
    return (
      <Link to={"/dashboard/" + id} className="side-menu-item bg-cyanblue text-white">
        <span className="side-menu-item">{title}</span>
      </Link>
    );
  } else {
    return (
      <Link to={"/dashboard/" + id} className="side-menu-item">
        <span className="side-menu-item fw-bold">{title}</span>
      </Link>
    );
  } 

};
