import BerandaLayout from '@/Layouts/BerandaLayout';
import React from 'react';

const Notifikasi = () => {
  return (
    <div className="flex justify-center items-center h-screen">
      <div className=" p-8 w-96 md:w-1/2 lg:w-2/3 max-w-full">
        <div className="flex justify-center mb-4">
          <img 
            src="/assets/images/comingsoon.png" 
            alt="comingsoon" 
            className="transition-transform transform hover:scale-105" 
          />
        </div>
        <p className="text-center text-gray-500 mt-2">Stay tuned for exciting updates!</p>
      </div>
    </div>
  );
};

Notifikasi.layout = (page) => <BerandaLayout>{page}</BerandaLayout>;

export default Notifikasi;
