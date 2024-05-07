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
        if(!session()->has('product_ids'))
        {
            session()->push("product_ids",[]);
        }

        if(request()->has('name'))
        {
            
        }

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
}
