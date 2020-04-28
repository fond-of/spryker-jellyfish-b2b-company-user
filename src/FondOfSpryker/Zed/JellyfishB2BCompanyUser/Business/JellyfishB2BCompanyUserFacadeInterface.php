<?php

namespace FondOfSpryker\Zed\JellyfishB2BCompanyUser\Business;

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
}
