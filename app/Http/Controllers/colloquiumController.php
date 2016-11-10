<?php

namespace App\Http\Controllers;

use App\Models\ColloquiumType;
use App\Models\Language;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Colloquium;
use Illuminate\Support\Facades\DB;

class colloquiumController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //  $this->middleware('auth');
    }

    /**
     *
     */
    public function index()
    {
        return view('user.AddColloquium');
    }

    public function plannerView(Request $request)
    {
        if ($request->approval != null) {
            $colloquia = Colloquium::where('approval', $request->approval)
                ->orderBy('start_date', 'asc')
                ->get();
        } else {
            $colloquia = Colloquium::orderBy('start_date', 'c')->get();
        }
        return view('user.colloquiaPlanner', compact('colloquia'));
    }

    public function update(Request $request)
    {
        Colloquium::where('id', $request->id)
            ->update(['approval' => $request->approval]);
        return back();
    }

    public function edit($id)
    {
        $colloquium = Colloquium::where('id', $id)
            ->get()
            ->first();
        $users = User::orderBy('last_name', 'asc')
            ->orderBy('first_name', 'asc')
            ->get();
        $rooms = Room::orderBy('name', 'asc')
            ->get();
        $types = ColloquiumType::orderBy('name', 'asc')
            ->get();
        $languages = Language::orderBy('name', 'asc')
            ->get();
        return view('user.colloquiaEditor', compact('colloquium', 'users', 'rooms', 'types', 'languages'));
    }
}
