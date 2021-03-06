import L from 'leaflet';
import icon from 'leaflet/dist/images/marker-icon.png';
import iconShadow from 'leaflet/dist/images/marker-shadow.png';

window.$ = window.jQuery = require('jquery');

require('bootstrap');
require('bootstrap-autocomplete');

let DefaultIcon = L.icon({
    iconUrl: icon,
    shadowUrl: iconShadow
});

L.Marker.prototype.options.icon = DefaultIcon;

$(function() {
    $('.dropdown-toggle').dropdown();

    $('.cityAutoComplete').autoComplete();
})
