<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ApiProductsRequest;
use App\Models\Products;
use App\Models\Categories;

class ApiProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Products::latest()
            ->addSelect(['category_name' => Categories::select('name')
            ->whereColumn('id_categories', 'categories.id')
            ->orderBy('id', 'desc')
            ->limit(1)
        ])->paginate(8);

        return response()->json($product);
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
    public function store(ApiProductsRequest $request)
    {
        $product = Products::create($request->all());

        return response()->json($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Products::addSelect(['category_name' => Categories::select('name')
            ->whereColumn('id_categories', 'categories.id')
            ->orderBy('id', 'desc')
            ->limit(1)
        ])->find($id);
        return response()->json($product);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::where('id',$id)->delete();

        return response(null,200);
    }
    public function destroyAll()
    {
        Products::truncate();
    }
}
