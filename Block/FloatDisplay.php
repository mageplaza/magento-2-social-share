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
use Magento\Store\Model\StoreManagerInterface;

use Mageplaza\SocialShare\Helper\Data as HelperData;

/**
 * Class FloatDisplay
 * @package Mageplaza\SocialShare\Block
 */
class FloatDisplay extends Template
{
    /**
     * @var HelperData
     */
    protected $_helperData;

    /**
     * @var StoreManagerInterface
     */
    protected $_storeManager;


    public function __construct(
        Context $context,
        HelperData $helperData,
        StoreManagerInterface $storeManager,
        array $data = [])
    {
        $this->_helperData = $helperData;
        $this->_storeManager = $storeManager;
        parent::__construct($context, $data);
    }

    /**
     * @return bool
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function isEnable()
    {
        $storeId = $this->_storeManager->getStore()->getId();
        if($this->_helperData->isEnabled($storeId)) {
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


}