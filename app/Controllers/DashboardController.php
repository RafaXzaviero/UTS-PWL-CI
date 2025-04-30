<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class DashboardController extends BaseController
{
    public function admin()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/' . session()->get('role'));
        }

        $data = [
            'nama' => session()->get('username'),
            'role' => 'admin'
        ];
        return view('main/admin', $data);
    }

    public function user()
    {
        if (session()->get('role') !== 'user') {
            return redirect()->to('/' . session()->get('role'));
        }

        $data = [
            'nama' => session()->get('username'),
            'role' => 'user',
            'saldo' => 250000,
            'status_member' => 'Gold'
        ];
        return view('main/user', $data);
    }

    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        return view('main');
    }
}
