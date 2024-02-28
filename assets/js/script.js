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

const sliderOpener = () => {
    const slider = document.querySelector(".slider");
    const sliderButton = slider.querySelector(".slider-close");
    const sliderContent = slider.querySelectorAll(".slider-wrapper div");
    const navElement = document.querySelector(".info-button");

    const addClasses = () => {
        gsap.set(slider, {
            yPercent: -100,
        })
        gsap.set(sliderContent, {
            opacity: 0,
        });
        slider.classList.add("--display");
        let tl = gsap.timeline();
        tl.to(slider, {
            yPercent: 0,
            duration: 0.35,
        });
        tl.to(sliderContent, {
            opacity: 1,
            duration: 0.35,
            stagger: 0.01,
            ease: "power1.out",
        }, "-=50%");
    };

    const removeClasses = () => {
        let tl = gsap.timeline();
        tl.to(sliderContent, {
            opacity: 0,
            duration: 0.35,
            stagger: 0.01,
            ease: "power1.out",
        });
        tl.to(slider, {
            yPercent: -100,
            duration: 0.35,
            ease: "power1.out",
            onComplete: () => slider.classList.remove("--display"),
        }, "-=75%");
    };

    if (slider) {
        navElement.addEventListener("click", () => {
            addClasses();
        });

        sliderButton.addEventListener("click", () => {
            removeClasses();
        });
    };
};

const openGalleryItem = () => {
    const items = document.querySelectorAll(".item");
    items.forEach(item => {
        const openers = item.querySelectorAll(".item-cover, .text-title");
        const preview = item.querySelector(".item-preview");
        const extended = item.querySelector(".item-page");
        const closer = item.querySelector(".item-close");
        openers.forEach(opener => {
            opener.addEventListener("click", () => {
                preview.style.display = "none";
                extended.style.display = "grid";
                item.style.gridColumn = "1 / 5";
                const itemPosition = extended.getBoundingClientRect().top;
                const offsetPosition = itemPosition + window.scrollY - 176;
                window.scrollTo({
                    top: offsetPosition,
                    behavior: "smooth",
                });
            });
        });
        closer.addEventListener("click", () => {
            preview.style.display = "block";
            extended.style.display = "none";
            item.style.gridColumn = "auto";
        });
    });
};

const searchFeature = () => {
    const opener = document.querySelector(".search-bar");
    const elements = document.querySelectorAll(".search-input, .search-reset");
    const wrapper = document.querySelector(".search-wrapper");
    const close = document.querySelector(".search-reset");
    const clearButton = document.querySelector(".no-category-button");

    const addClasses = () => {
        wrapper.style.width = "100%";
        elements.forEach(el => {
            el.classList.add("visible");
        });
        opener.classList.add("hidden");
    };

    const removeClasses = () => {
        wrapper.style.width = "auto";
        elements.forEach(el => {
            el.classList.remove("visible");
        });
        opener.classList.remove("hidden");
    };

    opener.addEventListener("click", () => {
        // elements.forEach(el => {
        //     el.style.display = "block";
        // });
        // wrapper.style.width = "100%";
        // opener.style.display = "none";
        addClasses();
    });

    close.addEventListener("click", () => {
        // elements.forEach(el => {
        //     el.style.display = "none";
        // });
        // wrapper.style.width = "auto";
        // opener.style.display = "inline-flex";
        removeClasses()
    });

    const searchLocation = "?q="
    if (window.location.href.includes(searchLocation)) {
        clearButton.classList.remove("--current");
        // elements.forEach(el => {
        //     el.style.display = "block";
        // });
        // wrapper.style.width = "100%";
        // opener.style.display = "none";
        addClasses();
    } else {
        close.addEventListener("click", (e) => {
            e.preventDefault();
        });
    };
};

const filterButtonsStyle = () => {
    const filterLocation = "?filter="
    const buttons = document.querySelectorAll(".category-button");
    const items = document.querySelectorAll(".item");
    const clearButton = document.querySelector(".no-category-button");

    if (window.location.href.includes(filterLocation)) {
        clearButton.classList.remove("--current");
        buttons.forEach(btn => {
            const categoryName = btn.innerHTML;
            items.forEach(item => {
                const itemCategory = item.dataset.category;
                if (itemCategory.includes(categoryName)) {
                    btn.classList.add("--current");
                } else {
                    btn.classList.remove("--current");
                };
            });
        });
    } else {
        clearButton.addEventListener("click", (e) => {
            e.preventDefault();
        });
    };
};

// const closeCartAction = () => {
//     const buttonCloseCart = document.querySelector(".cart-close");
//     if (buttonCloseCart) {
//         buttonCloseCart.addEventListener('click', () => {
//             document.querySelector(".details-cart").removeAttribute('open');
//         });
//     };
// };

const langInnerHTML = () => {
    const langButton = document.querySelector(".lang-button");
    if (langButton) {
        langButton.addEventListener('mouseenter', () => {
            if (langButton.innerHTML === "It") {
                langButton.innerHTML = "En"
            } else if (langButton.innerHTML === "En") {
                langButton.innerHTML = "It"
            };
        });
        langButton.addEventListener('mouseleave', () => {
            if (langButton.innerHTML === "It") {
                langButton.innerHTML = "En"
            } else if (langButton.innerHTML === "En") {
                langButton.innerHTML = "It"
            };
        });
    };
};

// const handleFilters = () => {
//     const filterButtons = document.querySelectorAll(".category-button");
//     const items = document.querySelectorAll(".item");
//     const filtersClearButton = document.querySelector(".no-category-button");

//     const applyFilters = (filter) => {
//         window.scrollTo(0, 0);
//         const filterName = filter.dataset.category;
//         items.forEach(item => {
//             const itemCategory = item.dataset.category;
//             if (itemCategory.includes(filterName)) {
//                 item.classList.remove("--unfiltered");
//                 item.classList.add("--filtered");
//             } else {
//                 item.classList.add("--unfiltered");
//                 item.classList.remove("--filtered");
//             };
//         });
//     };

//     const removeFilters = () => {
//         filterButtons.forEach(filter => {
//             filter.classList.remove("--current");
//         });
//         items.forEach(item => {
//             item.classList.remove("--unfiltered");
//             item.classList.add("--filtered");
//         });
//     }

//     filterButtons.forEach(filter => {
//         filter.addEventListener("click", () => {
//             [...filterButtons].filter(i => i !== filter).forEach(i => i.classList.remove("--current"));
//             filtersClearButton.classList.remove("--current");
//             filter.classList.add("--current");
//             applyFilters(filter);
//         });
//     });

//     filtersClearButton.addEventListener("click", () => {
//         filtersClearButton.classList.add("--current");
//         removeFilters();
//     });
// };

window.addEventListener("load", () => {
    // history.scrollRestoration = "manual";
    documentHeight();
    headerHeight();
    sliderOpener();
    langInnerHTML();
});

window.addEventListener("resize", () => {
    documentHeight();
    headerHeight();
});