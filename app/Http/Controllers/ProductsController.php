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
                            ->select('products.id','products.pname','brands.bname','products.price','products.image','products.description')
                            ->limit(24)
                            ->get();
        return view('homepage',['listproducts' => $listProduct]);
    }
}
