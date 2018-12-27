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

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

use Mageplaza\SocialShare\Helper\Data as HelperData;

/**
 * Class Display
 * @package Mageplaza\SocialShare\Block
 */
abstract class Display extends Template
{
    /**
     * @var HelperData
     */
    protected $_helperData;

    public function __construct(
        Context $context,
        HelperData $helperData,
        array $data = [])
    {
        $this->_helperData = $helperData;
        parent::__construct($context, $data);
    }

    /**
     * @return bool
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function isEnable()
    {
        $storeId = $this->_storeManager->getStore()->getId();
        if ($this->_helperData->isEnabled($storeId)) {
            return true;
        }
        return false;
    }

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
     * @return mixed
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getIconColor()
    {
        $storeId = $this->_storeManager->getStore()->getId();
        return $this->_helperData->getIconColor($storeId);
    }

    /**
     * @return mixed
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getButtonColor()
    {
        $storeId = $this->_storeManager->getStore()->getId();
        return $this->_helperData->getButtonColor($storeId);
    }

    /**
     * @return mixed
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getBackgroundColor()
    {
        $storeId = $this->_storeManager->getStore()->getId();
        $color = $this->_helperData->getBackgroundColor($storeId);
        return "background: " . $color . ";";
    }

    /**
     * @return mixed
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getBorderRadius()
    {
        $storeId = $this->_storeManager->getStore()->getId();
        return $this->_helperData->getBorderRadius($storeId) . "%";
    }

    /**
     * @return string
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getShareCounter()
    {
        $storeId = $this->_storeManager->getStore()->getId();
        if ($this->_helperData->isShareCounter($storeId)) {
            return "a2a_counter";
        }
        return "";
    }

    /**
     * @return string
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getThankYou()
    {
        $storeId = $this->_storeManager->getStore()->getId();
        if ($this->_helperData->isThankYouPopup($storeId)) {
            return "true";
        }
        return "false";

    }
}