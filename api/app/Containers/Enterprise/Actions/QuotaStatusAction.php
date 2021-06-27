<?php


namespace App\Containers\Enterprise\Actions;


use App\Containers\Enterprise\Mails\ReachingQuotaMail;
use App\Containers\Enterprise\Tasks\GetAllEnterprisesReachingQuotaLimitTask;
use App\Ship\Parents\Actions\Action;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Mail;

class QuotaStatusAction extends Action
{
        public function run()
        {
            $enterprises = app(GetAllEnterprisesReachingQuotaLimitTask::class)->run();
            $mail = new ReachingQuotaMail($enterprises);
            Mail::send($mail);

            return $enterprises;
        }
}
