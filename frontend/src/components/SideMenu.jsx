import { Link } from "react-router-dom";
import { SideMenuItem } from "./SideMenuItem";

export const SideMenu = () => {
  return (
    <div className="side-menu border">
      <Link to="/dashboard" className="side-menu-header d-flex justify-content-center">
        <img className="w-75 p-4" src="/logo.png" alt="logo" />
      </Link>
      <div className="side-menu-list d-flex flex-col">
        <SideMenuItem title="DASHBOARD" id="/dashboard"/>
        <SideMenuItem title="PUSDA JATIM" id="/upt/pusdajatim"/>
      </div>
      <h6 className="ps-4 font-semibold">DATA UPT</h6>
      <div className="side-menu-list d-flex flex-col p-0">
        <SideMenuItem title="UPT KEDIRI" id="/upt/kediri"/>
        <SideMenuItem title="UPT LUMAJANG" id="/upt/lumajang"/>
        <SideMenuItem title="UPT BONDOWOSO" id="/upt/bondowoso"/>
        <SideMenuItem title="UPT PASURUAN" id="/upt/pasuruan"/>
        <SideMenuItem title="UPT BOJONEGORO" id="/upt/bojonegoro"/>
        <SideMenuItem title="UPT PAMEKASAN" id="/upt/pamekasan"/>
      </div>
    </div>
  );
};
