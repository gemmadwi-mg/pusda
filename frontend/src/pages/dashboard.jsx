import { useEffect } from "react";
import { useDispatch, useSelector } from "react-redux";
import { DashboardTableRow } from "../components/Dashboard/DashboardTableRow";
import { Navbar } from "../components/Navbar";
import { SideMenu } from "../components/SideMenu";
import { getUser } from "../redux/action/userAction";

export const Dashboard = () => {
  // const dispatch = useDispatch();
  // const { isLoading, data: user, error } = useSelector((state) => state.user);

  // useEffect(() => {
  //   dispatch(getUser());
  // }, [dispatch]);

  // console.log(user);
  // if (user?.roles?.id === "1") {
  return (
    <div className="d-flex ">
      <SideMenu />
      <div className="w-100">
        <Navbar />
        <main className=" bg-light-gray h-100">
          <div className="d-flex justify-content-between px-3 py-3">
            <select className="h-100 rounded text-cyanblue px-3 py-1 font-semibold bg-white border-cyanblue">
              <option value="2021">2021</option>
              <option value="2020">2020</option>
              <option value="2019">2019</option>
            </select>
            <div className="d-flex gap-2 align-items-center">
              <div className="bg-cyanblue px-3 py-1 font-semibold text-white rounded primary-btn">
                EXPORT DATA
              </div>
            </div>
          </div>

          {/* table */}
          <div className="dashboard-table mx-3 p-2 pb-0 border-cyanblue bg-white">
            <div className="d-flex justify-content-between py-2 px-2">
              <h5 className="font-semibold">Informasi Total Data UPT</h5>
            </div>
            <div className="">
              <div className="row row-header">
                <div className="col d-flex align-items-center justify-content-center">
                  NAMA UPT
                </div>
                <div className="col d-flex align-items-center justify-content-center">
                  Jumlah Bidang Tanah
                </div>
                <div className="col d-flex flex-col align-items-center justify-content-center">
                  TOTAL PINJAM PAKAI
                  <br />
                  <div className="row py-2">
                    <div className="col">TANAH(M)</div>
                  </div>
                </div>
                <div className="col d-flex flex-col align-items-center justify-content-center">
                  TOTAL PAKAI SENDIRI
                  <br />
                  <div className="row py-2">
                    <div className="col">TANAH(M)</div>
                  </div>
                </div>
                <div className="col d-flex flex-col align-items-center justify-content-center">
                  TOTAL SEWA/SIP BMD
                  <br />
                  <div className="row py-2">
                    <div className="col">TANAH(M)</div>
                    <div className="col">RUPIAH</div>
                  </div>
                </div>
                <div className="col d-flex flex-col align-items-center justify-content-center py-2">
                  TOTAL RETRIBUSI
                  <br />
                  <div className="row py-2">
                    <div className="col">TANAH(M)</div>
                    <div className="col">RUPIAH</div>
                  </div>
                </div>
              </div>
              <DashboardTableRow title={"PUSDA JATIM"} />
              <DashboardTableRow title={"UPT KEDIRI"} />
              <DashboardTableRow title={"UPT LUMAJANG"} />
              <DashboardTableRow title={"UPT BONDOWOSO"} />
              <DashboardTableRow title={"UPT PASURUAN"} />
              <DashboardTableRow title={"UPT BOJONEGORO"} />
              <DashboardTableRow title={"UPT PAMEKASAN"} />
            </div>
            <div
              className="row row-content col-footer border-none"
              style={{
                background: "#EDF9FB",
              }}
            >
              <div className="col d-flex align-items-center justify-content-center">
                TOTAL KESELURUHAN
              </div>
              <div className="col d-flex align-items-center justify-content-center">
                500
              </div>
              <div className="col d-flex flex-col align-items-center justify-content-center">
                <div className="row py-2">
                  <div className="col">500</div>
                </div>
              </div>
              <div className="col d-flex flex-col align-items-center justify-content-center">
                <div className="row py-2">
                  <div className="col">500</div>
                </div>
              </div>
              <div className="col d-flex flex-col align-items-center justify-content-center">
                <div className="row py-2">
                  <div className="col">500</div>
                  <div className="col">5.000.000</div>
                </div>
              </div>
              <div className="col d-flex flex-col align-items-center justify-content-center">
                <div className="row py-2">
                  <div className="col">500</div>
                  <div className="col">5.000.000</div>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
  );
  //   } else {
  //   return (
  //     <div className="side-menu border">
  //       pe
  //     </div>
  //   );
  // }
  
};
