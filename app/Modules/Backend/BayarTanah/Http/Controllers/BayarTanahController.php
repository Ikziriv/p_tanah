<?php

namespace App\Modules\Backend\BayarTanah\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Modules\Backend\BayarTanah\BayarTanah;
use Carbon\Carbon;
use Validator;
use Response;
use DB;

class BayarTanahController extends Controller
{
    
	public function index(Request $request)
	{
        $harga = BayarTanah::orderBy('id', 'asc')->get();
		return view('.pages.harga.harga-list', compact('harga'));
	}

    public function destroy($id)
    {
        $harga = BayarTanah::findOrFail($id);
        $harga->delete();

        return response()->json($harga);
    }
}
