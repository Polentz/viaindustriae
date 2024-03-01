window.addEventListener("load", () => {
    itemWidth();
    searchFeature();
    openGalleryItem();
    tooltipHandler();
});

window.addEventListener("resize", () => {
    itemWidth();
});