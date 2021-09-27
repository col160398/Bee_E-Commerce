<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ApiCategoriesRequest;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Support\Facades\DB;

class ApiCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::where('status',0)->latest()->paginate(10);
        
        return response()->json($categories);
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
    public function store(ApiCategoriesRequest $request)
    {
        $categories = Categories::create($request->all());
        
        return response()->json($categories);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Categories::find($id);

        return response()->json($categories);
    }

    // Get Product Of Category
    public function getProductOfCategory($id)
    {
        $category = Products::where('id_categories',$id)
            ->addSelect(['category_name' => Categories::select('name')
            ->whereColumn('id_categories', 'categories.id')
            ->orderBy('id', 'desc')
            ->limit(1)
        ])->paginate(6);
        return response()->json($category);
    }
    //
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
    public function update(ApiCategoriesRequest $request, $id)
    {
        $categories = Categories::where('id',$id)->update($request->all());

        return response()->json($categories);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categories::find($id)->delete();
        return 'Delete Success';
    }
}
