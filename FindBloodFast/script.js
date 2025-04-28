document.addEventListener("DOMContentLoaded", function () {
  const links = document.querySelectorAll("a");

  links.forEach((link) => {
    link.addEventListener("click", function (e) {
      // For navigation links (with #)
      if (this.getAttribute("href").startsWith("#")) {
        e.preventDefault();
        const targetId = this.getAttribute("href").substring(1);
        const sections = ["home", "about", "contact", "find"];
        const index = sections.indexOf(targetId);

        if (index !== -1) {
          const slider = document.querySelector(".slider");
          slider.style.transform = `translateX(-${index * 25}%)`;
        }
      }
      // Remove the admin button handling completely to allow default behavior
    });
  });
});
