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
     */
    public function isEnable()
    {
        if ($this->_helperData->isEnabled()) {
            return true;
        }
        return false;
    }

    /**
     * @return mixed
     */
    public function getIconColor()
    {
        return $this->_helperData->getIconColor();
    }

    /**
     * @return mixed
     */
    public function getButtonColor()
    {
        return $this->_helperData->getButtonColor();
    }

    /**
     * @return mixed
     */
    public function getBackgroundColor()
    {
        $color = $this->_helperData->getBackgroundColor();
        return "background: " . $color . ";";
    }

    /**
     * @return mixed
     */
    public function getBorderRadius()
    {
        return $this->_helperData->getBorderRadius() . "%";
    }

    /**
     * @return bool
     */
    public function isAddMoreShare() {
        if($this->_helperData->isAddMoreShare()) {
            return true;
        }
        return false;
    }

    /**
     * @return string
     */
    public function getShareCounter()
    {
        if ($this->_helperData->isShareCounter()) {
            return "a2a_counter";
        }
        return "";
    }

    /**
     * @return string
     */
    public function getThankYou()
    {
        if ($this->_helperData->isThankYouPopup()) {
            return "true";
        }
        return "false";

    }

    /**
     * @return array
     */
    public function getEnableService() {
        $enableServices = [];
        if($this->_helperData->isFacebook()) {
            array_push($enableServices, 'facebook');
        }
        if($this->_helperData->isTwitter()) {
            array_push($enableServices, 'twitter');
        }
        if($this->_helperData->isGoogle()) {
            array_push($enableServices, 'google_plus');
        }
        if($this->_helperData->isPinterest()) {
            array_push($enableServices, 'pinterest');
        }
        if($this->_helperData->isLinkedIn()) {
            array_push($enableServices, 'linkedin');
        }
        if($this->_helperData->isTumblr()) {
            array_push($enableServices, 'tumblr');
        }
        return $enableServices;
    }

    /**
     * @param $service
     * @return string|null
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getImageUrl($service) {
        $baseUrl = $this->_storeManager->getStore()->getBaseUrl(UrlInterface::URL_TYPE_MEDIA);
        $modulePath = 'mageplaza/socialshare/';
        $imageUrl = null;
        switch ($service) {
            case 'twitter':
                $imageUrl = $baseUrl . $modulePath .'twitter/'. $this->_helperData->getTwitterImage();
                return $imageUrl;
                break;
            case 'google_plus':
                $imageUrl = $baseUrl . $modulePath .'google/'. $this->_helperData->getGoogleImage();
                return $imageUrl;
                break;
            case 'pinterest':
                $imageUrl = $baseUrl . $modulePath .'pinterest/'. $this->_helperData->getPinterestImage();
                return $imageUrl;
                break;
            case 'linkedin':
                $imageUrl = $baseUrl . $modulePath .'linkedIn/'. $this->_helperData->getLinkedInImage();
                return $imageUrl;
                break;
            case 'tumblr':
                $imageUrl = $baseUrl . $modulePath .'tumblr/'. $this->_helperData->getTumblrImage();
                return $imageUrl;
                break;
            default:
                $imageUrl = $baseUrl . $modulePath .'facebook/'. $this->_helperData->getFacebookImage();
                return $imageUrl;
                break;
        }
    }

    /**
     * @param $service
     * @return bool
     */
    public function isImageEnable($service) {
        switch ($service) {
            case "facebook":
                if($this->_helperData->getFacebookImage() != null) {
                    return true;
                }
                break;
            case 'twitter':
                if($this->_helperData->getTwitterImage() != null) {
                    return true;
                }
                break;
            case 'google_plus':
                if($this->_helperData->getGoogleImage() != null) {
                    return true;
                }
                break;
            case 'pinterest':
                if($this->_helperData->getPinterestImage() != null) {
                    return true;
                }
                break;
            case 'linkedin':
                if($this->_helperData->getLinkedInImage() != null) {
                    return true;
                }
                break;
            case 'tumblr':
                if($this->_helperData->getTumblrImage() != null) {
                    return true;
                }
                break;
        }
        return false;
    }

    /**
     * @return string
     */
    public function getDisabledServices() {
        $disabledServices = implode(",", $this->_helperData->getDisableService());
        return '[' . $disabledServices . ']';
    }

    /**
     * @return array|mixed
     */
    public function getNumberOfService() {
        return $this->_helperData->getNumberOfServices();
    }

    /**
     * @return string
     */
    public function getMenuType() {
        $menuType = $this->_helperData->getDisplayMenu();
        if($menuType == DisplayMenu::ON_CLICK) {
            if($this->_helperData->isFullMenuOnClick()) {
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
     */
    public function isThisPageEnable()
    {
        $type = $this->getData('type');
        $thisPage = $this->getData('page');
        $allowPages = null;
        if($type == 'inline') {
            $allowPages = explode(',', $this->_helperData->getInlineApplyPages());
            if ($this->isShowUnderCart()) {
                array_push($allowPages, "under_cart");
            }
            if (in_array($thisPage, $allowPages)) {
                return true;
            }
        }
        if($type == 'float') {
            if($this->_helperData->getFloatApplyPages() == FloatApplyFor::ALL_PAGES) {
                return true;
            }
            if($this->_helperData->getFloatApplyPages() == FloatApplyFor::SELECT_PAGES) {
                $selectPages = explode(',', $this->_helperData->getFloatSelectPages());
                $cmsPages = explode(',', $this->_helperData->getFloatCmsPages());
                if($thisPage == "cms_page") {
                    $pageId = $this->_page->getPage()->getId();
                    if(in_array($pageId, $cmsPages)) {
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
     * @return bool
     */
    public function isShowUnderCart()
    {
        if ($this->_helperData->isShowUnderCart()) {
            return true;
        }
        return false;
    }

    /**
     * @return bool
     */
    public function isThisPositionEnable()
    {
        $thisPosition = $this->getData('position');
        $positionArray = [];
        if($thisPosition == "float_position") {
            return true;
        }else {
            $selectPosition = $this->_helperData->getInlinePosition();
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
     * @return string
     */
    public function getButtonSize() {
        $type = $this->getData('type');
        if($type == 'inline') {
            $inlineSize = $this->_helperData->getInlineButtonSize();
            return $this->setButtonSize($inlineSize);
        }
        if($type == 'float') {
            $floatSize = $this->_helperData->getFloatButtonSize();
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
     */
    public function getFloatStyle() {
        if(!$this->isDisplayInline()) {
            $floatStyle = $this->_helperData->getFloatStyle();
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
     */
    public function getFloatPosition() {
        $floatPosition = $this->_helperData->getFloatPosition();
        if ($floatPosition == FloatPosition::LEFT) {
            return "left: 0px;";
        }
        return "right: 0px;";
    }

    /**
     * @param $type
     * @return string
     */
    public function getFloatMargin($type) {
        if($type == "bottom") {
            $floatMarginBottom = $this->_helperData->getFloatMarginBottom();
            return "bottom: " . $floatMarginBottom ."px;";
        }
        $floatMarginTop = $this->_helperData->getFloatMarginTop();
        return "top: " . $floatMarginTop ."px;";
    }
}