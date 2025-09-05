// Simple shared theme manager
(function () {
  function initTheme() {
    const savedTheme = localStorage.getItem("theme");
    const html = document.documentElement;

    if (savedTheme === "light") {
      html.setAttribute("data-theme", "light");
    } else {
      html.removeAttribute("data-theme");
    }
  }

  function setTheme(theme) {
    const html = document.documentElement;
    if (theme === "light") {
      html.setAttribute("data-theme", "light");
    } else {
      html.removeAttribute("data-theme");
    }
    localStorage.setItem("theme", theme);
  }

  function toggleTheme() {
    const current =
      document.documentElement.getAttribute("data-theme") || "dark";
    setTheme(current === "light" ? "dark" : "light");
  }

  initTheme();
  window.themeManager = { setTheme, toggleTheme };
})();
