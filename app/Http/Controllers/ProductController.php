<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        Request $request
        // ProductCreateRequest $request
    ) {
            $input = $request->validate([
                'name' => 'required|min:5',
                'detail' => 'required|min:10',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ], [
                'name.required' => 'name không được rỗng',
                'name.min' => 'name phải lơn hơn 5 ký tự',
                'detail.required' => 'detail không được rỗng',
                'detail.min' => 'detail phải lơn hơn 10 ký tự',
            ]);

            // $input = $request->all();
            // $input = [
            //     "name" => $request->name,
            //     "detail" => $request->detail,
            //     "image",
            // ];

            if ($image = $request->file('image')) {
                $path = 'images/';
                $profileImage = date('YdmHis') . "." . $image->getClientOriginalExtension();
                $image->move($path, $profileImage);
                $input['image'] = $profileImage;
            }

            Product::create($input);

            return redirect()->route('product.index')->with('msg', 'Product created success!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        try {
            $request->validate([
                'name' => 'required|min:5',
                'detail' => 'required|min:10',
            ], [
                'name.required' => 'name không được rỗng',
                'detail.required' => 'detail không được rỗng',
            ]);

            $input = $request->all();
            if ($image = $request->file('image')) {
                $path = 'images/';
                $profileImage = date('YdmHis') . "." . $image->getClientOriginalExtension();
                $image->move($path, $profileImage);
                $input['image'] = $profileImage;
            } else {
                unset($input['image']);
            }

            $product =  Product::findOrFail($id);
            $product->update($input);
            return redirect()->route('product.index')->with('msg', 'Product updated success!!');
        } catch (Exception $e) {
            dd($e);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        Product::find($id)->delete();
        return redirect()->route('product.index')->with('msg', 'Product deleted success!!');
    }
}
