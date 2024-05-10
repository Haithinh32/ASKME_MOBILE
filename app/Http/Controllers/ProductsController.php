<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
use App\Models\Brands;
use App\Models\Specs;
use function Pest\Laravel\get;
use Exception;

class ProductsController extends Controller
{
    public function index_guest(){
        $listProducts = DB::table('products')
                            ->join('brands','products.brandId','=','brands.id')
                            ->select('products.id','products.pname','brands.bname','products.price','products.image','products.description','products.updated_at')
                            ->orderBy('products.updated_at')
                            ->paginate(24);
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
try{
        $file = $request->file('image');
        $extension = $file ->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $path = 'uploads/product_img/';
        $file->move($path, $filename);
        
        $file = $request->file('blogo');
        $extension = $file ->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $path = 'uploads/brand_img/';
        $file->move($path, $filename);

        $spec = new Specs();
        $spec -> cname = $request->cname;
        $spec -> ram = $request->ram;
        $spec -> disk = $request->disk;
        $spec -> battery = $request->battery;
        $spec->save();
        
        $product = new Products();
        $product->pname = $request->pname;

        $product->specId = $spec->id;

        $brand = DB::table('brands')
        ->where('bname', $request->bname)
        ->select('brands.id')
        ->first();
    
    if ($brand) {
        $product->brandId = $brand->id;
    } else {
        $brand = new Brands();
        $brand->bname = $request->bname;
        $brand->blogo = $request->blogo;
        $brand->save();
        $product->brandId = $brand->id;
    }

        $product->description = $request->description;
        $product->price = $request->price;
        $product->image =  $path.$filename;
        $product->save();
    }
    catch(Exception $e){
        return redirect()->view('addnew')->with('alert', 'Something went wrong happened');
    }
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
        $brand = Brands::find($product->brandId);
        $spec = Specs::find($product->SpecId);
        return view('editproduct', ['products' => $product, 'brand' => $brand, 'spec' => $spec]);
    }

    public function updateproduct(Request $request)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $path = 'uploads/product_img/';
        $file->move($path, $filename);

        $id = $request->input('id');
        $product = Products::find($id);
        $brand = Brands::find($product->brandId);
        $spec = Specs::find($product->specId);
        $product->pname = $request->input('pname');
        $spec->cname = $request->input('cname');
        $spec->ram = $request->input('ram');
        $spec->disk = $request->input('disk');
        $spec->battery = $request->input('battery');
        $brand = DB::table('brands')
        ->where('bname', $request->bname)
            ->select('brands.id')
            ->first();

        if ($brand) {
            $product->brandId = $brand->id;
        } else {
            return view('addnew');
        }
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->image =  $path . $filename;
        $product->save();
        return view('Dashboard');
    }
}

