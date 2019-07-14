<?php

namespace App\Http\Controllers;

use App\User;
use App\WorkOrder;
use Illuminate\Http\Request;

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
        $nextWO = WorkOrder::whereNull('status')->count();
        if (auth()->user()->isTechnician()) {
            $nextWo = WorkOrder::whereIn('source', auth()->user()->getWorkLocations())->whereNull('status')->count();
        }

        return view('home')->with([
            'workOrders' => WorkOrder::all(),
            'nextWO' => $nextWO,
            'technicians' => User::where('role', 'technician')->count()
        ]);
    }

    /**
     * Show the hello test page
     *
     * @return Illuminate\Contracts\Support\Renderable
     */
    public function hello()
    {
        return 'Hello there';
    }
}
