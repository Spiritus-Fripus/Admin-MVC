const burgerIcon = document.querySelector(".burger");
const burgerMenu = document.querySelector(".burger-menu");

burgerIcon.addEventListener("click", () => {
    burgerMenu.classList.toggle("burger-menu-toggle");
});
