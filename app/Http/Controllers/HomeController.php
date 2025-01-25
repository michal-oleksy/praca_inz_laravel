<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Goals;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $userID = $user['id'];

        $info = DB::table('users')
            ->where('id', $userID)
            ->select('firstName', 'lastName', 'email', 'nickName','privacy')->get();
        $goals = DB::table('goals')
            ->where('userID', $userID)
            ->select('yearGoal', 'monthGoal', 'weekGoal', 'dayGoal')->get();

        $bookList1 = DB::table('status')
            ->join('books', 'status.bookID', '=', 'books.id')
            ->where('userID', $userID)
            ->where('status', 1)
            ->select('books.title', 'status.bookID', 'status.status')
            ->get();

        $bookList2 = DB::table('status')
            ->join('books', 'status.bookID', '=', 'books.id')
            ->where('userID', $userID)
            ->where('status', 2)
            ->select('books.title', 'status.bookID', 'status.status')
            ->get();

        $bookList3 = DB::table('status')
            ->join('books', 'status.bookID', '=', 'books.id')
            ->where('userID', $userID)
            ->where('status', 3)
            ->select('books.title', 'status.bookID', 'status.status')
            ->get();


        // dd($bookList[0][0]->title);
        return view('home')->with('info', $info)->with('goals', $goals)->with('bookList1', $bookList1)->with('bookList2', $bookList2)->with('bookList3', $bookList3);
    }

    public function edit(Request $request)
    {
        $user = Auth::user();
        $userID = $user['id'];;

        $request->validate([
            'yearGoal' => 'nullable|numeric|gt:0',
            'monthGoal' => 'nullable|numeric|gt:0|',
            'weekGoal' => 'nullable|numeric|gt:0|',
            'dayGoal' => 'nullable|numeric|gt:0|',
        ]);

        $data = $request->only(['yearGoal', 'monthGoal', 'weekGoal', 'dayGoal']);
        $filteredData = array_filter($data, function ($value) {
            return !is_null($value);
        });



        $goals = DB::table('goals')
            ->where('userID', $userID)
            ->select('yearGoal', 'monthGoal', 'weekGoal', 'dayGoal')
            ->first();
        // dd($goals->yearGoal);// ZASTOSOWAĆ TEN ZAPIS ZE STRZAŁKĄ

        //warunki formularza
        //dla celu dziennego
        if (isset($filteredData['dayGoal']) && (isset($filteredData['yearGoal']) || isset($filteredData['monthGoal']) || isset($filteredData['weekGoal']))) {


            if (isset($filteredData['weekGoal'])) {
                if ($filteredData['dayGoal'] > $filteredData['weekGoal']) {
                    return redirect()->back()->withErrors(['dayGoal' => 'Cel dzienny nie może być większy niż cel tygodniowy.'])->withInput();
                }
            }

            if (isset($filteredData['monthGoal'])) {
                if ($filteredData['dayGoal'] > $filteredData['monthGoal']) {
                    return redirect()->back()->withErrors(['dayGoal' => 'Cel dzienny nie może być większy niż cel miesięczny.'])->withInput();
                }
            }

            if (isset($filteredData['yearGoal'])) {
                if ($filteredData['dayGoal'] > $filteredData['yearGoal']) {
                    return redirect()->back()->withErrors(['dayGoal' => 'Cel dzienny nie może być większy niż cel roczny.'])->withInput();
                }
            }
        }
        //dla celu tygodniowego
        if (isset($filteredData['weekGoal']) && (isset($filteredData['yearGoal']) || isset($filteredData['monthGoal']) || isset($filteredData['dayGoal']))) {

            if (isset($filteredData['monthGoal'])) {
                if ($filteredData['weekGoal'] > $filteredData['monthGoal']) {

                    return redirect()->back()->withErrors(['dayGoal' => 'Cel tygodniowy nie może być większy niż cel miesięczny.'])->withInput();
                }
            }

            if (isset($filteredData['yearGoal'])) {
                if ($filteredData['weekGoal'] > $filteredData['yearGoal']) {

                    return redirect()->back()->withErrors(['dayGoal' => 'Cel tygodniowy nie może być większy niż cel roczny.'])->withInput();
                }
            }
        }
        //dla celu miesięcznego
        if (isset($filteredData['monthGoal']) && (isset($filteredData['yearGoal']) || isset($filteredData['weekGoal']) || isset($filteredData['dayGoal']))) {

            if (isset($filteredData['yearGoal'])) {
                if ($filteredData['monthGoal'] > $filteredData['yearGoal']) {
                    return redirect()->back()->withErrors(['dayGoal' => 'Cel miesięczny nie może być większy niż cel roczny.'])->withInput();
                }
            }
        }
        //koniec warunków formularza

        //warunki z bazy danych


        if (isset($filteredData['dayGoal']) && (isset($goals->yearGoal) || isset($goals->monthGoal) || isset($goals->weekGoal))) {
            

            if (isset($goals->weekGoal)) {
                if ($filteredData['dayGoal'] > $goals->weekGoal) {
                    return redirect()->back()->withErrors(['dayGoal' => 'Cel dzienny nie może być większy niż cel tygodniowy.'])->withInput();
                }
            }


            if (isset($goals->monthGoal)) {
                if ($filteredData['dayGoal'] > $goals->monthGoal) {
                    return redirect()->back()->withErrors(['dayGoal' => 'Cel dzienny nie może być większy niż cel miesięczny.'])->withInput();
                }
            }

            if (isset($goals->yearGoal)) {
                if ($filteredData['dayGoal'] > $goals->yearGoal) {
                    return redirect()->back()->withErrors(['dayGoal' => 'Cel dzienny nie może być większy niż cel roczny.'])->withInput();
                }
            }

            
        }

        if(isset($filteredData['weekGoal']) && (isset($goals->yearGoal) || isset($goals->monthGoal) || isset($goals->dayGoal))) {

            if (isset($goals->monthGoal)) {
                if ($filteredData['weekGoal'] > $goals->monthGoal) {
                    return redirect()->back()->withErrors(['weekGoal' => 'Cel tygodniowy nie może być większy niż cel miesięczny.'])->withInput();
                }
            }

            if (isset($goals->yearGoal)) {
                if ($filteredData['weekGoal'] > $goals->yearGoal) {
                    return redirect()->back()->withErrors(['weekGoal' => 'Cel tygodniowy nie może być większy niż cel roczny.'])->withInput();
                }
            }
        }

        if(isset($filteredData['monthGoal']) && (isset($goals->yearGoal) || isset($goals->weekGoal) || isset($goals->dayGoal))) {

            if (isset($goals->yearGoal)) {
                if ($filteredData['monthGoal'] > $goals->yearGoal) {
                    return redirect()->back()->withErrors(['monthGoal' => 'Cel miesięczny nie może być większy niż cel roczny.'])->withInput();
                }
            }
        }


        Goals::updateOrCreate([
            'userID' => $userID,
        ], $filteredData);

        return redirect()->route('home');
    }

    public function editPrivacySetting(Request $request)
    {
        $user = Auth::user();
        $userID = $user['id'];

        $request->validate([
            'privacy' => 'required|numeric|between:1,3',
        ]);

        $data = $request->only(['privacy']);

        DB::table('users')
            ->where('id', $userID)
            ->update($data);

        return redirect()->route('home');
    }
}
