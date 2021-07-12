/*
 * jVector Maps
 */

var markers =
[{ latLng: [41.45728550683887, 31.790874473779226], name: 'Zonguldak' },
{ latLng: [41.273716793259396, 31.42763787349545], name: 'Kdz. Ereğli' },
{ latLng: [41.62348929954051, 32.323173643840484], name: 'Bartın' }];

$(function() {
    "use strict";
    var $jvectormapDiv = $('#jvectormap');
    if ($jvectormapDiv.length && $.fn.vectorMap) {
        $jvectormapDiv.vectorMap({
            map: 'turkey_1_mill_en',
            zoomOnScroll: false,
            hoverOpacity: 0.7,
            regionStyle: {
                initial: {
                    fill: '#e3ecff',
                    "fill-opacity": 1,
                    "stroke-width": 0,
                },
                hover: {
                    fill: '#cfdcf7',
                    "fill-opacity": 1,
                    cursor: 'pointer'
                },
            },
            markerStyle: {
                initial: {
                    fill: '#2761d8',
                    stroke: '#2761d8'
                }
            },
            markers: markers
        });
    }
});
