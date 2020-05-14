<?php

namespace FondOfSpryker\Zed\JellyfishB2BCompanyUser\Dependency\Facade;

use Generated\Shared\Transfer\CustomerTransfer;

interface JellyfishB2BCompanyUserToCustomerFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function findCustomerById(CustomerTransfer $customerTransfer): CustomerTransfer;
}
