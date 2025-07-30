document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector(".CoS1P2");
    if (!form) return;

    const inputs = form.querySelectorAll("input, textarea");

    function validateEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    function showError(input, message) {
        const errorDiv = input
            .closest(".FormInputs")
            ?.querySelector(".error-msg");
        if (errorDiv) errorDiv.textContent = message;
    }

    function clearErrors() {
        form.querySelectorAll(".error-msg").forEach(
            (el) => (el.textContent = "")
        );
    }

    form.addEventListener("submit", function (e) {
        e.preventDefault();
        clearErrors();

        let valid = true;

        // Validate first name
        const firstName = form.first_name.value.trim();
        if (firstName.length < 3 || firstName.length > 15) {
            showError(form.first_name, "First name must be 3-15 characters.");
            valid = false;
        }

        // Validate last name
        const lastName = form.last_name.value.trim();
        if (lastName.length < 3 || lastName.length > 15) {
            showError(form.last_name, "Last name must be 3-15 characters.");
            valid = false;
        }

        // Validate email
        const email = form.email.value.trim();
        if (!validateEmail(email)) {
            showError(form.email, "Please enter a valid email address.");
            valid = false;
        }

        // Validate phone
        const phone = form.phone.value.trim();
        const phoneRegex = /^0\d{10}$/;
        if (!phoneRegex.test(phone)) {
            showError(form.phone, "Please enter a valid phone number.");
            valid = false;
        }

        // Validate message
        const message = form.message.value.trim();
        if (message.length < 10 || message.length > 1000) {
            showError(form.message, "Message must be 10-1000 characters.");
            valid = false;
        }

        // Validate checkbox
        const checkbox = form.querySelector(".FoCheck");
        if (!checkbox.checked) {
            // Optionally show a SweetAlert for this
            Swal.fire({
                icon: "warning",
                title: "Privacy Policy",
                text: "You must agree to our privacy policy.",
                confirmButtonColor: "#1e1e2d",
            });
            valid = false;
        }

        if (!valid) return;

        // Prepare data
        const data = {
            first_name: firstName,
            last_name: lastName,
            phone: phone,
            email: email,
            message: message,
        };

        // CSRF token
        const csrfToken = document
            .querySelector('meta[name="csrf-token"]')
            ?.getAttribute("content");

        fetch("/contactUsForm", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken,
            },
            body: JSON.stringify(data),
        })
            .then(async (res) => {
                if (!res.ok) {
                    const error = await res.json();
                    if (error.errors) {
                        // Show server-side validation errors
                        for (const [key, messages] of Object.entries(
                            error.errors
                        )) {
                            const input = form.querySelector(`[name="${key}"]`);
                            if (input) showError(input, messages[0]);
                        }
                    }
                    throw new Error("Validation failed");
                }
                return res.json();
            })
            .then((data) => {
                Swal.fire({
                    icon: "success",
                    title: "Message Sent!",
                    text: "Your message has been sent successfully. We will contact you soon.",
                    confirmButtonColor: "#1e1e2d",
                    customClass: {
                        popup: "AvenirH24px",
                    },
                });
                form.reset();
            })
            .catch((err) => {
                if (err.message !== "Validation failed") {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "An error occurred. Please try again.",
                        confirmButtonColor: "#1e1e2d",
                    });
                }
            });
    });
});
