import React from "react";
import About from "./About";
import BerandaLayout from "@/Layouts/BerandaLayout";

const Beranda = () => {
    return (
        <>
            <div className="bg-custom-bg bg-cover bg-center h-[90vh] w-full">
                <div className="text-white text-center h-full flex flex-col justify-center">
                    <h1 className="font-bold text-[50px]">
                        Welcome To DESACANG
                    </h1>
                    <span>
                        Official Website Desa Untuk Mendata Penduduk Dan Melihat
                        Kegiatan Desa
                    </span>
                </div>
            </div>
            <About />
        </>
    );
};

Beranda.layout = (page) => <BerandaLayout>{page}</BerandaLayout>;

export default Beranda;
