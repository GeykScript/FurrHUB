<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Discount;
use App\Models\Service;
use App\Exports\ProductExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\ProductView;


use Illuminate\Support\Str;

class AdminProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        $admin = Auth::guard('admin')->user();

        if (!$admin) {
            return redirect()->route('admin-login')->with('error', 'You must be logged in to view the cart.');
        }

        return view('admin.admin_products.admin_products', compact('products', 'admin'));
    }

    //fix web.php and link
    public function exportExcel()
    {
        return Excel::download(new ProductExport, 'product_report.xlsx');
    }

    public function exportPDF()
    {
        $products = Product::all();

        $pdf = Pdf::loadView('admin.pdf_exports.products_pdf', compact('products'));
        return $pdf->download('products_report.pdf');
    }
    public function previewPDF()
    {
        $products = Product::all();
        return view('admin.pdf_exports.products_pdf', compact('products'));
    }

    public function add_product_page()
    {
        $products = Product::all();
        $admin = Auth::guard('admin')->user();

        $discounts = Discount::all();

        if (!$admin) {
            return redirect()->route('admin-login')->with('error', 'You must be logged in to view the cart.');
        }

        return view('admin.admin_products.add_product', compact('products', 'admin', 'discounts'));
    }

    public function add_product(Request $request)
    {

        $image_url = null;

        if ($request->hasFile('uploadPhoto')) {
            $filename = Str::random(20) . '.' . $request->file('uploadPhoto')->getClientOriginalExtension();
            //THIS IS USED FOR STORING IN DEPLOYMENT STORAGE
            // Store the image in the public disk
            // $request->file('uploadPhoto')->storeAs('Products', $filename, 'public_direct');
            $request->file('uploadPhoto')->storeAs('Products', $filename, 'public');

            $image_url = $filename;
        }

        $image_url2 = null;
        $image_url3 = null;

        if ($request->hasFile('uploadPhoto2')) {
            $filename2 = Str::random(20) . '.' . $request->file('uploadPhoto2')->getClientOriginalExtension();
            // Store the image in the public disk
            // $request->file('uploadPhoto2')->storeAs('Products', $filename, 'public_direct');

            $request->file('uploadPhoto2')->storeAs('Products', $filename2, 'public');
            $image_url2 = $filename2;
        }
        if ($request->hasFile('uploadPhoto3')) {
            $filename3 = Str::random(20) . '.' . $request->file('uploadPhoto3')->getClientOriginalExtension();
            // Store the image in the public disk
            // $request->file('uploadPhoto3')->storeAs('Products', $filename, 'public_direct');

            $request->file('uploadPhoto3')->storeAs('Products', $filename3, 'public');
            $image_url3 = $filename3;
        }

        Product::create([
            'name' => $request->input('product_name'),
            'description' => $request->input('product_description'),
            'price' => $request->input('product_price'),
            'category_id' => $request->input('product_category'),
            'image_url' => $image_url,
            'stock_quantity' => $request->input('product_quantity'),
            'serial_number' => $request->input('product_psn'),
            'expiry_date' => $request->input('expiration_date'),
            'quantity_sold' => 0,
            'discount_id' => $request->input('discount') ?? null, // Use null if discount_id is not provided
            'image_url_2' => $image_url2,
            'image_url_3' => $image_url3,
        ]);

        return redirect()->route('admin_products')->with('success', 'Product added successfully.');
    }


    public function edit_product(Request $request)
    {
        $product_id = $request->input('product_id');
        $product = Product::find($request->input('product_id'));


        $admin = Auth::guard('admin')->user();

        $discounts = Discount::all();

        if (!$admin) {
            return redirect()->route('admin-login')->with('error', 'You must be logged in to view the cart.');
        }
        return view('admin.admin_products.edit-products', compact('admin', 'discounts', 'product', 'product_id'));
    }

    public function save_changes(Request $request)
    {
        $product = Product::find($request->input('product_id'));

        if($product){

            $image_url = $product->image_url;
            $image_url2 = $product->image_url_2;
            $image_url3 = $product->image_url_3;

            if ($request->hasFile('uploadPhoto')) {
                $filename = Str::random(20) . '.' . $request->file('uploadPhoto')->getClientOriginalExtension();
                // Store the image in the public disk
                //  $request->file('uploadPhoto')->storeAs('Products', $filename, 'public_direct');
                $request->file('uploadPhoto')->storeAs('Products', $filename, 'public');

                $image_url = $filename;
            }
            if ($request->hasFile('uploadPhoto2')) {
                $filename2 = Str::random(20) . '.' . $request->file('uploadPhoto2')->getClientOriginalExtension();
                // Store the image in the public disk
                //  $request->file('uploadPhoto2')->storeAs('Products', $filename, 'public_direct');

                $request->file('uploadPhoto2')->storeAs('Products', $filename2, 'public');
                $image_url2 = $filename2;
            }
            if ($request->hasFile('uploadPhoto3')) {
                $filename3 = Str::random(20) . '.' . $request->file('uploadPhoto3')->getClientOriginalExtension();
                // Store the image in the public disk
                // $request->file('uploadPhoto3')->storeAs('Products', $filename, 'public_direct');

                $request->file('uploadPhoto3')->storeAs('Products', $filename3, 'public');
                $image_url3 = $filename3;
            }
            // Update the product with new data

            $product->update([
                'name' => $request->input('product_name'),
                'description' => $request->input('product_description'),
                'price' => $request->input('product_price'),
                'category_id' => $request->input('product_category'),
                'image_url' => $image_url,
                'stock_quantity' => $request->input('product_quantity'),
                'serial_number' => $request->input('product_psn'),
                'expiry_date' => $request->input('expiration_date'),
                'discount_id' => $request->input('discount') ?? null, // Use null if discount_id is not provided
                'image_url_2' => $image_url2,
                'image_url_3' => $image_url3,
            ]);

            return redirect()->route('admin_products')->with('success', 'Product updated successfully.');       
        }
      
    }

}
