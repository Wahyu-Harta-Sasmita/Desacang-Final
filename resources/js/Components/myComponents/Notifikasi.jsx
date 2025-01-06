import React, { useState, useEffect } from 'react';
import axios from 'axios';

function NotificationComponent({ pendudukId }) {
  const [notifications, setNotifications] = useState([]);

  useEffect(() => {
    const fetchNotifications = async () => {
      try {
        const response = await axios.get(`http://127.0.0.1:8000/api/notifications/${pendudukId}`);
        setNotifications(response.data);
      } catch (error) {
        console.error('Error fetching notifications:', error);
      }
    };

    fetchNotifications();
  }, [pendudukId]);

  return (
    <div>
      <h3>Notifikasi:</h3>
      {notifications.length > 0 ? (
        <ul>
          {notifications.map((notification) => (
            <li key={notification.id}>{notification.message}</li>
          ))}
        </ul>
      ) : (
        <p>Tidak ada notifikasi</p>
      )}
    </div>
  );
}

export default NotificationComponent;
