import { useParams } from "react-router-dom";

export const Navbar = () => {
  const params = useParams();
  const id = params.id;
  // console.log(id);

  if (id === undefined) {
    return (
      <div className="navbar w-100 d-flex ">
        <div>
          <p className="m-0">DATA ASET</p>
          <h2 className="font-semibold">UPT-UPT JATIM</h2>
        </div>
        <div className="d-flex align-items-center gap-2 h-100">
          <span>
            Hi, <span className="text-cyanblue font-semibold">Nama!</span>
          </span>
          <div className="profile-picture bg-cyanblue"></div>
        </div>
      </div>
    );
  } else if (id === "pusdajatim") {
    return (
      <div className="navbar w-100 d-flex ">
        <div>
          <p className="m-0">DATA ASET</p>
          <h2 className="font-semibold">PUSDA JATIM</h2>
        </div>
        <div className="d-flex align-items-center gap-2 h-100">
          <span>
            Hi, <span className="text-cyanblue font-semibold">Nama!</span>
          </span>
          <div className="profile-picture bg-cyanblue"></div>
        </div>
      </div>
    );
  } else {
    return (
      <div className="navbar w-100 d-flex ">
        <div>
          <p className="m-0">DATA ASET</p>
          <h2 className="font-semibold">{`UPT ${id}`}</h2>
        </div>
        <div className="d-flex align-items-center gap-2 h-100">
          <span>
            Hi, <span className="text-cyanblue font-semibold">Nama!</span>
          </span>
          <div className="profile-picture bg-cyanblue"></div>
        </div>
      </div>
    );
  }
};
