/* eslint-disable unicorn/filename-case */
/**
 * Menu component.
 * Control Menu states.
 */
export default class ToggleMenu {
  constructor() {
    this.selector = '.c-btn-nav';

    this.selectors = {};

    this.classNames = {};
  }

  bootstrap() {
    this.addEventListeners();
  }

  addEventListeners() {
    const btn = document.querySelector(this.selector);
    const parent = document.querySelector('body');

    btn.addEventListener('click', ({ target }) => {
      target.classList.toggle('c-btn-nav--active');
      parent.classList.toggle('mobile-menu-visible');
    });
  }
}
