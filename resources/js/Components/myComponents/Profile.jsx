import BerandaLayout from "@/Layouts/BerandaLayout";
import { Link, usePage } from "@inertiajs/react";
import React from "react";

const Profile = () => {
    const { penduduk = [] } = usePage().props;

    return (
        <div className="p-6 bg-gray-50 min-h-screen">
            <div className="max-w-7xl mx-auto bg-white shadow-xl rounded-xl p-8">
                <div className="flex justify-between mb-8">
                    <h1 className="text-4xl font-semibold text-center text-gray-900">
                        Profilku
                    </h1>
                    <Link
                        href="#"
                        className="p-3 bg-blue-500 text-white font-bold rounded-lg mt-6"
                    >
                        Edit Dataku
                    </Link>
                </div>
                {penduduk.length === 0 ? (
                    <div className="text-center text-gray-500">
                        Data penduduk tidak tersedia.
                    </div>
                ) : (
                    penduduk.map((profile) => (
                        <div
                            key={profile.id}
                            className="flex flex-col md:flex-row items-start gap-8 md:gap-10 mb-12"
                        >
                            <div className="w-full">
                                <table className="w-full text-left text-gray-700">
                                    <tbody>
                                        <tr className="border-b border-gray-300">
                                            <td className="font-semibold text-gray-800">
                                                Nama
                                            </td>
                                            <td className="font-medium">:</td>
                                            <td>{profile.nama}</td>
                                        </tr>
                                        <tr className="border-b border-gray-300">
                                            <td className="font-semibold text-gray-800">
                                                Kepala Keluarga
                                            </td>
                                            <td className="font-medium">:</td>
                                            <td>{profile.kepala_keluarga}</td>
                                        </tr>
                                        <tr className="border-b border-gray-300">
                                            <td className="font-semibold text-gray-800">
                                                No Kartu Keluarga
                                            </td>
                                            <td className="font-medium">:</td>
                                            <td>{profile.no_kk}</td>
                                        </tr>
                                        <tr className="border-b border-gray-300">
                                            <td className="font-semibold text-gray-800">
                                                NIK
                                            </td>
                                            <td className="font-medium">:</td>
                                            <td>{profile.nik}</td>
                                        </tr>
                                        <tr className="border-b border-gray-300">
                                            <td className="font-semibold text-gray-800">
                                                Jumlah Anggota Keluarga
                                            </td>
                                            <td className="font-medium">:</td>
                                            <td>{profile.jumlah_keluarga}</td>
                                        </tr>
                                        <tr className="border-b border-gray-300">
                                            <td className="font-semibold text-gray-800">
                                                Pekerjaan
                                            </td>
                                            <td className="font-medium">:</td>
                                            <td>{profile.pekerjaan}</td>
                                        </tr>
                                        <tr className="border-b border-gray-300">
                                            <td className="font-semibold text-gray-800">
                                                Gaji
                                            </td>
                                            <td className="font-medium">:</td>
                                            <td>{profile.gaji}</td>
                                        </tr>
                                        <tr className="border-b border-gray-300">
                                            <td className="font-semibold text-gray-800">
                                                Jenis Bantuan
                                            </td>
                                            <td className="font-medium">:</td>
                                            <td>
                                                {profile.bantuan?.jenis_bantuan ||
                                                    "Tidak ada bantuan"}
                                            </td>
                                        </tr>
                                        <tr className="border-b border-gray-300">
                                            <td className="font-semibold text-gray-800">
                                                Desa
                                            </td>
                                            <td className="font-medium">:</td>
                                            <td>{profile.desa}</td>
                                        </tr>
                                        <tr className="border-b border-gray-300">
                                            <td className="font-semibold text-gray-800">
                                                Banjar
                                            </td>
                                            <td className="font-medium">:</td>
                                            <td>{profile.banjar}</td>
                                        </tr>
                                        <tr className="border-b border-gray-300">
                                            <td className="font-semibold text-gray-800">
                                                Alamat
                                            </td>
                                            <td className="font-medium">:</td>
                                            <td>{profile.alamat}</td>
                                        </tr>
                                        <tr className="border-b border-gray-300">
                                            <td className="font-semibold text-gray-800">
                                                No. Rumah
                                            </td>
                                            <td className="font-medium">:</td>
                                            <td>{profile.no_rumah}</td>
                                        </tr>
                                        <tr className="border-b border-gray-300">
                                            <td className="font-semibold text-gray-800">
                                                Kategori
                                            </td>
                                            <td className="font-medium">:</td>
                                            <td>{profile.kategori}</td>
                                        </tr>
                                        <tr className="border-b border-gray-300">
                                            <td className="font-semibold text-gray-800">
                                                Geolocation
                                            </td>
                                            <td className="font-medium">:</td>
                                            <td>{profile.geolocation}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    ))
                )}
                <div className="pt-12">
                    <h2 className="text-2xl text-center font-semibold text-gray-900 mb-4">
                        Dokumen Pendukung
                    </h2>
                    <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {penduduk.length > 0 && (
                            <>
                                <div>
                                    <h3 className="text-center font-bold text-2xl">
                                        Kartu Keluarga
                                    </h3>
                                    <div className="flex justify-center items-center bg-gray-200 p-4 rounded-lg shadow-md">
                                        <img
                                            src={`/assets/uploads/kk/${penduduk.kk}`}
                                            src={`/assets/uploads/kk/${penduduk[0]?.kk || "default.jpg"}`}
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
                                            src={`/assets/uploads/rumah/${penduduk.rumah}`}
                                            src={`/assets/uploads/rumah/${penduduk[0]?.rumah || "default.jpg"}`}
                                            alt="Foto Rumah"
                                            className="w-full h-[300px] object-cover rounded-md shadow-lg transform hover:scale-105 transition duration-300 ease-in-out"
                                        />
                                    </div>
                                </div>
                            </>
                        )}
                    </div>
                </div>
            </div>
        </div>
    );
};

Profile.layout = (page) => <BerandaLayout>{page}</BerandaLayout>;

export default Profile;
