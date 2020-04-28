<?php

namespace FondOfSpryker\Zed\JellyfishB2BCompanyUser\Communication\Plugin\JellyfishB2BExtension;

use FondOfSpryker\Zed\JellyfishB2BExtension\Dependency\Plugin\EventEntityTransferExportValidatorPluginInterface;
use Generated\Shared\Transfer\EventEntityTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\JellyfishB2BCompanyUser\Business\JellyfishB2BCompanyUserFacadeInterface getFacade()
 * @method \FondOfSpryker\Zed\JellyfishB2BCompanyUser\JellyfishB2BCompanyUserConfig getConfig()
 */
class JellyfishB2BCompanyUserEventEntityTransferExportValidatorPluginInterface extends AbstractPlugin implements EventEntityTransferExportValidatorPluginInterface
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
    public function validate(EventEntityTransfer $transfer): bool
    {
        return $this->getFacade()->validateCompanyUserForExport($transfer);
    }
}
