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
 * Class IconColor
 * @package Mageplaza\SocialShare\Model\System\Config\Source
 */
class IconColor extends OptionArray
{
    const CUSTOM = 'Custom';
    const WHITE  = '#FFFFFF';
    const GRAY   = '#808080';
    const BLACK  = '#000000';

    /**
     * @return array
     */
    public function getOptionHash()
    {
        return [
            self::CUSTOM => __('Custom'),
            self::WHITE  => __('White'),
            self::GRAY   => __('Gray'),
            self::BLACK  => __('Black'),
        ];
    }
}
