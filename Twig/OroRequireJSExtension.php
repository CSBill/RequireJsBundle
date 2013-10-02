<?php

namespace Oro\Bundle\RequireJSBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;

class OroRequireJSExtension extends \Twig_Extension
{
    /**
     * @var \Symfony\Component\DependencyInjection\ContainerInterface
     */
    protected $container;

    /**
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Returns a list of functions to add to the existing list.
     *
     * @return array An array of functions
     */
    public function getFunctions()
    {
        $container = $this->container;
        return array(
            new \Twig_SimpleFunction('get_requirejs_config_path', function () use ($container){
                return $container->getParameter('oro_require_js.config_path');
            }),
            new \Twig_SimpleFunction('get_requirejs_build_path', function () use ($container){
                return $container->getParameter('oro_require_js.build_path');
            }),
        );
    }

    /**
     * Returns the name of the extension.
     *
     * @return string
     */
    public function getName()
    {
        return 'requirejs_extension';
    }
}
