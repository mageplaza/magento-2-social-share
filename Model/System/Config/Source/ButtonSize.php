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
 * Class ButtonSize
 * @package Mageplaza\SocialShare\Model\System\Config\Source
 */
class ButtonSize extends OptionArray
{
    const SMALL  = '16x16';
    const MEDIUM = '32x32';
    const LARGE  = '64x64';

    /**
     * @return array
     */
    public function getOptionHash()
    {
        return [
            self::SMALL  => __('16x16'),
            self::MEDIUM => __('32x32'),
            self::LARGE  => __('64x64'),
        ];
    }
}
