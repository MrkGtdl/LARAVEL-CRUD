<?php
  
namespace App\Http\Controllers;
  
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
  
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $products = Product::latest()
        ->where([
            ['productName', '!=', Null],
            [function ($query) use ($request) {
                if (($s = $request->s)) {
                    $query->orWhere('productName', 'LIKE', '%' . $s . '%')
                        ->orWhere('productDescription', 'LIKE', '%' . $s . '%')
                        ->orWhere('id', 'LIKE', '%' . $s . '%')
                        ->get();
                }
            }]
        ])
        ->paginate(10);
        $i = 'ID'.bin2hex(random_bytes(5));

        // dd($products);
        // die();
        
        return view('products.index',compact('products','i'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('products.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'productName' => 'required',
            'productDescription' => 'required',
        ]);

        $fileName = time() . '.' . $request->productImage->extension();
        $request->productImage->move('images', $fileName);

        $product = new Product;
        $product->productName = $request->input('productName');
        $product->productDescription = $request->input('productDescription');
        $product->productImage = $fileName;
        $product->save();

        // Product::create($request->all());

         
        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(Product $product): View
    {
        return view('products.show',compact('product'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        return view('products.update',compact('product'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $request->validate([
            'productName' => 'required',
            'productDescription' => 'required',
        ]);
        
        $product->update($request->all());
        
        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
         
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
}