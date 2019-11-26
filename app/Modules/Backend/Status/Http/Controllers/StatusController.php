<?php

namespace App\Modules\Backend\Status\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Modules\Backend\Status\Status;
use Carbon\Carbon;
use Validator;
use Response;
use DB;

class StatusController extends Controller
{
    protected $rules =
    [
        'nama' => 'required|min:2'
    ];

	public function index(Request $request)
	{
        $status = Status::orderBy('id', 'asc')->get();
		return view('.pages.stat.stat-list', compact('status'));
	}

	public function store(Request $request)
	{
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $stat = new Status();
            $stat->nama = $request->nama;
            $stat->save();
            return response()->json($stat);
        }
	}

    public function update(Request $request, $id)
    {
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $stat = Status::findOrFail($id);
            $stat->nama = $request->nama;
            $stat->save();
            return response()->json($stat);
        }

    }

    public function destroy($id)
    {
        $stat = Status::findOrFail($id);
        $stat->delete();

        return response()->json($stat);
    }
}
