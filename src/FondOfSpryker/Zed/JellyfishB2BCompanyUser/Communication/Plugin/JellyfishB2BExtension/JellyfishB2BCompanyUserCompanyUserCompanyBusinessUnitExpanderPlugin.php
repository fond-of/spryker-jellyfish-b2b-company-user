<?php

namespace FondOfSpryker\Zed\JellyfishB2BCompanyUser\Communication\Plugin\JellyfishB2BExtension;

use FondOfSpryker\Zed\JellyfishB2BExtension\Dependency\Plugin\CompanyUserExpanderPluginInterface;
use Generated\Shared\Transfer\CompanyUserTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\JellyfishB2BCompanyUser\JellyfishB2BCompanyUserConfig getConfig()
 * @method \FondOfSpryker\Zed\JellyfishB2BCompanyUser\Business\JellyfishB2BCompanyUserFacadeInterface getFacade()
 */
class JellyfishB2BCompanyUserCompanyUserCompanyBusinessUnitExpanderPlugin extends AbstractPlugin implements CompanyUserExpanderPluginInterface
{
    /**
     * @param \Generated\Shared\Transfer\CompanyUserTransfer $companyUserTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyUserTransfer
     */
    public function expand(
        CompanyUserTransfer $companyUserTransfer
    ): CompanyUserTransfer {
        return $this->getFacade()->expandCompanyUserWithCompanyBusinessUnit($companyUserTransfer);
    }
}
