<?php

namespace FondOfSpryker\Zed\JellyfishB2BCompanyUser\Dependency\Facade;

use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;

interface JellyfishB2BCompanyUserToCompanyBusinessUnitFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\CompanyBusinessUnitTransfer $companyBusinessUnitTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyBusinessUnitTransfer
     */
    public function findCompanyBusinessUnitById(CompanyBusinessUnitTransfer $companyBusinessUnitTransfer): CompanyBusinessUnitTransfer;
}
