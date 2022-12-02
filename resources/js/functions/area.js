function initViewArea() {
    const areas = document.querySelectorAll("#area-col");

    for (const area of areas) {
        area.addEventListener("click", () => {
            window.location.href = area.dataset.url;
        });
    }
}

initViewArea();
