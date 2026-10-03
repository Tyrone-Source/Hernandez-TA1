<?php namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $data['users'] = $model->findAll();
        return view('users/index', $data);
    }

    public function new()
    {
        helper(['form']);
        return view('users/new');
    }

    public function create()
    {
        helper(['form']);
        $model = new UserModel();

        $data = [
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
            'password'  => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        $avatarFile = $this->request->getFile('avatar');
        if ($avatarFile && $avatarFile->isValid() && !$avatarFile->hasMoved()) {
            $validationRule = [
                'avatar' => 'uploaded[avatar]|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,2048]'
            ];
            if ($this->validate($validationRule)) {
                $newName = $avatarFile->getRandomName();
                $avatarFile->move(FCPATH . 'uploads/avatars', $newName);
                $data['avatar'] = $newName;
            } else {
                return view('users/new', [
                    'validation' => $this->validator,
                    'old' => $data
                ]);
            }
        }

        if (!$model->save($data)) {
            return view('users/new', [
                'validation' => $model->validator,
                'old' => $data
            ]);
        }

        return redirect()->to('/users')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        helper(['form']);
        $model = new UserModel();
        $data['user'] = $model->find($id);

        if (!$data['user']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("User with id $id not found.");
        }

        return view('users/edit', $data);
    }

    public function update($id)
    {
        helper(['form']);
        $model = new UserModel();
        $currentUser = $model->find($id);

        $data = [
            'id'        => $id,
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
        ];

        $model->setValidationRule('username', "required|min_length[3]|max_length[100]|is_unique[users.username,id,{$id}]");

        $avatarFile = $this->request->getFile('avatar');
        if ($avatarFile && $avatarFile->isValid() && !$avatarFile->hasMoved()) {
            $validationRule = [
                'avatar' => 'uploaded[avatar]|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,2048]'
            ];
            if ($this->validate($validationRule)) {
                $newName = $avatarFile->getRandomName();
                $avatarFile->move(FCPATH . 'uploads/avatars', $newName);

                if (!empty($currentUser['avatar']) && file_exists(FCPATH . 'uploads/avatars/' . $currentUser['avatar'])) {
                    @unlink(FCPATH . 'uploads/avatars/' . $currentUser['avatar']);
                }

                $data['avatar'] = $newName;
            } else {
                return view('users/edit', [
                    'user'       => array_merge($currentUser, $data),
                    'validation' => $this->validator
                ]);
            }
        }

        if (!$model->save($data)) {
            return view('users/edit', [
                'user'       => array_merge($currentUser, $data),
                'validation' => $model->validator
            ]);
        }

        return redirect()->to('/users')->with('success', 'User updated successfully.');
    }
}