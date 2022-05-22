require('./bootstrap');

// put your lib here =========================
require('bootstrap-star-rating/js/star-rating');
require('bootstrap-star-rating/themes/krajee-fas/theme');

require('select2');

// sweetalert2
import Swal from 'sweetalert2';
window.swal = Swal;

require('../lib/lightGallery/js/lightgallery.min');
require('../lib/lightGallery/plugin/lg-thumbnail.min');

// app lib
require('jquery-migrate');
require('jquery.stellar/jquery.stellar');
require('owl.carousel');
require('./frontendApp/jquery.easing.1.3');
require('./frontendApp/jquery.waypoints.min');
require('./frontendApp/jquery.magnific-popup.min');
require('./frontendApp/jquery.animateNumber.min');
require('./frontendApp/bootstrap-datepicker');
require('./frontendApp/scrollax.min');
require('./frontendApp/main');


// my js
require('./frontend');
