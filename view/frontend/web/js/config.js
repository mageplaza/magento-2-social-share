/**
 * Mageplaza
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Mageplaza.com license that is
 * available through the world-wide-web at this URL:
 * https://www.mageplaza.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Mageplaza
 * @package     Mageplaza_SocialShare
 * @copyright   Copyright (c) Mageplaza (https://www.mageplaza.com/)
 * @license     https://www.mageplaza.com/LICENSE.txt
 */

define([
    'jquery',
    'uiComponent'
], function ($, component) {
    'use strict';
    return component.extend({
        initialize: function (config) {
            require(['https://static.addtoany.com/menu/page.js']);

            var buttonColor = config.buttonColor,
                iconColor = config.iconColor,
                onClick = config.click,
                popUp = config.popUp,
                noService = config.service,
                disabled = config.disable;

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
