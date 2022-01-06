<?php

namespace FondOfSpryker\Zed\JellyfishB2BCompanyUser\Dependency\Facade;

use FondOfSpryker\Zed\Company\Business\CompanyFacadeInterface;
use Generated\Shared\Transfer\CompanyTransfer;

class JellyfishB2BCompanyUserToCompanyFacadeBridge implements JellyfishB2BCompanyUserToCompanyFacadeInterface
{
    /**
     * @var \FondOfSpryker\Zed\Company\Business\CompanyFacadeInterface
     */
    protected $companyFacade;

    /**
     * @param \FondOfSpryker\Zed\Company\Business\CompanyFacadeInterface $companyFacade
     */
    public function __construct(CompanyFacadeInterface $companyFacade)
    {
        $this->companyFacade = $companyFacade;
    }

    /**
     * @param int $idCompany
     *
     * @return \Generated\Shared\Transfer\CompanyTransfer
     */
    public function findCompanyById(int $idCompany): CompanyTransfer
    {
        return $this->companyFacade->findCompanyById($idCompany);
    }
}
