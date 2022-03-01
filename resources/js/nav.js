const navButton = document.getElementById("nav-button");
const navClose = document.getElementById("nav-close");
const mainNav = document.getElementById("main-nav");
const mainContent = document.getElementById("main-content");

navButton.addEventListener("click", (e) => {
    toggleNav();
});

navClose.addEventListener("click", (e) => {
    toggleNav();
});

const toggleNav = () => {
    mainNav.classList.toggle("show");

    if (mainNav.classList.contains("show")) {
        mainContent.style.filter = "blur(4px)";
    } else {
        mainContent.style.filter = "none";
    }
};
