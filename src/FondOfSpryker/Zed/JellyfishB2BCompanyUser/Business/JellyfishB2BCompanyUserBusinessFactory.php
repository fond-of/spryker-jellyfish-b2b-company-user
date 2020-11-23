<?php

namespace FondOfSpryker\Zed\JellyfishB2BCompanyUser\Business;

use FondOfSpryker\Zed\JellyfishB2BCompanyUser\Business\Model\Expander\CompanyUserCompanyBusinessUnitExpander;
use FondOfSpryker\Zed\JellyfishB2BCompanyUser\Business\Model\Expander\CompanyUserCompanyBusinessUnitExpanderInterface;
use FondOfSpryker\Zed\JellyfishB2BCompanyUser\Business\Model\Expander\CompanyUserCustomerExpander;
use FondOfSpryker\Zed\JellyfishB2BCompanyUser\Business\Model\Expander\CompanyUserCustomerExpanderInterface;
use FondOfSpryker\Zed\JellyfishB2BCompanyUser\Business\Model\Validator\CompanyUserExportValidator;
use FondOfSpryker\Zed\JellyfishB2BCompanyUser\Business\Model\Validator\CompanyUserExportValidatorInterface;
use FondOfSpryker\Zed\JellyfishB2BCompanyUser\Dependency\Facade\JellyfishB2BCompanyUserToCompanyBusinessUnitFacadeInterface;
use FondOfSpryker\Zed\JellyfishB2BCompanyUser\Dependency\Facade\JellyfishB2BCompanyUserToCompanyTypeFacadeInterface;
use FondOfSpryker\Zed\JellyfishB2BCompanyUser\Dependency\Facade\JellyfishB2BCompanyUserToCompanyUserFacadeInterface;
use FondOfSpryker\Zed\JellyfishB2BCompanyUser\Dependency\Facade\JellyfishB2BCompanyUserToCustomerFacadeInterface;
use FondOfSpryker\Zed\JellyfishB2BCompanyUser\JellyfishB2BCompanyUserDependencyProvider;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \FondOfSpryker\Zed\JellyfishB2BCompanyUser\JellyfishB2BCompanyUserConfig getConfig()
 */
class JellyfishB2BCompanyUserBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\JellyfishB2BCompanyUser\Business\Model\Validator\CompanyUserExportValidatorInterface
     */
    public function createCompanyUserExportValidator(): CompanyUserExportValidatorInterface
    {
        return new CompanyUserExportValidator(
            $this->getCompanyUserFacade(),
            $this->getCompanyTypeFacade(),
            $this->getConfig()
        );
    }

    /**
     * @return \FondOfSpryker\Zed\JellyfishB2BCompanyUser\Business\Model\Expander\CompanyUserCustomerExpanderInterface
     */
    public function createCompanyUserCustomerExpander(): CompanyUserCustomerExpanderInterface
    {
        return new CompanyUserCustomerExpander(
            $this->getCustomerFacade()
        );
    }

    /**
     * @return \FondOfSpryker\Zed\JellyfishB2BCompanyUser\Business\Model\Expander\CompanyUserCompanyBusinessUnitExpanderInterface
     */
    public function createCompanyUserCompanyBusinessUnitExpander(): CompanyUserCompanyBusinessUnitExpanderInterface
    {
        return new CompanyUserCompanyBusinessUnitExpander(
            $this->getCompanyBusinessUnitFacade()
        );
    }

    /**
     * @return \FondOfSpryker\Zed\JellyfishB2BCompanyUser\Dependency\Facade\JellyfishB2BCompanyUserToCompanyUserFacadeInterface
     */
    public function getCompanyUserFacade(): JellyfishB2BCompanyUserToCompanyUserFacadeInterface
    {
        return $this->getProvidedDependency(JellyfishB2BCompanyUserDependencyProvider::FACADE_COMPANY_USER);
    }

    /**
     * @return \FondOfSpryker\Zed\JellyfishB2BCompanyUser\Dependency\Facade\JellyfishB2BCompanyUserToCompanyTypeFacadeInterface
     */
    protected function getCompanyTypeFacade(): JellyfishB2BCompanyUserToCompanyTypeFacadeInterface
    {
        return $this->getProvidedDependency(JellyfishB2BCompanyUserDependencyProvider::FACADE_COMPANY_TYPE);
    }

    /**
     * @return \FondOfSpryker\Zed\JellyfishB2BCompanyUser\Dependency\Facade\JellyfishB2BCompanyUserToCustomerFacadeInterface
     */
    public function getCustomerFacade(): JellyfishB2BCompanyUserToCustomerFacadeInterface
    {
        return $this->getProvidedDependency(JellyfishB2BCompanyUserDependencyProvider::FACADE_CUSTOMER);
    }

    /**
     * @return \FondOfSpryker\Zed\JellyfishB2BCompanyUser\Dependency\Facade\JellyfishB2BCompanyUserToCompanyBusinessUnitFacadeInterface
     */
    public function getCompanyBusinessUnitFacade(): JellyfishB2BCompanyUserToCompanyBusinessUnitFacadeInterface
    {
        return $this->getProvidedDependency(JellyfishB2BCompanyUserDependencyProvider::FACADE_COMPANY_BUSINESS_UNIT);
    }
}
