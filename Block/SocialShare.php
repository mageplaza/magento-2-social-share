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

use Magento\Cms\Block\Page;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Mageplaza\SocialShare\Helper\Data as HelperData;
use Mageplaza\SocialShare\Model\System\Config\Source\ButtonSize;
use Mageplaza\SocialShare\Model\System\Config\Source\DisplayMenu;
use Mageplaza\SocialShare\Model\System\Config\Source\FloatApplyFor;
use Mageplaza\SocialShare\Model\System\Config\Source\FloatPosition;
use Mageplaza\SocialShare\Model\System\Config\Source\Style;

/**
 * Class SocialShare
 * @package Mageplaza\SocialShare\Block
 */
class SocialShare extends Template
{
    const SERVICES        = ['facebook', 'twitter', 'facebook_messenger', 'pinterest', 'linkedin', 'tumblr'];
    const CLICK_FULL_MENU = 2;
    const CLICK_MENU      = 1;
    const HOVER_MENU      = 0;

    /**
     * @var HelperData
     */
    protected $_helperData;

    /**
     * @var Page
     */
    protected $_page;

    /**
     * SocialShare constructor.
     *
     * @param Context $context
     * @param HelperData $helperData
     * @param Page $page
     * @param array $data
     */
    public function __construct(
        Context $context,
        HelperData $helperData,
        Page $page,
        array $data = []
    ) {
        $this->_helperData = $helperData;
        $this->_page       = $page;
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
        return $this->_helperData->isEnabled();
    }

    /**
     * @return mixed
     */
    public function getIconColor()
    {
        return $this->_helperData->getButtonColor() . ',' . $this->_helperData->getIconColor();
    }

    /**
     * @return mixed
     */
    public function getBackgroundColor()
    {
        $color = $this->_helperData->getBackgroundColor();

        return 'background: ' . $color . ';';
    }

    /**
     * @return mixed
     */
    public function getBorderRadius()
    {
        return $this->_helperData->getBorderRadius() . '%';
    }

    /**
     * @return bool
     */
    public function isAddMoreShare()
    {
        return $this->_helperData->isAddMoreShare();
    }

