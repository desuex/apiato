<?php
declare(strict_types=1);

namespace App\Containers\Enterprise\Tests\V1;
use App\Containers\Enterprise\Mails\ReachingQuotaMail;
use Illuminate\Support\Facades\Mail;
use App\Containers\Enterprise\Models\Enterprise;
use App\Containers\Enterprise\Tests\EnterpriseTestCase;

final class SendEmailEnterprisesListTest extends EnterpriseTestCase
{
    protected $endpoint = 'get@/v1/enterprises-quota';

    public function testItSendEmailWithEnterprises():void
    {
        $mainEnterprise = factory(Enterprise::class)->create(
            [
                'objid' => 8800000,
                'objidref' => 8800000,
                'objsname' => 'Головной офис',
                'is_root' => true,
            ]
        );

        $enterprise = factory(Enterprise::class)->create(
            [
                'objid' => 11111111,
                'objidref' => 8800000,
                'objsname' => 'ООО Самая лучшая компания',
                'is_root' => false,
            ]
        );

        $count = 1;
        while ($count < 5) {
            $count++;
            $this->getUserForTest(
                [
                    'user_asup' => [
                        'orgid' => $enterprise->getAttribute('objid'),
                    ]
                ]
            );
        }
        Mail::fake();
        Mail::assertNothingSent();
        $response = $this->makeCall(
            [],
            $this->getAuthorizationParams()
        );

        $data = $response->decodeResponseJson()['data'];
        $this->assertEquals( 1, sizeof($data));
        Mail::assertSent(ReachingQuotaMail::class);
    }
}
