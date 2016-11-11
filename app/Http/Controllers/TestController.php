<?php
namespace App\Http\Controllers;

use App\BaseModel;
use App\Jobs\sendEmail;
use App\Models\Mailtemplate;
use App\Models\Room;
use App\Models\User;
use Blade;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Http\Controllers\BaseTypeController;
use Illuminate\View\Compilers\BladeCompiler;
use  \Illuminate\View\Compilers\BladeCompile;

class TestController extends Controller
{
    public function overview()
    {

        $mailTemplate = Mailtemplate::find(1);
        $user = User::find(1);

        $this->dispatch(new sendEmail($mailTemplate, $user));
    }
}
