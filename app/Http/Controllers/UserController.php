<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Users; // Add this line to import the Users model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_user = DB::table('users');
        $user = $data_user->where('id', Auth()->user()->id)->first();
        $fullname = $user->fullname;
        $username = $user->username;
        $data_users = User::orderBy('id', 'asc');
        $data_users = $data_users->paginate(25);

        $no = ($data_users->currentPage() - 1) * $data_users->perPage() + 1;
        return view('pengguna.pengguna', compact('data_users', 'no', 'fullname', 'username'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data_user = DB::table('users');
        $user = $data_user->where('id', Auth()->user()->id)->first();
        $fullname = $user->fullname;
        $username = $user->username;
        return (view('pengguna.add_pengguna', compact('fullname', 'username')));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  
        $request->validate([
            'username' => 'required|unique:users',
            'fullname' => 'required',
            'password' => 'required',
            'status' => 'required',
            'role' => 'required',
            'email' => 'required|email|unique:users',
            'jabatan' => 'required',
            'nip' => 'required',
            'nomor_ponsel' => 'nullable',
        ]);

        
        
        User::create([
            'username' => $request->username,
            'fullname' => $request->fullname,
            'password' => Hash::make($request->password),
            'status' => $request->status,
            'role' => $request->role,
            'email' => $request->email,
            'jabatan' => $request->jabatan,
            'nip' => $request->nip,
            'nomor_ponsel' => $request->nomor_ponsel,

        ]);       



        return redirect()->route('user.index')->with('success', 'Data pengguna berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($user, $no)
    {
        $authenticatedUser = Auth::user();
        $fullname = $authenticatedUser->fullname;
        $username = $authenticatedUser->username;

        // Fetch all users ordered by ID
        $data_user = User::where([
            'id' => $user,
            
        ])->first();



        // dd($data_users );
        // Pass the necessary data to the view
        return view('pengguna.detail_pengguna', compact('fullname', 'username', 'data_user', 'no'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($user)
    {
        $authenticatedUser = Auth::user();
        $fullname = $authenticatedUser->fullname;
        $username = $authenticatedUser->username;

        // Fetch all users ordered by ID
        $data_user = User::where([
            'id' => $user,
            
        ])->first();


        return (view('pengguna.edit_pengguna', compact('fullname', 'username',  'data_user')));
    }
    
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user)
        {   
            $id = $user;
            $user = User::find($id);

        if (!$user) {
            // Handle the case where the model is not found
            abort(404);
        }

        if ($user->fill(request()->all())->save()) {
            return redirect()->route('user.index', ['id' => $user->id])->with('success', 'Data berhasil disimpan');
            // Replace 'your.route.name' with the actual name of the route you want to redirect to
        }

        return view('pengguna.edit_pengguna', ['user' => $user]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user)
    {
        $id = $user;
        $user = User::find($id);

        if (!$user) {
            // Handle the case where the model is not found
            abort(404);
        }

        if ($user->delete()) {
            return redirect()->route('user.index')->with('success', 'Data berhasil dihapus');
            // Replace 'your.route.name' with the actual name of the route you want to redirect to
        }

        return view('pengguna.pengguna', ['user' => $user]);
    }
    
}
