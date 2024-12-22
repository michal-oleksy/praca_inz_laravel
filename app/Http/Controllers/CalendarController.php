<?php

namespace App\Http\Controllers;

use App\Models\Pages;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CalendarController extends Controller
{

    public function index()
    {
        $events = array();

        $user = auth()->user();
        $userID = $user['id'];


        $pages = Pages::all()
            ->where('userID', $userID);

        foreach ($pages as $page) {
            $events[] = [
                'id' => $page->id,
                'title' => $page->title,
                'date' => $page->date,
            ];
        }

        $sumPagesAll = DB::table('pages')
            ->where('userID', $userID)
            ->sum('title');

        $currentYear = DB::table('pages')
            ->where('userID', $userID)
            ->whereYear('date', Carbon::now()->year)
            ->sum('title');

        $currentMonth = DB::table('pages')
            ->where('userID', $userID)
            ->whereMonth('date', Carbon::now()->month)
            ->sum('title');

        $currentWeek = DB::table('pages')
            ->where('userID', $userID)
            ->whereBetween('date', [Carbon::now()->startOfWeek(Carbon::SUNDAY), Carbon::now()->endOfWeek(Carbon::SATURDAY)])
            ->sum('title');

        $currentPages = [$currentYear, $currentMonth, $currentWeek];

        $goals = DB::table('goals')
            ->where('userID', $userID)
            ->select('yearGoal', 'monthGoal', 'weekGoal')->get();

        return view("calendar", ['events' => $events])->with('sumPagesAll', $sumPagesAll)->with('goals', $goals)->with('currentPages', $currentPages);
    }

    public function save(Request $request)
    {
        $request->validate([
            'title' => 'required|numeric|gt:0'
        ]);

        $user = auth()->user();
        $userID = $user['id'];

        $pagesSave = Pages::updateOrCreate([
            'date' => $request->date,
        ], [
            'userID' => $userID,
            'title' => $request->title,

        ]);

        return response()->json($pagesSave);
    }
}
