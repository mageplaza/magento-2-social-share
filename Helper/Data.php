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
use Mageplaza\SocialShare\Model\System\Config\Source\BackgroundColor;
use Mageplaza\SocialShare\Model\System\Config\Source\ButtonColor;
use Mageplaza\SocialShare\Model\System\Config\Source\IconColor;

/**
 * Class Data
 * @package Mageplaza\SocialShare\Helper
 */
class Data extends AbstractData
{
    const CONFIG_MODULE_PATH = 'mpsocialshare';
    const CONFIG_FLOAT       = 'float/';
    const CONFIG_INLINE      = 'inline/';
    const CONFIG_MORE        = 'add_more_share/';
    /*
     * //////////////////////////////////////////////////
     * General Configuration
     * /////////////////////////////////////////////////
     */

    /**
     * @param null $storeId
     *
     * @return mixed
     */
    public function getIconColor($storeId = null)
    {
        $selectColor = $this->getConfigGeneral('icon_color', $storeId);
        if ($selectColor === IconColor::CUSTOM) {
            return $this->getConfigGeneral('custom_icon_color', $storeId);
        }

        return $selectColor;
    }

    /**
     * @param null $storeId
     *
     * @return mixed
     */
    public function getButtonColor($storeId = null)
    {
        $selectColor = $this->getConfigGeneral('button_color', $storeId);
        if ($selectColor === ButtonColor::CUSTOM) {
            return $this->getConfigGeneral('custom_button_color', $storeId);
        }

        return $selectColor;
    }

    /**
     * @param null $storeId
     *
     * @return mixed
     */
    public function getBackgroundColor($storeId = null)
    {
        $selectColor = $this->getConfigGeneral('background_color', $storeId);
        if ($selectColor === BackgroundColor::CUSTOM) {
            return $this->getConfigGeneral('custom_background_color', $storeId);
        }

        return $selectColor;
    }

    /**
     * @param null $storeId
     *
     * @return mixed
     */
    public function getBorderRadius($storeId = null)
    {
        return $this->getConfigGeneral('border_radius', $storeId);
    }

    /**
     * @param null $storeId
     *
     * @return mixed
     */
    public function isShareCounter($storeId = null)
    {
        return $this->getConfigGeneral('share_counter', $storeId);
    }

    /**
     * @param null $storeId
     *
     * @return mixed
     */
    public function isThankYouPopup($storeId = null)
    {
        return $this->getConfigGeneral('thank_you', $storeId);
    }

    /**
     * @param $serviceCode
     * @param null $storeId
     *
     * @return array|mixed
     */
    public function isServiceEnable($serviceCode, $storeId = null)
    {
        return $this->getConfigGeneral($serviceCode . '/enabled', $storeId);
    }

    /**
     * @param $serviceCode
     * @param null $storeId
     *
     * @return array|mixed
     */
    public function getServiceImage($serviceCode, $storeId = null)
    {
        return $this->getConfigGeneral($serviceCode . '/image', $storeId);
    }

    /**
     * @param null $storeId
     *
     * @return array|mixed
     */
    public function isAddMoreShare($storeId = null)
    {
        return $this->getConfigGeneral(self::CONFIG_MORE . 'enabled', $storeId);
    }

    /**
     * @param null $storeId
     *
     * @return array|mixed
     */
    public function getDisplayMenu($storeId = null)
    {
        return $this->getConfigGeneral(self::CONFIG_MORE . 'display_menu', $storeId);
    }

    /**
     * @param null $storeId
     *
     * @return array|mixed
     */
    public function getNumberOfServices($storeId = null)
    {
        return $this->getConfigGeneral(self::CONFIG_MORE . 'number_service', $storeId);
    }

    /**
     * @param null $storeId
     *
     * @return array|mixed
     */
    public function isFullMenuOnClick($storeId = null)
    {
        return $this->getConfigGeneral(self::CONFIG_MORE . 'full_menu', $storeId);
    }

    /**
     * @param $serviceCode
     * @param null $storeId
     *
     * @return null |null
     */
    public function getDisableService($serviceCode, $storeId = null)
    {
        if (!$this->isServiceEnable($serviceCode, $storeId)) {
            return $serviceCode;
        }

        return null;
    }

    /*
     * //////////////////////////////////////////////////
     * Floating Configuration
     * /////////////////////////////////////////////////
     */
    /**
     * @param null $storeId
     *
     * @return array|mixed
     */
    public function getFloatApplyPages($storeId = null)
    {
        return $this->getModuleConfig(self::CONFIG_FLOAT . 'apply_for', $storeId);
    }

    /**
     * @param null $storeId
     *
     * @return array|mixed
     */
    public function getFloatSelectPages($storeId = null)
    {
        return $this->getModuleConfig(self::CONFIG_FLOAT . 'select_page', $storeId);
    }

    /**
     * @param null $storeId
     *
     * @return array|mixed
     */
    public function getFloatCmsPages($storeId = null)
    {
        return $this->getModuleConfig(self::CONFIG_FLOAT . 'cms_page', $storeId);
    }

    /**
     * @param null $storeId
     *
     * @return array|mixed
     */
    public function getFloatStyle($storeId = null)
    {
        return $this->getModuleConfig(self::CONFIG_FLOAT . 'style', $storeId);
    }

    /**
     * @param null $storeId
     *
     * @return array|mixed
     */
    public function getFloatPosition($storeId = null)
    {
        return $this->getModuleConfig(self::CONFIG_FLOAT . 'position', $storeId);
    }

    /**
     * @param null $storeId
     *
     * @return array|mixed
     */
    public function getFloatMarginTop($storeId = null)
    {
        return $this->getModuleConfig(self::CONFIG_FLOAT . 'margin_top', $storeId);
    }

    /**
     * @param null $storeId
     *
     * @return array|mixed
     */
    public function getFloatMarginBottom($storeId = null)
    {
        return $this->getModuleConfig(self::CONFIG_FLOAT . 'margin_bottom', $storeId);
    }

    /**
     * @param null $storeId
     *
     * @return array|mixed
     */
    public function getFloatButtonSize($storeId = null)
    {
        return $this->getModuleConfig(self::CONFIG_FLOAT . 'button_size', $storeId);
    }

    /*
     * //////////////////////////////////////////////////
     * Inline Configuration
     * /////////////////////////////////////////////////
     */
    /**
     * @param null $storeId
     *
     * @return array|mixed
     */
    public function getInlineApplyPages($storeId = null)
    {
        return $this->getModuleConfig(self::CONFIG_INLINE . 'apply_for', $storeId);
    }

    /**
     * @param null $storeId
     *
     * @return array|mixed
     */
    public function getInlinePosition($storeId = null)
    {
        return $this->getModuleConfig(self::CONFIG_INLINE . 'position', $storeId);
    }

    /**
     * @param null $storeId
     *
     * @return array|mixed
     */
    public function isShowUnderCart($storeId = null)
    {
        return $this->getModuleConfig(self::CONFIG_INLINE . 'show_under_cart', $storeId);
    }

    /**
     * @param null $storeId
     *
     * @return array|mixed
     */
    public function getInlineButtonSize($storeId = null)
    {
        return $this->getModuleConfig(self::CONFIG_INLINE . 'button_size', $storeId);
    }
}
