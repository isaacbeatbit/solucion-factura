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
// NAVBAR SCROLL EFFECTS
// ========================================

export function initNavbarScrollEffects() {
  const navbar = document.querySelector(".navbar-header");

  if (!navbar) {
    console.warn("Navbar not found for scroll effects");
    return;
  }

  let lastScrollY = window.scrollY;
  let isScrolling = false;

  function handleScroll() {
    if (!isScrolling) {
      window.requestAnimationFrame(() => {
        const currentScrollY = window.scrollY;

        // Añadir clase cuando se haga scroll hacia abajo
        if (currentScrollY > 50) {
          navbar.classList.add("scrolled");
        } else {
          navbar.classList.remove("scrolled");
        }

        // Opcional: ocultar navbar al hacer scroll hacia abajo rápido
        // if (currentScrollY > lastScrollY && currentScrollY > 200) {
        //   navbar.classList.add("hidden");
        // } else {
        //   navbar.classList.remove("hidden");
        // }

        lastScrollY = currentScrollY;
        isScrolling = false;
      });
    }
    isScrolling = true;
  }

  // Throttle scroll events para mejor performance
  let scrollTimeout;
  window.addEventListener(
    "scroll",
    () => {
      if (scrollTimeout) {
        clearTimeout(scrollTimeout);
      }
      scrollTimeout = setTimeout(handleScroll, 10);
    },
    { passive: true },
  );
}

// ========================================
// NAVBAR SMOOTH SCROLLING
// ========================================

export function initSmoothScrolling() {
  const anchors = document.querySelectorAll('a[href^="#"]');

  anchors.forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      const href = this.getAttribute("href");

      // Solo procesar enlaces de ancla válidos
      if (href === "#" || href === "#top") {
        e.preventDefault();
        window.scrollTo({
          top: 0,
          behavior: "smooth",
        });
        return;
      }

      const targetId = href.substring(1);
      const targetElement = document.getElementById(targetId);

      if (targetElement) {
        e.preventDefault();

        // Calcular offset para el navbar sticky
        const navbar = document.querySelector(".navbar-header");
        const navbarHeight = navbar ? navbar.offsetHeight : 0;
        const targetPosition = targetElement.offsetTop - navbarHeight - 20;

        window.scrollTo({
          top: targetPosition,
          behavior: "smooth",
        });

        // Actualizar URL sin saltar
        if (history.pushState) {
          history.pushState(null, null, href);
        }
      }
    });
  });
}

// ========================================
// NAVBAR ACTIVE LINK HIGHLIGHTING
// ========================================

export function initActiveLinkHighlighting() {
  const sections = document.querySelectorAll("section[id], div[id]");
  const navLinks = document.querySelectorAll(
    '.nav-link[href^="#"], .mobile-nav-link[href^="#"]',
  );

  if (sections.length === 0 || navLinks.length === 0) {
    return;
  }

  function updateActiveLink() {
    let current = "";
    const scrollPosition = window.scrollY + 100; // Offset para activar antes

    sections.forEach((section) => {
      const sectionTop = section.offsetTop;
      const sectionHeight = section.offsetHeight;

      if (
        scrollPosition >= sectionTop &&
        scrollPosition < sectionTop + sectionHeight
      ) {
        current = section.getAttribute("id");
      }
    });

    // Actualizar clases activas
    navLinks.forEach((link) => {
      link.classList.remove("active");
      const href = link.getAttribute("href");

      if (href === `#${current}` || (current === "" && href === "#")) {
        link.classList.add("active");
      }
    });
  }

  // Throttle para mejor performance
  let scrollTimeout;
  window.addEventListener(
    "scroll",
    () => {
      if (scrollTimeout) {
        clearTimeout(scrollTimeout);
      }
      scrollTimeout = setTimeout(updateActiveLink, 10);
    },
    { passive: true },
  );

  // Ejecutar una vez al cargar
  updateActiveLink();
}

// ========================================
// MAIN INITIALIZATION FUNCTION
// ========================================

export function initNavbar() {
  try {
    initMobileMenu();
    initNavbarScrollEffects();
    initSmoothScrolling();
    initActiveLinkHighlighting();

    // Marcar como inicializado
    document.documentElement.setAttribute("data-navbar-initialized", "true");

    console.log("Navbar initialized successfully");
  } catch (error) {
    console.error("Error initializing navbar:", error);
  }
}

// Auto-inicialización cuando el DOM esté listo
if (typeof window !== "undefined") {
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initNavbar);
  } else {
    initNavbar();
  }
}
