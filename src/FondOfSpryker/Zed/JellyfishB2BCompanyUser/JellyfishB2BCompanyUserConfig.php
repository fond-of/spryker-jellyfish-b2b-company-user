<?php

namespace FondOfSpryker\Zed\JellyfishB2BCompanyUser;

use FondOfSpryker\Shared\CompanyTypeRole\CompanyTypeRoleConstants;
use Spryker\Zed\Kernel\AbstractBundleConfig;

class JellyfishB2BCompanyUserConfig extends AbstractBundleConfig
{
    /**
     * @param string $companyType
     *
     * @return string[]
     */
    public function getValidCompanyRolesForExport(string $companyType = ''): array
    {
        $companyRoles = $this->get(CompanyTypeRoleConstants::VALID_COMPANY_ROLES_FOR_EXPORT);

        if ($companyType === '') {
            return $companyRoles;
        }

        if (!isset($companyRoles[$companyType])) {
            return [];
        }

        return $companyRoles[$companyType];
    }
}
