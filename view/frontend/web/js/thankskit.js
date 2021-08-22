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

require([
    'jquery'
], function ($) {
    $(document).ready(function () {

        var existCondition = setInterval(
            function () {
                if ($('#a2a_modal').css('display') === 'block') {
                    if ($('.a2a_button_facebook').length !== 0 && $('.a2a_kit .a2a_button_facebook img').attr('src') !== undefined) {
                        $('#a2a_thanks_kit .a2a_button_facebook .a2a_s_facebook svg').replaceWith('<img src="' + $('.a2a_kit .a2a_button_facebook img').attr('src') + '" width="32" height="32" alt="facebook">');
                        $('#a2a_thanks_kit .a2a_button_facebook').css('height', '32px');
                    }

                    if ($('.a2a_button_twitter').length !== 0 && $('.a2a_kit .a2a_button_twitter img').attr('src') !== undefined) {
                        $('#a2a_thanks_kit .a2a_button_twitter .a2a_s_twitter svg').replaceWith('<img src="' + $('.a2a_kit .a2a_button_twitter img').attr('src') + '" width="32" height="32" alt="twitter">');
                        $('#a2a_thanks_kit .a2a_button_twitter').css('height', '32px');
                    }

                    if ($('.a2a_button_facebook_messenger').length !== 0 && $('.a2a_kit .a2a_button_facebook_messenger img').attr('src') !== undefined) {
                        $('#a2a_thanks_kit .a2a_button_facebook_messenger .a2a_s_facebook_messenger svg').replaceWith('<img src="' + $('.a2a_kit .a2a_button_facebook_messenger img').attr('src') + '" width="32" height="32" alt="facebook_messenger">');
                        $('#a2a_thanks_kit .a2a_button_facebook_messenger').css('height', '32px');
                    }

                    if ($('.a2a_button_pinterest').length !== 0 && $('.a2a_kit .a2a_button_pinterest img').attr('src') !== undefined) {
                        $('#a2a_thanks_kit .a2a_button_pinterest .a2a_s_pinterest svg').replaceWith('<img src="' + $('.a2a_kit .a2a_button_pinterest img').attr('src') + '" width="32" height="32" alt="pinterest">');
                        $('#a2a_thanks_kit .a2a_button_pinterest').css('height', '32px');
                    }

                    if ($('.a2a_button_linkedin').length !== 0 && $('.a2a_kit .a2a_button_linkedin img').attr('src') !== undefined) {
                        $('#a2a_thanks_kit .a2a_button_linkedin .a2a_s_linkedin svg').replaceWith('<img src="' + $('.a2a_kit .a2a_button_linkedin img').attr('src') + '" width="32" height="32" alt="linkedin">');
                        $('#a2a_thanks_kit .a2a_button_linkedin').css('height', '32px');
                    }

                    if ($('.a2a_button_tumblr').length !== 0 && $('.a2a_kit .a2a_button_tumblr img').attr('src') !== undefined) {
                        $('#a2a_thanks_kit .a2a_button_tumblr .a2a_s_tumblr svg').replaceWith('<img src="' + $('.a2a_kit .a2a_button_tumblr img').attr('src') + '" width="32" height="32" alt="tumblr">');
                        $('#a2a_thanks_kit .a2a_button_tumblr').css('height', '32px');
                    }
                }
            }, 400
        );
    });
});
