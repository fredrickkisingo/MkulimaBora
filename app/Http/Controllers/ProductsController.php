<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Map;
use DB; //if you wanna use mysql query to do your fetching
use Illuminate\Support\Facades\Storage; //will assist us in helping to use the storage functionalities for use

class ProductsController extends Controller
{
    /**
     * Create a new controller instance.
     * Protects data on site from unauthorized access by either adding/deleting/editing
     * Only the index page and show will be visible to guests
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::orderBy('updated_at', 'desc')->paginate(6);
        return view ('products.index')->with ('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //we validate the input
        $this->validate($request, [
            'product_name' => 'required',
            'product_desc' => 'required',
            'price' => 'required',
            'phone_number' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //Handle File Upload
        if ($request->hasFile('cover_image')) {
        //Get file name with the extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
        //Get just the file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME); //this is just php

        //Get just the extension
            $extension = $request->file('cover_image')->getClientOriginalExtension(); //this is laravel

        //file name to Store
        //the concatenation will make the upload unique because of the time stamp
            $fileNameToStore = $fileName . '_' . time() . '_' . $extension;
        //Upload image
            $path = $request->file('cover_image')->storeAs('public', $fileNameToStore);
        } else {
            $fileNameToStore = 'noImage.jpg'; //if not uploaded, it is just going to see this and upload
        }

        //create product
        $product = new Product;
        

        $product->product_name = $request->input('product_name'); //the product name carrying the info and input into the DB
        $product->product_desc = $request->input('product_desc'); //body name carries the info and input into the DB
        $product->user_id = auth()->user()->id; //the user id will be added
        $product->cover_image = $fileNameToStore; //the fileName is stored
        $product ->price = $request ->input ('price'); //price name carries price info and puts in DB
        $product->phone_number = $request->input('phone_number');//phone number name carries contact info and puts in DB
        
        $product->save();//saved first to access the id in next step
        

        //redirecting and sending with it a success message as per the message file we created & included in views>inc
        return redirect('/products')->with('success', 'Product Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productId = Product::find($id);
        //  Goes with the name of the table and the variable name(productID)
        // the product (singular here) should go hand in hand with the variable in
        // show.blade.php which calls on title from the DB to display
        //the $id dictates what content is to be carried
        return view('products.show')->with('product', $productId);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        //same with what we did for find but go to edit view
        $productId = Product::find($id);

        //check for correct user
        if (auth()->user()->id !== $productId->user_id) {
            return redirect('/products')->with('error', 'Unauthorized Access');
        }
        return view('products.edit')->with('product', $productId);
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
        //validate the request with the array of rules that follow
        $this->validate($request, [
            'product_name' => 'required',
            'product_desc' => 'required',
            'price' => 'required',
            // 'phone_num' => 'required',
        ]);

        //Handle File Upload
        if ($request->hasFile('cover_image')) {
          //Get file name with the extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
          //Get just the file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME); //this is just php

          //Get just the extension
            $extension = $request->file('cover_image')->getClientOriginalExtension(); //this is laravel

          //file name to Store
          //the concatenation will make the upload unique because of the time stamp
            $fileNameToStore = $fileName . '_' . time() . '_' . $extension;
          //Upload image
            $path = $request->file('cover_image')->storeAs('public', $fileNameToStore);

        }
        //we get rid of else because we don't wanna replace it with  noImage

        //Update post; it finds it by id and makes the changes to DB
        $product = Product::find($id);

        $product->product_name = $request->input('product_name'); //the product name carrying the info and input into the DB
        $product->product_desc = $request->input('product_desc'); //product name carries the info and input into the DB
        $product->price =$request->input('price');
        $product->phone_number = $request->input('phone_number');
        if ($request->hasFile('cover_image')) {
            $product->cover_image = $fileNameToStore; //checking to see if the image has been changed
        }

        $product->save(); //product update
        return redirect('/products')->with('success', 'Product Details Updated');
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
        

        if (auth()->user()->id !== $product->user_id) {
            return redirect('/products')->with('error', 'Unauthorized Access');
        }
        if ($product->cover_image != 'noImage.jpg') {
          //Delete Image
            Storage::delete('public/' . $product->cover_image);
        }

        $product->delete();
        return redirect('/products')->with('success', 'Product Deleted from Catalogue');
    }
}
