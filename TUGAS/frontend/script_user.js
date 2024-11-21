const apiUrl = "http://localhost:8000/api/services";
const servicesGrid = document.getElementById("servicesGrid");

// Fetch and display services (READ-ONLY)
async function fetchServices() {
  try {
    const response = await fetch(apiUrl);
    const { data } = await response.json();

    servicesGrid.innerHTML = ""; // Clear grid before populating

    data.forEach((service) => {
      const card = document.createElement("div");
      card.className = "service-card";

      card.innerHTML = `
        <img src="${
          service.image_url || "https://via.placeholder.com/300"
        }" alt="${service.name}" class="service-image" />
        <h3>${service.name}</h3>
        <p class="service-description">${service.description}</p>
        <p class="service-category"><strong>Kategori:</strong> ${
          service.category
        }</p>
        <p class="service-price"><strong>Rentang Harga:</strong> ${
          service.price_range
        }</p>
      `;

      servicesGrid.appendChild(card);
    });
  } catch (error) {
    console.error("Error fetching services:", error);
    servicesGrid.innerHTML = `
      <p>Failed to load services. Please try again later.</p>
    `;
  }
}

// Initial fetch
fetchServices();
