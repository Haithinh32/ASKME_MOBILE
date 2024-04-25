<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Products;
use Illuminate\Support\Facades\DB;

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

    public function homepage()
    {
        //check if the request have search value
        // these line should be un comment when product model, controller, view is ready
        $search_products = Products::orderBy('created_at','name');
        if (request()->has('search')) {
            $search_products = $search_products->where('pname', 'like', '%' . request()->get('search', '') . '%');
        }
        return view(
            'homepage',
            [
                '$search_products' => $search_products
            ]
         
        );
    }

    public function compare()
    {
        
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
