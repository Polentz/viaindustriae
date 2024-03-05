window.addEventListener("load", () => {
    itemWidth();
    handleHeaderOnScroll();
    searchFeature();
    sliderOpener();
});

window.addEventListener("resize", () => {
    itemWidth();
    handleHeaderOnScroll();
});
