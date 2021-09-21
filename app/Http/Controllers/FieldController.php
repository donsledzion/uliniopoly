<?php

namespace App\Http\Controllers;

use App\Http\Requests\FieldRequest;
use App\Http\Requests\PricingRequest;
use App\Models\Field;
use App\Models\FieldType;
use App\Models\Pricing;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        try {
            $fields = Field::all();
            return view('fields.index', [
                'fields' => $fields,
            ]);
        } catch(\Exception $e){
            Log::error("An exception was thrown while displaying Fields list: ".$e->getMessage());
            return view('error',[
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        try {
            $fieldTypes = FieldType::all();
            return view('fields.create',[
                'fieldTypes' => $fieldTypes,
            ]);
        }catch(\Exception $e){
            Log::error("An exception was thrown while retrieving new Field's form: ".$e->getMessage());
            return view('error',[
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  FieldRequest  $request
     * @return JsonResponse
     */
    public function store(FieldRequest $request)
    {
        try{
            DB::beginTransaction();
            $pricingData = $this->collectPricingData($request);

            $pricing = Pricing::create($pricingData);
            $field = Field::create($request->validated());

            $field->pricing_id = $pricing->id ;
            $field->save();
            DB::commit();
            return response()->json([
                'status' => 'success',
                'message' => __('responses.success')
            ]);
        } catch(\Exception $e){
            DB::rollBack();
            Log::error("An exception was thrown while storing new Field: ".$e->getMessage());
            return response()->json([
                'status' => 'fail',
                'message' => __('responses.fail')." Error message: ".$e->getMessage(),
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  Field $field
     * @return View
     */
    public function show(Field $field):View
    {
        try{
            return view('fields.show',[
                'field' => $field,
            ]);
        }catch(\Exception $e){
            Log::error("An exception was thrown while displaying Field: ".$e->getMessage());
            return view('error',[
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Field  $field
     * @return View
     */
    public function edit(Field $field):View
    {
        try{
            $fieldTypes = FieldType::all();
            return view('fields.edit',[
                'field' => $field,
                'fieldTypes' => $fieldTypes,
            ]);
        }catch(\Exception $e){
            Log::error("An exception was thrown while displaying Field's edition form: ".$e->getMessage());
            return view('error',[
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  FieldRequest  $request
     * @param  Field  $field
     * @return View
     */
    public function update(Request $request, Field $field)
    {
        try{
            $field->fill($request->validated())->save();
            return view('fields.show',[
                'field' => $field,
            ]);
        }catch(\Exception $e){
            Log::error("An exception was thrown while updating Field: ".$e->getMessage());
            return view('error',[
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Field  $field
     * @return JsonResponse
     */
    public function destroy(Field $field):JsonResponse
    {
        try{
            DB::beginTransaction();
            error_log("========================================================");
            error_log("transaction_begins!");
            $pricing = Pricing::findOrFail($field->pricing_id);
            $field->pricing_id = null ;
            $field->save();
            error_log("pricing found: ".$pricing);
            $pricing->delete();
            error_log("pricing deleted!");
            $field->delete();
            DB::commit();
            error_log("========================================================");
            return response()->json([
                'status' => 'success',
                'message' => __('responses.success')
            ]);
        }catch(\Exception $e){
            DB::rollBack();
            Log::error("An exception was thrown while deleting Field: ".$e->getMessage());
            return response()->json([
                'status' => 'fail',
                'message' => __('responses.fail').$e->getMessage()
            ]);
        }
    }

    private function collectPricingData(FieldRequest $request)
    {
        try {
            $pricingData = [];
            $pricingData['buy'] = $request->buy;
            $pricingData['mortgage'] = $request->mortgage;
            $pricingData['stop_single'] = $request->stop_single;
            $pricingData['stop_1_cottage'] = $request->stop_1_cottage;
            $pricingData['stop_2_cottage'] = $request->stop_2_cottage;
            $pricingData['stop_3_cottage'] = $request->stop_3_cottage;
            $pricingData['stop_4_cottage'] = $request->stop_4_cottage;
            $pricingData['stop_hotel'] = $request->stop_hotel;
            $pricingData['stop_1_of_kind'] = $request->stop_1_of_kind;
            $pricingData['stop_2_of_kind'] = $request->stop_2_of_kind;
            $pricingData['stop_3_of_kind'] = $request->stop_3_of_kind;
            $pricingData['stop_4_of_kind'] = $request->stop_4_of_kind;

            return $pricingData;
        } catch (\Exception $e){
            Log::error("An error thrown while collecting pricingData into array: ".$e->getMessage());
            return null;
        }
    }
}
