<?php

namespace App\Http\Controllers;

use App\Models\HolidayPlan;
use App\Http\Requests\StoreHolidayPlanRequest;
use App\Http\Requests\UpdateHolidayPlanRequest;
use Exception;
use Illuminate\Validation\ValidationException;


class HolidayPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $holidayPlans = HolidayPlan::all();

        return response()->json($holidayPlans);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHolidayPlanRequest $request)
    {
        
        try {
            $holidayPlan = HolidayPlan::create($request->validated());

            return response()->json(['message' => 'Holiday plan created successfully'], 201);
        } catch(Exception $e) {

            if ($e instanceof ValidationException) {
                return response()->json(['message' => 'Validation failed', 'errors' => $e->errors()], 422);
            }
        }

        return response()->json(['message' => 'Failed to create holiday plan'], 500);
     
    }

    /**
     * Display the specified resource.
     */
    public function show(HolidayPlan $holidayPlan)
    {
        return response()->json($holidayPlan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHolidayPlanRequest $request, HolidayPlan $holidayPlan)
    {
        try {
            $holidayPlan->update($request->validated());

            return response()->json(['message' => 'Holiday plan updated successfully'], 200);
        } catch(Exception $e) {

            if ($e instanceof ValidationException) {
                return response()->json(['message' => 'Validation failed', 'errors' => $e->errors()], 422);
            }
        }

        return response()->json(['message' => 'Failed to update holiday plan'], 500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HolidayPlan $holidayPlan)
    {
        try {
            $holidayPlan->delete();

            return response()->json(['message' => 'Holiday plan deleted successfully'], 200);
        } catch(Exception $e) {
            return response()->json(['message' => 'Failed to delete holiday plan'], 500);
        }
    }
}
