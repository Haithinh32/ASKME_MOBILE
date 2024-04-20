<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Products;

use function Pest\Laravel\get;

class ProductsController extends Controller
{
    public function index(){
        $listProduct = DB::table('products')
                            ->join('brands','products.brandId','=','brands.id')
                            ->select('products.*')
                            ->get();
                            dd($listProduct);
        return view('dashboard',['listproducts' => $listProduct]);
    }
}
