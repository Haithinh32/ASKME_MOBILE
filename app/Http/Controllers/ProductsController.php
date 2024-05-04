<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
use App\Models\Brands;
use App\Models\Specs;
use function Pest\Laravel\get;

class ProductsController extends PageController
{
    public function index_guest(){
        $listProducts = DB::table('products')
                            ->join('brands','products.brandId','=','brands.id')
                            ->select('products.id','products.pname','brands.bname','products.price','products.image','products.description','products.updated_at')
                            ->orderBy('products.updated_at')
                            ->paginate(24);
        if (request()->has('search'))
        {
            $searched = [];
            $search_string = request()->get('search','');
            $products = DB::table('products')
            ->where('pname','like',"%$search_string%")
            ->paginate(24);
            return view(
                'search',
                [
                    'listproducts' => $products
                ]
            );
        }
        return view('homepage',['listproducts' => $listProducts]);
    }
    public function index_admin(){
        $AdminlistProduct = DB::table('products')
                            ->join('brands','products.brandId','=','brands.id')
                            ->select('products.id','products.pname','brands.bname','products.price','products.image','products.description','products.updated_at')
                            ->orderBy('products.id')
                            ->simplePaginate(5);
        return view('dashboard',['listproducts' => $AdminlistProduct]);
    }

    public function addnew(Request $request){
        $file = $request->file('image');
        $extension = $file ->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $path = 'uploads/product_img/';
        $file->move($path, $filename);

        $spec = new Specs();
        $spec -> cname = $request->cname;
        $spec -> ram = $request->ram;
        $spec -> disk = $request->disk;
        $spec -> battery = $request->battery;
        $spec->save();
        
        $product = new Products();
        $product->pname = $request->pname;
        $brand = DB::table('brands')
                        ->where('bname', $request->bname)   
                        ->get();
        $product->brandId = $brand->id ;
        $product->description = $request->description;
        $product->specId = $spec->id;
        $product->price = $request->price;
        $product->image =  $path.$filename;
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

