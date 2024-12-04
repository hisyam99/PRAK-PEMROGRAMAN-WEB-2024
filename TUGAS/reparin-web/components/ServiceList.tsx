import { Service } from "../types/Service.ts";
import { deleteService } from "../utils/api.ts";

interface ServiceListProps {
  services: Service[];
}

export default function ServiceList({ services }: ServiceListProps) {
  const handleDelete = async (id: number) => {
    if (confirm("Are you sure you want to delete this service?")) {
      try {
        await deleteService(id);
        globalThis.location.reload();
      } catch (error) {
        alert("Failed to delete service");
      }
    }
  };

  return (
    <div className="bg-white shadow-md rounded-lg p-4">
      <h2 className="text-xl font-semibold mb-4">Services</h2>
      {services.length === 0 ? (
        <p>No services found</p>
      ) : (
        <ul className="space-y-2">
          {services.map((service) => (
            <li 
              key={service.id} 
              className="flex justify-between items-center border-b pb-2"
            >
              <div className="flex items-center">
                {service.image_url && (
                  <img 
                    src={service.image_url} 
                    alt={service.name} 
                    className="w-16 h-16 object-cover mr-4 rounded"
                  />
                )}
                <div>
                  <h3 className="font-medium">{service.name}</h3>
                  <p className="text-gray-600">{service.category}</p>
                </div>
              </div>
              <button 
                onClick={() => handleDelete(service.id)}
                className="text-red-500 hover:text-red-700"
              >
                Delete
              </button>
            </li>
          ))}
        </ul>
      )}
    </div>
  );
}