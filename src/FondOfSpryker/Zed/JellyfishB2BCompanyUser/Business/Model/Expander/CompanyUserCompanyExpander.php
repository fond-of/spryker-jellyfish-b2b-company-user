<?php

namespace FondOfSpryker\Zed\JellyfishB2BCompanyUser\Business\Model\Expander;

use FondOfSpryker\Zed\JellyfishB2BCompanyUser\Dependency\Facade\JellyfishB2BCompanyUserToCompanyFacadeInterface;
use Generated\Shared\Transfer\CompanyUserTransfer;
use Generated\Shared\Transfer\CustomerTransfer;

class CompanyUserCompanyExpander implements CompanyUserCompanyExpanderInterface
{
    /**
     * @var \FondOfSpryker\Zed\JellyfishB2BCompanyUser\Dependency\Facade\JellyfishB2BCompanyUserToCompanyFacadeInterface
     */
    protected $companyFacade;

    /**
     * @param \FondOfSpryker\Zed\JellyfishB2BCompanyUser\Dependency\Facade\JellyfishB2BCompanyUserToCompanyFacadeInterface $companyFacade
     */
    public function __construct(
        JellyfishB2BCompanyUserToCompanyFacadeInterface $companyFacade
    ) {
        $this->companyFacade = $companyFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyUserTransfer $companyUserTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyUserTransfer
     */
    public function expand(CompanyUserTransfer $companyUserTransfer): CompanyUserTransfer
    {
        $companyUserTransfer->requireFkCompany();

        $companyTransfer = $this->companyFacade->findCompanyById($companyUserTransfer->getFkCompany());

        if ($companyTransfer->getIdCompany() === null) {
            return $companyUserTransfer;
        }

        $companyUserTransfer->setCompany($companyTransfer);

        return $companyUserTransfer;
    }
}
