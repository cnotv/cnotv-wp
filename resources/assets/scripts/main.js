// import external dependencies
import 'jquery';

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';
import contact from './routes/contact';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
  contact,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
