<?php

namespace App\Containers\Enterprise\UI\API\Controllers;

use App\Containers\Enterprise\Actions\QuotaStatusAction;
use App\Containers\Enterprise\Services\EnterpriseService;
use App\Containers\Enterprise\UI\API\Requests\GetAllEnterprisesRequest;
use App\Containers\Enterprise\UI\API\Requests\QuotaStatusRequest;
use App\Containers\Enterprise\UI\API\Transformers\EnterpriseTransformer;
use App\Ship\Parents\Controllers\ApiController;

class Controller extends ApiController
{
    protected $_service;

    public function __construct(EnterpriseService $service)
    {
        $this->_service = $service;
    }

    /**
     * Получить список предприятий
     * @param GetAllEnterprisesRequest $r
     * @return array
     */
    public function getAllEnterprises(GetAllEnterprisesRequest $r): array
    {
        $enterprises = $r->id ? $this->_service->getAllByParent($r->id) : $this->_service->getAll($r->search);

        return $this->transform($enterprises, EnterpriseTransformer::class);
    }

    public function requestQuotaStatus(QuotaStatusRequest $r)
    {
        $enterprises = app(QuotaStatusAction::class)->run();
        return $this->transform($enterprises, EnterpriseTransformer::class);
    }
}
