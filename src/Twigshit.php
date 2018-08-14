<?php
/**
 * twigshit plugin for Craft CMS 3.x
 *
 *
 * @link      http://bleed.com
 * @copyright Copyright (c) 2018 Bleed Designstudio
 */

namespace bleed\twigshit;

use bleed\twigshit\twigextensions\TwigshitTwigExtension;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;

use yii\base\Event;

/**
 * Class Twigshit
 *
 * @author    Bleed
 * @package   Twigshit
 * @since     0.0.2
 *
 */
class Twigshit extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var Twigshit
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $schemaVersion = '1.0.0';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Craft::$app->view->registerTwigExtension(new TwigshitTwigExtension());

        Event::on(
            Plugins::class,
            Plugins::EVENT_AFTER_INSTALL_PLUGIN,
            function (PluginEvent $event) {
                if ($event->plugin === $this) {
                }
            }
        );

        Craft::info(
            Craft::t(
                'twigshit',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

}
