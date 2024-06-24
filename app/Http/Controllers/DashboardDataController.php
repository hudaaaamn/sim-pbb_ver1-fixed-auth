<?php

namespace App\Http\Controllers;

use App\Models\DashboardData;
use App\Http\Requests\StoreDashboardDataRequest;
use App\Http\Requests\UpdateDashboardDataRequest;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class DashboardDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $dashboardData = DashboardData::all()->sortBy('tahun');
            return response()->json([
                'success' => true,
                'data' => $dashboardData
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'error' => "Internal Server Error"
            ], 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($year)
    {
        try {
            $dashboardData = DashboardData::where('tahun', $year)->first();
            return response()->json([
                'success' => true,
                'data' => $dashboardData
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'error' => "Data not found"
            ], 404);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'error' => "Internal Server Error"
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                "tahun" => "required|unique:dashboard_data,tahun",
                "jml_objek_pajak" => "required|integer",
                "luas_bgn_total" => "required|integer",
                "total_pendapatan_pbb" => "required|integer",
                "jml_pbb_lunas" => "required|integer",
                "jml_pbb_belum_lunas" => "required|integer",
            ]);

            $dashboardData = DashboardData::create($request->all());
            return response()->json([
                'success' => true,
                'data' => $dashboardData
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 400);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'error' => "Internal Server Error" . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DashboardData $dashboardData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDashboardDataRequest $request, DashboardData $dashboardData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DashboardData $dashboardData)
    {
        //
    }
}