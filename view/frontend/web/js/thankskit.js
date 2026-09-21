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

(function () {
    'use strict';

    var SERVICES = [
        'facebook',
        'twitter',
        'facebook_messenger',
        'pinterest',
        'linkedin',
        'tumblr'
    ];
    var ICON_SIZE = 32;

    /**
     * @param {HTMLElement} modal
     */
    function applyCustomIcons(modal) {
        SERVICES.forEach(function (service) {
            var source = document.querySelector('.a2a_kit .a2a_button_' + service + ' img'),
                button,
                svg,
                image;

            if (!source || !source.getAttribute('src')) {
                return;
            }

            button = modal.querySelector('#a2a_thanks_kit .a2a_button_' + service);

            if (!button) {
                return;
            }

            svg = button.querySelector('.a2a_s_' + service + ' svg');

            if (svg) {
                image = document.createElement('img');
                image.src = source.getAttribute('src');
                image.width = ICON_SIZE;
                image.height = ICON_SIZE;
                image.alt = service;
                svg.parentNode.replaceChild(image, svg);
            }

            button.style.height = ICON_SIZE + 'px';
        });
    }

    function observe() {
        var modalObserver = new MutationObserver(function () {
            var modal = document.getElementById('a2a_modal');

            if (modal && modal.style.display === 'block') {
                applyCustomIcons(modal);
            }
        });

        modalObserver.observe(document.body, {
            childList: true,
            subtree: true,
            attributes: true,
            attributeFilter: ['style']
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', observe);
    } else {
        observe();
    }
})();
