window.addEventListener("load", () => {
    itemHeight();
    handleHeaderOnScroll();
    searchFeature();
    filterButtonsStyle();
    openGalleryItem();
    sliderOpener();
});

window.addEventListener("resize", () => {
    itemHeight();
    handleHeaderOnScroll();
});