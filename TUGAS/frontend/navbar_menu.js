document.addEventListener("DOMContentLoaded", () => {
  const hamburgerMenu = document.querySelector(".hamburger-menu");
  const navbar = document.querySelector(".navbar");

  hamburgerMenu.addEventListener("click", () => {
    hamburgerMenu.classList.toggle("active");
    navbar.classList.toggle("active");
  });

  // Tutup Menu ketika menekan tombol Menu atau Menekan bebas diluar area Menu
  document.addEventListener("click", (event) => {
    const isClickInsideNavbar = navbar.contains(event.target);
    const isClickHamburger = hamburgerMenu.contains(event.target);

    if (!isClickInsideNavbar && !isClickHamburger) {
      hamburgerMenu.classList.remove("active");
      navbar.classList.remove("active");
    }
  });

  // Tutup Menu ketika link di navigasi menu diklik
  navbar.querySelectorAll("a").forEach((link) => {
    link.addEventListener("click", () => {
      hamburgerMenu.classList.remove("active");
      navbar.classList.remove("active");
    });
  });
});
