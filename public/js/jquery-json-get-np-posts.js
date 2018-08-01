/*
 * get NP cities
 *
 * @author Pavel Korzhenko
 * License MIT
 */

(function ($) {
    $.fn.extend({
        jsonGetNpPosts: function (options) {
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
                    console.log("NpPost city: " + jsonVal + " path:" + jsonPath);
                    $.ajax({
                        type: 'POST',
                        url: jsonPath,
                        data: {
                            city: jsonVal
                        }
                    }).always(function(data, textStatus, jqXHR) {
                        if (data.response == 'success') {
                            //console.log("resp data: " + data.data);
                            var retobj = jQuery.parseJSON(data.data);

                            $('#'+$this_list).empty();

                            $.each(retobj, function(key, val) {
                                var opt = $("<option></option>").attr("value", val['sitekey']).text(val['name']);
                                $('#'+$this_list).append(opt);
                            });
                        } else {
                            console.log("resp error " + data.response + " stat: " + textStatus + " jq: " + jqXHR);
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
