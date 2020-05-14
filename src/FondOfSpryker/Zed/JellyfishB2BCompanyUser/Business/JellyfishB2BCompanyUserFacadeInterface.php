<?php

namespace FondOfSpryker\Zed\JellyfishB2BCompanyUser\Business;

use Generated\Shared\Transfer\CompanyUserTransfer;
use Generated\Shared\Transfer\EventEntityTransfer;

interface JellyfishB2BCompanyUserFacadeInterface
{
    /**
     * Specification
     * - Check if the Type of Data based on the Company Type Role can be exported
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\EventEntityTransfer $transfer
     *
     * @return bool
     */
    public function validateCompanyUserForExport(EventEntityTransfer $transfer): bool;

    /**
     * Specification
     * - Expand Company User Transfer Object with the Customer Transfer Object
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CompanyUserTransfer $companyUserTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyUserTransfer
     */
    public function expandCompanyUserWithCustomer(CompanyUserTransfer $companyUserTransfer): CompanyUserTransfer;

    /**
     * Specification
     * - Expand Company User Transfer Object with the Company Business Unit Transfer Object
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CompanyUserTransfer $companyUserTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyUserTransfer
     */
    public function expandCompanyUserWithCompanyBusinessUnit(CompanyUserTransfer $companyUserTransfer): CompanyUserTransfer;
}
