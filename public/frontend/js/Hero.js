const images = [
    "frontend/images/Hero/HeroImg1.JPG",
    "frontend/images/Hero/HeroImg2.JPG",
    "frontend/images/Hero/HeroImg3.JPG",
    "frontend/images/Hero/HeroImg4.JPG",
    "frontend/images/Hero/HeroImg5.JPG",
    "frontend/images/Hero/HeroImg6.JPG",
    "frontend/images/Hero/HeroImg7.JPG",
    "frontend/images/Hero/HeroImg8.JPG",
];

let current = 0;

// get elements
const currentImg = document.querySelector(".HeroImage.current");
const nextImg = document.querySelector(".HeroImage.next");
const HeroDotsContainer = document.querySelector(".HeroDots");

// 1.to create dots depend on many images
images.forEach(() => {
    const dot = document.createElement("div");
    dot.classList.add("dot");
    HeroDotsContainer.appendChild(dot);
});

// 2.to add circyle for dots
const indicator = document.createElement("div");
indicator.classList.add("dot-indicator");
HeroDotsContainer.appendChild(indicator);

// 3.to update dots
const dots = document.querySelectorAll(".dot");

function showSlide(index) {
    const nextSrc = images[index];

    const preloadImg = new Image();
    preloadImg.src = nextSrc;

    preloadImg.onload = () => {
        nextImg.src = nextSrc;
        nextImg.style.opacity = 0;
        nextImg.style.zIndex = 3;

        void nextImg.offsetWidth;

        nextImg.style.opacity = 1;

        setTimeout(() => {
            currentImg.src = nextSrc;
            nextImg.style.opacity = 0;
            nextImg.style.zIndex = 1;
        }, 5000);
    };

    const firstDot = dots[0].getBoundingClientRect();
    const secondDot = dots[1]?.getBoundingClientRect();
    let gap = 0;

    if (secondDot) {
        if (window.innerWidth <= 768) {
            // الموبايل: dots أفقية
            gap = secondDot.left - firstDot.left;
            indicator.style.transform = `translateX(${index * gap}px)`;
        } else {
            // ديسكتوب: dots عمودية
            gap = secondDot.top - firstDot.top;
            indicator.style.transform = `translateY(${index * gap}px)`;
        }
    }

    current = index;
}

showSlide(0);

setInterval(() => {
    const nextIndex = (current + 1) % images.length;
    showSlide(nextIndex);
}, 8000);

// for Navbar to open and close it

setTimeout(() => {
    const toggleBtn = document.getElementById("HeroNavToggle");
    const overlay = document.getElementById("HeroNavOverlay");
    const iconImg = document.getElementById("HeroNavIconImg");

    if (window.innerWidth <= 768 && iconImg) {
        iconImg.src = "frontend/svg/Open.svg";
    }

    if (!toggleBtn || !overlay) {
        console.error("HeroNav elements not found!");
        return;
    }

    toggleBtn.addEventListener("click", () => {
        overlay.classList.toggle("active");

        if (window.innerWidth <= 768 && iconImg) {
            if (overlay.classList.contains("active")) {
                iconImg.src = "frontend/svg/CloseMob.svg";
            } else {
                iconImg.src = "frontend/svg/Open.svg";
            }
        }
    });
}, 100);
