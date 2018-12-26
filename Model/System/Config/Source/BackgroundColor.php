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
 * Class BackgroundColor
 * @package Mageplaza\SocialShare\Model\System\Config\Source
 */
class BackgroundColor implements ArrayInterface
{
  const CUSTOM = "Custom";
  const NONE = "transparent";
  const WHITE = "#FFFFFF";
  const ORIGINAL = "#ffffff";
  const GRAY = "#808080";
  const BLACK = "#000000";
  /**
   * Return array of options as value-label pairs
   *
   * @return array Format: array(array('value' => '<value>', 'label' => '<label>'), ...)
   */
  public function toOptionArray()
  {
    return [
      ['label' => __('Custom'), 'value' => self::CUSTOM ],
      ['label' => __('White'), 'value' => self::WHITE ],
      ['label' => __('Default'), 'value' => self::ORIGINAL ],
      ['label' => __('None'), 'value' => self::NONE ],
      ['label' => __('Gray'), 'value' => self::GRAY ],
      ['label' => __('Black'), 'value' => self::BLACK ],
    ];
  }
}