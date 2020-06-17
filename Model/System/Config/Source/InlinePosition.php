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
 * Class InlinePosition
 * @package Mageplaza\SocialShare\Model\System\Config\Source
 */
class InlinePosition extends OptionArray
{
    const TOP_CONTENT    = 'top_content';
    const BOTTOM_CONTENT = 'bottom_content';

    /**
     * @return array
     */
    public function getOptionHash()
    {
        return [
            self::TOP_CONTENT    => __('Top Content'),
            self::BOTTOM_CONTENT => __('Bottom Content'),
        ];
    }
}
