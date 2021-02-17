<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Pricing;
use App\Models\Datacenter;


class ProductController extends Controller
{

    public function index()
    {
        // $product = Product::get()->toArray();
        // $data_center = Datacenter::select('id' , 'name')->get();

        return view('products.index');
    }


    public function create()
    {
        return view('product.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:product|max:255',
            'TVA' => 'required',
            'description' => 'required',

        ]);

        $product = new Product();
        $product->title = $request->title;
        $product->TVA = $request->TVA;
        $product->description = $request->description;
        $product->status = '1';


         $prod = $product->save();
        return redirect()->route('products.index');
    }


    public function edit($id)
    {
        $product = Product::find($id);

        return view('products.edit');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|unique:product|max:255',
            'TVA' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        $product = Product::find($id);
        $product->title = $request->title;
        $product->TVA = $request->TVA;
        $product->status = $request->status;

        $product->save();

        return redirect()->route('products.index');
    }


    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        //$feature->features()->detach();

        return back();
    }

    public function prices($id)
    {
        $prices = Pricing::where('id_prod', $id)->selectRaw('pricing.*, data_center.name')->leftJoin('data_center', 'data_center.id', 'pricing.id_data_center')->get();
        return response()->json($prices);
    }
}