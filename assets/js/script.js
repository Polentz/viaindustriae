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

const closeCart = () => {
    const cart = document.querySelector(".cart-close");
    if (cart) {
        cart.addEventListener('click', () => {
            document.querySelector(".details-cart").removeAttribute('open');
        });
    };
};

const handleFilters = () => {
    const filterButtons = document.querySelectorAll(".category-button");
    const items = document.querySelectorAll(".item");
    const filtersClearButton = document.querySelector(".no-category-button");

    const applyFilters = (filter) => {
        window.scrollTo(0, 0);
        const filterName = filter.dataset.category;
        items.forEach(item => {
            const itemCategory = item.dataset.category;
            if (itemCategory.includes(filterName)) {
                item.classList.remove("--unfiltered");
                item.classList.add("--filtered");
            } else {
                item.classList.add("--unfiltered");
                item.classList.remove("--filtered");
            };
        });
    };

    const removeFilters = () => {
        filterButtons.forEach(filter => {
            filter.classList.remove("--current");
        });
        items.forEach(item => {
            item.classList.remove("--unfiltered");
            item.classList.add("--filtered");
        });
    }

    filterButtons.forEach(filter => {
        filter.addEventListener("click", () => {
            [...filterButtons].filter(i => i !== filter).forEach(i => i.classList.remove("--current"));
            filtersClearButton.classList.remove("--current");
            filter.classList.add("--current");
            applyFilters(filter);
        });
    });

    filtersClearButton.addEventListener("click", () => {
        filtersClearButton.classList.add("--current");
        removeFilters();
    });
};

window.addEventListener("load", () => {
    // history.scrollRestoration = "manual";
    documentHeight();
    headerHeight();
    closeCart();
    sliderOpener();
    handleFilters();
});

window.addEventListener("resize", () => {
    documentHeight();
    headerHeight();
});