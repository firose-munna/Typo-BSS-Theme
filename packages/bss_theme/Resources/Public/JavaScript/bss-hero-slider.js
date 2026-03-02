/**
 * BSS Hero Slider — Swiper.js initialization
 * Auto-initializes all [data-bss-slider] elements on the page.
 */
document.querySelectorAll('[data-bss-slider]').forEach((el) => {
    const slides = el.querySelectorAll('.swiper-slide');

    // Only enable loop and autoplay if there are multiple slides
    const hasMultipleSlides = slides.length > 1;

    const slider = new Swiper(el, {
        loop: hasMultipleSlides,
        speed: 600,
        autoplay: hasMultipleSlides
            ? {
                  delay: 5000,
                  disableOnInteraction: true,
                  pauseOnMouseEnter: true,
              }
            : false,
        effect: 'fade',
        fadeEffect: {
            crossFade: true,
        },
        navigation: hasMultipleSlides
            ? {
                  prevEl: el.querySelector('.bss-hero-slider__prev'),
                  nextEl: el.querySelector('.bss-hero-slider__next'),
              }
            : false,
        pagination: hasMultipleSlides
            ? {
                  el: el.querySelector('.bss-hero-slider__pagination'),
                  clickable: true,
              }
            : false,
        a11y: {
            prevSlideMessage: 'Previous slide',
            nextSlideMessage: 'Next slide',
            paginationBulletMessage: 'Go to slide {{index}}',
        },
        keyboard: {
            enabled: true,
        },
    });

    // Hide navigation when only one slide
    if (!hasMultipleSlides) {
        const nav = el.querySelector('.bss-hero-slider__nav');
        const pagination = el.querySelector('.bss-hero-slider__pagination');
        if (nav) nav.style.display = 'none';
        if (pagination) pagination.style.display = 'none';
    }
});
