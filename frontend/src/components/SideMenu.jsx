import { Link } from "react-router-dom";
import { SideMenuItem } from "./SideMenuItem";

export const SideMenu = () => {
  return (
    <div className="side-menu border">
      <Link to="/dashboard" className="side-menu-header d-flex justify-content-center">
        <img className="w-75 p-4" src="/logo.png" alt="logo" />
      </Link>
      <div className="side-menu-list d-flex flex-col">
        <SideMenuItem title="DASHBOARD" id=""/>
        <SideMenuItem title="PUSDA JATIM" id="pusdajatim"/>
      </div>
      <h6 className="ps-4 font-semibold">DATA UPT</h6>
      <div className="side-menu-list d-flex flex-col p-0">
        <SideMenuItem title="UPT KEDIRI" id="Kediri"/>
        <SideMenuItem title="UPT LUMAJANG" id="Lumajang"/>
        <SideMenuItem title="UPT BONDOWOSO" id="Bondowoso"/>
        <SideMenuItem title="UPT PASURUAN" id="Pasuruan"/>
        <SideMenuItem title="UPT BOJONEGORO" id="Bojonegoro"/>
        <SideMenuItem title="UPT PAMEKASAN" id="Pamekasan"/>
      </div>
    </div>
  );
};
