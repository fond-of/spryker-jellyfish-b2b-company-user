<?php

namespace FondOfSpryker\Zed\JellyfishB2BCompanyUser\Business\Model\Expander;

use FondOfSpryker\Zed\JellyfishB2BCompanyUser\Dependency\Facade\JellyfishB2BCompanyUserToCompanyBusinessUnitFacadeInterface;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Generated\Shared\Transfer\CompanyUserTransfer;

class CompanyUserCompanyBusinessUnitExpander implements CompanyUserCompanyBusinessUnitExpanderInterface
{
    /**
     * @var \FondOfSpryker\Zed\JellyfishB2BCompanyUser\Dependency\Facade\JellyfishB2BCompanyUserToCompanyBusinessUnitFacadeInterface
     */
    protected $companyBusinessUnitFacade;

    /**
     * @param \FondOfSpryker\Zed\JellyfishB2BCompanyUser\Dependency\Facade\JellyfishB2BCompanyUserToCompanyBusinessUnitFacadeInterface $companyBusinessUnitFacade
     */
    public function __construct(
        JellyfishB2BCompanyUserToCompanyBusinessUnitFacadeInterface $companyBusinessUnitFacade
    ) {
        $this->companyBusinessUnitFacade = $companyBusinessUnitFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyUserTransfer $companyUserTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyUserTransfer
     */
    public function expand(CompanyUserTransfer $companyUserTransfer): CompanyUserTransfer
    {
        $companyUserTransfer->requireFkCompanyBusinessUnit();

        $companyBusinessUnitTransfer = (new CompanyBusinessUnitTransfer())
            ->setIdCompanyBusinessUnit($companyUserTransfer->getFkCompanyBusinessUnit());
        $companyBusinessUnitTransfer = $this->companyBusinessUnitFacade->findCompanyBusinessUnitById($companyBusinessUnitTransfer);

        if ($companyBusinessUnitTransfer === null) {
            return $companyUserTransfer;
        }

        $companyUserTransfer->setCompanyBusinessUnit($companyBusinessUnitTransfer);

        return $companyUserTransfer;
    }
}
