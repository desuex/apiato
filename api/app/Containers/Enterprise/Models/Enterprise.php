<?php

namespace App\Containers\Enterprise\Models;

use App\Containers\User\Models\User;
use App\Containers\User\Models\UserAsup;
use App\Containers\User\Tables\UsersAsupTable;
use App\Ship\App\Enterprise\EnterpriseTable;
use App\Ship\Parents\Models\Model;
use Illuminate\Support\Facades\DB;
use Smiarowski\Postgres\Model\Traits\PostgresArray;

class Enterprise extends Model
{
    use PostgresArray;

    public const MODERATORS = 'moderators';

    public $table = EnterpriseTable::TABLE;

    protected $primaryKey = EnterpriseTable::ID;

    public $timestamps = false;

    protected $fillable = EnterpriseTable::FILLABLE;

    public $inEntity = false;
    public $children_count = 0;
    public $parents_names = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = EnterpriseTable::TABLE;

    public function getParentsAttribute($value)
    {
        return self::accessPgArray($value);
    }

    public function users()
    {
        return $this->hasMany(UserAsup::class, UsersAsupTable::ORGID,EnterpriseTable::ID);
    }

    public function reachingQuota() {
        //SELECT enterprises.* from enterprises left join users_asup on users_asup.orgid = enterprises.objid group by enterprises.objid, enterprises.quota having COUNT(users_asup.number) >= enterprises.quota*0.8;

        return $this->raw('select enterprises.* from enterprises left join users_asup on users_asup.orgid = enterprises.objid group by enterprises.objid, enterprises.quota having COUNT(users_asup.number) >= enterprises.quota*0.8 and enterprises.quota is not null')->get();
    }
}
