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

namespace Mageplaza\SocialShare\Model\System\Config\Source;

use Magento\Cms\Model\PageFactory;

/**
 * Class FloatCmsPages
 * @package Mageplaza\SocialShare\Model\System\Config\Source
 */
class FloatCmsPages extends OptionArray
{
    /**
     * @var PageFactory
     */
    protected $_pageFactory;

    /**
     * FloatCmsPages constructor.
     *
     * @param PageFactory $pageFactory
     */
    public function __construct(PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
    }

    /**
     * @return array
     */
    public function getOptionHash()
    {
        $pages    = $this->_pageFactory->create()->getCollection();
        $cmsPages = [];

        foreach ($pages as $page) {
            $cmsPages[$page->getId()] = $page->getTitle();
        }

        return $cmsPages;
    }
}
