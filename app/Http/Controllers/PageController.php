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
        $product_ids = session()->get('product_ids');
        if($product_ids != null)
        {
            $products = DB::table('products')
            ->whereIn('id',$product_ids)->get();
            return view('compare',[
                'products' => $products
            ]);
        }
        return view('compare');
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
