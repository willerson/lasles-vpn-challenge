import $ from 'jquery';

export default class App {
  constructor({ components, directives }) {
    this.components = components;
    this.directives = directives;
  }

  bootstrap() {
    this.init();
    this.loadModules(this.directives);
    this.loadModules(this.components);
  }

  // eslint-disable-next-line class-methods-use-this
  init() {
    $('body').addClass('page-loaded');
  }

  // eslint-disable-next-line class-methods-use-this
  loadModules(modules) {
    if (!modules || modules.length <= 0) {
      return;
    }

    // eslint-disable-next-line no-restricted-syntax
    for (const module of modules) {
      const moduleExists = module.selector && $(module.selector).length > 0;

      if (moduleExists) {
        module.bootstrap();
      }
    }
  }
}
