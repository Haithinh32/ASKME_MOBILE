<?php

namespace App\Http\Controllers;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use Exception;
use App\Models\Products;
use App\Models\Brands;
use App\Models\Specs;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\Settings;

class HomeController extends Controller
{
   public function index (){

    return view('admin.dashboard');
   }

   public function generateDocx(Request $request)
    {
        $id = $request->input('id');
        $product = Products::find($id);
        $brand = Brands::find($product->brandId);
        $spec = Specs::find($product->SpecId);

        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        $pname = $product->pname;
        $brandname = $brand->bname;
        $ram = $spec->ram;
        $disk = $spec->disk;
        $battery = $spec->battery;
        $cname = $spec->cname;
        $price = $product->price;
        $description = $product->description;
        $section->addImage($product->image);
        $section->addText('Phone name:'.$pname);
        $section->addText('Brand name:'.$brandname);
        $section->addText('Chip name:'.$cname);
        $section->addText('RAM:'.$ram);
        $section->addText('Disk name:'.$disk);
        $section->addText('Battery name:'.$battery);
        $section->addText('Price:'.$price);
        $section->addText('Phone description:'.$description);

        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        try {
            Settings::setZipClass(Settings::PCLZIP);
            $objWriter->save(storage_path($product->pname.'.docx'));
        } catch (Exception $e) {
            // Handle exception if needed
        }

        return response()->download(storage_path($product->pname.'.docx'));
    }
}
