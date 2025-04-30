<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Branches;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function firstUser()
    {
        User::create([
            'name' => 'Lizeth Rodriguez',
            'email' => 'lizeth@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'Administrador',
            'status' => 1,
            'photo' => '',
            'id_branch' => 0,
            'last_login' => '',

        ]);

        return "Usuario creado";
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role != 'Administrador') {
            return redirect()->route('start');
        } 
        $users = User::with('branch')->get();
        $branches = Branches::where('state', 1)->get();
        return view('modules.users.users', compact('users', 'branches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $imagePath = '';
        if ($request->hasFile('photo')) {
            $imagePath = $request->file('photo')->store('users', 'public');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'id_branch' => $request->branch_id,
            'password' => Hash::make($request->password),
            'photo' => $imagePath,
            'status' => 1,
            'last_login' => '',
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $imagePath = '';
        if ($request->hasFile('photo')) {
            $imagePath = $request->file('photo')->store('users', 'public');
        }
        User::where('id', $request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'id_branch' => $request->branch_id,
            'password' => Hash::make($request->password),
            'photo' => $imagePath,
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function changeStatus($status, $id)
    {
        User::where('id', $id)->update([
            'status' => $status
        ]);

        return redirect()->route('users.index')->with('success', 'Estado actualizado con éxito');
    }
}
