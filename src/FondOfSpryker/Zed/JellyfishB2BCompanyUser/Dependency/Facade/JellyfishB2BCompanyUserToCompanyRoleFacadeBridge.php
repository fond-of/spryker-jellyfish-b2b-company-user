<?php

namespace FondOfSpryker\Zed\JellyfishB2BCompanyUser\Dependency\Facade;

use Generated\Shared\Transfer\CompanyUserTransfer;
use Spryker\Zed\CompanyRole\Business\CompanyRoleFacadeInterface;

class JellyfishB2BCompanyUserToCompanyRoleFacadeBridge implements JellyfishB2BCompanyUserToCompanyRoleFacadeInterface
{
    /**
     * @var \Spryker\Zed\CompanyRole\Business\CompanyRoleFacadeInterface
     */
    protected $companyRoleFacade;

    /**
     * @param \Spryker\Zed\CompanyRole\Business\CompanyRoleFacadeInterface $companyRoleFacade
     */
    public function __construct(CompanyRoleFacadeInterface $companyRoleFacade)
    {
        $this->companyRoleFacade = $companyRoleFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyUserTransfer $companyUserTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyUserTransfer
     */
    public function hydrateCompanyUser(
        CompanyUserTransfer $companyUserTransfer
    ): CompanyUserTransfer {
        return $this->companyRoleFacade->hydrateCompanyUser($companyUserTransfer);
    }
}
