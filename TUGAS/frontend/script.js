const serviceTable = document.querySelector("#serviceTable tbody");
const addServiceDialog = document.getElementById("addServiceDialog");
const addServiceButton = document.getElementById("addServiceButton");
const cancelAddServiceButton = document.getElementById("cancelAddService");
const editDialog = document.getElementById("editDialog");
const editServiceForm = document.getElementById("editServiceForm");
const closeEditDialog = document.getElementById("closeEditDialog");

const apiUrl = "http://localhost:8000/api/services";

// Fetch and display services
async function fetchServices() {
  try {
    const response = await fetch(apiUrl);
    const { data } = await response.json();
    serviceTable.innerHTML = data
      .map(
        (service) => `
    <tr>
      <td>${service.id}</td>
      <td><img src="${service.image_url}" alt="Service Image" class="service-preview" /></td>
      <td>${service.image_url}</td>
      <td>${service.name}</td>
      <td>${service.description}</td>
      <td>${service.category}</td>
      <td>${service.price_range}</td>
      <td>
        <button onclick="openEditDialog(${service.id})">Edit</button>
        <button onclick="deleteService(${service.id})">Delete</button>
      </td>
    </tr>
        `
      )
      .join("");
  } catch (error) {
    console.error("Error fetching services:", error);
    alert("Gagal memuat data layanan. Silakan coba lagi.");
  }
}

// Open add service dialog
addServiceButton.addEventListener("click", () => {
  serviceForm.reset(); // Clear any previous inputs
  addServiceDialog.showModal();
});

// Cancel add service dialog
cancelAddServiceButton.addEventListener("click", () => {
  addServiceDialog.close();
});

// Add new service
const serviceForm = document.getElementById("addServiceDialog").querySelector("form");
serviceForm.addEventListener("submit", async (e) => {
  e.preventDefault();

  try {
    const image_url = document.getElementById("image_url").value;
    const name = document.getElementById("name").value;
    const description = document.getElementById("description").value;
    const category = document.getElementById("category").value;
    const priceRange = document.getElementById("priceRange").value;

    const response = await fetch(apiUrl, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({
        image_url,
        name,
        description,
        category,
        price_range: priceRange,
      }),
    });

    if (!response.ok) {
      throw new Error("Gagal menambahkan layanan");
    }

    addServiceDialog.close();
    serviceForm.reset();
    fetchServices();
  } catch (error) {
    console.error("Error adding service:", error);
    alert("Gagal menambahkan layanan. Silakan coba lagi.");
  }
});

// Open edit dialog
async function openEditDialog(id) {
  try {
    const response = await fetch(`${apiUrl}/${id}`);
    const { data } = await response.json();

    if (!data || data.length === 0) {
      throw new Error("Data layanan tidak ditemukan");
    }

    document.getElementById("editServiceId").value = data[0].id;
    document.getElementById("editImageUrl").value = data[0].image_url;
    document.getElementById("editName").value = data[0].name;
    document.getElementById("editDescription").value = data[0].description;
    document.getElementById("editCategory").value = data[0].category;
    document.getElementById("editPriceRange").value = data[0].price_range;

    editDialog.showModal();
  } catch (error) {
    console.error("Error opening edit dialog:", error);
    alert("Gagal membuka dialog edit. Silakan coba lagi.");
  }
}

// Save changes in the edit dialog
editServiceForm.addEventListener("submit", async (e) => {
  e.preventDefault();

  try {
    const id = document.getElementById("editServiceId").value;
    const image_url = document.getElementById("editImageUrl").value;
    const name = document.getElementById("editName").value;
    const description = document.getElementById("editDescription").value;
    const category = document.getElementById("editCategory").value;
    const priceRange = document.getElementById("editPriceRange").value;

    const response = await fetch(`${apiUrl}/${id}`, {
      method: "PUT",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({
        image_url,
        name,
        description,
        category,
        price_range: priceRange,
      }),
    });

    if (!response.ok) {
      throw new Error("Gagal memperbarui layanan");
    }

    editDialog.close();
    fetchServices();
  } catch (error) {
    console.error("Error updating service:", error);
    alert("Gagal memperbarui layanan. Silakan coba lagi.");
  }
});

// Cancel edit dialog
closeEditDialog.addEventListener("click", () => {
  editDialog.close();
});

// Delete service
async function deleteService(id) {
  try {
    if (confirm("Apakah Anda yakin ingin menghapus layanan ini?")) {
      const response = await fetch(`${apiUrl}/${id}`, { method: "DELETE" });

      if (!response.ok) {
        throw new Error("Gagal menghapus layanan");
      }

      fetchServices();
    }
  } catch (error) {
    console.error("Error deleting service:", error);
    alert("Gagal menghapus layanan. Silakan coba lagi.");
  }
}

// Initial fetch
fetchServices();