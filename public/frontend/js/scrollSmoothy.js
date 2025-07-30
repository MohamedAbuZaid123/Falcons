window.addEventListener("DOMContentLoaded", () => {
    const urlParams = new URLSearchParams(window.location.search);
    const sectionId = urlParams.get("scrollTo");

    if (sectionId) {
        const targetElement = document.getElementById(sectionId);
        if (targetElement) {
            setTimeout(() => {
                targetElement.scrollIntoView({ behavior: "smooth" });
            }, 300);
        }
    }
});
