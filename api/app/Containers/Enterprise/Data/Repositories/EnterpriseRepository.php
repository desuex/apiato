<?php

namespace App\Containers\Enterprise\Data\Repositories;

use App\Containers\Enterprise\Data\Criteria\FirstLevelCriteria;
use App\Containers\Enterprise\Data\Criteria\SearchEnterpriseCriteria;
use App\Containers\Enterprise\Data\Criteria\SortCriteria;
use App\Ship\Parents\Repositories\Repository;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Exceptions\RepositoryException;

/**
 * Class EnterpriseRepository
 */
class EnterpriseRepository extends Repository
{
    public function groupBy($by)
    {
        $this->model = $this->model->groupBy($by);

        return $this;
    }
}
