<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Users; // Add this line to import the Users model
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function apiIndex()
    {
        $data_user = DB::table('users');
        $users = $data_user->get();
        return response()->json([
            'success' => true,
            'data' => $users
        ]);
    }

    public function apiShow($id)
    {
        try {
            $user = User::findOrFail($id);
            return response()->json([
                'success' => true,
                'data' => $user
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'User not found',
            ], 404);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error',
            ], 500);
        }
    }

    public function apiStore(Request $request)
    {
        try {
            $request->validate([
                'username' => 'required|unique:users',
                'fullname' => 'required|max:255|string',
                'password' => 'required|min:8|same:confirm_password',
                'confirm_password' => 'required|min:8',
                'status' => 'required|max:255|string',
                'role' => 'required|max:255|string',
                'jabatan' => 'required|max:255|string',
                'nip' => 'required|max:255|string',
                'nomor_ponsel' => 'required|max:255|string',
                'email' => 'required|max:255|string|email',
            ]);
            $user = User::create([
                'username' => $request->username,
                'fullname' => $request->fullname,
                'password' => Hash::make($request->password),
                'status' => $request->status,
                'role' => $request->role,
                'jabatan' => $request->jabatan,
                'nip' => $request->nip,
                'nomor_ponsel' => $request->nomor_ponsel,
                'email' => $request->email,
            ]);

            return response()->json([
                'success' => true,
                'data' => $user
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'error' => "Internal server error" . $e->getMessage()
            ], 500);
        }
    }

    public function apiUpdate(Request $request, $id)
    {
        try {
            $request->validate([
                'username' => 'required',
                'fullname' => 'required|max:255|string',
                'password' => 'min:8|same:confirm_password',
                'confirm_password' => 'min:8',
                'status' => 'required|max:255|string',
                'role' => 'required|max:255|string',
                'jabatan' => 'required|max:255|string',
                'nip' => 'required|max:255|string',
                'nomor_ponsel' => 'required|max:255|string',
                'email' => 'required|max:255|string|email',
            ]);
            $user = User::where('id', $id)->update([
                'username' => $request->username,
                'fullname' => $request->fullname,
                'password' => Hash::make($request->password),
                'status' => $request->status,
                'role' => $request->role,
                'jabatan' => $request->jabatan,
                'nip' => $request->nip,
                'nomor_ponsel' => $request->nomor_ponsel,
                'email' => $request->email,
            ]);
            return response()->json([
                'success' => true,
                'data' => $user
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'error' => "Internal server error" . $e->getMessage()
            ], 500);
        }
    }

    public function apiDestroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return response()->json([
                'success' => true,
                'message' => 'User deleted successfully'
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'User not found',
            ], 404);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Internal server error',
            ], 500);
        }
    }

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
