<?php

namespace App\Controllers;

class Customers extends BaseController
{
    public function index()
    {
        $data['customers'] = [
            [
                'fullname' => 'Eldriane Dela Cruz',
                'email'    => 'eldriane@gmail.com',
                'phone'    => '09171234567'
            ],
            [
                'fullname' => 'Mario Santos',
                'email'    => 'mario@gmail.com',
                'phone'    => '09181234567'
            ],
            [
                'fullname' => 'Jose Batog',
                'email'    => 'jose@gmail.com',
                'phone'    => '09191234567'
            ],
            [
                'fullname' => 'Lapeace Lazuli',
                'email'    => 'lapeace@gmail.com',
                'phone'    => '09201234567'
            ],
            [
                'fullname' => 'Mark Flower',
                'email'    => 'mark@gmail.com',
                'phone'    => '09211234567'
            ]
        ];

        return view('customers', $data);
    }
}