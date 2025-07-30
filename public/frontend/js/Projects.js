const thumbnails = document.querySelectorAll(".ProDisP2 img");
const display = document.querySelector(".ProDisP1");
const placeholder = document.querySelector(".placeholder-text");
const goDownIcon = document.querySelector(".ProDisP1Icon");

const imageContainer = document.getElementById("imageContainer");

const modal = document.getElementById("imageModal");
const modalImg = document.getElementById("modalImage");
const closeModal = document.getElementById("closeModal");
const modalPrev = document.querySelector(".modal-prev");
const modalNext = document.querySelector(".modal-next");

let currentIndex = -1;

// Turn on flash automatically
placeholder.classList.add("flash-animate");
goDownIcon.classList.add("flash-animate");

function stopFlashing() {
  placeholder.classList.remove("flash-animate");
  goDownIcon.classList.remove("flash-animate");

  placeholder.style.display = "none";
  goDownIcon.style.display = "none";
}

function showImage(index) {
  const oldImg = display.querySelector("img.ProDisP1DisplayedImg");
  if (oldImg) oldImg.remove();

  stopFlashing();

  const newImg = document.createElement("img");
  newImg.src = thumbnails[index].src;
  newImg.classList.add("ProDisP1DisplayedImg");
  display.appendChild(newImg);

  thumbnails.forEach((thumb, i) => {
    thumb.classList.toggle("active", i === index);
  });

  currentIndex = index;
  thumbnails[index].scrollIntoView({ behavior: "smooth", inline: "center", block: "nearest" });
}

// Choose an image
thumbnails.forEach((img, index) => {
  img.addEventListener("click", () => showImage(index));
  img.addEventListener("dblclick", () => {
    modal.style.display = "flex";
    modalImg.src = img.src;
    document.body.style.overflow = "hidden"; // Prevent scrolling on the page
  });
});

// External buttons
document.querySelector(".prev-btn").addEventListener("click", () => {
  if (currentIndex > 0) showImage(currentIndex - 1);
});
document.querySelector(".next-btn").addEventListener("click", () => {
  if (currentIndex < thumbnails.length - 1) showImage(currentIndex + 1);
});

// Close the module
function closeImageModal() {
  modal.style.display = "none";
  document.body.style.overflow = ""; // Re-scroll
}
closeModal.addEventListener("click", closeImageModal);

// Close with Esc key
document.addEventListener("keydown", function (event) {
  if (event.key === "Escape") {
    closeImageModal();
  }
});

// Navigate within the module
modalPrev.addEventListener("click", () => {
  if (currentIndex > 0) {
    currentIndex--;
    modalImg.src = thumbnails[currentIndex].src;
    showImage(currentIndex);
  }
});
modalNext.addEventListener("click", () => {
  if (currentIndex < thumbnails.length - 1) {
    currentIndex++;
    modalImg.src = thumbnails[currentIndex].src;
    showImage(currentIndex);
  }
});
