import { Link } from "react-router-dom";

export const TableBagian = ({upt}) => {
  return (
    <Link
      to={"/upt/"+upt+"/admin/detail/tanah-bagian-sr"}
      className="row text-dark"
      style={{
        background: "#FFFFFF",
        padding: "15px",
        borderBottom: "#BCBCBC 1px solid",
      }}
    >
      <div
        to="/upt/detail"
        className="col-1 number d-flex align-items-center justify-content-center font-semibold "
      >
        3
      </div>
      <div className="col">
        <p className="table-title p-0 m-0">NO PERIKATAN</p>
        <p className="p-0 m-0">12345678910</p>
      </div>
      <div className="col">
        <p className="table-title p-0 m-0">JENIS PERIKATAN</p>
        <p className="p-0 m-0">RETRIBUSI</p>
      </div>
      <div className="col">
        <p className="table-title p-0 m-0">PEMANFAATAN</p>
        <p className="p-0 m-0">KANTIN</p>
      </div>
      <div className="col">
        <p className="table-title p-0 m-0">NILAI SEWA</p>
        <p className="p-0 m-0">Rp2.000.000</p>
      </div>
      <div className="col">
        <p className="table-title p-0 m-0">MASA BERLAKU</p>
        <p className="p-0 m-0">22 JUNI 2024</p>
      </div>
      <div className="col">
        <p className="table-title p-0 m-0">LUAS</p>
        <p className="p-0 m-0">242 m</p>
      </div>
    </Link>
  );
};
