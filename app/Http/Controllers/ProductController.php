<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Product;
use App\Category;
use App\Satuan;
use App\Repository\ProductRepository;
use File;
use Validator;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Input;
use PDF;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $product = Product::with(['category','satuan'])->orderBy('created_at', 'DESC');
        if(request()->q != '') {
            $product = $product->where('name', 'like', '%'. request()->q.'%');
        }
        $product = $product->paginate(10);
        return view('product.index', compact('product'));
    }

    public function create()
    {
    	$category = Category::orderBy('name','DESC')->get();
        $satuan = Satuan::orderBy('name','DESC')->get();
    	return view('product.create', compact('category','satuan'));

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required|max:100',
            'category_id' => 'required|integer',
            'satuan_id' => 'required|integer',
            'purchase' => 'required',
            'sell'=> 'required',
            'stock' => 'required|integer|max:30',
            'description' => 'nullable|string',
            'code' => 'required|string|max:11',
            'serial' => 'required|string|max:255',
            'status' => 'required',
            'imagefile' => 'required|file|mimes:jpeg,png,jpg,gif,svg'
        ]);

         if($request->hasFile(`imagefile`)){
            $file = $request->file('imagefile'); // simpan sementara divariabel file
            //next nama filenya dibuat customer dgn gabungan time&slug fr product
            $filename = time().Str::slug($request->name).'.'. $file->getClientOriginalExtension();
            //save filenya ke folder public/products
            $file->storeAs('public/products', $filename);
            $product = Product::create([
                'name' => $request->name,
                'slug' => $request->name,
                'serial' => $request->serial,
                'code' => $request->code,
                'category_id' => $request->category_id,
                'satuan_id' => $request->satuan_id,
                'description' => $request->description,
                'image' => $filename,
                'purchase_price' => $request->purchase,
                'sell_price' => $request->sell,
                'stocks' => $request->stock,
                'status' => $request->status
            ]);
            return redirect(route('product.index'))->with(['success'=> 'Add products Success !']);
        }
    }

    public function destroy($id)
    {
        $product = Product::Find($id);
        File::delete(storage_path('app/public/products'. $product->image)); //untuk delete image di storage
        $product->delete();

        return redirect(route('product.index'))->with(['success' => 'Delete Product Success !!']);
    }

    public function edit($id)
    {
        $product = Product::Find($id);
        $category = Category::orderBy('Name', 'DESC')->get();
        $satuan = Satuan::orderBy('name','DESC')->get();

        return view('product.edit', compact('product', 'category','satuan'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'  => 'required|max:100',
            'category_id' => 'required|integer',
            'satuan_id' => 'required|integer',
            'purchase' => 'required',
            'sell'=> 'required',
            'stock' => 'required|integer|max:30',
            'description' => 'nullable|string',
            'code' => 'required|string|max:11',
            'serial' => 'required|string|max:255',
            'status' => 'required',
            'imagefile' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg'
        ]);
        $product = Product::find($id);
        $filename = $product->image;
         //jika ada file gambar yg dikirim maka,
         if($request->hasFile(`imagefile`)){
            $file = $request->file('imagefile'); // simpan sementara divariabel file
        //     // //next nama filenya dibuat customer dgn gabungan time&slug fr product
            $filename = time().Str::slug($request->name).'.'. $file->getClientOriginalExtension();
        //     // //save filenya ke folder public/products
            $file->storeAs('public/products', $filename);
        //     // //dan hapus file gambar yg lama
            File::delete(storage_path('app/public/products/' .$product->image));
        }

        $product->update([
            'name' => $request->name,
            'slug' => $request->name,
            'serial' => $request->serial,
            'code' => $request->code,
            'category_id' => $request->category_id,
            'satuan_id' => $request->satuan_id,
            'description' => $request->description,
            'image' => $filename,
            'purchase_price' => $request->purchase,
            'sell_price' => $request->sell,
            'stocks' => $request->stock,
            'status' => $request->status
        ]);
        return redirect(route ('product.index'))->with(['success' => "Update Product Success..!!!"]);
    }

    public function barcode(Request $request, $id)
    {
        $product = Product::find($id);
        $category = Category::orderBy('Name', 'DESC')->get();

        return view('product.barcode', compact('product', 'category'));
    }

    public function cetakbarcode($code)
    {
        $productrepo =  new ProductRepository();
        $datane = $productrepo->getprocod($code);

        $header = ['StarCCTV'];

        $pdf = PDF::loadview('product.printbarcode',compact('header', 'datane'));
        // return $pdf->download('cetak-barcode');
        return $pdf->stream('cetak-barcode');
        // return  view('barcode.printbarcode', compact())
    }
}
