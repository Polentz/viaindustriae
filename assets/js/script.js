const documentHeight = () => {
    const doc = document.documentElement;
    doc.style.setProperty("--doc-height", `${window.innerHeight}px`);
};

const itemWidth = () => {
    const items = document.querySelectorAll(".item");
    items.forEach(item => {
        const itemCover = item.querySelector(".item-cover");
        const itemPreview = item.querySelector(".item-preview");
        itemCover.style.height = `${itemPreview.offsetWidth}px`;
    });
}

const headerHeight = () => {
    const header = document.querySelector(".header");
    const cart = document.querySelector(".cart");
    cart.style.top = `${header.offsetHeight}px`;
};

const handleHeaderOnScroll = () => {
    const innerMenu = document.querySelector(".inner-menu");
    let lastScrollTop = 0;
    window.addEventListener("scroll", () => {
        let scrollTop = window.scrollY || document.documentElement.scrollTop;
        if (scrollTop < lastScrollTop) {
            innerMenu.style.display = "block";
            gsap.to(".inner-nav-wrapper", {
                autoAlpha: 1,
                delay: 0.25,
                duration: 0.15,
            });
        } else {
            gsap.to(".inner-nav-wrapper", {
                autoAlpha: 0,
                delay: 0.25,
                duration: 0.15,
                onComplete: () => innerMenu.style.display = "none",
            });
        };
        lastScrollTop = scrollTop;
    }, false);
};

const shutterEffect = () => {
    const element = document.querySelector(".hero-layer:last-of-type");
    const toShopButton = document.getElementById("to-shop");
    const toProjectsButton = document.getElementById("to-projects");
    let oldx = 0;

    // gsap.set([toShopButton, toProjectsButton], {
    //     autoAlpha: 0,
    // });

    const toProjectsButtonPos = toProjectsButton.getBoundingClientRect().left - 5;
    const toShopButtonPos = toShopButton.getBoundingClientRect().right + 5;

    window.addEventListener("mousemove", (event) => {
        let wW = document.body.clientWidth;
        const x = event.pageX / wW * 100;
        const xX = x.toFixed(2);
        gsap.to(element, {
            width: xX + "%",
            duration: 0.85,
            ease: "power2.out",
        });

        if (event.pageX < oldx && event.pageX < toProjectsButtonPos) {
            gsap.to([".header", ".hero"], {
                cursor: "nw-resize",
            });
            gsap.to(toShopButton, {
                autoAlpha: 1,
                duration: 0.035,
            });
            gsap.to(toProjectsButton, {
                autoAlpha: 0,
                duration: 0.035,
            });
        } else if (event.pageX > oldx && event.pageX > toShopButtonPos) {
            gsap.to([".header", ".hero"], {
                cursor: "ne-resize",
            });
            gsap.to(toShopButton, {
                autoAlpha: 0,
                duration: 0.035,
            });
            gsap.to(toProjectsButton, {
                autoAlpha: 1,
                duration: 0.035,
            });
        };
        oldx = event.pageX;
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
        const opener = item.querySelector(".item-cover");
        const preview = item.querySelector(".item-preview");
        const extended = item.querySelector(".item-page");
        const closer = item.querySelector(".item-close");

        opener.addEventListener("click", () => {
            [...items].filter(i => i !== item).forEach(i => i.classList.remove("--open"));
            item.classList.add("--open");
            const itemPosition = extended.getBoundingClientRect().top;
            const offsetPosition = itemPosition + window.scrollY - 160;
            window.scrollTo({
                top: offsetPosition,
                behavior: "smooth",
            });
        });

        closer.addEventListener("click", () => {
            item.classList.remove("--open");
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
        gsap.set(elements, {
            opacity: 0,
        });
        gsap.set(wrapper, {
            width: "auto",
        });
        elements.forEach(el => {
            el.classList.add("visible");
        });
        opener.classList.add("hidden");
        gsap.to(wrapper, {
            width: "100%",
            duration: 0,
            ease: "none",
        });
        gsap.to(elements, {
            opacity: 1,
            duration: 0.5,
            ease: "power1.out",
        });
    };
    const removeClasses = () => {
        let tl = gsap.timeline();
        tl.to(elements, {
            opacity: 0,
            duration: 0.5,
            ease: "power1.out",
        });
        tl.to(wrapper, {
            width: "auto",
            duration: 0,
            ease: "none",
            onComplete: () => {
                elements.forEach(el => {
                    el.classList.remove("visible");
                });
                opener.classList.remove("hidden");
            },
        });
    };

    opener.addEventListener("click", () => {
        addClasses();
    });

    close.addEventListener("click", () => {
        removeClasses()
    });

    const searchLocation = "?q="
    if (window.location.href.includes(searchLocation) && clearButton) {
        clearButton.classList.remove("--current");
        clearButton.addEventListener("click", () => {
            window.location.href = clearButton.href;
        });
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

const tooltipHandler = () => {
    const tooltipButton = document.querySelector(".tooltip-button");
    const tooltipText = document.querySelector(".tooltip-text");

    if (tooltipButton) {
        const url = tooltipButton.dataset.url;
        tooltipButton.addEventListener("click", () => {
            navigator.clipboard.writeText(url);
            gsap.set(tooltipText, {
                opacity: 0,
            });
            tooltipText.style.display = "block";
            gsap.to(tooltipText, {
                opacity: 1,
                duration: 0.5,
                ease: "power1.out",
            });
        });

        tooltipButton.addEventListener("mouseleave", () => {
            gsap.to(tooltipText, {
                opacity: 0,
                duration: 0.5,
                delay: 0.5,
                ease: "power1.out",
                onComplete: () => tooltipText.style.display = "none"
            });
        });
    };
};

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

window.addEventListener("load", () => {
    history.scrollRestoration = "manual";
    documentHeight();
});

window.addEventListener("resize", () => {
    documentHeight();
});