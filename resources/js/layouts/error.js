document.addEventListener("DOMContentLoaded", function () {
    const homeButton = document.getElementById("home-button");
    if (homeButton) {
        homeButton.addEventListener("click", function () {
            const href = homeButton.getAttribute("data-href");
            if (href) {
                window.location.href = href;
            }
        });
    }

    const backButton = document.getElementById("go-back-button");
    if (backButton) {
        backButton.addEventListener("click", function () {
            window.history.back();
        });
    }
});
