<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Files;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $products = Product::query()->paginate(20);
        return view('admin.product.index', ['products' => $products]);
    }

    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $categories = Category::query()->get();
        return view('admin.product.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $request['status'] = 'active';

        DB::transaction(function () use ($request) {

            $product = Product::create($request->only('name', 'description', 'category_id', 'price', 'status'));

            foreach ($request['images'] as $image) {
                $file = new Files();

                $extention = $image->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $image->move(public_path() . '/product/', $filename);
                $file->name = $image->getClientOriginalName();
                $file->filename = $filename;
                $file->extension = $extention;
                $file->dirname = '/';
                $file->filesize = $image->getSize();
                $file->mimetype = $image->getClientMimeType();
                $file->status = 1;
                $file->model = $product::class;
                $file->object_id = $product->id;
                $file->save();
            }
        });
        return redirect()->route('admin.product.index')
            ->withSuccess(__('Product created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
