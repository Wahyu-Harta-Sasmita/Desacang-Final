import { usePage } from "@inertiajs/react";

function Notification() {
  const { notifications } = usePage().props;

  return (
    <div>
      {notifications.length === 0 ? (
        <div>No notifications available.</div>
      ) : (
        notifications.map((notification) => (
          <div key={notification.id} className="h-[70vh]">
            <div className="border-b-2 border-grey-800 p-6 rounded-md w-full h-[100px]">
              <div className="flex justify-between w-full items-center">
                <h3 className="font-bold text-lg">{notification.judul}</h3>
                <p className="text-md">Tipe: {notification.tipe}</p>
              </div>
              <div className="flex justify-between w-full">
                <p className="mt-2 w-[80%]">{notification.pesan}</p>
                <p className="text-sm">
                  {new Date(notification.created_at).toLocaleDateString("en-GB")}
                </p>
              </div>
            </div>
          </div>
        ))
      )}
    </div>
  );
}

export default Notification;
