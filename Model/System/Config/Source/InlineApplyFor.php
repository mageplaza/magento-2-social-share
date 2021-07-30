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
 * Class InlineApplyFor
 * @package Mageplaza\SocialShare\Model\System\Config\Source
 */
class InlineApplyFor extends OptionArray
{
    const HOME_PAGE     = 'home_page';
    const CATEGORY_PAGE = 'category_page';
    const PRODUCT_PAGE  = 'product_page';
    const DAILYDEAL_ALLDEALS  = 'dailydeal_alldeals';
    const DAILYDEAL_BESTSELLERDEALS  = 'dailydeal_bestsellerdeals';
    const DAILYDEAL_FEATUREDDEALS  = 'dailydeal_featureddeals';
    const DAILYDEAL_NEWDEALS  = 'dailydeal_newdeals';

    /**
     * @return array
     */
    public function getOptionHash()
    {
        return [
            self::HOME_PAGE     => __('Home Page'),
            self::CATEGORY_PAGE => __('Categories Page'),
            self::PRODUCT_PAGE  => __('Products Page'),
            self::DAILYDEAL_ALLDEALS  => __('Daily Deal All Deals Page'),
            self::DAILYDEAL_BESTSELLERDEALS  => __('Daily Deal Bestseller Deals Page'),
            self::DAILYDEAL_FEATUREDDEALS  => __('Daily Deal Featured Deals Page'),
            self::DAILYDEAL_NEWDEALS  => __('Daily Deal New Deals Page'),
        ];
    }
}
