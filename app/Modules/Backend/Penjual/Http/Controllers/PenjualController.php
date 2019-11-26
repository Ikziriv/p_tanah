<?php

namespace App\Modules\Backend\Penjual\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Modules\Backend\Penjual\Penjual;
use Carbon\Carbon;
use Validator;
use Response;
use DB;

class PenjualController extends Controller
{
    protected $rules =
    [
        'ktp' => 'required|unique:penjuals'
    ];
    
	public function index(Request $request)
	{
        $penjual = Penjual::orderBy('id', 'asc')->get();
		return view('.pages.penjual.penjual-list', compact('penjual'));
	}

	public function store(Request $request)
	{
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $penjual = new Penjual();
            $penjual->ktp = $request->ktp;
            $penjual->nama = $request->nama;
            $penjual->alamat = $request->alamat;
            $penjual->tlp = $request->tlp;
            $penjual->email = $request->email;
            $penjual->save();
            return response()->json($penjual);
        }
	}

    public function update(Request $request, $id)
    {
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $penjual = Penjual::findOrFail($id);
            $penjual->nama = $request->nama;
            $penjual->nama = $request->nama;
            $penjual->alamat = $request->alamat;
            $penjual->tlp = $request->tlp;
            $penjual->email = $request->email;
            $penjual->save();
            return response()->json($penjual);
        }

    }

    public function destroy($id)
    {
        $penjual = Penjual::findOrFail($id);
        $penjual->delete();

        return response()->json($penjual);
    }
}
