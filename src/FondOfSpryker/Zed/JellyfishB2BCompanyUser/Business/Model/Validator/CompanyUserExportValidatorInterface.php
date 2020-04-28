<?php

namespace FondOfSpryker\Zed\JellyfishB2BCompanyUser\Business\Model\Validator;

use Generated\Shared\Transfer\EventEntityTransfer;

interface CompanyUserExportValidatorInterface
{
    /**
     * @param \Generated\Shared\Transfer\EventEntityTransfer $eventEntityTransfer
     *
     * @return bool
     */
    public function validate(EventEntityTransfer $eventEntityTransfer): bool;
}
