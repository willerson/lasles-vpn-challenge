/* eslint-disable sort-imports */
import './vendor/*.js';
import '@styles/frontend';
import 'airbnb-browser-shims';
import './images';
import './spritesvg';
import $ from 'jquery';
// eslint-disable-next-line no-unused-vars
import config from '@config';

import App from './app';
import components from './components';

$(document).on('ready', () => {
  const app = new App({
    components,
  });

  app.bootstrap();
});
