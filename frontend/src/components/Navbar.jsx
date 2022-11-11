import { Dropdown } from "react-bootstrap";
import { useNavigate, useParams } from "react-router-dom";
import { FiLogOut } from "react-icons/fi";
import { useEffect } from "react";

export const Navbar = () => {
  const navigate = useNavigate()
  const params = useParams();
  const id = params.id;

  const handleLogout = () => {
    localStorage.removeItem("token");
    navigate("/");
  };
  
  useEffect(() => {
    const token = localStorage.getItem("token");
    if (token == null) navigate("/");
  }, []);

  switch (id) {
    case "pusdajatim":
      return (
        <div className="navbar w-100 d-flex ">
          <div>
            <p className="m-0">DATA ASET</p>
            <h2 className="font-semibold">PUSDA JATIM</h2>
          </div>
          <Dropdown>
            <Dropdown.Toggle variant="none" id="dropdown-basic">
              <div className="d-flex align-items-center gap-2 h-100">
                <span>
                  Hi, <span className="text-cyanblue font-semibold">Nama!</span>
                </span>
                <div className="profile-picture bg-cyanblue"></div>
              </div>
            </Dropdown.Toggle>
            <Dropdown.Menu>
              <div
                className="d-flex justify-content-center align-items-center px-2"
                style={{ color: "red" }}
                onClick={() => {
                  handleLogout();
                }}
              >
                <FiLogOut />
                <Dropdown.Item style={{ color: "red" }} href="/">
                  Logout
                </Dropdown.Item>
              </div>
            </Dropdown.Menu>
          </Dropdown>
        </div>
      );
    case "kediri":
      return (
        <div className="navbar w-100 d-flex ">
          <div>
            <p className="m-0">DATA ASET</p>
            <h2 className="font-semibold">{`UPT PUSDA WS Brantas di Kediri`}</h2>
          </div>
          <Dropdown>
            <Dropdown.Toggle variant="none" id="dropdown-basic">
              <div className="d-flex align-items-center gap-2 h-100">
                <span>
                  Hi, <span className="text-cyanblue font-semibold">Nama!</span>
                </span>
                <div className="profile-picture bg-cyanblue"></div>
              </div>
            </Dropdown.Toggle>
            <Dropdown.Menu>
              <div
                className="d-flex justify-content-center align-items-center px-2"
                style={{ color: "red" }}
                onClick={() => {
                  handleLogout();
                }}
              >
                <FiLogOut />
                <Dropdown.Item style={{ color: "red" }} href="/">
                  Logout
                </Dropdown.Item>
              </div>
            </Dropdown.Menu>
          </Dropdown>
        </div>
      );
    case "lumajang":
      return (
        <div className="navbar w-100 d-flex ">
          <div>
            <p className="m-0">DATA ASET</p>
            <h2 className="font-semibold">{`UPT PUSDA WS Bondoyudo di Lumajang`}</h2>
          </div>
          <Dropdown>
            <Dropdown.Toggle variant="none" id="dropdown-basic">
              <div className="d-flex align-items-center gap-2 h-100">
                <span>
                  Hi, <span className="text-cyanblue font-semibold">Nama!</span>
                </span>
                <div className="profile-picture bg-cyanblue"></div>
              </div>
            </Dropdown.Toggle>
            <Dropdown.Menu>
              <div
                className="d-flex justify-content-center align-items-center px-2"
                style={{ color: "red" }}
                onClick={() => {
                  handleLogout();
                }}
              >
                <FiLogOut />
                <Dropdown.Item style={{ color: "red" }} href="/">
                  Logout
                </Dropdown.Item>
              </div>
            </Dropdown.Menu>
          </Dropdown>
        </div>
      );
    case "bondowoso":
      return (
        <div className="navbar w-100 d-flex ">
          <div>
            <p className="m-0">DATA ASET</p>
            <h2 className="font-semibold">{`UPT PUSDA WS Sampean Setail di Bondowoso`}</h2>
          </div>
          <Dropdown>
            <Dropdown.Toggle variant="none" id="dropdown-basic">
              <div className="d-flex align-items-center gap-2 h-100">
                <span>
                  Hi, <span className="text-cyanblue font-semibold">Nama!</span>
                </span>
                <div className="profile-picture bg-cyanblue"></div>
              </div>
            </Dropdown.Toggle>
            <Dropdown.Menu>
              <div
                className="d-flex justify-content-center align-items-center px-2"
                style={{ color: "red" }}
                onClick={() => {
                  handleLogout();
                }}
              >
                <FiLogOut />
                <Dropdown.Item style={{ color: "red" }} href="/">
                  Logout
                </Dropdown.Item>
              </div>
            </Dropdown.Menu>
          </Dropdown>
        </div>
      );
    case "pasuruan":
      return (
        <div className="navbar w-100 d-flex ">
          <div>
            <p className="m-0">DATA ASET</p>
            <h2 className="font-semibold">{`UPT PUSDA WS Welang Pekalen di Pasuruan`}</h2>
          </div>
          <Dropdown>
            <Dropdown.Toggle variant="none" id="dropdown-basic">
              <div className="d-flex align-items-center gap-2 h-100">
                <span>
                  Hi, <span className="text-cyanblue font-semibold">Nama!</span>
                </span>
                <div className="profile-picture bg-cyanblue"></div>
              </div>
            </Dropdown.Toggle>
            <Dropdown.Menu>
              <div
                className="d-flex justify-content-center align-items-center px-2"
                style={{ color: "red" }}
                onClick={() => {
                  handleLogout();
                }}
              >
                <FiLogOut />
                <Dropdown.Item style={{ color: "red" }} href="/">
                  Logout
                </Dropdown.Item>
              </div>
            </Dropdown.Menu>
          </Dropdown>
        </div>
      );
    case "bojonegoro":
      return (
        <div className="navbar w-100 d-flex ">
          <div>
            <p className="m-0">DATA ASET</p>
            <h2 className="font-semibold">{`UPT PUSDA WS Bengawan Solo di Bojonegoro`}</h2>
          </div>
          <Dropdown>
            <Dropdown.Toggle variant="none" id="dropdown-basic">
              <div className="d-flex align-items-center gap-2 h-100">
                <span>
                  Hi, <span className="text-cyanblue font-semibold">Nama!</span>
                </span>
                <div className="profile-picture bg-cyanblue"></div>
              </div>
            </Dropdown.Toggle>
            <Dropdown.Menu>
              <div
                className="d-flex justify-content-center align-items-center px-2"
                style={{ color: "red" }}
                onClick={() => {
                  handleLogout();
                }}
              >
                <FiLogOut />
                <Dropdown.Item style={{ color: "red" }} href="/">
                  Logout
                </Dropdown.Item>
              </div>
            </Dropdown.Menu>
          </Dropdown>
        </div>
      );
    case "pamekasan":
      return (
        <div className="navbar w-100 d-flex ">
          <div>
            <p className="m-0">DATA ASET</p>
            <h2 className="font-semibold">{`UPT PUSDA WS Kepulauan Madura di Pamekasan`}</h2>
          </div>
          <Dropdown>
            <Dropdown.Toggle variant="none" id="dropdown-basic">
              <div className="d-flex align-items-center gap-2 h-100">
                <span>
                  Hi, <span className="text-cyanblue font-semibold">Nama!</span>
                </span>
                <div className="profile-picture bg-cyanblue"></div>
              </div>
            </Dropdown.Toggle>
            <Dropdown.Menu>
              <div
                className="d-flex justify-content-center align-items-center px-2"
                style={{ color: "red" }}
                onClick={() => {
                  handleLogout();
                }}
              >
                <FiLogOut />
                <Dropdown.Item style={{ color: "red" }} href="/">
                  Logout
                </Dropdown.Item>
              </div>
            </Dropdown.Menu>
          </Dropdown>
        </div>
      );

    default:
      return (
        <div className="navbar w-100 d-flex ">
          <div>
            <p className="m-0">DATA ASET</p>
            <h2 className="font-semibold">UPT-UPT JATIM</h2>
          </div>
          <Dropdown>
            <Dropdown.Toggle variant="none" id="dropdown-basic">
              <div className="d-flex align-items-center gap-2 h-100">
                <span>
                  Hi, <span className="text-cyanblue font-semibold">Nama!</span>
                </span>
                <div className="profile-picture bg-cyanblue"></div>
              </div>
            </Dropdown.Toggle>
            <Dropdown.Menu>
              <div
                className="d-flex justify-content-center align-items-center px-2"
                style={{ color: "red" }}
                onClick={() => {
                  handleLogout();
                }}
              >
                <FiLogOut />
                <Dropdown.Item style={{ color: "red" }} href="/">
                  Logout
                </Dropdown.Item>
              </div>
            </Dropdown.Menu>
          </Dropdown>
        </div>
      );
  }
};
