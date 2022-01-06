<?php

namespace FondOfSpryker\Zed\JellyfishB2BCompanyUser\Business;

use Generated\Shared\Transfer\CompanyUserTransfer;
use Generated\Shared\Transfer\EventEntityTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \FondOfSpryker\Zed\JellyfishB2BCompanyUser\Business\JellyfishB2BCompanyUserBusinessFactory getFactory()
 */
class JellyfishB2BCompanyUserFacade extends AbstractFacade implements JellyfishB2BCompanyUserFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\EventEntityTransfer $transfer
     *
     * @return bool
     */
    public function validateCompanyUserForExport(EventEntityTransfer $transfer): bool
    {
        return $this->getFactory()
            ->createCompanyUserExportValidator()
            ->validate($transfer);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CompanyUserTransfer $companyUserTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyUserTransfer
     */
    public function expandCompanyUserWithCustomer(CompanyUserTransfer $companyUserTransfer): CompanyUserTransfer
    {
        return $this->getFactory()
            ->createCompanyUserCustomerExpander()
            ->expand($companyUserTransfer);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CompanyUserTransfer $companyUserTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyUserTransfer
     */
    public function expandCompanyUserWithCompanyBusinessUnit(
        CompanyUserTransfer $companyUserTransfer
    ): CompanyUserTransfer {
        return $this->getFactory()
            ->createCompanyUserCompanyBusinessUnitExpander()
            ->expand($companyUserTransfer);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CompanyUserTransfer $companyUserTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyUserTransfer
     */
    public function expandCompanyUserWithCompany(
        CompanyUserTransfer $companyUserTransfer
    ): CompanyUserTransfer {
        return $this->getFactory()
            ->createCompanyUserCompanyExpander()
            ->expand($companyUserTransfer);
    }

}
