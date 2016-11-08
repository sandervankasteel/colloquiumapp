<?php
namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Location;
use Symfony\Component\HttpFoundation\Request;

class LocationsController extends Controller
{
    public function overview(Request $request)
    {
        $data = ['locations' => Location::all()];
        // TODO check if flash data is set. If this is true, then pass that message to view

        return view('admin/locations/overview', $data);
    }

    public function edit(Location $location)
    {
        return view('admin/locations/edit', ['location' => $location, 'cities' => City::all()]);
    }

    public function update(Request $request)
    {
        try {
            $location = Location::where('id', $request->input('id'))->first();

            $request->session()->flash('status', $location->name . " has been successfully updated to " . $request->input('name'));

            $location->name = $request->input('name');
            $location->city_id = $request->input('location');

            $location->save();
        } catch(\ErrorException $e) {
            $request->session()->flash('error', $location->name . " has been successfully updated to " . $request->input('name'));
        }

        return redirect('/admin/locations');
    }
}