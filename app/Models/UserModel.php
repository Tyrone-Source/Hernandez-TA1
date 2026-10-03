<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'full_name', 'password', 'avatar', 'created_at'];

    protected $validationRules = [
        'username'  => 'required|min_length[3]|max_length[100]|is_unique[users.username,id,{id}]',
        'full_name' => 'required|min_length[3]|max_length[255]'
    ];

    protected $validationMessages = [
        'username' => [
            'is_unique' => 'This username is already taken.'
        ]
    ];
}