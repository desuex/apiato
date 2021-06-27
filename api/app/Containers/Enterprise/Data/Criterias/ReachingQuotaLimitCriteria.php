<?php


namespace App\Containers\Enterprise\Data\Criterias;

;

use App\Containers\User\Tables\UsersAsupTable;
use App\Ship\App\Enterprise\EnterpriseTable;
use App\Ship\Parents\Criterias\Criteria;
use App\Ship\Parents\Models\Model;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Contracts\RepositoryInterface;

class ReachingQuotaLimitCriteria extends Criteria
{

    /**
     * @param Model $model
     * @param RepositoryInterface $repository
     * @return mixed|void
     */
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->
            select('enterprises.*')->
            leftJoin(UsersAsupTable::TABLE, UsersAsupTable::ORGID, '=', EnterpriseTable::ID)->
            groupBy(EnterpriseTable::ID, EnterpriseTable::QUOTA)->
            havingRaw('COUNT(users_asup.number) >= enterprises.quota*0.8 and enterprises.quota is not null');
    }
}
