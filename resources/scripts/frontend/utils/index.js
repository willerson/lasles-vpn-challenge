/* eslint-disable import/prefer-default-export */
import config from '@config';

export function assets() {
  const { rootUrl } = fuerzastudio;

  return {
    getUrl() {
      return rootUrl;
    },

    getAssetUrl(asset) {
      return `${rootUrl}/dist/${asset}`;
    },

    getBreakpoint(key) {
      return Number.parseInt(
        config.variables.breakpoints[key].replace('px', ''),
        10
      );
    },
  };
}
