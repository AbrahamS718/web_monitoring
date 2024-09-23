<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ManageUser extends Controller
{
    public function listUser()
    {
        $users = DB::table('users')->get();

        return view('admin.userView', ['users' => $users]);
    }

    public function deleteUser(Request $request)
    {
        $id = $request['index'];

        DB::table('users')->where('id', $id)->delete();
        return redirect()->route('admin.listUser');
    }

    public function editUser(Request $request)
    {
        $action = $request['index'];

        if ($action == 'view') {
            $id = $_GET['id'];

            $user = DB::table('users')->where('id', $id)->get();
            return view('admin.userEdit', ['user' => $user]);
        } elseif ($action == 'save') {
            $id = $_GET['id'];

            if ($_GET['password'] != "") {
                $data = [
                    'name' => $_GET['name'],
                    'email' => $_GET['email'],
                    'password' => Hash::make($_GET['password']),
                    'role' => $_GET['role'],
                ];

                DB::table('users')->where('id', $id)->update($data);
            } else {
                $data = [
                    'name' => $_GET['name'],
                    'email' => $_GET['email'],
                    'role' => $_GET['role'],
                ];

                DB::table('users')->where('id', $id)->update($data);
            }

            return redirect()->route('admin.listUser');
        }
    }
}