    /**
     * @param string $service
     *
     * @return string
     */
    public function getShareCounter($service)
    {
        $supportServices = ['pinterest', 'tumblr', 'a2a_dd'];
        if ($this->_helperData->isShareCounter() && in_array($service, $supportServices, true)) {
            return 'a2a_counter';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getThankYou()
    {
        if ($this->_helperData->isThankYouPopup()) {
            return 'true';
        }

        return 'false';
    }

    /**
     * @return array
     */
    public function getEnableService()
    {
        $enableServices = [];
        foreach (self::SERVICES as $service) {
            if ($this->_helperData->isServiceEnable($service)) {
                $enableServices[] = $service;
            }
        }

        return $enableServices;
    }

    /**
     * @param string $service
     *
     * @return string
     * @throws NoSuchEntityException
     */
    public function getImageUrl($service)
    {
        $baseUrl    = $this->_storeManager->getStore()->getBaseUrl(UrlInterface::URL_TYPE_MEDIA);
        $modulePath = 'mageplaza/socialshare/';
        $imageUrl   = $baseUrl . $modulePath . $service . '/' . $this->_helperData->getServiceImage($service);

        return $imageUrl;
    }

    /**
     * @param string $service
     *
     * @return bool
     */
    public function isImageEnable($service)
    {
        return $this->_helperData->getServiceImage($service) !== null;
    }

    /**
     * @return string
     */
    public function getDisabledServices()
    {
        $disabledServices = [];
        foreach (self::SERVICES as $service) {
            if ($this->_helperData->getDisableService($service) !== null) {
                $disabledServices[] = '"' . $this->_helperData->getDisableService($service) . '"';
            }
        }

        return implode(',', $disabledServices);
    }

    /**
     * @return int
     */
    public function getNumberOfService()
    {
        return (int) $this->_helperData->getNumberOfServices();
    }

    /**
     * @return string
     */
    public function getMenuType()
    {
        $menuType = $this->_helperData->getDisplayMenu();
        if ($menuType === DisplayMenu::ON_CLICK) {
            if ($this->_helperData->isFullMenuOnClick()) {
                return self::CLICK_FULL_MENU;
            }

            return self::CLICK_MENU;
        }

        return self::HOVER_MENU;
    }

    /**
     * @return string
     */
    public function getDisplayType()
    {
        $type = $this->getData('type');
        if ($type === 'float') {
            return 'a2a_floating_style mp_social_share_float';
        }
        if ($type === 'inline') {
            return 'a2a_default_style';
        }

        return null;
    }

    /**
     * @return bool
     */
    public function isDisplayInline()
    {
        $type = $this->getData('type');

        return $type === 'inline';
    }

    /**
     * @return string
     */
    public function getPosition()
    {
        $position = $this->getData('position');

        return $position;
    }

    /**
     * @param $displayType
     *
     * @return string|null
     */
    public function getContainerClass($displayType)
    {
        $position = $this->getData('position');
        if ($displayType === 'a2a_default_style') {
            return $position === 'under_cart' ? 'mp_social_share_inline_under_cart' : 'mp_social_share_inline';
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
        $type       = $this->getData('type');
        $thisPage   = $this->getData('page');
        $allowPages = null;

        if ($type === 'inline') {
            $allowPages = explode(',', $this->_helperData->getInlineApplyPages());
            if ($this->isShowUnderCart()) {
                $allowPages[] = 'under_cart';
            }
            if (in_array($thisPage, $allowPages, true)) {
                return true;
            }
        }
        if ($type === 'float') {
            if ($this->_helperData->getFloatApplyPages() === FloatApplyFor::ALL_PAGES) {
                return true;
            }
            if ($this->_helperData->getFloatApplyPages() === FloatApplyFor::SELECT_PAGES) {
                $selectPages = explode(',', $this->_helperData->getFloatSelectPages());
                $cmsPages    = explode(',', $this->_helperData->getFloatCmsPages());
                if ($thisPage === 'cms_page') {
                    $pageId = $this->_page->getPage()->getId();
                    if (in_array($pageId, $cmsPages, true)) {
                        return true;
                    }
                }
                if (in_array($thisPage, $selectPages, true)) {
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
        return $this->_helperData->isShowUnderCart();
    }

    /**
     * @return bool
     */
    public function isThisPositionEnable()
    {
        $thisPosition  = $this->getData('position');
        $positionArray = [];
        if ($thisPosition === 'float_position') {
            return true;
        }
        $selectPosition  = $this->_helperData->getInlinePosition();
        $positionArray[] = $selectPosition;
        if ($this->isShowUnderCart()) {
            $positionArray[] = 'under_cart';
        }
        if (in_array($thisPosition, $positionArray, true)) {
            return true;
        }

        return false;
    }

    /**
     * @return string
     */
    public function getButtonSize()
    {
        $type = $this->getData('type');
        if ($type === 'inline') {
            $inlineSize = $this->_helperData->getInlineButtonSize();

            return $this->setButtonSize($inlineSize);
        }
        $floatSize = $this->_helperData->getFloatButtonSize();

        return $this->setButtonSize($floatSize);
    }

    /**
     * @param string $buttonSize
     *
     * @return string
     */
    public function setImageSize($buttonSize)
    {
        switch ($buttonSize) {
            case 'a2a_kit_size_16':
                $imageSize = 'width="16" height="16"';
                break;
            case 'a2a_kit_size_64':
                $imageSize = 'width="64" height="64"';
                break;
            default:
                $imageSize = 'width="32" height="32"';
                break;
        }

        return $imageSize;
    }

    /**
     * @param string $buttonSize
     *
     * @return string
     */
    public function setButtonSize($buttonSize)
    {
        switch ($buttonSize) {
            case ButtonSize::SMALL:
                $buttonSizeStr = 'a2a_kit_size_16';
                break;
            case ButtonSize::LARGE:
                $buttonSizeStr = 'a2a_kit_size_64';
                break;
            default:
                $buttonSizeStr = 'a2a_kit_size_32';
                break;
        }

        return $buttonSizeStr;
    }

    /**
     * @return string
     */
    public function getFloatStyle()
    {
        if (!$this->isDisplayInline()) {
            $floatStyle = $this->_helperData->getFloatStyle();

            return $floatStyle === Style::VERTICAL ? 'a2a_vertical_style' : 'a2a_default_style';
        }

        return null;
    }

    /**
     * @param string $floatStyle
     *
     * @return bool
     */
    public function isVerticalStyle($floatStyle)
    {
        return $floatStyle === 'a2a_vertical_style';
    }

    /**
     * @return string
     */
    public function getFloatPosition()
    {
        return $this->_helperData->getFloatPosition() === FloatPosition::LEFT ? 'left: 0px;' : 'right: 0px;';
    }

    /**
     * @param string $type
     *
     * @return string
     */
    public function getFloatMargin($type)
    {
        $floatMarginTop    = $this->_helperData->getFloatMarginTop();
        $floatMarginBottom = $this->_helperData->getFloatMarginBottom();

        return $type === 'bottom' ? "bottom: {$floatMarginBottom}px;" : "top: {$floatMarginTop}px;";
    }
}
