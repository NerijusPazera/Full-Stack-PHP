<?php

namespace App\Http\Controllers;

use App\TestResults;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestResultsController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Europe/Vilnius');
        $this->middleware('auth');
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $h2 = 'Visi rezultatai';
        $results = TestResults::orderBy('id', 'desc')->paginate(10);

        if ($results->toArray()['data']) {
            $table['headers'] = [
                'Vartotojo vardas' => [],
                'Reakcijos laikas' => [],
                'Testo data' => []
            ];

            foreach ($results as $result) {
                $table['rows'][] = [
                    'user_name' => $result->user->name,
                    'reaction_time' => $result->reaction_time,
                    'date' => $result->date
                ];
            }
        } else {
            $h2 = 'Rezultatų dar nėra';
            $table = [];
        }

        $content = [
            'h2' => $h2,
            'table' => $table,
            'results'=> $results
        ];

        return view('results.index')->with('content', $content);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $data = [
            'user_id' => $user->id,
            'reaction_time' => $request->reaction,
            'date' => date('Y.m.d  H:i')
        ];

        $result = new TestResults($data);

        $user->testResults()->save($result);
        $added = $user->checkForAchievement($user);

        return response($added);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        $h2 = 'Jūsų rezultatai';
        $results = Auth::user()->testResults->sortDesc()->toArray();

        if ($results) {
            $table['headers'] = [
                'Reakcijos laikas' => [],
                'Testo data' => []
            ];

            foreach ($results as $result) {
                $table['rows'][] = [
                    $result['reaction_time'],
                    $result['date']
                ];
            }
        } else {
            $h2 = 'Rezultatų nėra';
            $table = [];
        }

        $content = [
          'h2' => $h2,
          'table' => $table
        ];

        return view('results.show')->with('content', $content);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\TestResults $testResults
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestResults $testResults)
    {
        //
    }
}
