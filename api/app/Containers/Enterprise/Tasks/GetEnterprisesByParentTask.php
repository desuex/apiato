<?php

namespace App\Containers\Enterprise\Tasks;

//use App\Containers\Enterprise\Data\Criteria\ChildLevelCriteria;
use App\Containers\Enterprise\Data\Repositories\EnterpriseRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class GetEnterprisesByParentTask extends Task
{

    protected $repository;

    public function __construct(EnterpriseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
//            $this->repository->pushCriteria(new ChildLevelCriteria($id));
            return $this->repository->paginate('*');
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
