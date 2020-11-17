<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\TestResults;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $results = TestResults::all()->sortDesc()->take(5);

        if ($results->toArray()) {
            $h2 = 'Paskutiniai rezultatai';
            $h3 = 'Manai gali geriau ? Įrodyk !';

            $table['headers'] = [
                'Vartotojo vardas' => [],
                'Reakcijos laikas' => [],
            ];

            foreach ($results as $result) {
                $table['rows'][] = [
                    $result->user->name,
                    $result->reaction_time
                ];
            }
        } else {
            $h2 = 'Niekas dar nedalyvavo !';
            $h3 = 'Parodyk, ką gali !';
            $table = [];
        }

        $content = [
            'h2' => $h2,
            'h3' => $h3,
            'table' => $table
        ];

        return view('welcome')->with('content', $content);
    }
}
