fetch("Assets/component/header/header.html")
    .then((response) => response.text())
    .then((data) => {
        document.getElementById("header-container").innerHTML = data;
        setupMenuEvents();
    });

function toggleMenu() {
    const nav = document.getElementById("NavLinks");
    const menuIcon = document.getElementById("MenuIcon");
    const heroSlider = document.querySelector(".HeroSlider");

    const isOpen = nav.classList.contains("show");

    if (!isOpen) {
        // open menu
        nav.classList.add("show");
        nav.style.transition = "height 0.4s ease, opacity 0.4s ease";
        nav.style.height = "450px";
        nav.style.opacity = "1";
        menuIcon.src = "frontend/svg/Close.svg";
        heroSlider.style.transition = "margin-top 0.4s ease";
        heroSlider.style.marginTop = "90vw";
    } else {
        // close menu
        closeMenu();
    }
}

function closeMenu() {
    const nav = document.getElementById("NavLinks");
    const menuIcon = document.getElementById("MenuIcon");
    const heroSlider = document.querySelector(".HeroSlider");

    if (!nav.classList.contains("show")) return;

    nav.style.transition = "height 0.4s ease, opacity 1.3s ease";
    nav.style.height = "0px";
    nav.style.opacity = "0";

    setTimeout(() => {
        nav.classList.remove("show");
    }, 800);

    menuIcon.src = "frontend/svg/Open.svg";
    heroSlider.style.transition = "margin-top 0.4s ease";
    heroSlider.style.marginTop = "-10vw";
}

function setupMenuEvents() {
    document.addEventListener("click", function (e) {
        const menu = document.getElementById("MobileMenu");
        const nav = document.getElementById("NavLinks");

        const isClickInsideMenu =
            menu.contains(e.target) || e.target.closest(".MenuToggle");

        if (!isClickInsideMenu && nav.classList.contains("show")) {
            closeMenu();
        }
    });

    window.addEventListener("scroll", function () {
        const nav = document.getElementById("NavLinks");
        if (nav.classList.contains("show")) {
            closeMenu();
        }
    });
}
