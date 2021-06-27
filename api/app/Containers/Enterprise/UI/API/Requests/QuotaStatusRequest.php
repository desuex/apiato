<?php
declare(strict_types=1);

namespace App\Containers\Enterprise\UI\API\Requests;


use App\Ship\Parents\Requests\Request;

class QuotaStatusRequest extends Request
{
    protected array $access = [
        'permissions' => [],
        'roles'       => '',
    ];

    public function rules():array
    {
        return [];
    }

    public function authorize():bool
    {
        return $this->check(
            [
                'hasAccess',
            ]
        );
    }
}
