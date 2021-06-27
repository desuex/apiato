<?php

/**
 * @OA\Get(
 *      path="/enterprises-quota",
 *      tags={"Enterprises"},
 *      summary="Enterprises quota limit notification",
 *      description="Request email with enterprises reaching users quota limit",
 *      security={ {"bearer": {} }},
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *       )
 *     )
 * @var \Illuminate\Routing\Router $router
 */


$router->get('enterprises-quota', [
    'as' => 'api_enterprise_quota_info',
    'uses'  => 'Controller@requestQuotaStatus',
    'middleware' => [
        'jwt',
    ],
]);
