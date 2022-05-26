import $ from 'jquery';

/**
 *
 * Radio component.
 * Control checked radio buttons.
 *
 */
export default class Radio {
  constructor() {
    this.selector = '.c-radio-group';

    this.selectors = {
      radio: '.c-radio',
      radioInput: '.c-radio__input',
    };

    this.classNames = {
      radioChecked: 'c-radio--checked',
    };
  }

  bootstrap() {
    this.attachEvents();
  }

  attachEvents() {
    $(this.selectors.radioInput).on('change', this.onChangeRadio.bind(this));
  }

  onChangeRadio({ currentTarget }) {
    const $targetEl = $(currentTarget);

    this.unCheckAll($targetEl);
    this.setChecked($targetEl);
  }

  unCheckAll($inputEl) {
    $inputEl
      .closest(this.selector)
      .find(`.${this.classNames.radioChecked}`)
      .removeClass(this.classNames.radioChecked);
  }

  setChecked($inputEl) {
    $inputEl
      .closest(this.selectors.radio)
      .addClass(this.classNames.radioChecked);
  }
}
