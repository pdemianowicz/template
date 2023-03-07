/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */

// Main navigation
const navToggle = document.querySelector(".nav__toggle");
const navMenu = document.querySelector(".nav__menu");

navToggle.addEventListener("click", () => {
  const visibility = navMenu.getAttribute("data-visible");

  if (visibility === "false") {
    navMenu.setAttribute("data-visible", true);
    navToggle.setAttribute("aria-expanded", true);
  } else {
    navMenu.setAttribute("data-visible", false);
    navToggle.setAttribute("aria-expanded", false);
  }
});

// Close nav when clicked outside the navigation
document.addEventListener("click", (event) => {
  if (!navMenu.contains(event.target) && !navToggle.contains(event.target)) {
    navMenu.setAttribute("data-visible", false);
    navToggle.setAttribute("aria-expanded", false);
  }
});

// Dropdown menu
(function dropdownMenu() {
  if (!document.querySelector(".sub-menu")) {
    return;
  }
  const submenu = document.querySelectorAll(".menu-item-has-children");
  submenu.forEach((e) => {
    e.addEventListener("click", () => {
      e.children[1].classList.toggle("show");
    });
  });
})();

// Top search bar
const searchBar = document.querySelector(".search-bar");
document.querySelector(".header__search-button").addEventListener("click", () => {
  searchBar.classList.toggle("show");
});
document.querySelector(".search-bar__close").addEventListener("click", () => {
  searchBar.classList.toggle("show");
});
