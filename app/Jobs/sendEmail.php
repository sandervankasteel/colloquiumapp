<?php

namespace App\Jobs;

use App\Models\Mailtemplate;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\View\View;

class sendEmail implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * A object to which the
     * @var User
     */
    private $user;
    private $mailTemplate;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Mailtemplate $template, User $user)
    {
        $this->user = $user;
        $this->mailTemplate = $template;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Send the email
        \Mail::raw($this->parseMailcontent(), function($message) {
            $message->from('noreply@hanze.nl', 'Hanze Hogeschool');

            $message->to($this->user->email);
        });
    }


    /**
     * Returns a string with a parsed
     *
     * @return string
     */
    private function parseMailcontent()
    {
        // TODO Warning this is a very hacky method, needs replacement :(
        ob_start();
        $user = $this->user; // needed in case the
        eval('?>'. \Blade::compileString($this->mailTemplate->body));
        return ob_get_clean();

    }
}
