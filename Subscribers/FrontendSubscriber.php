<?php

namespace BitskiThemeFix\Subscribers;

use Enlight\Event\SubscriberInterface;
use Shopware\Components\DependencyInjection\Container;

/**
 * Class FrontendSubscriber
 * @package BitskiThemeFix\Subscribers
 */
class FrontendSubscriber implements SubscriberInterface
{
    /**
     * @var Container
     */
    private $container;

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return array(
            'Enlight_Controller_Action_PostDispatchSecure_Frontend' => 'onPostDispatchSecureFrontend'
        );
    }

    /**
     * FrontendSubscriber constructor.
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @param \Enlight_Event_EventArgs $args
     */
    public function onPostDispatchSecureFrontend(\Enlight_Event_EventArgs $args)
    {
        /** @var \Enlight_Controller_Action $controller */
        $controller = $args->getSubject();
        $view = $controller->View();

        $view->addTemplateDir($this->container->getParameter('bitski_theme_fix.plugin_dir') . "/Resources/Views/");

        // Debugging
        echo $this->container->getParameter('bitski_theme_fix.plugin_dir');
    }
}
