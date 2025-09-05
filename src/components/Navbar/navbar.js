// ========================================
// NAVBAR MOBILE FUNCTIONALITY
// ========================================

export function initMobileMenu() {
  const mobileToggle = document.querySelector(".mobile-menu-toggle");
  const mobileNav = document.querySelector(".mobile-nav");
  const navbar = document.querySelector(".navbar-header");

  if (!mobileToggle || !mobileNav) {
    console.warn("Mobile menu elements not found");
    return;
  }

  // Estado inicial
  let isOpen = false;

  // Función para abrir el menú
  function openMenu() {
    isOpen = true;
    mobileToggle.classList.add("active");
    mobileNav.classList.add("active");
    mobileToggle.setAttribute("aria-expanded", "true");
    mobileNav.setAttribute("aria-hidden", "false");

    // Prevenir scroll del body cuando el menú esté abierto
    document.body.style.overflow = "hidden";

    // Focus en el primer enlace del menú para mejor accesibilidad
    const firstLink = mobileNav.querySelector(".mobile-nav-link");
    if (firstLink) {
      setTimeout(() => firstLink.focus(), 100);
    }
  }

  // Función para cerrar el menú
  function closeMenu() {
    isOpen = false;
    mobileToggle.classList.remove("active");
    mobileNav.classList.remove("active");
    mobileToggle.setAttribute("aria-expanded", "false");
    mobileNav.setAttribute("aria-hidden", "true");

    // Restaurar scroll del body
    document.body.style.overflow = "";

    // Devolver focus al botón toggle
    mobileToggle.focus();
  }

  // Función para toggle del menú
  function toggleMenu() {
    if (isOpen) {
      closeMenu();
    } else {
      openMenu();
    }
  }

  // Event listener para el botón toggle
  mobileToggle.addEventListener("click", (e) => {
    e.preventDefault();
    e.stopPropagation();
    toggleMenu();
  });

  // Cerrar menú al hacer click en enlaces
  const mobileLinks = mobileNav.querySelectorAll(".mobile-nav-link");
  mobileLinks.forEach((link) => {
    link.addEventListener("click", () => {
      // Solo cerrar si no es un enlace externo o de teléfono
      const href = link.getAttribute("href");
      if (href && (href.startsWith("#") || href.startsWith("/"))) {
        closeMenu();
      }
    });
  });

  // Cerrar menú al hacer click fuera
  document.addEventListener("click", (e) => {
    if (
      isOpen &&
      !mobileToggle.contains(e.target) &&
      !mobileNav.contains(e.target)
    ) {
      closeMenu();
    }
  });

  // Cerrar menú con tecla Escape
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && isOpen) {
      closeMenu();
    }
  });

  // Cerrar menú al cambiar a desktop
  const mediaQuery = window.matchMedia("(min-width: 1024px)");
  function handleMediaChange(e) {
    if (e.matches && isOpen) {
      closeMenu();
    }
  }

  // Usar el método correcto dependiendo del soporte del navegador
  if (mediaQuery.addEventListener) {
    mediaQuery.addEventListener("change", handleMediaChange);
  } else {
    // Fallback para navegadores antiguos
    mediaQuery.addListener(handleMediaChange);
  }

  // Manejar navegación por teclado en el menú móvil
  mobileNav.addEventListener("keydown", (e) => {
    if (!isOpen) return;

    const focusableElements = mobileNav.querySelectorAll(
      'a[href], button:not([disabled]), [tabindex]:not([tabindex="-1"])',
    );

    const firstElement = focusableElements[0];
    const lastElement = focusableElements[focusableElements.length - 1];

    if (e.key === "Tab") {
      if (e.shiftKey) {
        // Shift + Tab
        if (document.activeElement === firstElement) {
          e.preventDefault();
          lastElement.focus();
        }
      } else {
        // Tab
        if (document.activeElement === lastElement) {
          e.preventDefault();
          firstElement.focus();
        }
      }
    }
  });

  // Función para limpiar event listeners (útil para Hot Module Replacement)
  function cleanup() {
    document.body.style.overflow = "";
    if (mediaQuery.removeEventListener) {
      mediaQuery.removeEventListener("change", handleMediaChange);
    } else {
      // Fallback para navegadores antiguos
      mediaQuery.removeListener(handleMediaChange);
    }
  }

  // Exportar función de limpieza para desarrollo
  if (window.navbarCleanup) {
    window.navbarCleanup();
  }
  window.navbarCleanup = cleanup;
}

// ========================================
// NAVBAR SCROLL EFFECTS (SIMPLIFIED)
// ========================================

export function initNavbarScrollEffects() {
  const navbar = document.querySelector(".navbar-header");
  if (!navbar) return;

  let ticking = false;

  function updateNavbar() {
    const scrolled = window.scrollY > 50;
    navbar.classList.toggle("scrolled", scrolled);
    ticking = false;
  }

  window.addEventListener(
    "scroll",
    () => {
      if (!ticking) {
        requestAnimationFrame(updateNavbar);
        ticking = true;
      }
    },
    { passive: true },
  );
}

// ========================================
// NAVBAR SMOOTH SCROLLING (SIMPLIFIED)
// ========================================

export function initSmoothScrolling() {
  document.addEventListener("click", (e) => {
    const anchor = e.target.closest('a[href^="#"]');
    if (!anchor) return;

    const href = anchor.getAttribute("href");
    if (href === "#" || href === "#top") {
      e.preventDefault();
      window.scrollTo({ top: 0, behavior: "smooth" });
      return;
    }

    const target = document.getElementById(href.substring(1));
    if (target) {
      e.preventDefault();
      const navbar = document.querySelector(".navbar-header");
      const offset = (navbar?.offsetHeight || 0) + 20;

      window.scrollTo({
        top: target.offsetTop - offset,
        behavior: "smooth",
      });
    }
  });
}

// Active link highlighting removed - not essential for performance

// ========================================
// MAIN INITIALIZATION FUNCTION (SIMPLIFIED)
// ========================================

export function initNavbar() {
  initMobileMenu();
  initNavbarScrollEffects();
  initSmoothScrolling();
}

// Auto-init
if (document.readyState === "loading") {
  document.addEventListener("DOMContentLoaded", initNavbar);
} else {
  initNavbar();
}
