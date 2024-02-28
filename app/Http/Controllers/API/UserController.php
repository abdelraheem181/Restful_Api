<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Access\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show']);
    }
    public function index(Request $request)
    {
        $limit = $request->input('limit') <= 50 ?  $request->input('limit') : 15 ;
      $user =  UserResource::collection(User::paginate($limit));
        return $user->response()->setStatusCode(200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  
        $this->authorize('create', User::class);
        $user = new UserResource(User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]));
        return $user->response()->setStatusCode(200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = new UserResource(User::findOrFail($id));

        return $user->response()->setStatusCode(200, 'User Returned Successfully')
        ->header('Additional Header', 'True');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    { 
          $iduser = User::findOrFail($id);
        $this->authorize('update', $iduser);
        $User = new UserResource(User::findOrFail($id));
        $User->update($request->all());
        return $User->response()->setStatusCode(200, 'User Returned Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {   $iduser = User::findOrFail($id);
        $this->authorize('delete', $iduser);
        User::find($id)->delete();
        return 204;
    }
}
