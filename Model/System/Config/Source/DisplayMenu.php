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
 * Class DisplayMenu
 * @package Mageplaza\SocialShare\Model\System\Config\Source
 */
class DisplayMenu extends OptionArray
{
    const ON_HOVER = 'hover';
    const ON_CLICK = 'click';

    /**
     * @return array
     */
    public function getOptionHash()
    {
        return [
            self::ON_HOVER => __('Hover'),
            self::ON_CLICK => __('Click'),
        ];
    }
}
