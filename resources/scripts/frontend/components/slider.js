/* eslint-disable no-restricted-syntax */
/* eslint-disable no-plusplus */
import Swiper, {
  Autoplay,
  EffectFade,
  Navigation,
  Pagination,
} from 'swiper';

export default class Slider {
  constructor() {
    this.selector = '.swiper';
    this.sliders = [];
    this.options = {
      modules: [
        Navigation,
        Pagination,
        EffectFade,
        Autoplay,
      ],
    };
  }

  bootstrap() {
    this.init();
  }

  init() {
    const sliders = [...document.querySelectorAll(this.selector)];

    if (sliders.length > 0) this.initSliders(sliders);
  }

  initSliders(sliders = []) {
    //
    let i = 1;
    for (const sliderEl of sliders) {
      const swiperClass = `js-swiper-${i}`;
      const params = sliderEl.dataset.params
        ? JSON.parse(sliderEl.dataset.params)
        : {};

      // adding class to separate each swiper
      sliderEl.classList.add(swiperClass);
      // For multiple swipers on a same page it is necessary to call different instances
      this.sliders = [
        ...this.sliders,
        new Swiper(`.${swiperClass}`, {
          ...this.options,
          ...params,
        }),
      ];
      i++;
    }
  }
}
