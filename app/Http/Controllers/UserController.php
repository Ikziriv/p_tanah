<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Validator;
use Response;
use App\User;
use DB;

class UserController extends Controller
{
    protected $rules =
    [
        'nama' => 'required'
    ];
    
	public function index(Request $request)
	{
        $users = Cache::rememberForever('users:all', function () {
            return User::orderBy('id', 'asc')->simplePaginate(7);
        });
		$page = $request->has('page') ? $request->query('page') : 1;
		// $roles = Role::simplePaginate(7);
		// $permis = Permission::simplePaginate(7);
		return view('.pages.user.user-list', compact('users'));
	}

    public function create()
    {
        return view('.pages.user.user-create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $user = new User();
            $user->nama = $request->nama;
            $user->username = $request->username;
            $user->role = $request->role;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->tlp = $request->tlp;
            $user->is_active = $request->is_active;
            $user->save();
            return response()->json($user);
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('.pages.user.user-edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $user = User::findOrFail($id);
            $user->nama = $request->nama;
            $user->username = $request->username;
            $user->role = $request->role;
            $user->email = $request->email;
            // $user->password = bcrypt($request->password);
            $user->tlp = $request->tlp;
            $user->is_active = $request->is_active;
            $user->save();
            return response()->json($user);
        }

    }

    public function settings($id)
    {
        if ( $id == Auth::User()->id ) {
            return view('.pages.user.user-setting');
        } else {
            return redirect('/');
        }
    }

    public function updateProfile(Request $request, $id)
    {
        $this->validate($request, [
            'full_name' => 'max:35',
            'address' => 'max:35'
        ]);

        $user = User::find($id);

        if ($request->file('profile_picture') === null) {
            $path = $user->profile_picture;
        } else {
            $fileExtension = $request->file('profile_picture')->getClientOriginalExtension();
            $fileName = bin2hex(openssl_random_pseudo_bytes(7)) . '.' . $fileExtension;
            $request->file('profile_picture')
                    ->move(base_path() . '/public/images/user/', $fileName);
            $path = '/images/user/' . $fileName;
            $user->profile_picture = $path;
        }

        $user_data = array(
            $user->profile_picture = $path,
            $user->full_name = $request->input('full_name'),
            $user->address = $request->input('address')
        );

        $user->update($user_data);

        return redirect('user/settings/' . $user->id)->with(['status' => 'Profile updated']);
    }

    public function updateAccount(Request $request, $id)
    {
        $user = User::find($id);

        if ( $request->input('nama') !== $user->nama ) {
            $this->validate($request, [
                'nama' => 'unique:users|max:20',
                'email' => 'required|max:35',
            ]);
        }

        $is_active = 1;

        if ( !empty($request->input('is_active')) ) {
            $is_active = $request->input('is_active');
        }

        $account_data = array(
            $user->nama = $request->input('nama'),
            $user->email = $request->input('email'),
            $user->is_active = $is_active
        );

        $user->update($account_data);

        return redirect('user/settings/' . $user->id)->with(['status' => 'Account updated']);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json($user);
    }
}
