document.addEventListener('DOMContentLoaded', function () {
  const sliders = document.querySelectorAll('.easy-slider.swiper');

  sliders.forEach(function (sliderEl) {
    new Swiper(sliderEl, {
      loop: true,
      navigation: {
        nextEl: sliderEl.querySelector('.swiper-button-next'),
        prevEl: sliderEl.querySelector('.swiper-button-prev'),
      },
    });
  });
});
