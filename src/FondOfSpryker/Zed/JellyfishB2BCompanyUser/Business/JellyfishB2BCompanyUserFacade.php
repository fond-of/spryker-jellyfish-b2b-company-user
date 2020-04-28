<?php

namespace FondOfSpryker\Zed\JellyfishB2BCompanyUser\Business;

use Generated\Shared\Transfer\EventEntityTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \FondOfSpryker\Zed\JellyfishB2BCompanyUser\Business\JellyfishB2BCompanyUserBusinessFactory getFactory()
 */
class JellyfishB2BCompanyUserFacade extends AbstractFacade implements JellyfishB2BCompanyUserFacadeInterface
{
    /**
     * {@inheritdoc}
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
}
