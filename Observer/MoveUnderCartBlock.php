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

namespace Mageplaza\SocialShare\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class MoveUnderCartBlock implements ObserverInterface
{
    const BLOCK_NAME = 'mp.SocialShare.InlineCart';

    /**
     * Only present on themes that split the buy box out of "product.info.main"
     */
    const TARGET_CONTAINER = 'product.info.additional.actions';

    /**
     * @param Observer $observer
     *
     * @return void
     */
    public function execute(Observer $observer)
    {
        /** @var \Magento\Framework\View\LayoutInterface $layout */
        $layout = $observer->getData('layout');

        if (!$layout
            || !$layout->hasElement(self::BLOCK_NAME)
            || !$layout->hasElement(self::TARGET_CONTAINER)
        ) {
            return;
        }

        if ($layout->getParentName(self::BLOCK_NAME) !== self::TARGET_CONTAINER) {
            $layout->setChild(self::TARGET_CONTAINER, self::BLOCK_NAME, self::BLOCK_NAME);
        }

        $block = $layout->getBlock(self::BLOCK_NAME);

        if ($block) {
            $block->setData('is_additional_actions_row', true);
        }
    }
}
