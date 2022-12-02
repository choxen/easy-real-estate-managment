function initViewLand() {
    const lands = document.querySelectorAll("#land-col");

    for (const land of lands) {
        land.addEventListener("click", () => {
            window.location.href = land.dataset.url;
        });
    }
}

initViewLand();
