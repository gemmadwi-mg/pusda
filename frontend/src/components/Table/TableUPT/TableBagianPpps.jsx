import { Link } from "react-router-dom";

export const TableBagianPpps = ({upt}) => {
  return (
    <Link
      to={"/upt/"+upt+"/upt/detail/tanah-bagian-ppps"}
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
        1
      </div>
      <div className="col">
        <p className="table-title p-0 m-0">JENIS PERIKATAN</p>
        <p className="p-0 m-0">PINJAM PAKAI</p>
      </div>
      <div className="col">
        <p className="table-title p-0 m-0">PEMANFAATAN</p>
        <p className="p-0 m-0">KANTOR</p>
      </div>
      <div className="col">
        <p className="table-title p-0 m-0">KONDISI SAAT INI</p>
        <p className="p-0 m-0">KANTOR AKTIF</p>
      </div>
      <div className="col">
        <p className="table-title p-0 m-0">LUAS</p>
        <p className="p-0 m-0">242 m</p>
      </div>
    </Link>
  );
};
