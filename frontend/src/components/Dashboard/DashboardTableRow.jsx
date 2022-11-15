export const DashboardTableRow = ({title}) => {
  return (
    <div className="row row-content">
      <div className="col d-flex align-items-center justify-content-center">
        {title}
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
  );
};
