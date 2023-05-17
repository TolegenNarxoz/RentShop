<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function subscribe(Request $request, Product $product){
        Auth::user()->productsSubscribed()
            ->attach($product->id, ['day' => $request->input('day'),
                                    'created_at' => Carbon::now()->addHour(6)]);
        return back();
    }
    public function productsHome(Category $category){
        return view('products.home', ['categories'=> Category::all()]);
    }

    public function productsByCategory(Category $category){
        return view('products.index', ['products' => $category->products, 'categories'=> Category::all()]);
    }

    public function index(){
        $allProducts = Product::all();
        return view('products.index', ['products' => $allProducts, 'categories'=> Category::all()] );
    }


    public function create(){
        $this->authorize('create', Product::class);
        return view('products.create', ['categories'=> Category::all()]);
    }


    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'content' => 'required|max:500',
//            'content_en' => 'required|max:500',
//            'content_ru' => 'required|max:500',
//            'content_kz' => 'required|max:500',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric|exists:categories,id',
            'img1' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $fileName = time().$request->file('img1')->getClientOriginalName();
        $image_path = $request->file('img1')->storeAs('products', $fileName, 'public');
        $validated['img'] = '/storage/'.$image_path;

        Product::create($validated);
        return redirect()->route('products.create')->with('addproduct', 'Product add');
    }


    public function show(Product $product){
        return view('products.show', ['product' => $product]);
    }


    public function edit(Product $product){
        $this->authorize('edit',$product);
        return view('products.edit', ['product' => $product,]);
    }


    public function update(Request $request, Product $product){
        $product->update([
            'name' => $request->name,
            'content' => $request->content,
//            'content_en' => 'required|max:500',
//            'content_ru' => 'required|max:500',
//            'content_kz' => 'required|max:500',
            'price' => $request->price,
//            'category_id' => 'required|numeric|exists:categories,id',
            'img1' => $request->img1,
            'img2' => $request->img2,
            'img3' => $request->img3,
        ]);
        return redirect()->route('products.index');
    }


    public function destroy(Product $product){
        $this->authorize('delete', $product);
        $product->delete();
        return redirect()->route('products.index');
    }
}
