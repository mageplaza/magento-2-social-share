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
    'jquery'
], function($) {
    $.widget('mp.socialShare', {
        options: {
            iconColor: null,
            buttonColor: null,
            backgroundColor: null,
            borderRadius: null
        },

        _create: function() {
            var self = this;
            $(function () {
                self.createSharePoint();
            });
        },

        createSharePoint: function() {
            var mainContent = $('#maincontent');
            var divCaptcha = $('<div class="a2a_kit a2a_kit_size_32 a2a_default_style" style="left:0px; top:150px;">\n' +
                '    <a class="a2a_button_facebook"></a>\n' +
                '    <a class="a2a_button_twitter"></a>\n' +
                '    <a class="a2a_button_google_plus"></a>\n' +
                '    <a class="a2a_button_pinterest"></a>\n' +
                '    <a class="a2a_dd" href="https://www.addtoany.com/share"></a>\n' +
                '</div>');
            mainContent.append(divCaptcha);
            require(['https://static.addtoany.com/menu/page.js']);

        }
    });

    return $.mp.socialShare;
});