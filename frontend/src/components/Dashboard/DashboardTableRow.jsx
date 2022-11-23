export const DashboardTableRow = ({
  name,
  total_tanah_induk,
  total_tanah_pinjam_pakai,
  total_tanah_pakai_sendiri,
  total_tanah_sewa_sip_bmd,
  total_rupiah_tanah_sewa_sip_bmd,
  total_tanah_retribusi,
  total_rupiah_tanah_retribusi,
}) => {
  
  return (
    <div className="row row-content">
      <div className="col d-flex align-items-center justify-content-center">
        {name}
      </div>
      <div className="col d-flex align-items-center justify-content-center">
        {total_tanah_induk}
      </div>
      <div className="col d-flex flex-col align-items-center justify-content-center">
        <div className="row py-2">
          <div className="col">{ total_tanah_pinjam_pakai}</div>
        </div>
      </div>
      <div className="col d-flex flex-col align-items-center justify-content-center">
        <div className="row py-2">
          <div className="col">{total_tanah_pakai_sendiri}</div>
        </div>
      </div>
      <div className="col d-flex flex-col align-items-center justify-content-center">
        <div className="row py-2">
          <div className="col">{total_tanah_sewa_sip_bmd}</div>
          <div className="col">{(total_rupiah_tanah_sewa_sip_bmd)}</div>
        </div>
      </div>
      <div className="col d-flex flex-col align-items-center justify-content-center">
        <div className="row py-2">
          <div className="col">{total_tanah_retribusi}</div>
          <div className="col">{total_rupiah_tanah_retribusi}</div>
        </div>
      </div>
    </div>
  );
};
