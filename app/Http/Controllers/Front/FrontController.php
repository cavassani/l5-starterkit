<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Repositories\StatesRepository;

class FrontController extends Controller
{
    private $statesRepository;

    /**
     * Create a new controller instance.
     *
     * @param StatesRepository $statesRepository
     */
    public function __construct(StatesRepository $statesRepository)
    {
        $this->statesRepository = $statesRepository;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->statesRepository->all();
        return view('home', compact('data'));
    }
}
