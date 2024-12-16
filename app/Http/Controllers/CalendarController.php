<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use App\Models\Goals;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use App\Model\Http\;
class CalendarController extends Controller
{
    
    public function index()
    {
        $events = array();

        $user = auth()->user();
        $userID = $user['id'];
        

        $pages = Pages::all()
            ->where('userID', $userID);

        foreach($pages as $page){
            $events[] = [
                    'id' => $page->id,
                    'title' => $page->title,
                    'date' => $page->date,
                ];
        }

       
        $sumPagesAll = DB::table('pages')
            ->where('userID', $userID)
            ->sum('title');

        $yearGoal = DB::table('goals')
            ->where('userID', $userID)
            ->value('yearGoal');

        $monthGoal = DB::table('goals')
            ->where('userID', $userID)
            ->value('monthGoal');  
        $dayGoal = DB::table('goals')
            ->where('userID', $userID)
            ->value('dayGoal');   
            
            

        // dd($yearGoal);

        // if ($sumPagesAll>$goalPages){
        //     $goalResult = 'Spełniłeś cel';
        // }
        // else{
        //     $goalResult = 'Nie spełniłes celu';
        // }

    
    return view("Calendar", ['events' => $events])->with('sumPagesAll',$sumPagesAll)->with('yearGoal',$yearGoal)->with('monthGoal',$monthGoal)->with('dayGoal',$dayGoal);
    }

    public function save(Request $request){
        $request->validate([
            'title' => 'required|string'
        ]);

        $user = auth()->user();
        $userID = $user['id'];

        $pagesSave = Pages::updateOrCreate([
            'date' => $request->date,
        ],[
            'userID' => $userID,
            'title' => $request->title,
            
        ]);

        return response()->json($pagesSave);
       
    }

    // public function showProgress(){
    //     $user = auth()->user();
    //     $userID = $user['id'];

    //     $pagesCount = DB::table('pages')
    //     ->sum('title')
    //     ->where('userID', $userID);

    //     return $pagesCount;
    //     // SELECT sum(title) FROM `pages` WHERE userID=2;
    // }
}
