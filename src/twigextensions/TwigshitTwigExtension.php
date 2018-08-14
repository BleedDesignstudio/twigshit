<?php
/**
 * twigshit plugin for Craft CMS 3.x
 *
 * A bunch of custom filters and function for Twig that we often use.
 *
 * @link      http://bleed.com
 * @copyright Copyright (c) 2018 Bleed
 */

namespace bleed\twigshit\twigextensions;

use bleed\twigshit\Twigshit;
use Craft;

/**
 * @author    Bleed
 * @package   Twigshit
 * @since     0.0.1
 */
class TwigshitTwigExtension extends \Twig_Extension
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'Twigshit';
    }

    /**
     * @inheritdoc
     */
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('validateEmail', [$this, 'internalValidateEmail'])
        ];
    }

    /**
     * @inheritdoc
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('sendFile', [$this, 'internalSendFile']),
            new \Twig_SimpleFunction('splitItemsIntoRows', [$this, 'internalSplitItemsIntoRows'])
        ];
    }

    /**
     * @param null $email
     *
     * @return boolean
     */
    public function internalValidateEmail($email = null) {

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        
        return false;

    }

    public function internalSendFile($file = null, $url = null) {

        $response = new \Craft\web\response;
        $contents = file_get_contents($url.$file);
        $response->sendFile($url.$file)->send();

    }

    public function internalSplitItemsIntoRows($itemAmount = 0) {
        $amount = $itemAmount;
        $itemsInRows = []

        return [];
    }
}
