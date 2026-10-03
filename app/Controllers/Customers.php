<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\Controller;

class Customers extends Controller
{
    public function index()
    {
        $model = new CustomerModel();
        $data['customers'] = $model->findAll();

        return view('customers/index', $data);
    }

    public function new()
    {
        return view('customers/new');
    }

    public function create()
    {
        $model = new CustomerModel();

        $data = [
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
            'phone'     => $this->request->getPost('phone'),
        ];

        if (!$model->insert($data)) {
            // If validation or insertion fails, return to form with errors
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->to('/customers')->with('success', 'Customer created successfully.');
    }

    public function edit($id = null)
    {
        $model = new CustomerModel();
        $data['customer'] = $model->find($id);

        if (empty($data['customer'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Customer not found: ' . $id);
        }

        return view('customers/edit', $data);
    }

    public function update($id = null)
    {
        $model = new CustomerModel();

        $data = [
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
            'phone'     => $this->request->getPost('phone'),
        ];

        $model->update($id, $data);

        return redirect()->to('/customers')->with('success', 'Customer updated successfully.');
    }
}