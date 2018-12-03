/**
 * By default, many browsers struggle withing using internal SVG references
 * paired with on-page SVG sprites. Example: `<use xlink:href="#logo"/>`.
 * SVG4Everybody is a library that fixes this issue and gives wider
 * support to internal sprite reference.
 */
import svg4everybody from 'svg4everybody';

/**
 * Init SVG4 Everybody
 *
 * We are required to manually fire this function as of v2.0.0
 * @see https://github.com/jonathantneal/svg4everybody
 * @since 1.1.0
 */
svg4everybody();
