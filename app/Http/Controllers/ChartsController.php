<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class ChartsController extends Controller
{
   


public function index()
{
    $chart_options = [
        'chart_title' => 'Nombre d utilisateurs par mois',
        'report_type' => 'group_by_date',
        'model' => 'App\User',
        'group_by_field' => 'created_at',
        'group_by_period' => 'month',
        'chart_type' => 'bar',
        'filter_field' => 'created_at',
        'filter_days' => 30, // show only last 30 days
    ];

    $chart1 = new LaravelChart($chart_options);


    $chart_options = [
        'chart_title' => 'Nombre de cours par filiere',
        'report_type' => 'group_by_string',
        'model' => 'App\Filiere',

        'relationship_name' => 'cours', 
 


        'aggregate_function' => 'count',
        'aggregate_field' => 'id',

        'group_by_field' => 'name',
 
    
        'filter_field' => 'titre',
        'chart_type' => 'pie',



     // show users only registered this month
    ];

    $chart2 = new LaravelChart($chart_options);

    $chart_options = [
        'chart_title' => 'Disscussions par jour',
        'report_type' => 'group_by_date',
        'model' => 'App\Thread',
        'group_by_field' => 'created_at',
        'group_by_period' => 'day',
        'aggregate_field' => 'id',
        'chart_type' => 'line',
    ];

    $chart3 = new LaravelChart($chart_options);

    return view('Admin.dashboard', compact('chart1', 'chart2', 'chart3'));
}



}
