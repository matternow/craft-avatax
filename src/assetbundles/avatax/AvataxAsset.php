<?php
/**
 * Avatax plugin for Craft CMS 3.x
 *
 * Calculate and add sales tax to an order's base tax using Avalara's AvaTax service.
 *
 * @link      http://matternow.com
 * @copyright Copyright (c) 2019 Matter Communications
 */

namespace matternow\avatax\assetbundles\Avatax;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;
use craft\web\View;


/**
 * @author    Matter Communications
 * @package   Avatax
 * @since     2.0.0
 */
class AvataxAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = "@matternow/avatax/assetbundles/avatax/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/Avatax.js',
        ];

        $this->css = [
            'css/Avatax.css',
        ];

        parent::init();
    }
}
