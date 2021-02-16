<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\DataCenter;

class DatacenterController extends Controller
{

    public function index()
    {
        $data_center = Datacenter::get()->toArray();

        return view('Datacenters.index');
    }


    public function create()
    {
        return view('Datacenters.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',

        ]);

        $data_center = new DataCenter();
        $data_center->name = $request->name;
        $data_center->description = $request->description;
        $data_center->status = '1';


        $data_center->save();
        return redirect()->route('Datacenters.index');
    }


    public function edit($id)
    {
        $data_center = DataCenter::find($id);

        return view('Datacenters.edit');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',

        ]);

        $data_center = DataCenter::find($id);
        $data_center->title = $request->title;
        $data_center->description = $request->description;
        $data_center->status = $request->status;

        $data_center->save();

        return redirect()->route('Datacenters.index');
    }


    public function destroy($id)
    {
        $data_center = DataCenter::find($id);
        $data_center->delete();
        //$feature->features()->detach();

        return back();
    }
}