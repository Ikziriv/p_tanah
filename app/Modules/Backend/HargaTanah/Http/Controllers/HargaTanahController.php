<?php

namespace App\Modules\Backend\HargaTanah\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Modules\Backend\HargaTanah\HargaTanah;
use Carbon\Carbon;
use Validator;
use Response;
use DB;

class HargaTanahController extends Controller
{
    protected $rules =
    [
        'harga' => 'required'
    ];
    
	public function index(Request $request)
	{
        $harga = HargaTanah::orderBy('id', 'asc')->get();
		return view('.pages.harga.harga-list', compact('harga'));
	}

    public function create()
    {
        return view('.pages.harga.harga-create');
    }

	public function store(Request $request)
	{
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $harga = new HargaTanah();
            $harga->harga = $request->harga;
            $harga->keterangan = $request->keterangan;
            $harga->status = $request->status;
            $harga->save();
            return response()->json($harga);
        }
	}

    public function edit($id)
    {
        $harga = HargaTanah::findOrFail($id);
        return view('.pages.harga.harga-edit', compact('harga'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $harga = HargaTanah::findOrFail($id);
            $harga->harga = $request->harga;
            $harga->keterangan = $request->keterangan;
            $harga->status = $request->status;
            $harga->save();
            return response()->json($harga);
        }

    }

    public function update_status(Request $request)
    {
        $harga = HargaTanah::findOrFail($request->is_active);
        if($harga->is_active == 1){
            $harga->is_active = 0;
        } else {
            $harga->is_active = 1;
        }
        return response()->json([
          'data' => [
            'success' => $harga->save(),
          ]
        ]);
    }

    public function is_active(Request $request)
    {
        $harga = HargaTanah::findOrFail($request->is_active);

        if($harga->active == 1){
            $harga->active = 0;
        } else {
            $harga->active = 1;
        }

        // return your success response or redirect
    }

    public function destroy($id)
    {
        $harga = HargaTanah::findOrFail($id);
        $harga->delete();
        return redirect()->route('harga-index');
    }
}
