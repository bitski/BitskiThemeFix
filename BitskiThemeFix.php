<?php

namespace BitskiThemeFix;

use Shopware\Components\Plugin;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class BitskiThemeFix
 * @package BitskiThemeFix
 */
class BitskiThemeFix extends Plugin
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        $container->setParameter('bitski_theme_fix.plugin_dir', $this->getPath());

        parent::build($container);
    }
}
