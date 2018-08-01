/*
 * jQuery json to datalist
 * @version 0.1.0
 * @author Steven Mouret
 * License MIT
 */

(function ($) {
    $.fn.extend({
        jsonGetNpCities: function (options) {
            var defaults = {
                jsonVal: null,
                jsonPath: null
            };

            var options = $.extend(defaults, options);

            this.each(function () {
                var $this = $(this),
                    objData = $this.data(),
                    o = $.extend(true, {}, options, objData);

                var jsonVal = o.jsonVal;
                var jsonPath = o.jsonPath,
                    $this_list = $this.attr('name');

                if(jsonPath) {
                    //console.log("val: " + jsonVal + " path: " + jsonPath);
                    $.ajax({
                        type: 'POST',
                        url: jsonPath,
                        data: {
                            region: jsonVal
                        }
                    }).always(function(data, textStatus, jqXHR) {
                        if (data.response == 'success') {
                            //console.log("resp data: " + data.data);
                            var retobj = jQuery.parseJSON(data.data);

                            //console.log("list: " + $this_list);
                            $('#'+$this_list).empty();
                            $.each(retobj, function(key, val) {
                                //var opt = $("<option></option>").attr("value", val['name']);
                                var opt = $("<option></option>").attr("value", val['cityref']).text(val['name']);
                                $('#'+$this_list).append(opt);
                            });
                        } else {
                            console.log("resp error");
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
