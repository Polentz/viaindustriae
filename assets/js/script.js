const documentHeight = () => {
    const doc = document.documentElement;
    doc.style.setProperty("--doc-height", `${window.innerHeight}px`);
};

const shutterEffect = () => {
    window.addEventListener("mousemove", (event) => {
        let wW = document.body.clientWidth;
        const x = event.pageX / wW * 100;
        const xX = x.toFixed(2);
        const element = document.querySelector(".hero-layer:last-of-type");
        element.style.width = xX + "%";
    });

    // const navigation = document.querySelectorAll(".nav-button");
    // const layers = document.querySelectorAll(".shutter-layer");
    // for (let i = 0; i < navigation.length; i++) {
    //     navigation[1].addEventListener("mousenter", () => {
    //         layers[1].style.background = "#3264FF";
    //     });
    //     navigation[1].addEventListener("mouseleave", () => {
    //         layers[1].style.background = "#FF6464";
    //     });
    //     navigation[3].addEventListener("mousenter", () => {
    //         layers[0].style.background = "#FF6464";
    //     });
    //     navigation[3].addEventListener("mouseleave", () => {
    //         layers[0].style.background = "#3264FF"
    //     });
    // }
};


window.addEventListener("load", () => {
    history.scrollRestoration = "manual";
    documentHeight();
});

window.addEventListener("resize", () => {
    documentHeight();
});