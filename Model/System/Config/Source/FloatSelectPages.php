<?php
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

namespace Mageplaza\SocialShare\Model\System\Config\Source;

/**
 * Class FloatSelectPages
 * @package Mageplaza\SocialShare\Model\System\Config\Source
 */
class FloatSelectPages extends OptionArray
{
    CONST HOME_PAGE = "home_page";
    const CATEGORY_PAGE = "category_page";
    const PRODUCT_PAGE = "product_page";
    CONST NOT_FOUND_PAGE = "not_found_page";
    CONST ENABLE_COOKIES = "no_cookie";
    CONST PRIVACY_POLICY = "privacy_policy";
    CONST ABOUT_US = "about_us";
    CONST CONTACT_US = "contact_us";
    CONST CUSTOMER_SERVICE = "customer_service";

    /**
     * @return array
     */
    public function getOptionHash()
    {
        return [
            self::HOME_PAGE => __('Home Page'),
            self::PRODUCT_PAGE => __('Product Page'),
            self::CATEGORY_PAGE => __('Category Page'),
            self::NOT_FOUND_PAGE  => __('404 Not Found'),
            self::ENABLE_COOKIES => __('Enable Cookies'),
            self::PRIVACY_POLICY => __('Privacy Policy'),
            self::ABOUT_US => __('About Us'),
            self::CONTACT_US => __('Contact Us'),
            self::CUSTOMER_SERVICE => __('Customer Service')
        ];
    }
}