<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AuthController extends BaseController
{
    protected $users;

    public function __construct()
    {
        helper('form');

        // Daftar user
        $this->users = [
            [
                'username' => 'rafa',
                'password' => '$2a$12$im4tKnAm.QmP/UTp3mVSBuUj3TtP.yhtBMxp7iDum9aN0jKBrVh7u', // bcrypt('123456')
                'role' => 'user'
            ],
            [
                'username' => 'admin',
                'password' => '$2a$12$8zfi8rdKziZBcl0F8SvYLuLkAi4QqydoePxOI5wYTZMO2miSN0SxS', // bcrypt('admin123')
                'role' => 'admin'
            ]
        ];
    }

    public function login()
    {
        if ($this->request->getPost()) {
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');

            $userFound = null;

            // Cari user berdasarkan username
            foreach ($this->users as $user) {
                if ($user['username'] === $username) {
                    $userFound = $user;
                    break;
                }
            }

            if ($userFound) {
                if (password_verify($password, $userFound['password'])) { 
                    session()->set([
                        'username' => $userFound['username'],
                        'role' => $userFound['role'],
                        'isLoggedIn' => true
                    ]);
                    return redirect()->to('main');
                } else {
                    session()->setFlashdata('failed', 'Password salah');
                    return redirect()->back();
                }
            } else {
                session()->setFlashdata('failed', 'Username tidak ditemukan');
                return redirect()->back();
            }
        }

        return view('login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
