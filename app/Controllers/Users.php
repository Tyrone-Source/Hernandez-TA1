<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index()
    {
        $data['users'] = [
            [
                'username' => 'admin',
                'fullname' => 'John Rock',
                'role'     => 'Administrator'
            ],
            [
                'username' => 'cashier1',
                'fullname' => 'Mary Grace',
                'role'     => 'Cashier'
            ],
            [
                'username' => 'manager1',
                'fullname' => 'Robert Downey Jr.',
                'role'     => 'Manager'
            ],
            [
                'username' => 'staff1',
                'fullname' => 'Kevin Durant',
                'role'     => 'Staff'
            ],
            [
                'username' => 'staff2',
                'fullname' => 'Sarah Geronimo',
                'role'     => 'Staff'
            ]
        ];

        return view('users', $data);
    }
}