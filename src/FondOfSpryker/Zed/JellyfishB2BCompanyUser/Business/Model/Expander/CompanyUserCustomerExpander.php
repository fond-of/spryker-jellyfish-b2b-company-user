<?php

namespace FondOfSpryker\Zed\JellyfishB2BCompanyUser\Business\Model\Expander;

use FondOfSpryker\Zed\JellyfishB2BCompanyUser\Dependency\Facade\JellyfishB2BCompanyUserToCustomerFacadeInterface;
use Generated\Shared\Transfer\CompanyUserTransfer;
use Generated\Shared\Transfer\CustomerTransfer;

class CompanyUserCustomerExpander implements CompanyUserCustomerExpanderInterface
{
    /**
     * @var \FondOfSpryker\Zed\JellyfishB2BCompanyUser\Dependency\Facade\JellyfishB2BCompanyUserToCustomerFacadeInterface
     */
    protected $customerFacade;

    /**
     * @param \FondOfSpryker\Zed\JellyfishB2BCompanyUser\Dependency\Facade\JellyfishB2BCompanyUserToCustomerFacadeInterface $customerFacade
     */
    public function __construct(
        JellyfishB2BCompanyUserToCustomerFacadeInterface $customerFacade
    ) {
        $this->customerFacade = $customerFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyUserTransfer $companyUserTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyUserTransfer
     */
    public function expand(CompanyUserTransfer $companyUserTransfer): CompanyUserTransfer
    {
        $companyUserTransfer->requireFkCompany();

        $customerTransfer = (new CustomerTransfer())->setIdCustomer($companyUserTransfer->getFkCustomer());
        $customerTransfer = $this->customerFacade->findCustomerById($customerTransfer);

        if ($customerTransfer->getIdCustomer() === null) {
            return $companyUserTransfer;
        }

        $companyUserTransfer->setCustomer($customerTransfer);

        return $companyUserTransfer;
    }
}
