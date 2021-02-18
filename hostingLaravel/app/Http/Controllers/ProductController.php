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

        $product = Product::get()->toArray();
        // dd($product);
        // $data_center = Datacenter::select('name')
        // $pricing = Pricing::select('price')
        // ->get();
    
        return view('products.index', ['products'=>$product]);
    }


    public function create()
    {
        $datacenters = Datacenter::selectRaw('name, max(id) as id')->groupBy('name')->get();
        return view('Products.create', ['datacenters'=>$datacenters]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
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
                $priceModel->price = $price['price'];
                $priceModel->id_data_center = $price['datacenter'];
                $priceModel->price_real = $price['price_real'];
                $priceModel->billing = $price['billing'];
                $priceModel->id_prod = $prod;
                $priceModel->save();
            }


        return redirect()->route('Products.index');
    }


    public function edit($id)
    {
        $product = Product::find($id);
        $prices = Pricing::where('id_prod', $id)->with("datacenter")->get();
        $datacenters = Datacenter::selectRaw('name, max(id) as id')->groupBy('name')->get();

        return view('products.edit', ['product'=>$product, 'prices'=>$prices, 'datacenters'=>$datacenters]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'TVA' => 'required',
            'description' => 'required',
        ]);

        $product = Product::find($id);
        $product->title = $request->title;
        $product->TVA = $request->TVA;
        $product->status = '1';
     

        $product->save();



         $price = Pricing::where("id_prod" , $id)->delete();


        foreach ($request->price as $price){
            $priceModel = new Pricing();
                $priceModel->price = $price['price'];
                $priceModel->id_data_center = $price['datacenter'];
                $priceModel->price_real = $price['price_real'];
                $priceModel->billing = $price['billing'];
                $priceModel->id_prod = $id;
            $priceModel->save();
        }


        return redirect()->route('Products.index');
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