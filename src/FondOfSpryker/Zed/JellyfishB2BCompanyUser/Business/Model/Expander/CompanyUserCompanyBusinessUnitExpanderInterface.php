<?php

namespace FondOfSpryker\Zed\JellyfishB2BCompanyUser\Business\Model\Expander;

use Generated\Shared\Transfer\CompanyUserTransfer;

interface CompanyUserCompanyBusinessUnitExpanderInterface
{
    /**
     * @param \Generated\Shared\Transfer\CompanyUserTransfer $companyUserTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyUserTransfer
     */
    public function expand(CompanyUserTransfer $companyUserTransfer): CompanyUserTransfer;
}
