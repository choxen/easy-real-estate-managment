function initChangeClientType() {
    const options = document.querySelector(".type-options");

    if (options) {
        const inputs = options.getElementsByTagName("input");

        for (const input of inputs) {
            input.addEventListener("change", () => {
                let url = new URL(window.location.href);

                url.searchParams.set("type", input.value);

                window.location.href = url.toString();
            });
        }
    }
}

function initViewClient() {
    const clients = document.querySelectorAll("#client-col");

    for (const client of clients) {
        client.addEventListener("click", () => {
            window.location.href = client.dataset.url;
        });
    }
}

initChangeClientType();
initViewClient();
