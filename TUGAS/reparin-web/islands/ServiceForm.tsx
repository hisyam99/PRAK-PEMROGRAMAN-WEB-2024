import { useState } from "preact/hooks";
import { createService } from "../utils/api.ts";

export default function ServiceForm() {
  const [formData, setFormData] = useState({
    name: "",
    description: "",
    category: "",
    price_range: "",
    image_url: null as File | null,
  });

  const handleInputChange = (
    e: Event & { currentTarget: HTMLInputElement | HTMLTextAreaElement },
  ) => {
    const { name, value } = e.currentTarget;
    setFormData((prev) => ({ ...prev, [name]: value }));
  };

  const handleFileChange = (
    e: Event & { currentTarget: HTMLInputElement },
  ) => {
    const files = e.currentTarget.files;
    if (files) {
      setFormData((prev) => ({ ...prev, image_url: files[0] }));
    }
  };

  const handleSubmit = async (e: Event) => {
    e.preventDefault();
    
    const data = new FormData();
    data.append("name", formData.name);
    data.append("description", formData.description);
    data.append("category", formData.category);
    data.append("price_range", formData.price_range);
    
    if (formData.image_url) {
      data.append("image_url", formData.image_url);
    }

    try {
      await createService(data);
      globalThis.location.reload();
    } catch (error) {
      alert("Failed to create service");
    }
  };

  return (
    <div className="bg-white shadow-md rounded-lg p-4">
      <h2 className="text-xl font-semibold mb-4">Add New Service</h2>
      <form onSubmit={handleSubmit} className="space-y-4">
        <input
          type="text"
          name="name"
          placeholder="Service Name"
          value={formData.name}
          onInput={handleInputChange}
          required
          className="w-full p-2 border rounded"
        />
        <textarea
          name="description"
          placeholder="Description"
          value={formData.description}
          onInput={handleInputChange}
          required
          className="w-full p-2 border rounded"
        />
        <input
          type="text"
          name="category"
          placeholder="Category"
          value={formData.category}
          onInput={handleInputChange}
          required
          className="w-full p-2 border rounded"
        />
        <input
          type="text"
          name="price_range"
          placeholder="Price Range"
          value={formData.price_range}
          onInput={handleInputChange}
          required
          className="w-full p-2 border rounded"
        />
        <input
          type="file"
          name="image_url"
          accept="image/*"
          onChange={handleFileChange}
          className="w-full p-2 border rounded"
        />
        <button
          type="submit"
          className="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600"
        >
          Add Service
        </button>
      </form>
    </div>
  );
}