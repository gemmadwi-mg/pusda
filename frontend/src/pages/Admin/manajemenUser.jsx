import { Link } from "react-router-dom";
import LayoutAdmin from "../../components/Layout/layoutAdmin";
import { ManajemenUserRow } from "../../components/Table/TableManajemenUser/ManajemenUserRow";

export const ManajemenUser = () => {
  return (
    <LayoutAdmin>
      <div>
        <div className="d-flex justify-content-between px-3 py-3">
          <div className="d-flex gap-2 align-items-center">
            <Link
              to={"/manajemenuser/admin/tambah-user"}
              className="primary-btn d-flex justify-content-center align-items-center"
            >
              Tambah User
            </Link>
          </div>
          <div className="d-flex">
            <input
              className="form-control me-2 bg-none"
              style={{ width: "200px" }}
              type="search"
              placeholder="Search"
              aria-label="Search"
            ></input>
          </div>
        </div>
        <div>
            <ManajemenUserRow/>
        </div>
      </div>
    </LayoutAdmin>
  );
};
