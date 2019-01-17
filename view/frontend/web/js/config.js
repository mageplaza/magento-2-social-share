define([
    'jquery',
    'uiComponent'
], function($, component) {
    'use strict';
    return component.extend({
        initialize: function(config) {
            require(['https://static.addtoany.com/menu/page.js']);

            var buttonColor = config.buttonColor,
                iconColor   = config.iconColor,
                onClick     = config.click,
                popUp       = config.popUp,
                noService   = config.service,
                disabled    = config.disable;

            var a2a = $('.a2a_kit');

            var a2aJS = '<script type="text/javascript">';
            a2aJS += 'var a2a_config = a2a_config || {};';
            a2aJS += 'a2a_config.icon_color ="' + buttonColor + ',' + iconColor + '";';
            a2aJS += 'a2a_config.num_services = ' + noService + ';';
            a2aJS += 'a2a_config.onclick = ' + onClick + ';';
            a2aJS += 'a2a_config.thanks = {postShare: ' + popUp + ',};';
            a2aJS += 'a2a_config.exclude_services = ["' + disabled + '"];';
            a2aJS += '</script>';
            a2a.append(a2aJS);
        }
    });
});