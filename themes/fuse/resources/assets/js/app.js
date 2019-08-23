/**
 * The main script file for our application.
 * This script will be loaded globally.
 */
import '../scss/app/app.scss';
import './app/icons';

// Allows direct reference to svg `#` identifier in our codebase without breaking things
import './app/libs/_svg-polyfill';

/**
 * Accessibility
 *
 * Load any scripts dealing specifically with accessibility here :)
 */
import './app/accessibility/user-tab-detect';

/**
 * Components
 *
 * Load any scripts dealing specifically with components here :)
 */

import './app/components/c-mobile-menu';
import './app/components/c-progressive';
