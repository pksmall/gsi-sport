/*
 * jQuery json get NP cities
 * @version 0.1.0
 * @author Pavel Korzhenko
 * License MIT
 */

(function ($) {
    $.fn.extend({
        jsonGetItemsData: function (options) {
            var defaults = {
                jsonCid: null,
                jsonPage: null,
                jsonPath: null
            };

            var options = $.extend(defaults, options);

            this.each(function () {
                var $this = $(this),
                    objData = $this.data(),
                    o = $.extend(true, {}, options, objData);

                if (o.jsonCid) {
                    var jsonVal = o.jsonCid;
                } else {
                    var jsonVal = o.jsonVal;
                }
                var jsonPage = o.jsonPage;
                var jsonPath = o.jsonPath;

                console.log("val: " + jsonVal + " page: " + jsonPage + " path: " + jsonPath );
                if(jsonPath) {
                    $.ajax({
                        type: 'POST',
                        url: jsonPath,
                        data: {
                            cid: jsonVal,
                            page: jsonPage
                        },
                    }).always(function(data, textStatus, jqXHR) {
                        if (data.response == 'success') {
                            //console.log("itemsData success. d:" + data.pagenator);
                            Cookies("curCid", jsonVal);
                            $('#itemsdataset').html(data.data);
                            if (jsonPage == 1) {
                                $('.pagination').html(data.pagenator);
                                if (data.pagenator.length == 0) {
                                    $('.pagination').addClass('hide-box');
                                } else {
                                    $('.pagination').removeClass('hide-box');
                                }
                            }
                            return;
                        } else {
                            console.log("itemsData error.");
                            $('#itemsdataset').html('');
                            return;
                        }
                    });
                } else {
                    console.log('JSON path is empty or null.');
                }

            });
        }
    });
})(jQuery);
