<?php

namespace App\Services;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductService
{
    private FilesService $filesService;

    public function __construct(FilesService $filesService)
    {
        $this->filesService = $filesService;
    }

    public function create(ProductRequest $request)
    {
        $request['status'] = 'active';
        return DB::transaction(function () use ($request) {
            $product = Product::create($request->only('name', 'description', 'category_id', 'price', 'status'));
            $this->filesService->upload(($request['images'] ?? []), $product);
        });
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->only('name', 'description', 'category_id', 'price', 'status'));
        return DB::transaction(function () use ($request, $product) {
            $this->filesService->upload(($request['images']??[]), $product);
        });
    }
}
