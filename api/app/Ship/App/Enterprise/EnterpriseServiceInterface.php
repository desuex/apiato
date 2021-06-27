<?php

namespace App\Ship\App\Enterprise;


interface EnterpriseServiceInterface
{
    public function getAll($search);

    public function getAllByParent(int $id);

    public function getAllReachingQuotaLimit();
}
