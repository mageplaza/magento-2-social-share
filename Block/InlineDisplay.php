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

namespace Mageplaza\SocialShare\Block;

use Mageplaza\SocialShare\Model\System\Config\Source\ButtonSize;

/**
 * Class InlineDisplay
 * @package Mageplaza\SocialShare\Block
 */
class InlineDisplay extends Display
{
    /**
     * @return bool
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function isThisPageEnable()
    {
        $thisPage = $this->getPage();
        $storeId = $this->_storeManager->getStore()->getId();
        $allowPages = explode(',', $this->_helperData->getInlineApplyPages($storeId));
        if ($this->isShowUnderCart()) {
            array_push($allowPages, "under_cart");
        }
        if (in_array($thisPage, $allowPages)) {
            return true;
        }
        return false;
    }

    /**
     * @return bool
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function isThisPositionEnable()
    {
        $thisPosition = $this->getPosition();
        $storeId = $this->_storeManager->getStore()->getId();
        $positionArray = [];
        $selectPosition = $this->_helperData->getInlinePosition($storeId);
        array_push($positionArray, $selectPosition);
        if ($this->isShowUnderCart()) {
            array_push($positionArray, "under_cart");
        }
        if (in_array($thisPosition, $positionArray)) {
            return true;
        }
        return false;
    }

    /**
     * @return bool
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function isShowUnderCart()
    {
        $storeId = $this->_storeManager->getStore()->getId();
        if ($this->_helperData->isShowUnderCart($storeId)) {
            return true;
        }
        return false;
    }

    /**
     * @return string
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getInlineButtonSize()
    {
        $storeId = $this->_storeManager->getStore()->getId();
        $inlineSize = $this->_helperData->getInlineButtonSize($storeId);
        switch ($inlineSize) {
            case ButtonSize::SMALL :
                return "a2a_kit_size_16";
                break;
            case ButtonSize::MEDIUM :
                return "a2a_kit_size_32";
                break;
            case ButtonSize::LARGE :
                return "a2a_kit_size_64";
                break;
        }
        return "a2a_kit_size_32";
    }

    public function getContainerHeight($buttonSize)
    {
        switch ($buttonSize) {
            case "a2a_kit_size_16" :
                return "height: 25px";
                break;
            case "a2a_kit_size_32" :
                return "height: 40px";
                break;
            case "a2a_kit_size_64" :
                return "height: 75px";
                break;
        }
        return "height: 50px";
    }
}