// === Hover effect for HomeS3 ===
document.querySelectorAll(".ABS2P2Box").forEach((box) => {
  const img = box.querySelector(".ABS2P2BoxImg");
  const originalSrc = img.getAttribute("src");
  const hoverSrc = img.getAttribute("data-hover");

  box.addEventListener("mouseenter", () => {
    img.src = hoverSrc;
  });

  box.addEventListener("mouseleave", () => {
    img.src = originalSrc;
  });
});

// === Hover effect for HomeS5 ===
document.querySelectorAll(".ABS4P1B").forEach((box) => {
  const img = box.querySelector(".ABS4P1BImg");
  const originalSrc = img.getAttribute("src");
  const hoverSrc = img.getAttribute("data-hover");

  if (window.innerWidth <= 768) {
    img.setAttribute("src", hoverSrc);
  } else {
    box.addEventListener("mouseenter", () => {
      img.src = hoverSrc;
    });

    box.addEventListener("mouseleave", () => {
      img.src = originalSrc;
    });
  }
});
