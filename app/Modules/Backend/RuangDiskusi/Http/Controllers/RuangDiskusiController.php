<?php

namespace App\Modules\Backend\RuangDiskusi\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Modules\Backend\RuangDiskusi\RuangDiskusi;
use Carbon\Carbon;
use Validator;
use Response;
use DB;
use Auth;
use App\User;

class RuangDiskusiController extends Controller
{
    protected $rules =
    [
        'text' => 'required'
    ];

	public function index(Request $request)
	{
        $diskusi =  RuangDiskusi::orderBy('id', 'asc')->get();
		return view('.pages.ruangdiskusi.ruangdiskusi-list', compact('diskusi'));
	}


	public function store(Request $request)
	{
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $diskusi = new RuangDiskusi();
            $diskusi->fill($request->all());
            $diskusi->save(); 

        	return redirect()->route('ruang-diskusi-index')->with('success','Diskusi sudah dikirim');
        }
	}

    public function update(Request $request, $id)
    {
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $diskusi = RuangDiskusi::findOrFail($id);
            $diskusi->text = $request->text;
            $diskusi->save();
            return response()->json($diskusi);
        }

    }

    public function destroy($id)
    {
        $diskusi = RuangDiskusi::findOrFail($id);
        $diskusi->delete();

        return response()->json($diskusi);
    }
}
