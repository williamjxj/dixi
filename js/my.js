/* 1.
 * http://api.jquery.com/jQuery.getScript/
 * Define a $.cachedScript() method that allows fetching a cached script:
 */
jQuery.cachedScript = function (url, options) {
    // allow user to set any option except for dataType, cache, and url
    options = $.extend(options || {}, {
        dataType: "script",
        cache: true,
        url: url
    });

    // Use $.ajax() since it is more flexible than $.getScript
    // Return the jqXHR object so we can chain callbacks
    return jQuery.ajax(options);
};

// Usage
$.cachedScript("ajax/test.js").done(function (script, textStatus) {
    console.log(textStatus);
});

/* 2.
 *
 */
;(function ($) {

    $.fn.extend({
        result: function (handler) {
            return this.bind('result', handler);
        },
        search: function (hendler) {
            return this.trigger('search', [handler]);
        },
    });

    $.foo = function () {
        function f1() {};

        function f2() {};
    };

    $.foo.
    default = {};


    $.dixi = {
        version: '1.0',
        submitForm: function (element, url, params) {
            var f = $(element).parents('form')[0];
            if (!f) {
                f = document.createElement('form');
                f.style.display = 'none';
                element.parentNode.appendChild(f);
                f.method = 'POST';
            }
            if (typeof url == 'string' && url != '') {
                f.action = url;
            }
            if (element.target != null) {
                f.target = element.target;
            }

            var inputs = [];
            $.each(params, function (name, value) {
                var input = document.createElement("input");
                input.setAttribute("type", "hidden");
                input.setAttribute("name", name);
                input.setAttribute("value", value);
                f.appendChild(input);
                inputs.push(input);
            });

            // remember who triggers the form submission
            // this is used by jquery.yiiactiveform.js
            $(f).data('submitObject', $(element));

            $(f).trigger('submit');

            $.each(inputs, function () {
                f.removeChild(this);
            });
        }
    };
})(jQuery);

/* from YII: */
;(function ($) {

    $.extend($.fn, {
        yiitab: function () {

            function activate(id) {
                var pos = id.indexOf("#");
                if (pos >= 0) {
                    id = id.substring(pos);
                }
                var $tab = $(id);
                var $container = $tab.parent();
                $container.find('>ul a').removeClass('active');
                $container.find('>ul a[href="' + id + '"]').addClass('active');
                $container.children('div').hide();
                $tab.show();
            }

            this.find('>ul a').click(function (event) {
                var href = $(this).attr('href');
                var pos = href.indexOf('#');
                activate(href);
                if (pos == 0 || (pos > 0 && (window.location.pathname == '' || window.location.pathname == href.substring(0, pos)))) return false;
            });

            // activate a tab based on the current anchor
            var url = decodeURI(window.location);
            var pos = url.indexOf("#");
            if (pos >= 0) {
                var id = url.substring(pos);
                if (this.find('>ul a[href="' + id + '"]').length > 0) {
                    activate(id);
                    return;
                }
            }
        }
    });

})(jQuery);


/* 3.
 *
 * .loadGIF {background: black url(/main/sub/css/images/general/loading.gif) left center no-repeat ;}
 */
$('#parentView').on("click", "table tbody td:not(td:.button-column)", function(event){
 
    try{
 
        /*  Extract the Primary Key from the CGridView's clicked row.
            "this" is the CGridView's clicked column or <td>.
            Go up one parent - which gives you the row.
            Go down to child(1) - which gives you the first column,
            which contains the row's PK. */
        var gridRowPK = $(this).parent().children(':nth-child(1)').text();
 
        /*Display the loading.gif file via jquery and CSS*/
        $("#loadingPic").addClass("loadGIF");
 
        // Call the Ajax function to update the Child CGridView //
        var request = $.ajax({ 
          url: "UpdateChildGrid",
          type: "POST",
          cache: false,
          data: {parentID : gridRowPK}, 
          dataType: "html" 
        });
 
        request.done(function(response) { 
            try{
                /*since you are updating innerHTML, make sure the
                received data does not contain any javascript - for
                security reasons*/
                if (response.indexOf('<script') == -1){
                    /*update the view with the data received from the server*/
                    document.getElementById('childView').innerHTML = response;
                }
                else {
                    throw new Error('Invalid Javascript in Response - possible
                    hacking!');
                }
            }
            catch (ex){
                alert(ex.message); /*** Log to server when in production ***/
            }
            finally{
                /*Remove the loading.gif file via jquery and CSS*/
                $("#loadingPic").removeClass("loadGIF");
 
                /*clear the ajax object after use*/
                request = null;
            }
        });
 
        request.fail(function(jqXHR, textStatus) {
            try{
                throw new Error('Request failed: ' + textStatus );
            }
            catch (ex){
                alert(ex.message); /*** Log to server when in production ***/
            }
            finally{
                /*Remove the loading.gif file via jquery and CSS*/
                $("#loadingPic").removeClass("loadGIF");
 
                /*clear the ajax object after use*/
                request = null;
            }
        });
    }
    catch (ex){
        alert(ex.message); /*** Log to server when in production ***/
    }
}); 