fetch("Assets/component/footer/footer.html")
    .then((response) => response.text())
    .then((data) => {
        document.getElementById("footer-container").innerHTML = data;
    });
