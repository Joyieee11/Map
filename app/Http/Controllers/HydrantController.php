<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecommendedHydrantModel;
use App\Models\HydrantInfoModel;
use App\Models\ReportIssueModel;
use App\Models\GenerateReportModel;
use Illuminate\Support\Facades\Auth;

class HydrantController extends Controller
{
    public function storeRecommendedHydrant(Request $request)
    {
        try {
            $request->validate([
                'latitude' => 'required|numeric',
                'longitude' => 'required|numeric',
                'reason' => 'required',
            ]);

            RecommendedHydrantModel::create($request->all());

            return response()->json(['message' => 'Hydrant information added successfully']);
        } catch (\Exception $e) {
            dd($e->getMessage()); // Check for any exception messages
            return response()->json(['error' => $e->getMessage()], 500);
        }

        die();
    }

    public function showHydrantInfo($id)
    {
        try {
            $hydrant = HydrantInfoModel::findOrFail($id);

            return response()->json($hydrant);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function storeReportIssue(Request $request)
    {
        // Validate the form data
        $request->validate([
            'latitude' => 'required',
            'longitude' => 'required',
            'reason' => 'required|in:damage hydrant,water leak,obstruction,others',
        ]);

        // Store the report in the database
        $report = new ReportIssueModel();
        $report->latitude = $request->latitude;
        $report->longitude = $request->longitude;

        // Check if the selected reason is "others"
        if ($request->reason === 'others') {
            // Validate and store the "othersReason" field
            $request->validate([
                'othersReason' => 'required',
            ]);

            $report->reason = $request->othersReason;
        } else {
            // Use the selected reason directly
            $report->reason = $request->reason;
        }

        $report->status = 'pending';
        $report->save();

        // You can add any additional logic or response here

        return response()->json(['message' => 'Report submitted successfully']);
    }

    public function createReport(Request $request)
    {
        $request->validate([
            'hydrant_id' => 'required',
            'before' => 'required',
            'during' => 'required',
            'after' => 'required',
        ]);

        // Assuming reporter_name is based on the currently logged-in user information
        $reporterName = Auth::user()->full_name;

        // Create a new report
        $report = GenerateReportModel::create([
            'reporter_name' => $reporterName,
            'hydrant_id' => $request->hydrant_id,
            'before' => $request->before,
            'during' => $request->during,
            'after' => $request->after,
            'status' => 'Under Review',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Report created successfully!',
            'data' => $report,
        ]);
    }

    public function getGenerateReport()
    {
        $users = GenerateReportModel::all();

        if ($users->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No data found',
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $users,
        ]);
    }
}
