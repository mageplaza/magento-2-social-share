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

namespace Mageplaza\SocialShare\Helper;

use Mageplaza\Core\Helper\AbstractData;
use Mageplaza\SocialShare\Model\System\Config\Source\IconColor;
use Mageplaza\SocialShare\Model\System\Config\Source\ButtonColor;
use Mageplaza\SocialShare\Model\System\Config\Source\BackgroundColor;

/**
 * Class Data
 * @package Mageplaza\SocialShare\Helper
 */
class Data extends AbstractData
{
    const CONFIG_MODULE_PATH = 'socialshare';
    const CONFIG_FLOAT = 'socialshare/float/';
    const CONFIG_INLINE = 'socialshare/inline/';
    const CONFIG_FACEBOOK = '/general/facebook/';
    const CONFIG_TWITTER = '/general/twitter/';
    const CONFIG_GOOGLE = '/general/google/';
    const CONFIG_PINTEREST = '/general/pinterest/';
    const CONFIG_LINKEDIN = '/general/linkedIn/';
    const CONFIG_TUMBLR = '/general/tumblr/';
    const CONFIG_MORE = '/general/add_more_share/';
    /*
     * //////////////////////////////////////////////////
     * General Configuration
     * /////////////////////////////////////////////////
     */

    /**
     * @param null $storeId
     * @return mixed
     */
    public function getIconColor($storeId = null)
    {
        $selectColor = $this->getConfigGeneral('icon_color', $storeId);
        if ($selectColor == IconColor::CUSTOM) {
            return $this->getConfigGeneral('custom_icon_color', $storeId);
        }
        return $selectColor;
    }

    /**
     * @param null $storeId
     * @return mixed
     */
    public function getButtonColor($storeId = null)
    {
        $selectColor = $this->getConfigGeneral('button_color', $storeId);
        if ($selectColor == ButtonColor::CUSTOM) {
            return $this->getConfigGeneral('custom_button_color', $storeId);
        }
        return $selectColor;
    }

    /**
     * @param null $storeId
     * @return mixed
     */
    public function getBackgroundColor($storeId = null)
    {
        $selectColor = $this->getConfigGeneral('background_color', $storeId);
        if ($selectColor == BackgroundColor::CUSTOM) {
            return $this->getConfigGeneral('custom_background_color', $storeId);
        }
        return $selectColor;
    }

    /**
     * @param null $storeId
     * @return mixed
     */
    public function getBorderRadius($storeId = null)
    {
        return $this->getConfigGeneral('border_radius', $storeId);
    }

    /**
     * @param null $storeId
     * @return mixed
     */
    public function isShareCounter($storeId = null)
    {
        return $this->getConfigGeneral('share_counter', $storeId);
    }

    /**
     * @param null $storeId
     * @return mixed
     */
    public function isThankYouPopup($storeId = null)
    {
        return $this->getConfigGeneral('thank_you', $storeId);
    }

    /**
     * @param null $storeId
     * @return array|mixed
     */
    public function isFacebook($storeId = null)
    {
        return $this->getConfigValue(self::CONFIG_MODULE_PATH . self::CONFIG_FACEBOOK . 'enabled', $storeId);
    }

    /**
     * @param null $storeId
     * @return array|mixed
     */
    public function getFacebookImage($storeId = null)
    {
        return $this->getConfigValue(self::CONFIG_MODULE_PATH . self::CONFIG_FACEBOOK . 'image', $storeId);
    }

    /**
     * @param null $storeId
     * @return array|mixed
     */
    public function isTwitter($storeId = null) {
        return $this->getConfigValue(self::CONFIG_MODULE_PATH . self::CONFIG_TWITTER . 'enabled', $storeId);
    }

    /**
     * @param null $storeId
     * @return array|mixed
     */
    public function getTwitterImage($storeId = null) {
        return $this->getConfigValue(self::CONFIG_MODULE_PATH . self::CONFIG_TWITTER . 'image', $storeId);
    }

    /**
     * @param null $storeId
     * @return array|mixed
     */
    public function isGoogle($storeId = null)
    {
        return $this->getConfigValue(self::CONFIG_MODULE_PATH . self::CONFIG_GOOGLE . 'enabled', $storeId);
    }

    /**
     * @param null $storeId
     * @return array|mixed
     */
    public function getGoogleImage($storeId = null)
    {
        return $this->getConfigValue(self::CONFIG_MODULE_PATH . self::CONFIG_GOOGLE . 'image', $storeId);
    }

    /**
     * @param null $storeId
     * @return array|mixed
     */
    public function isPinterest($storeId = null)
    {
        return $this->getConfigValue(self::CONFIG_MODULE_PATH . self::CONFIG_PINTEREST . 'enabled', $storeId);
    }

    /**
     * @param null $storeId
     * @return array|mixed
     */
    public function getPinterestImage($storeId = null)
    {
        return $this->getConfigValue(self::CONFIG_MODULE_PATH . self::CONFIG_PINTEREST . 'image', $storeId);
    }

