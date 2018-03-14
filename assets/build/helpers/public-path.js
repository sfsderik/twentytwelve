/* eslint-env browser */
/* globals THEME_DIST_PATH */

/** Dynamically set absolute public path from current protocol and host */
if (THEME_DIST_PATH) {
  __webpack_public_path__ = THEME_DIST_PATH; // eslint-disable-line no-undef, camelcase
}
