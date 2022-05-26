import $ from 'jquery';

/**
 * Input component.
 * Control input states.
 */
export default class Input {
  constructor() {
    this.selector = '.c-input';

    this.selectors = {
      input: '.c-input__input, .c-input__textarea',
    };

    this.classNames = {
      focused: 'c-input--focused',
    };
  }

  bootstrap() {
    this.attachEvents();
  }

  attachEvents() {
    $(this.selectors.input).on('focus', this.onFocusInput.bind(this));
    $(this.selectors.input).on('blur', this.onBlurInput.bind(this));
  }

  onFocusInput({ currentTarget }) {
    $(currentTarget)
      .closest(this.selector)
      .addClass(this.classNames.focused);
  }

  onBlurInput({ currentTarget }) {
    const $target = $(currentTarget);

    if ($target.val()) {
      return;
    }

    $target
      .closest(this.selector)
      .removeClass(this.classNames.focused);
  }
}
