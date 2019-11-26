<?php

namespace App\Modules\Backend\Blok\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Modules\Backend\Blok\Blok;
use Carbon\Carbon;
use Validator;
use Response;
use DB;

class BlokController extends Controller
{
    protected $rules =
    [
        'kode' => 'required|numeric'
    ];

	public function index(Request $request)
	{
        $blok =  Blok::orderBy('id', 'asc')->get();
		return view('.pages.blok.blok-list', compact('blok'));
	}

	public function store(Request $request)
	{
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $blok = new Blok();
            $blok->kode = $request->kode;
            $blok->save();
            return response()->json($blok);
        }
	}

    public function update(Request $request, $id)
    {
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $blok = Blok::findOrFail($id);
            $blok->kode = $request->kode;
            $blok->save();
            return response()->json($blok);
        }

    }

    public function destroy($id)
    {
        $blok = Blok::findOrFail($id);
        $blok->delete();

        return response()->json($blok);
    }
}
