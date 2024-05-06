<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Products;
use Illuminate\Support\Facades\DB;
use PDO;

class PageController
{
    /**
     * Show the form for creating the resource.
     */
    public function create(): never
    {
        abort(404);
    }

    /**
     * Store the newly created resource in storage.
     */
    public function store(Request $request): never
    {
        abort(404);
    }

    /**
     * Display the resource.
     */
    public function show()
    {
        //
    }


    public function compare()
    {
        $products_diff_brand = DB::table('products')
            ->select('products.*', 'specs.*','brands.*')
            ->distinct('brandid')
            ->limit(5)
            ->join('brands', 'products.brandid', '=', 'brands.id')
            ->join('specs', 'products.specid', '=', 'specs.id')
            ->get();


        $products_same_brand = DB::table('products')
            ->select('products.*', 'specs.*','brands.*')
            ->where('brandid', 1)
            ->limit(2)
            ->join('brands', 'products.brandid', '=', 'brands.id')
            ->join('specs', 'products.specid', '=', 'specs.id')
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
    /**
     * Show the form for editing the resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy(): never
    {
        abort(404);
    }
}
