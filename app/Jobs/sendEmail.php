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
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Mailtemplate $template, User $user)
    {
        ob_start();
        eval('?>'. \Blade::compileString($template->body));
        $content = ob_get_clean();
        \Mail::raw($content, function($message) {
            $message->from('noreply@hanze.nl', 'Hanze Hogeschool');

            $message->to('sandervankasteel@gmail.com');
        });
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
    }
}
