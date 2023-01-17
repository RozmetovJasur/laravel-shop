<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\ProductService;

class ProductController extends Controller
{
    private ProductService $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $products = Product::query()->with(['files'])->paginate(20);
        return view('admin.product.index', ['products' => $products]);
    }

    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $categories = Category::query()->get();
        return view('admin.product.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        try {
            $this->service->create($request);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }
        return redirect()->route('admin.product.index')
            ->withSuccess(__('Product created successfully.'));
    }

    public function show($id)
    {
        //
    }

    public function edit(Product $product): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.product.edit', [
            'product' => $product,
            'categories' => Category::query()->get()
        ]);
    }

    public function update(ProductRequest $request, Product $product)
    {
        try {
            $this->service->update($request, $product);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.product.index')
            ->withSuccess(__('Product updated successfully.'));
    }

    public function destroy($id)
    {
        //
    }
}
