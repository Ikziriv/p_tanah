<?php

namespace App\Modules\Backend\Role\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use App\Modules\Backend\Role\Role;
use DB;
use Carbon\Carbon;
use Validator;

class RoleController extends Controller
{
	public function index(Request $request)
	{
		$page = $request->has('page') ? $request->query('page') : 1;
        $roles = Cache::remember('role:all'. '_page_' . $page, 3, function () {
            return Role::orderBy('id', 'asc')->simplePaginate(7);
        });
		return view('.pages.role.role-list', compact('roles'));
	}
}
