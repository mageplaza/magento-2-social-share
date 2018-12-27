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

use Mageplaza\SocialShare\Model\System\Config\Source\Style;
use Mageplaza\SocialShare\Model\System\Config\Source\FloatPosition;
use Mageplaza\SocialShare\Model\System\Config\Source\ButtonSize;
/**
 * Class FloatDisplay
 * @package Mageplaza\SocialShare\Block
 */
class FloatDisplay extends Display
{
    /**
     * @return bool
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function isThisPageEnable()
    {
        $thisPage = $this->getPage();
        $storeId = $this->_storeManager->getStore()->getId();
        $allowPages = explode(',', $this->_helperData->getFloatApplyPages($storeId));
        if (in_array($thisPage, $allowPages)) {
            return true;
        }
        return false;
    }

    /**
     * @return string
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getFloatStyle() {
        $storeId = $this->_storeManager->getStore()->getId();
        $floatStyle = $this->_helperData->getFloatStyle($storeId);
        if($floatStyle == Style::VERTICAL) {
            return "a2a_vertical_style";
        }
        return "a2a_default_style";
    }

    /**
     * @param $floatStyle
     * @return bool
     */
    public function isVerticalStyle($floatStyle) {
        if($floatStyle == "a2a_vertical_style") {
            return true;
        }
        return false;
    }

    /**
     * @return string
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getFloatPosition() {
        $storeId = $this->_storeManager->getStore()->getId();
        $floatPosition = $this->_helperData->getFloatPosition($storeId);
        if($floatPosition == FloatPosition::LEFT) {
            return "left: 0px;";
        }
        return "right: 0px;";
    }

    /**
     * @return string
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getFloatButtonSize() {
        $storeId = $this->_storeManager->getStore()->getId();
        $floatSize = $this->_helperData->getFloatButtonSize($storeId);
        switch ($floatSize) {
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

    /**
     * @param $type
     * @return string
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getFloatMargin($type) {
        $storeId = $this->_storeManager->getStore()->getId();
        if($type == "bottom") {
            $floatMarginBottom = $this->_helperData->getFloatMarginBottom($storeId);
            return "bottom: " . $floatMarginBottom ."px;";
        }
        $floatMarginTop = $this->_helperData->getFloatMarginTop($storeId);
        return "top: " . $floatMarginTop ."px;";
    }
}