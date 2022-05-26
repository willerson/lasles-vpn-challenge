import $ from 'jquery';

/**
 *
 * Checkbox component.
 * Control checked radio buttons.
 *
 */
export default class Checkbox {
  constructor() {
    this.selector = '.c-checkbox';

    this.selectors = {
      checkboxInput: '.c-checkbox__input',
    };

    this.classNames = {
      checkboxChecked: 'c-checkbox--checked',
    };
  }

  bootstrap() {
    this.attachEvents();
  }

  attachEvents() {
    $(this.selectors.checkboxInput).on('change', this.onChangeCheckbox.bind(this));
  }

  onChangeCheckbox({ currentTarget }) {
    const $targetEl = $(currentTarget);

    this.toggleChecked($targetEl);
  }

  toggleChecked($inputEl) {
    $inputEl
      .closest(this.selector)
      .toggleClass(this.classNames.checkboxChecked);
  }
}
