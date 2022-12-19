<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Providers\Model\UserModel;
use Hash;
use NumberFormatter;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function users()
    {
        $user = User::all();
        return view('user.user', compact('user'));
    }

    public function saveuser(Request $request)
    {
        $obj['name']       = $request->name;
        $obj['email']      = $request->email;
        $obj['password']   = Hash::make($request->password);
        $obj['created_at'] = date('Y-m-d H:i:s');
        $email =  UserModel::searchEmail($obj);
        if ($email != true) {
            UserModel::saveuser($obj);
            $type    = 'success';
            $message = 'Data User Berhasil';
        }else{
            $type    = 'failed';
            $message = 'Email Sudah Terdaftar';
        }
        
        return redirect('users')->with($type, $message);
    }

    public function storeuser(Request $request)
    {
        $obj['id']         = $request->id;
        $obj['name']       = $request->name;
        $obj['email']      = $request->email;
        $obj['updated_at'] = date('Y-m-d H:i:s');
        if ($request->password == null) {
            $obj['password']   = $request->password_old;
        }else{
            $obj['password']   = Hash::make($request->password);
        }
        UserModel::storeuser($obj);
        return redirect('users')->with('success', 'Data User Berhasil Update');
    }

    public function destroyuser($id)
    {
        $obj['id']  = $id;
        UserModel::destroyuser($obj);
        return redirect('users')->with('success', 'Data User Berhasil Update');
    }

    public function pseudocode()
    {
        $in_words = false;
        $number = null;
        return view('pseudocode', compact('in_words','number'));
    }

    public function searchangka(Request $request)
    {
        // NOTE
        // 1. Buka xampp
        // 2. ubah php.ini ;extension=intl ( hapus ; )

        $number = $request->text;
        $locale = 'id_ID';
        $fmt = numfmt_create($locale, NumberFormatter::SPELLOUT);
        $in_words = numfmt_format($fmt, $number);

        #$print = echo($in_words);
        #dd('tes');
        return view('pseudocode', compact('in_words','number'));
    }
}
