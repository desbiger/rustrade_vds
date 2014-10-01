$(function () {
    alert(123);
    jQuery('#slider_XML_PROP_1').slider({
        min: 120,
        max: 99,
        values: [120, 99],
        range: true,
        stop: function (event, ui) {
            jQuery('input#minCost_XML_PROP_1').val(jQuery('#slider_XML_PROP_1').slider('values', 0));
            jQuery('input#maxCost_XML_PROP_1').val(jQuery('#slider_XML_PROP_1').slider('values', 1));
        },
        slide: function (event, ui) {
            jQuery('input#minCost_XML_PROP_1').val(jQuery('#slider_XML_PROP_1').slider('values', 0));
            jQuery('input#maxCost_XML_PROP_1').val(jQuery('#slider_XML_PROP_1').slider('values', 1));
        }

    });
});
