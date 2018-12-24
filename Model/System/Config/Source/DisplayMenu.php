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
 * Class DisplayMenu
 * @package Mageplaza\SocialShare\Model\System\Config\Source
 */
class DisplayMenu implements ArrayInterface
{
    const ON_HOVER = "hover";
    const ON_CLICK = "click";
    /**
     * Return array of options as value-label pairs
     *
     * @return array Format: array(array('value' => '<value>', 'label' => '<label>'), ...)
     */
    public function toOptionArray()
    {
        return [
            ['label' => __('Hover'), 'value' => self::ON_HOVER ],
            ['label' => __('Click'), 'value' => self::ON_CLICK ],
        ];
    }
}