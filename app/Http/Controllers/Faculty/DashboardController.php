<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use App\Models\TeacherClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($filter = null)
    {
        try {

            $filter = ($filter === null) ? 'today' : $filter;

            $schedules = Auth::user()->facultyMember->teacherClasses()->whereHas('scheduleDates', function ($query) use ($filter) {
                switch ($filter) {
                    case 'today':
                        $query->whereDate('schedule_dates.date', now()->format('Y-m-d'));
                        break;
                    case 'week':
                        $query->whereBetween('schedule_dates.date', [
                            now()->startOfWeek()->subDay(),
                            now()->endOfWeek()->addDay(),
                        ]);
                        break;
                    case 'month':
                        $query->whereBetween('schedule_dates.date', [
                            now()->startOfMonth()->subDay(),
                            now()->endOfMonth()->addDay(),
                        ]);
                        break;
                }
            })->get();
            return view('AMS.backend.faculty-layouts.dashboard.index', compact('schedules', 'filter'));
            dd('Invalid filter.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('errorAlert', $th->getMessage());
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
