import React, { useState, useEffect } from "react";
import axios from "axios";

function NotificationComponent({ pendudukId }) {
    const [notifications, setNotifications] = useState([]);

    useEffect(() => {
        const fetchNotifications = async () => {
            try {
                const response = await axios.get(
                    `http://127.0.0.1:8000/api/notifications/${pendudukId}`
                );
                setNotifications(response.data);
            } catch (error) {
                console.error("Error fetching notifications:", error);
            }
        };

        fetchNotifications();
    }, [pendudukId]);

    return (
      <div className="h-[70vh]">
      <div className="border-b p-6 rounded-md w-full h-[100px]">
        <div className="flex justify-between items-center">
          <div className="flex">
            <h3 className="font-bold text-lg">atribut judul</h3>
            <span className="text-sm text-gray-600">atribut tipe</span>
            <span className="text-sm text-gray-600">atribut waktu</span>
          </div>
        </div>
        <p className="mt-2 text-gray-700">atribut pesan</p>
      </div>
    </div>
    
    );
}

export default NotificationComponent;
