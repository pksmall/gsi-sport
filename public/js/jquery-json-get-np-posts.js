/*
 * jQuery json to datalist
 * @version 0.1.0
 * @author Steven Mouret
 * License MIT
 */

(function ($) {
    $.fn.extend({
        jsonGetNpPosts: function (options) {
            var defaults = {
                jsonVal: null,
                token: null,
                jsonPath: null
            };

            var options = $.extend(defaults, options);

            this.each(function () {
                var $this = $(this),
                    objData = $this.data(),
                    o = $.extend(true, {}, options, objData);

                var jsonVal = o.jsonVal;
                var token = o.token;
                var jsonPath = o.jsonPath,
                    $this_list = $this.attr('name');

                if(jsonPath) {
                    //console.log("var: " + jsonVal + " token:" + token);
                    $.ajax({
                        type: 'POST',
                        url: jsonPath,
                        data: {
                            obj: jsonVal,
                            _token:  token
                        }
                    }).always(function(data, textStatus, jqXHR) {
                        if (data.response == 'success') {
                            //console.log("resp data: " + data.data);
                            // Save option in array
                            var items = [];

                            var retobj = jQuery.parseJSON(data.data);

                            $('#'+$this_list).empty();

                            $.each(retobj, function(key, val) {
                                var opt = $("<option></option>").text(val['name']);
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
