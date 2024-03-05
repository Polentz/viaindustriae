window.addEventListener("load", () => {
    itemWidth();
    handleHeaderOnScroll();
    searchFeature();
    openGalleryItem();
    sliderOpener();
});

window.addEventListener("resize", () => {
    itemWidth();
    handleHeaderOnScroll();
});
