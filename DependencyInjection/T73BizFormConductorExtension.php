<?php

namespace T73Biz\Bundle\FormConductorBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class T73BizFormConductorExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        if (!isset($config['access_token'])) {
            throw new \InvalidArgumentException(
                'The "t73_biz_form_conductor.access_token" argument must be set in app/config/config.yml'
            );
        }

        if (!isset($config['access_token'])) {
            throw new \InvalidArgumentException(
                'The "t73_biz_form_conductor.base_uri" argument must be set in app/config/config.yml'
            );
        }

        $container->setParameter(
            't73_biz_form_conductor.access_token',
            $config['access_token']
        );

        $container->setParameter(
            't73_biz_form_conductor.base_uri',
            $config['base_uri']
        );
    }
}
