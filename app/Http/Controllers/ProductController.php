<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $product = DB::table('products')
            // ->join('products', 'categories.id', '=', 'products.category_id')
            // ->where('categories.category_name','=',NULL)
            // ->crossJoin('categories')
            // ->select('products.*','categories.category_name')
            ->get();
            // dd($product);
        $category = Category::all();
        // dd($ok);
        return view('product.index', compact('product','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_name' => 'required',
            // 'category_id' => 'required',
            'product_description' => 'required',
            'product_price' => 'required',
            
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('product_image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['product_image'] = "$profileImage";
        }
        // $product = DB::table('product_models')->get(); 
        Product::create($input);
       
     
        return redirect()->route('product')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tampilproduct($id)
    {
        $data = Product::find($id);
        // $category = Category::all();

        // dd($category);
        return view('product.tampilproduct', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $data = Product::find($id);
        // $data->update($request->all());
        
        $image = null;
        if($request->hasFile('product_image')){
            $uuid = Str::uuid()->toString();
            $image = $uuid.$request->file('product_image')->getClientOriginalName();
            $request->file('product_image')->move('image/', $image);
        }
        
        
        $data = [
            'product_name' => $request->input('product_name'),
            'product_description' => $request->input('product_description'),
            'category_id' => $request->input('category_id'),
            'product_price' => $request->input('product_price'),
        ];
        if ($image) {
            $data['product_image'] = $image;
        }

        DB::table('products')
        ->where('id',$request->id)
        ->update($data);
        

        return redirect()->route('product')->with('success','category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product')->with('success', ' Category has been Deleted.');
    }
}
