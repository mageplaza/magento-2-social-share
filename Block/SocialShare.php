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
use Magento\Cms\Block\Page;

use Mageplaza\SocialShare\Helper\Data as HelperData;
use Mageplaza\SocialShare\Model\System\Config\Source\DisplayMenu;
use Mageplaza\SocialShare\Model\System\Config\Source\Style;
use Mageplaza\SocialShare\Model\System\Config\Source\FloatPosition;
use Mageplaza\SocialShare\Model\System\Config\Source\ButtonSize;
use Mageplaza\SocialShare\Model\System\Config\Source\FloatApplyFor;

/**
 * Class SocialShare
 * @package Mageplaza\SocialShare\Block
 */
class SocialShare extends Template
{
    /**
     * @var HelperData
     */
    protected $_helperData;
    /**
     * @var \Magento\Cms\Block\Page
     */
    protected $_page;

    /**
     * SocialShare constructor.
     * @param Context $context
     * @param HelperData $helperData
     * @param Page $page
     * @param array $data
     */
    public function __construct(
        Context $context,
        HelperData $helperData,
        Page $page,
        array $data = [])
    {
        $this->_helperData = $helperData;
        $this->_page = $page;
        parent::__construct($context, $data);
    }

    /**
     * /////////////////////////////////////////////////////////////
     * General Configuration
     * ////////////////////////////////////////////////////////////
     */

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
     * @param $service
     * @return bool
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function isEnableService($service) {
        $storeId = $this->_storeManager->getStore()->getId();
        switch ($service) {
            case "facebook":
                if($this->_helperData->isFacebook($storeId)) {
                    return true;
                }
                break;
            case 'twitter':
                if($this->_helperData->isTwitter($storeId)) {
                    return true;
                }
                break;
            case 'google_plus':
                if($this->_helperData->isGoogle($storeId)) {
                    return true;
                }
                break;
            case 'pinterest':
                if($this->_helperData->isPinterest($storeId)) {
                    return true;
                }
                break;
            case 'linkedin':
                if($this->_helperData->isLinkedIn($storeId)) {
                    return true;
                }
                break;
            case 'tumblr':
                if($this->_helperData->isTumblr($storeId)) {
                    return true;
                }
                break;
            case 'add_more_share':
                if($this->_helperData->isAddMoreShare($storeId)) {
                    return true;
                }
                break;
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

    /**
     * @return string
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getMenuType() {
        $storeId = $this->_storeManager->getStore()->getId();
        $menuType = $this->_helperData->getDisplayMenu($storeId);
        if($menuType == DisplayMenu::ON_CLICK) {
            if($this->_helperData->isFullMenuOnClick($storeId)) {
                return "2";
            }
            return "1";
        }
        return "0";
    }

    /**
     * @return string
     */
    public function getDisplayType() {
        $type = $this->getData('type');
        if($type == 'float') {
            return 'a2a_floating_style mp_social_share_float';
        }
        if($type == 'inline') {
            return 'a2a_default_style';
        }
        return null;
    }

    /**
     * @return bool
     */
    public function isDisplayInline() {
        $type = $this->getData('type');
        if($type == 'inline') {
            return true;
        }
        return false;
    }

    /**
     * @param $displayType
     * @return string|null
     */
    public function getContainerClass($displayType) {
        $position = $this->getData('position');
        if($displayType == 'a2a_default_style') {
            if($position == 'under_cart') {
                return "mp_social_share_inline_under_cart";
            }
            return "mp_social_share_inline";
        }
        return null;
    }

    /**
     * /////////////////////////////////////////////////////////////
     * Float and Inline Configuration
     * ////////////////////////////////////////////////////////////
     */

    /**
     * @return bool
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function isThisPageEnable()
    {
        $storeId = $this->_storeManager->getStore()->getId();
        $type = $this->getData('type');
        $thisPage = $this->getData('page');
        $allowPages = null;
        if($type == 'inline') {
            $allowPages = explode(',', $this->_helperData->getInlineApplyPages($storeId));
            if ($this->isShowUnderCart()) {
                array_push($allowPages, "under_cart");
            }
            if (in_array($thisPage, $allowPages)) {
                return true;
            }
        }
        if($type == 'float') {
            if($this->_helperData->getFloatApplyPages($storeId) == FloatApplyFor::ALL_PAGES) {
                return true;
            }
            if($this->_helperData->getFloatApplyPages($storeId) == FloatApplyFor::SELECT_PAGES) {
                $selectPages = explode(',', $this->_helperData->getFloatSelectPages($storeId));
                if($thisPage == "cms_page") {
                    $pageId = $this->_page->getPage()->getId();
                    $pageName = $this->getPageName($pageId);
                    if(in_array($pageName, $selectPages)) {
                        return true;
                    }
                }
                if (in_array($thisPage, $selectPages)) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * @param $pageId
     * @return string
     */
    public function getPageName($pageId) {
        switch ($pageId) {
            case 1 :
                return "not_found_page";
                break;
            case 2 :
                return "home_page";
                break;
            case 3 :
                return "no_cookie";
                break;
            case 4 :
                return "privacy_policy";
                break;
            case 5 :
                return "about_us";
                break;
            default :
                return "customer_service";
                break;
        }
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
     * @return bool
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function isThisPositionEnable()
    {
        $thisPosition = $this->getData('position');
        $storeId = $this->_storeManager->getStore()->getId();
        $positionArray = [];
        if($thisPosition == "float_position") {
            return true;
        }else {
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
    }

    /**
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getButtonSize() {
        $type = $this->getData('type');
        $storeId = $this->_storeManager->getStore()->getId();
        if($type == 'inline') {
            $inlineSize = $this->_helperData->getInlineButtonSize($storeId);
            return $this->setButtonSize($inlineSize);
        }
        if($type == 'float') {
            $floatSize = $this->_helperData->getFloatButtonSize($storeId);
            return $this->setButtonSize($floatSize);
        }
    }

    /**
     * @param $buttonSize
     * @return string
     */
    public function setImageSize($buttonSize) {
        switch ($buttonSize) {
            case "a2a_kit_size_16" :
                return 'width="16" height="16"';
                break;
            case "a2a_kit_size_32" :
                return 'width="32" height="32"';
                break;
            case "a2a_kit_size_64" :
                return 'width="64" height="64"';
                break;
            default:
                return 'width="32" height="32"';
                break;
        }
    }

    /**
     * @param $buttonSize
     * @return string
     */
    public function setButtonSize($buttonSize) {
        switch ($buttonSize) {
            case ButtonSize::SMALL :
                return "a2a_kit_size_16";
                break;
            case ButtonSize::MEDIUM :
                return "a2a_kit_size_32";
                break;
            case ButtonSize::LARGE :
                return "a2a_kit_size_64";
                break;
            default:
                return "a2a_kit_size_32";
                break;
        }
    }

    /**
     * @return string
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getFloatStyle() {
        if(!$this->isDisplayInline()) {
            $storeId = $this->_storeManager->getStore()->getId();
            $floatStyle = $this->_helperData->getFloatStyle($storeId);
            if($floatStyle == Style::VERTICAL) {
                return "a2a_vertical_style";
            }
            return "a2a_default_style";
        }
        return null;
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
        if ($floatPosition == FloatPosition::LEFT) {
            return "left: 0px;";
        }
        return "right: 0px;";
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