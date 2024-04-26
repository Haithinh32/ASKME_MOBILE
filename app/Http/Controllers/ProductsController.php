<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
use function Pest\Laravel\get;

class ProductsController extends PageController
{
    public function index1(){
        $listProduct = DB::table('products')
                            ->join('brands','products.brandId','=','brands.id')
                            ->select('products.id','products.pname','brands.bname','products.price','products.image','products.description','products.updated_at')
                            ->orderBy('products.updated_at')
                            ->simplePaginate(24);
        if (request()->has('search'))
        {
            $products = DB::table('products')->simplePaginate(24);
            // dd($search_products);
            $searched = [];
            $search_string = request()->get('search','');
            foreach($products as $product)
            {
                if(stripos($product->pname,$search_string) !== false or stripos($product->description,$search_string) !== false)
                {
                    array_push($searched,$product);
                }
            }
            // ->where('pname', 'like', '%' . request()->get('search', '') . '%');
            return view(
                'homepage',
                [
                    'listproducts' => $searched
                ]
            );
        }
        //check if request have 'brand=..'
        return view('homepage',['listproducts' => $listProduct]);
    }
    public function index2(){
        $AdminlistProduct = DB::table('products')
                            ->join('brands','products.brandId','=','brands.id')
                            ->select('products.id','products.pname','brands.bname','products.price','products.image','products.description','products.updated_at')
                            ->orderBy('products.id')
                            ->simplePaginate(5);
        return view('dashboard',['listproducts' => $AdminlistProduct]);
    }

    public function addnew(Request $request){
        $product = new Products();
        $product->pname = $request->pname;
        $product->brandId = $request->brandId;
        $product->description = $request->description;
        $product->specId = $request->specId;
        $product->price = $request->price;
        $product->image = $request->image;
        $product->save();
        return redirect()->route('dashboard');
    }

    public function deleteproduct(Request $request)
    {
        if ($request->isMethod('get') && $request->has('id')) {
            $id = $request->input('id');
            Products::where('id', $id)->delete();
            return redirect()->route('dashboard');
        }
    }
}
