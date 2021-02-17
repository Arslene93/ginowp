<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Pricing;
use App\Models\Datacenter;
use App\Models\Pricing;



class ProductController extends Controller
{

    public function index()
    {

        $product = Product::with("pricing","datacenters")->get()->toArray();
        // dd($product);
        // $data_center = Datacenter::select('name')
        // $pricing = Pricing::select('price')
        // ->get();
    
        return view('products.index', ['products'=>$product]);
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
        $product->description = $request->description;
        $product->TVA = $request->TVA;
        $product->status = '1';
        $product->save();
        $prod = $product->id;
              

      
            foreach ($request->price as $price){
                $priceModel = new Pricing();
                $priceModel->price = $request->price;
                $priceModel->id_data_center = $request->$data_center;
                $priceModel->price_real = $request->price_real;
                $priceModel->billing = $request->billing;
                $priceModel->id_prod = $prod;
                $priceModel->save();
            }


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
        $product->status = '1';
     

        $product->save();



         $price = Pricing::where("id_prod" , $id)->delete();


        foreach ($request->price as $price){
            $priceModel = new Pricing();
            $priceModel->price = $request->price;
            $priceModel->id_data_center = $request->$data_center;
            $priceModel->price_real = $request->price_real;
            $priceModel->billing = $request->billing;
            $priceModel->id_prod = $id;
            $priceModel->save();
        }


        return redirect()->route('products.index');
    }


    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return back();
    }

    public function prices($id)
    {
        $prices = Pricing::where('id_prod', $id)->selectRaw('pricing.*, data_center.name')->leftJoin('data_center', 'data_center.id', 'pricing.id_data_center')->get();
        return response()->json($prices);
    }
}