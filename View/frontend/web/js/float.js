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
            var self = this;
            var divCaptcha = $('<div class="mp-socialShare">mageplaza</div>');
            element.append(divCaptcha);
        }
    })
});