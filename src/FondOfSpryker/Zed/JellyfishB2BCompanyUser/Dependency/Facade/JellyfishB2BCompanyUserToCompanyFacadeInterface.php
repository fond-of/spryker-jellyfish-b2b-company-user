<?php

namespace FondOfSpryker\Zed\JellyfishB2BCompanyUser\Dependency\Facade;

use Generated\Shared\Transfer\CompanyTransfer;

interface JellyfishB2BCompanyUserToCompanyFacadeInterface
{
    /**
     * @param int $idCompany
     *
     * @return \Generated\Shared\Transfer\CompanyTransfer
     */
    public function findCompanyById(int $idCompany): CompanyTransfer;
}
