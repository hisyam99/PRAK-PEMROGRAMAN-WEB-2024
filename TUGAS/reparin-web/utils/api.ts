import axios from "axios";

const API_BASE_URL = "http://localhost:8000/api"; // Adjust to your Laravel API URL

export const getServices = async () => {
  try {
    const response = await axios.get(`${API_BASE_URL}/services`);
    return response.data.data;
  } catch (error) {
    console.error("Error fetching services:", error);
    throw error;
  }
};

export const createService = async (data: FormData) => {
  try {
    const response = await axios.post(`${API_BASE_URL}/services`, data, {
      headers: {
        "Content-Type": "multipart/form-data",
      },
    });
    return response.data;
  } catch (error) {
    console.error("Error creating service:", error);
    throw error;
  }
};

export const deleteService = async (id: number) => {
  try {
    const response = await axios.delete(`${API_BASE_URL}/services/${id}`);
    return response.data;
  } catch (error) {
    console.error("Error deleting service:", error);
    throw error;
  }
};