<?php
/**
 * Avatax plugin for Craft CMS 3.x
 *
 * Calculate and add sales tax to an order's base tax using Avalara's AvaTax service.
 *
 * @link      http://matternow.com
 * @copyright Copyright (c) 2019 Matter Communications
 */

namespace matternow\avatax\controllers;

use matternow\avatax\Avatax;

use Craft;
use craft\web\Controller;

/**
 * @author    Matter Communications
 * @package   Avatax
 * @since     2.0.0
 */
class BaseController extends Controller
{

    // Protected Properties
    // =========================================================================

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     *         The actions must be in 'kebab-case'
     * @access protected
     */
    protected $allowAnonymous = false;

    // Public Methods
    // =========================================================================

    /**
     * @return mixed
     */
    public function actionSettings()
    {
        $settings = Avatax::$plugin->getSettings();

        return $this->renderTemplate('avatax/settings', [
            'settings' => $settings,
        ]);
    }

}
