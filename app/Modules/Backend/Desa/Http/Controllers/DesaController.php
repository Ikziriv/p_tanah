<?php

namespace App\Modules\Backend\Desa\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Modules\Backend\Desa\Desa;
use Carbon\Carbon;
use Validator;
use Response;
use DB;

class DesaController extends Controller
{
    protected $rules =
    [
        'nama' => 'required|min:2|max:32|regex:/^[a-z ,.\'-]+$/i',
        'slug' => 'required|min:2|max:128|regex:/^[a-z ,.\'-]+$/i'
    ];

	public function index(Request $request)
	{
        $desa = Desa::orderBy('id', 'asc')->get();
		return view('.pages.desa.desa-list', compact('desa'));
	}

	public function store(Request $request)
	{
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $desa = new Desa();
            $desa->nama = $request->nama;
            $desa->slug = $request->slug;
            $desa->save();
            return response()->json($desa);
        }
	}

    public function update(Request $request, $id)
    {
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $desa = Desa::findOrFail($id);
            $desa->nama = $request->nama;
            $desa->slug = $request->slug;
            $desa->save();
            return response()->json($desa);
        }

    }

    public function destroy($id)
    {
        $desa = Desa::findOrFail($id);
        $desa->delete();

        return response()->json($desa);
    }
}
