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

namespace Mageplaza\SocialShare\Controller\HelperData;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Mageplaza\SocialShare\Helper\Data as HelperData;
/**
 * Class Index
 * @package Mageplaza\SocialShare\Controller\HelperData
 */
class Index extends Action
{
    protected $_helperData;

    public function __construct(
        Context $context,
        HelperData $helperData
    )
    {
        $this->_helperData = $helperData;
        parent::__construct($context);
    }


    public function execute()
    {
        echo "<h1>General Configuration</h1>";

        echo "Enable - " . $this->_helperData->isEnabled();
        echo "<br>";

        echo "Icon Color - " . $this->_helperData->getIconColor();
        echo "<br>";

        echo "Button Color - " . $this->_helperData->getButtonColor();
        echo "<br>";

        echo "Background Color - " . $this->_helperData->getBackgroundColor();
        echo "<br>";

        echo "Border Radius - " . $this->_helperData->getBorderRadius();
        echo "<br>";

        echo "Enable Share Counter - " . $this->_helperData->isShareCounter();
        echo "<br>";

        echo "Enable Thank You Popup - " . $this->_helperData->isThankYouPopup();
        echo "<br>";

        echo "<h3>Facebook</h3>";

        echo "Facebook Enable - " . $this->_helperData->isFacebook();
        echo "<br>";

        echo "Facebook Image - " . $this->_helperData->getFacebookImage();
        echo "<br>";

        echo "<h3>Google</h3>";

        echo "Google Enable - " . $this->_helperData->isGoogle();
        echo "<br>";

        echo "Google Image - " . $this->_helperData->getGoogleImage();
        echo "<br>";

        echo "<h3>Pinterest</h3>";

        echo "Pinterest Enable - " . $this->_helperData->isPinterest();
        echo "<br>";

        echo "Pinterest Image - " . $this->_helperData->getPinterestImage();
        echo "<br>";

        echo "<h3>LinkedIn</h3>";

        echo "LinkedIn Enable - " . $this->_helperData->isLinkedIn();
        echo "<br>";

        echo "LinkedIn Image - " . $this->_helperData->getLinkedInImage();
        echo "<br>";

        echo "<h3>Tumblr</h3>";

        echo "Tumblr Enable - " . $this->_helperData->isTumblr();
        echo "<br>";

        echo "Tumblr Image - " . $this->_helperData->getTumblrImage();
        echo "<br>";



        echo "<h3>Add More Share</h3>";
        echo "Enable Add More Share - " . $this->_helperData->isAddMoreShare();
        echo "<br>";

        echo "Display Menu On - " . $this->_helperData->getDisplayMenu();
        echo "<br>";

        echo "Number Of Service - " . $this->_helperData->getNumberOfServices();
        echo "<br>";


        echo "<h1>Floating Configuration</h1>";
        echo "Apply For - " . $this->_helperData->getFloatApplyPages();
        echo "<br>";

        echo "Style - " . $this->_helperData->getFloatStyle();
        echo "<br>";

        echo "Position - " . $this->_helperData->getFloatPosition();
        echo "<br>";

        echo "Margin Top - " . $this->_helperData->getFloatMarginTop();
        echo "<br>";

        echo "Button Size - " . $this->_helperData->getFloatButtonSize();
        echo "<br>";


        echo "<h1>Inline Configuration</h1>";
        echo "Apply For - " . $this->_helperData->getInlineApplyPages();
        echo "<br>";

        echo "Position - " . $this->_helperData->getInlinePosition();
        echo "<br>";

        echo "Show Under Add To Cart on Product Detail Page - " . $this->_helperData->isShowUnderCart();
        echo "<br>";

        echo "Button Size - " . $this->_helperData->getInlineButtonSize();
        echo "<br>";
    }
}