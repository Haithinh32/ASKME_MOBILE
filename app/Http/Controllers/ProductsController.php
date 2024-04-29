<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
use function Pest\Laravel\get;

class ProductsController extends PageController
{
    public function index1(){
        $listProducts = DB::table('products')
                            ->join('brands','products.brandId','=','brands.id')
                            ->select('products.id','products.pname','brands.bname','products.price','products.image','products.description','products.updated_at')
                            ->orderBy('products.updated_at')
                            ->paginate(24);
        if (request()->has('search'))
        {
            $searched = [];
            $search_string = request()->get('search','');
            // dd($search_string);
            $products = DB::table('products')
            ->where('pname','like',"%$search_string%")
            // dd($products->toSql());
            ->orWhere('description','LIKE',"%".$search_string."%")
            ->paginate(24);
            // dd($search_products);
            // foreach($products as $product)
            // {
            //     if(stripos($product->pname,$search_string) !== false or stripos($product->description,$search_string) !== false)
            //     {
            //         array_push($searched,$product);
            //     }
            // }
            // dd($products);
            return view(
                'homepage',
                [
                    'listproducts' => $products
                ]
            );
        }
        return view('homepage',['listproducts' => $listProducts]);
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

    public function editproduct(Request $request)
    {   
        $id = $request->input('id');
        $product = Products::find($id);
        return view('editproduct', ['products' => $product]);
    }
    
    public function updateproduct(Request $request)
    {
        $id = $request->input('id');
        $product = Products::find($id);
        $product->pname = $request->input('pname');
        $product->bname = $request->input('bname');
        $product->price = $request->input('price');
        $product->save();
        return view('Dashboard');
    }
}

