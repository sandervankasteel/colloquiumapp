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
        return view('admin/locations/overview', ['locations' => Location::all()]);
    }

    public function edit(Location $location)
    {
        return view('admin/locations/edit', ['location' => $location, 'cities' => City::all()]);
    }

    public function update(Request $request)
    {
        try {
            $location = Location::where('id', $request->input('id'))->first();

            $request->session()->flash('success', $location->name . " has been successfully updated to " . $request->input('name'));

            $location->name = $request->input('name');
            $location->city_id = $request->input('location');

            $location->save();
        } catch(\ErrorException $e) {
            $request->session()->flash('error', "Something went wrong with updating your record");
        }

        return redirect('/admin/locations');
    }

    public function create(Request $request)
    {
        return view('admin.locations.create', ['cities' => City::all()]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        Location::create([
            'name' => $request->input('name'),
            'city_id' => $request->input('city')
        ]);
    }

    public function delete()
    {
        
    }
}