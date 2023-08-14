<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Exception;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $offset = $request->query('offset', 0);
        $limit = $request->query('limit', 5);
       
        $user = User::offset($offset)->limit($limit)->get();
        
        return response()->json([
            'status' => 'success',
            'message' => 'user details get successfully!',
            'data' => $user
        ]);
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
        try {
           
            $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required',
            ]);
    
            $data = $request->all();
            $user = new User();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = $data['password'];
            $user->save();
    
            return response()->json([
                'status' => 'success',
                'message' => 'user added successfully!'
            ]);
        }catch (Exception $e) {
              return $e->getMessage();
        }
       
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();


        $user = user::find($id);
        
        if ($user != null) {

            // $user->name = isset($data['name']) ? $data['name']: $user->name ;
            // $user->email = isset($data['email']) ? $data['email'] : $user->email;
            // $user->save();

            $user->update($data);
            
            return response()->json([
                'status' => 'success',
                'message' => 'user updated successfully!'
            ]);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'user not found'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if ($user != null) {

            $user->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'user deleted successfully!'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'user not found'
            ]);
        }
    }
}
