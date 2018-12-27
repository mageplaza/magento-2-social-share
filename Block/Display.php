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
use Magento\Framework\UrlInterface;
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

    /**
     * @return bool
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function isEnableFacebook() {
        $storeId = $this->_storeManager->getStore()->getId();
        if($this->_helperData->isFacebook($storeId)) {
            return true;
        }
        return false;
    }

    /**
     * @return bool
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function isEnableTwitter() {
        $storeId = $this->_storeManager->getStore()->getId();
        if($this->_helperData->isTwitter($storeId)) {
            return true;
        }
        return false;
    }

    /**
     * @return bool
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function isEnableGoogle() {
        $storeId = $this->_storeManager->getStore()->getId();
        if($this->_helperData->isGoogle($storeId)) {
            return true;
        }
        return false;
    }

    /**
     * @return bool
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function isEnablePinterest() {
        $storeId = $this->_storeManager->getStore()->getId();
        if($this->_helperData->isPinterest($storeId)) {
            return true;
        }
        return false;
    }

    /**
     * @return bool
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function isEnableLinkedIn() {
        $storeId = $this->_storeManager->getStore()->getId();
        if($this->_helperData->isLinkedIn($storeId)) {
            return true;
        }
        return false;
    }

    /**
     * @return bool
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function isEnableAddMoreShare() {
        $storeId = $this->_storeManager->getStore()->getId();
        if($this->_helperData->isAddMoreShare($storeId)) {
            return true;
        }
        return false;
    }

    /**
     * @return bool
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function isEnableTumblr() {
        $storeId = $this->_storeManager->getStore()->getId();
        if($this->_helperData->isTumblr($storeId)) {
            return true;
        }
        return false;
    }

    /**
     * @param $service
     * @return string|null
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getImageUrl($service) {
        $storeId = $this->_storeManager->getStore()->getId();
        $baseUrl = $this->_storeManager->getStore()->getBaseUrl(UrlInterface::URL_TYPE_MEDIA);
        $modulePath = 'mageplaza/socialshare/';
        $imageUrl = null;
        switch ($service) {
            case 'twitter':
                $imageUrl = $baseUrl . $modulePath .'twitter/'. $this->_helperData->getTwitterImage($storeId);
                return $imageUrl;
                break;
            case 'google_plus':
                $imageUrl = $baseUrl . $modulePath .'google/'. $this->_helperData->getGoogleImage($storeId);
                return $imageUrl;
                break;
            case 'pinterest':
                $imageUrl = $baseUrl . $modulePath .'pinterest/'. $this->_helperData->getPinterestImage($storeId);
                return $imageUrl;
                break;
            case 'linkedin':
                $imageUrl = $baseUrl . $modulePath .'linkedIn/'. $this->_helperData->getLinkedInImage($storeId);
                return $imageUrl;
                break;
            case 'tumblr':
                $imageUrl = $baseUrl . $modulePath .'tumblr/'. $this->_helperData->getTumblrImage($storeId);
                return $imageUrl;
                break;
            default:
                $imageUrl = $baseUrl . $modulePath .'facebook/'. $this->_helperData->getFacebookImage($storeId);
                return $imageUrl;
                break;
        }
    }

    /**
     * @param $service
     * @return bool
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function isImageEnable($service) {
        $storeId = $this->_storeManager->getStore()->getId();
        switch ($service) {
            case "facebook":
                if($this->_helperData->getFacebookImage($storeId) != null) {
                    return true;
                }
                break;
            case 'twitter':
                if($this->_helperData->getTwitterImage($storeId) != null) {
                    return true;
                }
                break;
            case 'google_plus':
                if($this->_helperData->getGoogleImage($storeId) != null) {
                    return true;
                }
                break;
            case 'pinterest':
                if($this->_helperData->getPinterestImage($storeId) != null) {
                    return true;
                }
                break;
            case 'linkedin':
                if($this->_helperData->getLinkedInImage($storeId) != null) {
                    return true;
                }
                break;
            case 'tumblr':
                if($this->_helperData->getTumblrImage($storeId) != null) {
                    return true;
                }
                break;
        }
        return false;
    }

    /**
     * @return string
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getDisabledServices() {
        $storeId = $this->_storeManager->getStore()->getId();
        $disabledServices = implode(",", $this->_helperData->getDisableService($storeId));
        return '[' . $disabledServices . ']';
    }

    /**
     * @return array|mixed
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getNumberOfService() {
        $storeId = $this->_storeManager->getStore()->getId();
        return $this->_helperData->getNumberOfServices($storeId);
    }


}