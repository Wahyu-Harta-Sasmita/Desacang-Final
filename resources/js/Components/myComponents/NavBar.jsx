import React from "react";
import { Link } from "@inertiajs/react";

const NavBar = () => {
    return (
        <nav className="bg-white shadow-md py-4 px-5">
            <div className="container mx-auto flex items-center justify-between">
                <div className="flex items-center gap-3">
                    <img 
                        src="/path-to-logo.png" 
                        alt="logo" 
                        className="h-8 w-8 object-contain"
                    />
                    <h1 className="text-xl font-bold text-gray-800">DESACANG</h1>
                </div>

                <div className="flex items-center gap-6">
                    <Link 
                        href="/article" 
                        className="text-gray-600 hover:text-gray-800 transition duration-200 font-medium"
                    >
                        Article
                    </Link>

                    <Link href="/notification" className="relative">
                        <img 
                            src="/path-to-notification-icon.png" 
                            alt="notification" 
                            className="h-6 w-6"
                        />
                        <span className="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">3</span>
                    </Link>

                    <Link href="/profile">
                        <img 
                            src="/path-to-profile-icon.png" 
                            alt="profile" 
                            className="h-8 w-8 rounded-full border border-gray-300 object-cover"
                        />
                    </Link>
                </div>
            </div>
        </nav>
    );
};

export default NavBar;
