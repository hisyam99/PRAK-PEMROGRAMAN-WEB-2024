const serviceTable = document.querySelector("#serviceTable tbody");
const serviceForm = document.getElementById("serviceForm");
const formTitle = document.getElementById("formTitle");
const cancelButton = document.getElementById("cancelButton");

const apiUrl = "http://localhost:8000/api/services";

// Fetch and display services
async function fetchServices() {
  const response = await fetch(apiUrl);
  const { data } = await response.json();
  serviceTable.innerHTML = "";
  data.forEach((service) => {
    serviceTable.innerHTML += `
            <tr>
                <td>${service.id}</td>
                <td>${service.name}</td>
                <td>${service.description}</td>
                <td>${service.category}</td>
                <td>${service.price_range}</td>
                <td>
                    <button onclick="editService(${service.id})">Edit</button>
                    <button onclick="deleteService(${service.id})">Delete</button>
                </td>
            </tr>
        `;
  });
}

// Add or update service
serviceForm.addEventListener("submit", async (e) => {
  e.preventDefault();
  const id = document.getElementById("serviceId").value;
  const name = document.getElementById("name").value;
  const description = document.getElementById("description").value;
  const category = document.getElementById("category").value;
  const priceRange = document.getElementById("priceRange").value;

  const method = id ? "PUT" : "POST";
  const endpoint = id ? `${apiUrl}/${id}` : apiUrl;
  const body = JSON.stringify({
    name,
    description,
    category,
    price_range: priceRange,
  });

  await fetch(endpoint, {
    method,
    headers: { "Content-Type": "application/json" },
    body,
  });

  serviceForm.reset();
  cancelButton.style.display = "none";
  formTitle.textContent = "Add New Service";
  fetchServices();
});

// Edit service
async function editService(id) {
  const response = await fetch(`${apiUrl}/${id}`);
  const { data } = await response.json();

  document.getElementById("serviceId").value = data[0].id;
  document.getElementById("name").value = data[0].name;
  document.getElementById("description").value = data[0].description;
  document.getElementById("category").value = data[0].category;
  document.getElementById("priceRange").value = data[0].price_range;

  formTitle.textContent = "Edit Service";
  cancelButton.style.display = "inline-block";
}

// Cancel editing
cancelButton.addEventListener("click", () => {
  serviceForm.reset();
  cancelButton.style.display = "none";
  formTitle.textContent = "Add New Service";
});

// Delete service
async function deleteService(id) {
  if (confirm("Are you sure you want to delete this service?")) {
    await fetch(`${apiUrl}/${id}`, { method: "DELETE" });
    fetchServices();
  }
}

// Initial fetch
fetchServices();
