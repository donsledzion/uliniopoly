<?php

namespace App\Http\Controllers;

use App\Http\Requests\FieldTypeRequest;
use App\Models\FieldType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Symfony\Component\Finder\Exception\DirectoryNotFoundException;

class FieldTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index():View
    {
        $fieldTypes = FieldType::all();
        return view('field-types.index',[
            'fieldTypes' => $fieldTypes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create():View
    {
        return view('field-types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JsonResponse
     */
    public function store(FieldTypeRequest $request)
    {
        try {
            $attributes = $request->validated();
            if (!$request->unique) {
                $attributes['unique'] = false;
            } else {
                $attributes['unique'] = true;
            }
            FieldType::create($attributes);

            return response()->json([
                'status' => 'success',
                'message' => __('responses.success')
            ]);
        } catch(\Exception $e){
            Log::error('Storing new FieldType fail. Error message: '.$e->getMessage());
            return response()->json([
                'status' => 'fail',
                'message' => __('responses.fail')
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FieldType  $fieldType
     * @return \Illuminate\Http\Response
     */
    public function show(FieldType $fieldType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FieldType  $fieldType
     * @return View
     */
    public function edit($fieldType):View
    {
        try{
            $fieldType = FieldType::find($fieldType);
            return view('field-types.edit',[
                'fieldType' => $fieldType
            ]);
        } catch(\Exception $e){
            Log::error("An exception was thrown while trying to show field-type edit form: ".$e->getMessage());
            return view('error',[
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FieldType  $fieldType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FieldType $fieldType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FieldType  $fieldType
     * @return JsonResponse
     */
    public function destroy($fieldType):JsonResponse
    {
        try {
            FieldType::find($fieldType)->delete();
            return response()->json([
                'status' => 'success',
                'message' => __('responses.success')
            ]);
        } catch(\Exception $e){
            Log::error('Deleting FieldType fail. Error message: '.$e->getMessage());
            return response()->json([
                'status' => 'fail',
                'message' => __('responses.fail')
            ]);
        }
    }
}
