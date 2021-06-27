<?php


namespace App\Containers\Enterprise\Tasks;


use App\Containers\Enterprise\Data\Criterias\ReachingQuotaLimitCriteria;
use App\Containers\Enterprise\Data\Repositories\EnterpriseRepository;
use App\Ship\Parents\Tasks\Task;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllEnterprisesReachingQuotaLimitTask extends Task
{

    protected EnterpriseRepository $repository;

    public function __construct(EnterpriseRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return mixed
     * @throws RepositoryException
     */
    public function run()
    {
        $this->repository->pushCriteria(new ReachingQuotaLimitCriteria());
        $this->addRequestCriteria($this->repository);


        return $this->repository->paginate($limit ?? '*');
    }
}
