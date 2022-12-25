import { Link } from "react-router-dom";
import { SideMenuItem } from "../SideMenuItem";

export const SideMenuAdmin = () => {
    return (
      <div className="side-menu border">
        <Link
          to="/dashboard/admin"
          className="side-menu-header d-flex justify-content-center"
        >
          <img className="w-75 p-4" src="/logo.png" alt="logo" />
        </Link>
        <div className="side-menu-list d-flex flex-col">
          <SideMenuItem title="DASHBOARD" id="/dashboard/admin" />
          <SideMenuItem title="MANAJEMEN USER" id="/manajemenuser/admin" />
          <SideMenuItem title="PUSDA JATIM" id="/upt/pusdajatim/admin" />
        </div>
        <h6 className="ps-4 font-semibold">DATA UPT</h6>
        <div className="side-menu-list d-flex flex-col p-0">
          <SideMenuItem title="UPT KEDIRI" id="/upt/upt-psda-kediri/admin" />
          <SideMenuItem title="UPT LUMAJANG" id="/upt/upt-psda-lumajang/admin" />
          <SideMenuItem title="UPT BONDOWOSO" id="/upt/upt-psda-bondowoso/admin" />
          <SideMenuItem title="UPT PASURUAN" id="/upt/upt-psda-pasuruan/admin" />
          <SideMenuItem title="UPT BOJONEGORO" id="/upt/upt-psda-bojonegoro/admin" />
          <SideMenuItem title="UPT PAMEKASAN" id="/upt/upt-psda-pamekasan/admin" />
        </div>
      </div>
    );
};
