const swiper = new Swiper('.swiper', {
    centeredSlides: true,
    slidesPerView: 1,
    spaceBetween: 15,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    scrollbar: {
      el: '.swiper-scrollbar',
    },
    pagination: {
        el: ".swiper-pagination",
        type: "fraction",
    },
    breakpoints: {
        1500: {
            slidesPerView: 1.6,
            spaceBetween: 40,
        },
      }
});
