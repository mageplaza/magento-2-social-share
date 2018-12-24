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

use Magento\Framework\Option\ArrayInterface;

/**
 * Class ApplyFor
 * @package Mageplaza\SocialShare\Model\System\Config\Source
 */
class ApplyFor implements ArrayInterface
{
    const HOME_PAGE = "Home Page";
    const CATEGORY_PAGE = "Category Page";
    const PRODUCT_PAGE = "Product Page";
    /**
     * Return array of options as value-label pairs
     *
     * @return array Format: array(array('value' => '<value>', 'label' => '<label>'), ...)
     */
    public function toOptionArray()
    {
        return [
            ['label' => __('Home Page'), 'value' => self::HOME_PAGE],
            ['label' => __('Category Page'), 'value' => self::CATEGORY_PAGE],
            ['label' => __('Product Page'), 'value' => self::PRODUCT_PAGE]
        ];
    }
}