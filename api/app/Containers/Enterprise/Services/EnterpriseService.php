<?php

namespace App\Containers\Enterprise\Services;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Enterprise\Data\Enums\EnterpriseTasks;
use App\Ship\App\Enterprise\EnterpriseServiceInterface;

class EnterpriseService implements EnterpriseServiceInterface
{
    public function getAll($search = null, $limit=null)
    {
        return Apiato::call(EnterpriseTasks::GET_ALL_TASK, [$search, $limit], []);
    }

    public function getAllByParent(int $parent)
    {
        return Apiato::call(EnterpriseTasks::GET_ALL_BY_PARENT_TASK, [$parent]);
    }

    public function getAllReachingQuotaLimit()
    {
        return Apiato::call(EnterpriseTasks::GET_ALL_ENTERPRISES_REACHING_QUOTA_LIMIT_TASK, [], []);
    }
}
