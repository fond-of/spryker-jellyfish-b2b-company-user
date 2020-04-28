<?php

namespace FondOfSpryker\Zed\JellyfishB2BCompanyUser\Business\Model\Validator;

use ArrayObject;
use FondOfSpryker\Zed\JellyfishB2BCompanyUser\Dependency\Facade\JellyfishB2BCompanyUserToCompanyTypeFacadeInterface;
use FondOfSpryker\Zed\JellyfishB2BCompanyUser\Dependency\Facade\JellyfishB2BCompanyUserToCompanyUserFacadeInterface;
use FondOfSpryker\Zed\JellyfishB2BCompanyUser\JellyfishB2BCompanyUserConfig;
use Generated\Shared\Transfer\CompanyRoleCollectionTransfer;
use Generated\Shared\Transfer\CompanyTransfer;
use Generated\Shared\Transfer\CompanyTypeTransfer;
use Generated\Shared\Transfer\CompanyUserTransfer;
use Generated\Shared\Transfer\EventEntityTransfer;

class CompanyUserExportValidator implements CompanyUserExportValidatorInterface
{
    protected const ENTITY_TRANSFER_FOREIGN_KEY_ID_COMPANY = 'spy_company_user.fk_company';
    protected const ENTITY_TRANSFER_NAME_COMPANY_USER = 'spy_company_user';

    /**
     * @var \FondOfSpryker\Zed\JellyfishB2BCompanyUser\Dependency\Facade\JellyfishB2BCompanyUserToCompanyTypeFacadeInterface
     */
    protected $companyTypeFacade;

    /**
     * @var \FondOfSpryker\Zed\JellyfishB2BCompanyUser\JellyfishB2BCompanyUserConfig
     */
    protected $companyUserConfig;

    /**
     * @var \FondOfSpryker\Zed\JellyfishB2BCompanyUser\Dependency\Facade\JellyfishB2BCompanyUserToCompanyUserFacadeInterface
     */
    protected $companyUserFacade;

    /**
     * @param \FondOfSpryker\Zed\JellyfishB2BCompanyUser\Dependency\Facade\JellyfishB2BCompanyUserToCompanyUserFacadeInterface $companyUserFacade
     * @param \FondOfSpryker\Zed\JellyfishB2BCompanyUser\Dependency\Facade\JellyfishB2BCompanyUserToCompanyTypeFacadeInterface $companyTypeFacade
     * @param \FondOfSpryker\Zed\JellyfishB2BCompanyUser\JellyfishB2BCompanyUserConfig $companyUserConfig
     */
    public function __construct(
        JellyfishB2BCompanyUserToCompanyUserFacadeInterface $companyUserFacade,
        JellyfishB2BCompanyUserToCompanyTypeFacadeInterface $companyTypeFacade,
        JellyfishB2BCompanyUserConfig $companyUserConfig
    ) {
        $this->companyTypeFacade = $companyTypeFacade;
        $this->companyUserConfig = $companyUserConfig;
        $this->companyUserFacade = $companyUserFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\EventEntityTransfer $eventEntityTransfer
     *
     * @return bool
     */
    public function validate(EventEntityTransfer $eventEntityTransfer): bool
    {
        if ($eventEntityTransfer->getName() !== self::ENTITY_TRANSFER_NAME_COMPANY_USER) {
            return true;
        }

        $companyTypeTransfer = $this->getCompanyTypeTransfer($eventEntityTransfer);

        if ($companyTypeTransfer === null
            || $companyTypeTransfer->getName() === $this->companyTypeFacade->getCompanyTypeManufacturerName()) {
                return false;
        }

        $companyUserTransfer = (new CompanyUserTransfer())->setIdCompanyUser($eventEntityTransfer->getId());
        $companyUserTransfer = $this->companyUserFacade->findCompanyUserById($companyUserTransfer);
        $companyUserRolesCollection = $this->getCompanyUserRolesCollection(
            $companyUserTransfer,
            $companyUserTransfer->getCompanyRoleCollection()
        );

        return $this->isCompanyUserRollesCollectionValid($companyTypeTransfer, $companyUserRolesCollection);
    }

    /**
     * @param \Generated\Shared\Transfer\EventEntityTransfer $eventEntityTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyTypeTransfer|null
     */
    protected function getCompanyTypeTransfer(EventEntityTransfer $eventEntityTransfer): ?CompanyTypeTransfer
    {
        $foreignKeys = $eventEntityTransfer->getForeignKeys();
        $idCompany = null;

        if (array_key_exists(self::ENTITY_TRANSFER_FOREIGN_KEY_ID_COMPANY, $foreignKeys)) {
            $idCompany = $foreignKeys[self::ENTITY_TRANSFER_FOREIGN_KEY_ID_COMPANY];
        }

        if ($idCompany === null) {
            return null;
        }

        $companyTransfer = (new CompanyTransfer())->setIdCompany($idCompany);

        return $this->companyTypeFacade->findCompanyTypeByIdCompany($companyTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyUserTransfer $companyUserTransfer
     * @param \Generated\Shared\Transfer\CompanyRoleCollectionTransfer $companyRoleCollectionTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyRoleTransfer[]|\ArrayObject
     */
    protected function getCompanyUserRolesCollection(
        CompanyUserTransfer $companyUserTransfer,
        CompanyRoleCollectionTransfer $companyRoleCollectionTransfer
    ): ArrayObject {
        $companyUsersCollection = new ArrayObject();

        foreach ($companyRoleCollectionTransfer->getRoles() as $companyRoleTransfer) {
            if (!$this->checkRoleHasCompanyUser(
                $companyUserTransfer,
                $companyRoleTransfer->getCompanyUserCollection()->getCompanyUsers()
            )) {
                continue;
            }

            $companyUsersCollection->append($companyRoleTransfer);
        }

        return $companyUsersCollection;
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyUserTransfer $companyUserTransfer
     * @param \Generated\Shared\Transfer\CompanyUserTransfer[]|\ArrayObject $companyUsers
     *
     * @return bool
     */
    protected function checkRoleHasCompanyUser(
        CompanyUserTransfer $companyUserTransfer,
        ArrayObject $companyUsers
    ): bool {
        foreach ($companyUsers as $companyUser) {
            if ($companyUserTransfer->getIdCompanyUser() === $companyUser->getIdCompanyUser()) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyTypeTransfer $companyTypeTransfer
     * @param \Generated\Shared\Transfer\CompanyRoleTransfer[]|\ArrayObject $companyRolleCollection
     *
     * @return bool
     */
    protected function isCompanyUserRollesCollectionValid(
        CompanyTypeTransfer $companyTypeTransfer,
        ArrayObject $companyRolleCollection
    ): bool {
        $companyRoles = $this->companyUserConfig->getValidCompanyRolesForExport($companyTypeTransfer->getName());

        /** @var \Generated\Shared\Transfer\CompanyRoleTransfer $companyRoleTransfer */
        foreach ($companyRolleCollection as $companyRoleTransfer) {
            if (!in_array($companyRoleTransfer->getName(), $companyRoles)) {
                return false;
            }
        }

        return true;
    }
}