    /**
     * @param null $storeId
     * @return array|mixed
     */
    public function isLinkedIn($storeId = null)
    {
        return $this->getConfigValue(self::CONFIG_MODULE_PATH . self::CONFIG_LINKEDIN . 'enabled', $storeId);
    }

    /**
     * @param null $storeId
     * @return array|mixed
     */
    public function getLinkedInImage($storeId = null)
    {
        return $this->getConfigValue(self::CONFIG_MODULE_PATH . self::CONFIG_LINKEDIN . 'image', $storeId);
    }

    /**
     * @param null $storeId
     * @return array|mixed
     */
    public function isTumblr($storeId = null)
    {
        return $this->getConfigValue(self::CONFIG_MODULE_PATH . self::CONFIG_TUMBLR . 'enabled', $storeId);
    }

    /**
     * @param null $storeId
     * @return array|mixed
     */
    public function getTumblrImage($storeId = null)
    {
        return $this->getConfigValue(self::CONFIG_MODULE_PATH . self::CONFIG_TUMBLR . 'image', $storeId);
    }

    /**
     * @param null $storeId
     * @return array|mixed
     */
    public function isAddMoreShare($storeId = null)
    {
        return $this->getConfigValue(self::CONFIG_MODULE_PATH . self::CONFIG_MORE . 'enabled', $storeId);
    }

    /**
     * @param null $storeId
     * @return array|mixed
     */
    public function getDisplayMenu($storeId = null)
    {
        return $this->getConfigValue(self::CONFIG_MODULE_PATH . self::CONFIG_MORE . 'display_menu', $storeId);
    }

    /**
     * @param null $storeId
     * @return array|mixed
     */
    public function getNumberOfServices($storeId = null)
    {
        return $this->getConfigValue(self::CONFIG_MODULE_PATH . self::CONFIG_MORE . 'number_service', $storeId);
    }

    public function getDisableService($storeId = null ) {
        $disableServices = [];
        if(!$this->isFacebook($storeId)) {
            array_push($disableServices, '"facebook"');
        }
        if(!$this->isTwitter($storeId)) {
            array_push($disableServices, '"twitter"');
        }
        if(!$this->isGoogle($storeId)) {
            array_push($disableServices, '"google_plus"');
        }
        if(!$this->isPinterest($storeId)) {
            array_push($disableServices, '"pinterest"');
        }
        if(!$this->isLinkedIn($storeId)) {
            array_push($disableServices, '"linkedin"');
        }
        if(!$this->isTumblr($storeId)) {
            array_push($disableServices, '"tumblr"');
        }
        return $disableServices;

    }

    /*
     * //////////////////////////////////////////////////
     * Floating Configuration
     * /////////////////////////////////////////////////
     */
    /**
     * @param null $storeId
     * @return array|mixed
     */
    public function getFloatApplyPages($storeId = null)
    {
        return $this->getConfigValue(self::CONFIG_FLOAT . 'apply_for', $storeId);
    }

    /**
     * @param null $storeId
     * @return array|mixed
     */
    public function getFloatStyle($storeId = null)
    {
        return $this->getConfigValue(self::CONFIG_FLOAT . 'style', $storeId);
    }

    /**
     * @param null $storeId
     * @return array|mixed
     */
    public function getFloatPosition($storeId = null)
    {
        return $this->getConfigValue(self::CONFIG_FLOAT . 'position', $storeId);
    }

    /**
     * @param null $storeId
     * @return array|mixed
     */
    public function getFloatMarginTop($storeId = null)
    {
        return $this->getConfigValue(self::CONFIG_FLOAT . 'margin_top', $storeId);
    }
    /**
     * @param null $storeId
     * @return array|mixed
     */
    public function getFloatMarginBottom($storeId = null)
    {
        return $this->getConfigValue(self::CONFIG_FLOAT . 'margin_bottom', $storeId);
    }

    /**
     * @param null $storeId
     * @return array|mixed
     */
    public function getFloatButtonSize($storeId = null)
    {
        return $this->getConfigValue(self::CONFIG_FLOAT . 'button_size', $storeId);
    }

    /*
     * //////////////////////////////////////////////////
     * Inline Configuration
     * /////////////////////////////////////////////////
     */
    /**
     * @param null $storeId
     * @return array|mixed
     */
    public function getInlineApplyPages($storeId = null)
    {
        return $this->getConfigValue(self::CONFIG_INLINE . 'apply_for', $storeId);
    }

    /**
     * @param null $storeId
     * @return array|mixed
     */
    public function getInlinePosition($storeId = null)
    {
        return $this->getConfigValue(self::CONFIG_INLINE . 'position', $storeId);
    }

    /**
     * @param null $storeId
     * @return array|mixed
     */
    public function isShowUnderCart($storeId = null)
    {
        return $this->getConfigValue(self::CONFIG_INLINE . 'show_under_cart', $storeId);
    }

    /**
     * @param null $storeId
     * @return array|mixed
     */
    public function getInlineButtonSize($storeId = null)
    {
        return $this->getConfigValue(self::CONFIG_INLINE . 'button_size', $storeId);
    }
}