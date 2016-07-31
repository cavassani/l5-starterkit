/*jslint browser: true*/
/*jslint nomen: true*/
/*global define, require, $, _*/

define(['jquery'],
    function ($) {

        'use strict';

        var ajax = function (options) {

            var localStorage = window.localStorage,
                token = localStorage.getItem('token'),
                defaultOptions = {
                    'url': '',
                    'data': {},
                    'type': 'get',
                    'dataType': 'json',
                    'crossDomain': true,
                    'cache': true,
                    'global': true, // this makes sure ajaxStart is triggered
                    'timeout': 20000,
                    'error': ajaxErrorHandler,
                    'headers': {
                        'Authorization': 'Bearer ' + token
                    }
                };

            if (typeof options === 'object') {
                options = $.extend(defaultOptions, options);
            } else {
                options = defaultOptions;
            }

            options.data.XDEBUG_SESSION_START = "PHPSTORM";

            if (!app.utils.checkToken()) {
                return jQuery.Deferred();
            } else if (app.locked && !options.hasOwnProperty('unlock')) {
                app.utils.notify({
                    text: 'A aplicação está bloqueada! Esta ação não pode ser realizada.',
                    type: 'error'
                });
                return jQuery.Deferred();
            }

            $.ajaxSetup({
                cache: options.cache,
                error: function (x, status, error) {
                    if (x.status == 403) {
                        window.location.href = "/login";
                    }
                    else {
                        alert("An error occurred: " + status + "nError: " + error);
                    }
                }
            });

            return $.ajax(options)
        };


        var ajaxErrorHandler = function (xhr, errorType, exception) {
            var responseText;
            var message;

            try {
                responseText = $.parseJSON(xhr.responseText);
                message = '<strong>' + responseText.message + '</strong>';
                if (responseText.hasOwnProperty('errors')) {
                    message += '<ul>';
                    $.each(responseText.errors, function (index, value) {
                        message += '<li>' + value + '</li>'
                    });
                    message += '</ul>';
                }
                app.utils.notify({
                    type: 'error',
                    text: message
                });

            } catch (e) {
                app.utils.notify({
                    type: 'error',
                    text: xhr.responseText
                });
            }


        };

        return {
            'ajax': ajax
        };


    });
