<?php

namespace Modules\Student\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use Modules\Student\Models\StudentModel;

class ApiController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $studentObj = new StudentModel();
        $students = $studentObj->findAll();
        return $this->respond([
            'status' => true,
            'message' => 'Students list',
            'data' => $students
        ]);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        $studentObj = new StudentModel();
        $student = $studentObj->find($id);
        if ($student) {
            return $this->respond([
                'status' => true,
                'message' => 'Student details',
                'data' => $student
            ]);
        } else {
            return $this->failNotFound('No student found');
        }
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */

    public function create()
    {
        $studentObj = new StudentModel();
        $name = $this->request->getVar('name');
        $email = $this->request->getVar('email');
        $phone = $this->request->getVar('phone');
        $image = $this->request->getFile('profile_image');

        $profile_image = '';

        if (isset($image) && !empty($image->getPath())) {
            $profile_image = $image->getName();
            $image->move(ROOTPATH . 'public/uploads', $profile_image);
            $profile_image = base_url('uploads/' . $profile_image);
        }

        $data = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'profile_image' => $profile_image
        ];

        if ($studentObj->insert((object) $data)) {
            return $this->respondCreated('Student added');
        } else {
            return $this->fail('Student not added');
        }
    }


    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        $studentObj = new StudentModel();
        $name = $this->request->getVar('name');
        $email = $this->request->getVar('email');
        $phone = $this->request->getVar('phone');
        $image = $this->request->getFile('profile_image');

        $profile_image = '';

        if (isset($image) && !empty($image->getPath())) {
            $profile_image = $image->getName();
            $image->move(ROOTPATH . 'public/uploads', $profile_image);
            $profile_image = base_url('uploads/' . $profile_image);
        }

        $data = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'profile_image' => $profile_image
        ];

        if ($studentObj->update($id, (object) $data)) {
            return $this->respondCreated('Student Updated');
        } else {
            return $this->fail('Student not Updated');
        }
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        $studentObj = new StudentModel();
        $student = $studentObj->find($id);
        if ($student) {
            $studentObj->delete($id);
            return $this->respondDeleted('Student deleted');
        } else {
            return $this->failNotFound('No student found');
        }
        
    }
}
