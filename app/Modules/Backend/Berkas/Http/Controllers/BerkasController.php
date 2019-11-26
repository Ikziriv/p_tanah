<?php

namespace App\Modules\Backend\Berkas\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Modules\Backend\Berkas\Berkas;
use Carbon\Carbon;
use Validator;
use Response;
use DB;

class BerkasController extends Controller
{
    protected $rules =
    [
        'nama' => 'required|min:2|max:32',
        'slug' => 'required|min:2|max:128'
    ];
    
	public function index(Request $request)
	{
        $berkas = Berkas::orderBy('id', 'asc')->get();
		return view('.pages.berkas.berkas-list', compact('berkas'));
	}

	public function store(Request $request)
	{
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $berkas = new Berkas();
            $berkas->nama = $request->nama;
            $berkas->slug = $request->slug;
            $berkas->save();
            return response()->json($berkas);
        }
	}

    public function update(Request $request, $id)
    {
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $berkas = Berkas::findOrFail($id);
            $berkas->nama = $request->nama;
            $berkas->slug = $request->slug;
            $berkas->save();
            return response()->json($berkas);
        }

    }

    public function destroy($id)
    {
        $berkas = Berkas::findOrFail($id);
        $berkas->delete();

        return response()->json($berkas);
    }
}
