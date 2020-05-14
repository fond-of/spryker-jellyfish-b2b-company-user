<?php

namespace FondOfSpryker\Zed\JellyfishB2BCompanyUser\Dependency\Facade;

use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Spryker\Zed\CompanyBusinessUnit\Business\CompanyBusinessUnitFacadeInterface;

class JellyfishB2BCompanyUserToCompanyBusinessUnitBridge implements JellyfishB2BCompanyUserToCompanyBusinessUnitFacadeInterface
{
    /**
     * @var \Spryker\Zed\CompanyBusinessUnit\Business\CompanyBusinessUnitFacadeInterface
     */
    protected $companyBusinessUnitFacade;

    /**
     * @param \Spryker\Zed\CompanyBusinessUnit\Business\CompanyBusinessUnitFacadeInterface $companyBusinessUnitFacade
     */
    public function __construct(CompanyBusinessUnitFacadeInterface $companyBusinessUnitFacade)
    {
        $this->companyBusinessUnitFacade = $companyBusinessUnitFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyBusinessUnitTransfer
     */
    public function findCompanyBusinessUnitById(
        CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
    ): CompanyBusinessUnitTransfer {
        return $this->companyBusinessUnitFacade->getCompanyBusinessUnitById($companyBusinessUnitTransfer);
    }
}
