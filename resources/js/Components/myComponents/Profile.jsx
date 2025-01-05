import BerandaLayout from "@/Layouts/BerandaLayout";
import { Link, usePage } from "@inertiajs/react";
import React from "react";

const Profile = () => {
    const { penduduk = [] } = usePage().props;
    const profile = penduduk[0] || {};

    return (
        <div className="p-6 bg-gray-50 min-h-screen">
            <div className="max-w-7xl mx-auto bg-white shadow-xl rounded-xl p-8">
                <div className="flex justify-between mb-8">
                    <Link
                        href={route("logout")}
                        method="post"
                        as="button"
                        className="p-3 bg-red-500 text-white font-bold rounded-lg"
                    >
                        Logout
                    </Link>
                    <h1 className="text-4xl font-semibold text-center text-gray-900">
                        Profilku
                    </h1>
                    <a
                        href={`/profiles/${profile.id_penduduk}/edit`}
                        className="p-3 bg-blue-500 text-white font-bold rounded-lg"
                    >
                        Edit Dataku
                    </a>
                </div>
                {penduduk.length === 0 ? (
                    <div className="text-center text-gray-500">
                        Data penduduk tidak tersedia.
                    </div>
                ) : (
                    <div className="flex flex-col gap-8">
                        <table className="w-full text-left text-gray-700">
                            <tbody>
                                {Object.entries({
                                    Nama: profile.nama,
                                    "Kepala Keluarga": profile.kepala_keluarga,
                                    "No Kartu Keluarga": profile.no_kk,
                                    NIK: profile.nik,
                                    "Jumlah Anggota Keluarga":
                                        profile.jumlah_keluarga,
                                    Pekerjaan: profile.pekerjaan,
                                    Gaji: profile.gaji,
                                    "Jenis Bantuan":
                                        profile.bantuan?.jenis_bantuan ||
                                        "Tidak ada bantuan",
                                    Desa: profile.desa,
                                    Banjar: profile.banjar,
                                    Alamat: profile.alamat,
                                    "No. Rumah": profile.no_rumah,
                                    Kategori: profile.kategori,
                                    Geolocation: profile.geolocation,
                                }).map(([label, value], index) => (
                                    <tr
                                        key={index}
                                        className="border-b border-gray-300"
                                    >
                                        <td className="font-semibold text-gray-800">
                                            {label}
                                        </td>
                                        <td className="font-medium">:</td>
                                        <td>{value}</td>
                                    </tr>
                                ))}
                            </tbody>
                        </table>
                        <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h3 className="text-center font-bold text-2xl">
                                    Kartu Keluarga
                                </h3>
                                <div className="flex justify-center items-center bg-gray-200 p-4 rounded-lg shadow-md">
                                    <img
                                        src={`/assets/uploads/kk/${
                                            profile.kk || "default.jpg"
                                        }`}
                                        alt="Foto Kartu Keluarga"
                                        className="w-full h-[300px] object-cover rounded-md shadow-lg transform hover:scale-105 transition duration-300 ease-in-out"
                                    />
                                </div>
                            </div>
                            <div>
                                <h3 className="text-center font-bold text-2xl">
                                    Rumah
                                </h3>
                                <div className="flex justify-center items-center bg-gray-200 p-4 rounded-lg shadow-md">
                                    <img
                                        src={`/assets/uploads/rumah/${
                                            profile.rumah || "default.jpg"
                                        }`}
                                        alt="Foto Rumah"
                                        className="w-full h-[300px] object-cover rounded-md shadow-lg transform hover:scale-105 transition duration-300 ease-in-out"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                )}
            </div>
        </div>
    );
};

Profile.layout = (page) => <BerandaLayout>{page}</BerandaLayout>;

export default Profile;
