const documentHeight = () => {
    const doc = document.documentElement;
    doc.style.setProperty("--doc-height", `${window.innerHeight}px`);
};

const itemHeight = () => {
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

const gallerySlideshow = (container) => {
    const carouselElement = container.querySelectorAll(".item-gallery-wrapper");
    const carouselNav = container.querySelector(".carousel-nav");

    for (let index = 0; index < carouselElement.length; index++) {
        const button = document.createElement("button");
        button.innerHTML = index + 1
        if (carouselElement.length > 1) {
            carouselNav.appendChild(button);
        };
    };
    const navButtons = container.querySelectorAll(".carousel-nav button");
    for (let index = 0; index < navButtons.length; index++) {
        navButtons[0].classList.add("--active");
    };

    let slideIndex = 1;

    const plusSlides = (n) => {
        showSlides(slideIndex += n);
    };

    const currentSlide = (n) => {
        showSlides(slideIndex = n);
    };

    const showSlides = (n) => {
        let i;
        if (n > carouselElement.length) {
            slideIndex = 1;
        };
        if (n < 1) {
            slideIndex = carouselElement.length;
        };
        for (i = 0; i < carouselElement.length; i++) {
            carouselElement[i].style.display = "none";
        };
        for (i = 0; i < navButtons.length; i++) {
            navButtons[i].className = navButtons[i].className.replace(" --active", "");
        }
        carouselElement[slideIndex - 1].style.display = "flex";
        navButtons[slideIndex - 1].className += " --active";
    };

    carouselElement.forEach(element => {
        element.addEventListener("click", () => {
            navButtons[0].classList.remove("--active");
            plusSlides(1);
        });
    });

    navButtons.forEach(btn => {
        btn.addEventListener("click", () => {
            navButtons[0].classList.remove("--active");
            currentSlide(btn.innerHTML);
        });
    });
}

const openGalleryItem = () => {
    const items = document.querySelectorAll(".item");
    items.forEach(item => {
        const opener = item.querySelector(".item-cover");
        const extended = item.querySelector(".item-page");
        const closer = item.querySelector(".item-close");

        opener.addEventListener("click", () => {
            [...items].filter(i => i !== item).forEach(i => {
                i.classList.remove("--open");
                i.classList.add("--opacity");
            });
            item.classList.add("--open");
            item.classList.remove("--opacity");
            const itemPosition = extended.getBoundingClientRect().top;
            const offsetPosition = itemPosition + window.scrollY - 160;
            window.scrollTo({
                top: offsetPosition,
                behavior: "smooth",
            });
        });

        closer.addEventListener("click", () => {
            [...items].filter(i => i !== item).forEach(i => {
                i.classList.remove("--opacity");
            });
            item.classList.remove("--open");
        });

        gallerySlideshow(extended);

        // const carouselElement = extended.querySelectorAll(".item-gallery-wrapper");
        // const carouselNav = extended.querySelector(".carousel-nav");

        // for (let index = 0; index < carouselElement.length; index++) {
        //     const button = document.createElement("button");
        //     button.innerHTML = index + 1
        //     if (carouselElement.length > 1) {
        //         carouselNav.appendChild(button);
        //     };
        // };
        // const navButtons = extended.querySelectorAll(".carousel-nav button");
        // for (let index = 0; index < navButtons.length; index++) {
        //     navButtons[0].classList.add("--active");
        // };

        // let slideIndex = 1;

        // const plusSlides = (n) => {
        //     showSlides(slideIndex += n);
        // };

        // const currentSlide = (n) => {
        //     showSlides(slideIndex = n);
        // };

        // const showSlides = (n) => {
        //     let i;
        //     if (n > carouselElement.length) {
        //         slideIndex = 1;
        //     };
        //     if (n < 1) {
        //         slideIndex = carouselElement.length;
        //     };
        //     for (i = 0; i < carouselElement.length; i++) {
        //         carouselElement[i].style.display = "none";
        //     };
        //     for (i = 0; i < navButtons.length; i++) {
        //         navButtons[i].className = navButtons[i].className.replace(" --active", "");
        //     }
        //     carouselElement[slideIndex - 1].style.display = "flex";
        //     navButtons[slideIndex - 1].className += " --active";
        // };

        // carouselElement.forEach(element => {
        //     element.addEventListener("click", () => {
        //         navButtons[0].classList.remove("--active");
        //         plusSlides(1);
        //     });
        // });

        // navButtons.forEach(btn => {
        //     btn.addEventListener("click", () => {
        //         navButtons[0].classList.remove("--active");
        //         currentSlide(btn.innerHTML);
        //     });
        // });
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
    const filterLocation = "?filter=";
    const buttons = document.querySelectorAll(".category-button");
    const items = document.querySelectorAll(".item");
    const clearButton = document.querySelector(".no-category-button");

    if (window.location.href.includes(filterLocation)) {
        clearButton.classList.remove("--current");

        buttons.forEach(btn => {
            const categoryName = btn.innerHTML;
            const url = escape(categoryName);
            if (window.location.href.includes(url)) {
                btn.classList.add("--current");
            } else {
                btn.classList.remove("--current");
            };
        });
    } else {
        clearButton.addEventListener("click", (e) => {
            e.preventDefault();
        });
    };
};

const tooltipHandler = () => {
    const tooltips = document.querySelectorAll(".tooltip");
    tooltips.forEach(tooltip => {
        const tooltipButton = tooltip.querySelector(".tooltip-button");
        const tooltipText = tooltip.querySelector(".tooltip-text");
        const url = tooltipButton.dataset.url;
        tooltipButton.onclick = () => {
            document.execCommand("copy");
        }
        tooltipButton.addEventListener("copy", (event) => {
            event.preventDefault();
            if (event.clipboardData) {
                event.clipboardData.setData("text/plain", url);
                console.log(event.clipboardData.getData("text"))
            }
        });
        tooltipButton.addEventListener("click", () => {
            // only on https: (use this in production)
            // navigator.clipboard.writeText(url);
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
    });
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
    langInnerHTML();
    tooltipHandler();
});

window.addEventListener("resize", () => {
    documentHeight();
});