<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Products;
use Illuminate\Support\Facades\DB;
use PDO;

class Controller
{
    public function compare()
    {   

        $products_diff_brand = DB::table('products')
            ->join('brands', 'products.brandid', '=', 'brands.id')
            ->join('specs', 'products.specid', '=', 'specs.id')
            ->select('products.*','specs.cname','specs.disk','specs.battery','specs.ram','brands.id AS bid', 'brands.bname','brands.blogo')
            ->distinct('bid')
            ->limit(5)
            ->get();
        dd($products_diff_brand);

        $products_same_brand = DB::table('products')
            ->join('brands', 'products.brandid', '=', 'brands.id')
            ->join('specs', 'products.specid', '=', 'specs.id')
            ->where('brandid', 1)
            ->limit(2)
            ->select('products.*','specs.cname','specs.disk','specs.battery','specs.ram', 'brands.bname','brands.blogo')
            ->get();
        return view("compare", [
            "products_db" => $products_diff_brand,
            "products_sb" => $products_same_brand
        ]);
    }
    public function brand(Request $request)
    {
        $brand = DB::table('brands')
            ->where('id', '=', $request->get('id', 1))
            ->select('brands.id', 'brands.blogo', 'brands.bname')
            ->first();
        $products = DB::table('products')
            ->join('brands', 'products.brandId', '=', 'brands.id')
            ->where('brands.bname', '=', $brand->bname)
            ->select('products.id', 'products.pname', 'brands.bname', 'products.price', 'products.image', 'products.description', 'products.updated_at')
            ->orderBy('products.updated_at')
            ->paginate(24);

        // dd($brand,$products,$request->get('id'));
        return view("brand", [
            'products' => $products,
            'brand' => $brand
        ]);
    }
}
