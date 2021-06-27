<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Factory;
use Faker\Generator as Faker;
use App\Containers\Enterprise\Models\Enterprise;
use App\Containers\Enterprise\Data\Faker\EnterpriseProvider;

/** @var Factory $factory */
$factory->define(Enterprise::class, static function(Faker $faker) {
  /** @var  Faker&EnterpriseProvider $faker */
  $faker->addProvider(new EnterpriseProvider($faker));
  $organization = $faker->getRandomOrganization();
  return [
    'objid' => $organization['id'],
    'objidref' => $organization['parent'],
    'objsname' => $organization['name'],
    'objstatus' => null,
    'is_root' => false,
    'quota' => 4
  ];
});
