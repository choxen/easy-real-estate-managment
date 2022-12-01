function initViewProperty() {
    const properties = document.querySelectorAll("#property-col");

    for (const property of properties) {
        property.addEventListener("click", () => {
            window.location.href = property.dataset.url;
        });
    }
}

initViewProperty();
