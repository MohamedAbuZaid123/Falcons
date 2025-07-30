// === Hover effect for HomeS3 ===
document.querySelectorAll(".HS3P2Box").forEach((box) => {
    const img = box.querySelector(".HS3P2BoxImg");
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
// === Hover effect for HomeS5 ===
document.querySelectorAll(".HS5P2B").forEach((box) => {
    const img = box.querySelector(".HS5P2BImg");
    const originalSrc = img.getAttribute("src");
    const hoverSrc = img.getAttribute("data-hover");

    box.addEventListener("mouseenter", () => {
        img.src = hoverSrc;
    });

    box.addEventListener("mouseleave", () => {
        img.src = originalSrc;
    });
});

// === FAQ Accordion ===
const faqs = window.faqs || [];

const container = document.getElementById("faq-container");
const containerAr = document.getElementById("faq-container-ar");

if (container) {
    const isMobile = window.innerWidth <= 768;
    const closedIcon = isMobile
        ? "frontend/svg/Home/HomeS6ClosedMob.svg"
        : "/frontend/svg/Home/HomeS6Closed.svg";
    const openedIcon = isMobile
        ? "/frontend/svg/Home/HomeS6OpendMob.svg"
        : "/frontend/svg/Home/HomeS6Opend.svg";

    faqs.forEach((faq, index) => {
        const faqItem = document.createElement("div");
        faqItem.className = "faq-item";

        faqItem.innerHTML = `
        <div class="faq-question" data-index="${index}">
          <span class="faq-q-text CairoLightH38px">${faq.question}</span>
          <img class="faq-icon-img" src="${closedIcon}" alt="toggle icon" />
        </div>
        ${
            isMobile
                ? ""
                : `<div class="faq-answer AvenirH38pxL">${faq.answer}</div>`
        }
      `;

        container.appendChild(faqItem);
    });

    container.addEventListener("click", (e) => {
        const question = e.target.closest(".faq-question");
        if (!question) return;

        const index = question.dataset.index;
        const iconImg = question.querySelector(".faq-icon-img");
        const faqItem = question.closest(".faq-item");
        let answer = faqItem.querySelector(".faq-answer");

        const isAlreadyOpen = answer?.classList.contains("open");

        document.querySelectorAll(".faq-answer").forEach((el) => {
            if (isMobile) el.remove();
            else el.classList.remove("open");
        });

        document.querySelectorAll(".faq-icon-img").forEach((img) => {
            img.src = closedIcon;
        });

        if (isAlreadyOpen) {
            if (isMobile) answer?.remove();
            else answer?.classList.remove("open");
            iconImg.src = closedIcon;
        } else {
            if (isMobile) {
                answer = document.createElement("div");
                answer.className = "faq-answer AvenirH38pxL open";
                answer.innerHTML = faqs[index].answer;
                faqItem.appendChild(answer);
            } else {
                answer = faqItem.querySelector(".faq-answer");
                answer.classList.add("open");
            }

            iconImg.src = openedIcon;
        }
    });
}

if (containerAr) {
    const isMobile = window.innerWidth <= 768;
    const closedIcon = isMobile
        ? "frontend/svg/Home/HomeS6ClosedMob.svg"
        : "frontend/svg/Home/HomeS6Closed.svg";
    const openedIcon = isMobile
        ? "frontend/svg/Home/HomeS6OpendMob.svg"
        : "frontend/svg/Home/HomeS6Opend.svg";

    faqs.forEach((faq, index) => {
        const faqItem = document.createElement("div");
        faqItem.className = "faq-item";

        faqItem.innerHTML = `
        <div class="faq-question" data-index="${index}">
          <span class="faq-q-text ChangaHNpxM ">${faq.question_ar || ""}</span>
          <img class="faq-icon-img" src="${closedIcon}" alt="toggle icon" />
        </div>
        ${
            isMobile
                ? ""
                : `<div class="faq-answer CairoLightH38px">${
                      faq.answer_ar || ""
                  }</div>`
        }
      `;

        containerAr.appendChild(faqItem);
    });

    containerAr.addEventListener("click", (e) => {
        const question = e.target.closest(".faq-question");
        if (!question) return;

        const index = question.dataset.index;
        const iconImg = question.querySelector(".faq-icon-img");
        const faqItem = question.closest(".faq-item");
        let answer = faqItem.querySelector(".faq-answer");

        const isAlreadyOpen = answer?.classList.contains("open");

        document.querySelectorAll(".faq-answer").forEach((el) => {
            if (isMobile) el.remove();
            else el.classList.remove("open");
        });

        document.querySelectorAll(".faq-icon-img").forEach((img) => {
            img.src = closedIcon;
        });

        if (isAlreadyOpen) {
            if (isMobile) answer?.remove();
            else answer?.classList.remove("open");
            iconImg.src = closedIcon;
        } else {
            if (isMobile) {
                answer = document.createElement("div");
                answer.className = "faq-answer AvenirH38pxL open";
                answer.innerHTML = faqs[index].answer;
                faqItem.appendChild(answer);
            } else {
                answer = faqItem.querySelector(".faq-answer");
                answer.classList.add("open");
            }

            iconImg.src = openedIcon;
        }
    });
}
