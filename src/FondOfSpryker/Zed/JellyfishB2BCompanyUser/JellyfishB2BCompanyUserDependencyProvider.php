<?php

namespace FondOfSpryker\Zed\JellyfishB2BCompanyUser;

use FondOfSpryker\Zed\JellyfishB2BCompanyUser\Dependency\Facade\JellyfishB2BCompanyUserToCompanyTypeFacadeBridge;
use FondOfSpryker\Zed\JellyfishB2BCompanyUser\Dependency\Facade\JellyfishB2BCompanyUserToCompanyUserFacadeBridge;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class JellyfishB2BCompanyUserDependencyProvider extends AbstractBundleDependencyProvider
{
    public const FACADE_COMPANY_TYPE = 'FACADE_COMPANY_TYPE';
    public const FACADE_COMPANY_USER = 'FACADE_COMPANY_USER';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container = $this->addCompanyTypeFacade($container);
        $container = $this->addCompanyUserFacade($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addCompanyTypeFacade(Container $container): Container
    {
        $container[static::FACADE_COMPANY_TYPE] = function (Container $container) {
            return new JellyfishB2BCompanyUserToCompanyTypeFacadeBridge(
                $container->getLocator()->companyType()->facade()
            );
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addCompanyUserFacade(Container $container): Container
    {
        $container[static::FACADE_COMPANY_USER] = function (Container $container) {
            return new JellyfishB2BCompanyUserToCompanyUserFacadeBridge(
                $container->getLocator()->companyUser()->facade()
            );
        };

        return $container;
    }
}
