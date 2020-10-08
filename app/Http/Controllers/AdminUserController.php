<?php

namespace App\Http\Controllers;

use App\Roles;
use App\User;
use App\UserRole;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminUserController extends Controller
{
    // private $user;
    // public function __construct(User $user)
    // {
    //     $this->user = $user;
    // }

    public function index(){
        $users = User::all();
        return view('users.list', compact('users'));
    }

    public function create(){
        $roles = Roles::all();
        return view('users.add', compact('roles'));
    }

    public function store(Request $request){
       try{
            DB::beginTransaction();
            //user
            $data = $request->except('role_id');
            $user = User::create($data);
            //user_role
            $role_id = $request->role_id;
            $user->roles()->attach($role_id);// c2: use belongtoMany attach add role_user
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
            Log::error('Message :'.$e->getMessage() . '---- Line : '. $e->getLine());
            echo "error : ". $e->getMessage();  
       }
        // c1: foreach create
        // foreach($role_id as $id){
        //     UserRole::create([
        //         'user_id' => $user->id,
        //         'role_id' => $id
        //     ]);
        // }
        return redirect()->route('list.users');
    }
}
