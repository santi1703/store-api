<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    const ELEMENTS_PER_PAGE = 25;

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productQuery = Product::query();

        if ($request->has('name')) {
            $productQuery->where('name', 'LIKE', '%' . $request->get('name') . '%');
        }

        $data = $productQuery->paginate(self::ELEMENTS_PER_PAGE);

        return response()->json([
                'success' => true,
                'data' => $data,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $request->validated();
        $product = Product::create($request->all());

        return response()->json(
            [
                'success' => true,
                'data' => $product,
            ],
            201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        if (is_null($product)) {
            return response()->json('Data not found', 404);
        }
        return response()->json([new ProductResource($product)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $request->validated();

        $product->update($request->all());

        return response()->json(
            [
                'success' => true,
                'data' => $product,
            ],
            200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json(
            [
                'success' => true,
            ],
            200);
    }
}
