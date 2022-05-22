require('./bootstrap');

// put your lib here =========================

// tempus dominus
require('@popperjs/core');
window.tempusDominus = require('@eonasdan/tempus-dominus');

// Star
require('bootstrap-star-rating/js/star-rating');
require('bootstrap-star-rating/themes/krajee-fas/theme');

// Jquery mask
require('../lib/jqueryMask/jquery.mask.min');

window.Dropzone = require('../lib/dropzone/dropzone.min');
// then you need to disabled the autoDiscover behaviour here:

// Clipboard js
window.ClipboardJS = require('clipboard');

// CodeMirror js
window.CodeMirror = require('codemirror');
require('codemirror/mode/javascript/javascript');
require('codemirror/addon/selection/active-line');
require('codemirror/addon/edit/matchbrackets');
require('codemirror/addon/scroll/simplescrollbars');

// Datatables
var dt = require('datatables.net');
require('datatables.net-select-bs4');
require('../lib/datatables-checkboxes/dataTables.checkboxes');

// sweetalert2
import Swal from 'sweetalert2';
window.swal = Swal;

// selectric
require('../lib/selectric/jquery.selectric');

// jasny bootstrap
require('../lib/jasny-bootstrap/js/jasny-bootstrap');

// moment
window.moment = require('moment');

// select2
require('select2');

// end lib

// app js
require('./backendApp/nicescroll');
require('./backendApp/stisla');
require('./backendApp/scripts');

// my js
require('./backend');
