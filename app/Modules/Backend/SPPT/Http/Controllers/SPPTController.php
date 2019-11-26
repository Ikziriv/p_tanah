<?php

namespace App\Modules\Backend\SPPT\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Modules\Backend\SPPT\SPPT;
use Carbon\Carbon;
use Validator;
use Response;
use DB;

class SPPTController extends Controller
{
    protected $rules =
    [
        'kode' => 'required|min:2|max:32'
    ];

	public function index(Request $request)
	{
        $sppt = SPPT::orderBy('id', 'asc')->get();
		return view('.pages.sppt.sppt-list', compact('sppt'));
	}

	public function store(Request $request)
	{
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $sppt = new SPPT();
            $sppt->kode = $request->kode;
            $sppt->save();
            return response()->json($sppt);
        }
	}

    public function update(Request $request, $id)
    {
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $sppt = SPPT::findOrFail($id);
            $sppt->kode = $request->kode;
            $sppt->save();
            return response()->json($sppt);
        }

    }

    public function destroy($id)
    {
        $sppt = SPPT::findOrFail($id);
        $sppt->delete();

        return response()->json($sppt);
    }
}

