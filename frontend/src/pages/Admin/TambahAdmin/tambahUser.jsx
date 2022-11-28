import { useState } from "react";
import { useNavigate, useParams } from "react-router-dom";
import LayoutAdmin from "../../../components/Layout/layoutAdmin";

export const TambahUser = () => {
    const navigate = useNavigate();
    return (
        <LayoutAdmin>
            <div
                className="d-flex justify-content-between align-items-center mx-3 py-3"
                style={{
                    borderBottom: "#BCBCBC 1px solid",
                }}
            >
                <div className="font-semibold" style={{ cursor: "pointer" }}>
                    <div
                        className="font-semibold"
                        style={{ cursor: "pointer" }}
                        onClick={() => {
                            navigate(-1);
                        }}
                    >
                        &larr; &emsp; Kembali
                    </div>
                </div>
                <div className="d-flex gap-2">
                    <div
                        className="text-center"
                        style={{
                            cursor: "pointer",
                            border: "#DC2F2F 1px solid",
                            padding: "5px 10px",
                            borderRadius: "5px",
                            color: "#DC2F2F",
                            width: "120px",
                        }}
                    >
                        Batal
                    </div>
                    <button
                        type="button"
                        className="primary-btn"
                    >
                        Simpan Data
                    </button>
                </div>
            </div>
            <div className="m-3">
                <h5 style={{ paddingBottom: "20px" }}>Tambah Data User</h5>
                <form className="form-tambah-tanah d-flex flex-col gap-3 px-5">
                    <div>
                        <label htmlFor="nama-user">
                            Nama
                        </label>
                        <input
                            type="text"
                            className="w-100"
                            name="nama-user"
                        />
                    </div>
                    <div>
                        <label htmlFor="role">Role</label>
                        <input
                            type="text"
                            className="w-100"
                            name="role"
                        />
                    </div>
                    <div>
                        <label htmlFor="email">Email</label>
                        <input
                            type="text"
                            className="w-100"
                            name="email"
                        />
                    </div>
                    <div>
                        <label htmlFor="kata-sandi">Kata Sandi</label>
                        <input
                            type="text"
                            className="w-100"
                            name="katasandi"
                        />
                    </div>
                    <div>
                        <label htmlFor="konfirmasi-kata-sandi">Konfirmasi Kata Sandi</label>
                        <input
                            type="text"
                            className="w-100"
                            name="konfirmasi"
                        />
                    </div>
                </form>
            </div>
        </LayoutAdmin>
    );
};
