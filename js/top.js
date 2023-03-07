// Scroll to top
(function backToTop() {
  var backToTopButton = document.querySelector(".top"),
    showScrollToTopButton,
    hideScrollToTopButton;

  if (backToTopButton) {
    // Activate showing an hiding back to top.
    showScrollToTopButton = function () {
      if (500 < window.scrollY) {
        backToTopButton.classList.add("is-visible");
        window.removeEventListener("scroll", showScrollToTopButton, true); //Remove event since we want
        // to execute only once(no
        // performance issue)
        window.addEventListener("scroll", hideScrollToTopButton, true); //Again start event to hide
        // button.
      }
    };

    // Activate hiding and showing back to top.
    hideScrollToTopButton = function () {
      if (500 > window.scrollY) {
        backToTopButton.classList.remove("is-visible");
        window.removeEventListener("scroll", hideScrollToTopButton, true); //Remove event since we want
        // to execute only once(no
        // performance issue)
        window.addEventListener("scroll", showScrollToTopButton, true); //Again start event to show
        // button.
      }
    };

    // Show back to top button on scroll.
    window.addEventListener("scroll", showScrollToTopButton, true);

    // Hide back to top button on scroll
    window.addEventListener("scroll", hideScrollToTopButton, true);

    backToTopButton.addEventListener("click", function () {
      // Only scroll to top if we are not in top.
      if (0 != window.scrollY) {
        window.scroll({
          top: 0,
          left: 0,
          behavior: "smooth",
        });
      }
    });
  }
})();
