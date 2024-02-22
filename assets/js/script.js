const documentHeight = () => {
    const doc = document.documentElement;
    doc.style.setProperty("--doc-height", `${window.innerHeight}px`);
};

const headerHeight = () => {
    const header = document.querySelector("header");
    const stickyElements = document.querySelectorAll(".item-gallery, .description-header-ui");
    stickyElements.forEach(element => {
        element.style.top = `${header.offsetHeight}px`;
    });
}

const shutterEffect = () => {
    window.addEventListener("mousemove", (event) => {
        let wW = document.body.clientWidth;
        const x = event.pageX / wW * 100;
        const xX = x.toFixed(2);
        const element = document.querySelector(".hero-layer:last-of-type");
        element.style.width = xX + "%";
    });
};


window.addEventListener("load", () => {
    // history.scrollRestoration = "manual";
    documentHeight();
    headerHeight();
});

window.addEventListener("resize", () => {
    documentHeight();
    headerHeight();
});