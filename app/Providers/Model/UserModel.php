<?php

namespace App\Providers\Model;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use DB;

class UserModel extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    public function __construct()
    {

    }

    public function getAllUser()
    {
        $result = DB::table('users')
                            ->select('id','name','email')
                            ->get();
        return $result;
    }

    public function searchEmail($obj)
    {
        $result = DB::table('users')
                        ->select('id','email')
                        ->where('email', $obj['email'])
                        ->first();
        return $result;
    }

    public function saveuser($obj)
    {
        $result = DB::table('users')->insert([
                        'name' => $obj['name'],
                        'email' => $obj['email'],
                        'password' => $obj['password'],
                        'created_at' => $obj['created_at']
                ]);
        return $result;
    }

    public function storeuser($obj)
    {
        $result = DB::table('users')
                        ->where('id', $obj['id'])
                        ->update([
                            'name'     => $obj['name'],
                            'email'    => $obj['email'],
                            'password' => $obj['password'],
                            'updated_at' => $obj['updated_at']
                        ]);
        return $result;
    }

    public function destroyuser($obj)
    {
        $id = $obj['id'];
        $user = User::find($id);
        $user->delete();
        return $user;
    }
}
