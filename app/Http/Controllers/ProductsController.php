<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Products;

use function Pest\Laravel\get;

class ProductsController extends PageController
{
    public function index(){
        $listProduct = DB::table('products')
                            ->join('brands','products.brandId','=','brands.id')
                            ->select('products.id','products.pname','brands.bname','products.price','products.image','products.description','products.updated_at')
                            ->orderBy('products.updated_at')
                            ->limit(24)
                            ->get();
        if (request()->has('search'))
        {
            $products = DB::table('products')->get();
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
}
