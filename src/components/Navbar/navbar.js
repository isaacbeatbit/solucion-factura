// Mobile menu functionality
export function initMobileMenu() {
  const mobileToggle = document.querySelector(".mobile-menu-toggle");
  const mobileNav = document.querySelector(".mobile-nav");

  if (mobileToggle && mobileNav) {
    mobileToggle.addEventListener("click", () => {
      mobileToggle.classList.toggle("active");
      mobileNav.classList.toggle("active");

      const isExpanded = mobileNav.classList.contains("active");
      mobileToggle.setAttribute("aria-expanded", isExpanded);
    });

    // Cerrar menú al hacer click en enlaces
    const mobileLinks = document.querySelectorAll(".mobile-nav-link");
    mobileLinks.forEach((link) => {
      link.addEventListener("click", () => {
        mobileToggle.classList.remove("active");
        mobileNav.classList.remove("active");
        mobileToggle.setAttribute("aria-expanded", "false");
      });
    });

    // Cerrar menú al hacer click fuera
    document.addEventListener("click", (e) => {
      if (!mobileToggle.contains(e.target) && !mobileNav.contains(e.target)) {
        mobileToggle.classList.remove("active");
        mobileNav.classList.remove("active");
        mobileToggle.setAttribute("aria-expanded", "false");
      }
    });
  }
}
