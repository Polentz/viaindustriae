window.addEventListener("load", () => {
    handleHeaderOnScroll();
    searchFeature();
    filterButtonsStyle();
    openGalleryItem();
    sliderOpener();
});

window.addEventListener("resize", () => {
    handleHeaderOnScroll();
});