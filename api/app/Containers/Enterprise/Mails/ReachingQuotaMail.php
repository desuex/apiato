<?php


namespace App\Containers\Enterprise\Mails;


use App\Ship\Parents\Mails\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Database\Eloquent\Collection;

class ReachingQuotaMail extends Mail
{
    use Queueable;

    protected $enterprises;

    public function __construct(Collection $enterprises)
    {

        $this->enterprises = $enterprises;
    }

    public function build()
    {
        $list = [];
        foreach($this->enterprises as $enterprise) {
            $list[] = $enterprise->objsname;
        }
        return $this->view('enterprise::quota')
            ->to(env('MAIL_TO_SUPPORT_ADDRESS'))
            ->with([
                'enterprises' => implode(',', $list),
            ]);
    }
}
