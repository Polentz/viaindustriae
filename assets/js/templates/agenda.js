window.addEventListener("load", () => {
    itemWidth();
    handleHeaderOnScroll();
    searchFeature();
    openGalleryItem();
    sliderOpener();
    langInnerHTML();
    tooltipHandler();
});

window.addEventListener("resize", () => {
    itemWidth();
    handleHeaderOnScroll();
});
