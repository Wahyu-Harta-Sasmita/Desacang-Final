import React from 'react';

const Notifikasi = () => {
  return (
    <div className="flex justify-center items-center h-screen bg-gray-100">
      <div className="bg-white shadow-lg rounded-lg p-6 w-96 md:w-1/2 lg:w-2/3">
        <h2 className="font-bold text-2xl text-center py-4 text-gray-800">
          Validasi Data Saya
        </h2>
        <div className="flex justify-center">
          <span className="bg-green-100 text-green-600 text-sm font-medium px-4 py-2 rounded-full">
            Berhasil
          </span>
        </div>
      </div>
    </div>
  );
};

export default Notifikasi;
