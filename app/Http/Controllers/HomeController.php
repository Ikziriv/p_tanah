<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;
use App\Modules\Backend\Tanah\Tanah;
use App\Modules\Backend\Desa\Desa;
use App\Modules\Backend\Blok\Blok;
use App\Modules\Backend\Status\Status;
use Carbon\Carbon;
use Validator;
use Response;
use DB;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['tanah'] = Tanah::all()->first();
        return view('home', $data);
    }

    public function getCond_a()
    {
        $date_format = date('Y-m-d');
        $current_date = $date_format;

        $result = \DB::table('tanahs')
                    ->where('tgl_pembuatan', '<=', $current_date)
                    ->groupBy('tgl_pembuatan')
                    ->orderBy('tgl_pembuatan', 'ASC')
                    ->get([
                        DB::raw('Date(tgl_pembuatan) as date'),
                        DB::raw('COUNT(id) as value')
                    ]);
        return response()->json($result);
    }
}
