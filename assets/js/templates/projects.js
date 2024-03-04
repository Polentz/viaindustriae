window.addEventListener("load", () => {
    handleHeaderOnScroll();
    searchFeature();
    filterButtonsStyle();
    openGalleryItem();
    sliderOpener();
    langInnerHTML();
    tooltipHandler();
});

window.addEventListener("resize", () => {
    handleHeaderOnScroll();
});