<?php

namespace Modules\Student\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Modules\Student\Models\StudentModel;

class StudentController extends BaseController
{
    public function index()
    {
        $studentObj = new StudentModel();
        $students = $studentObj->findAll();
        return view('Modules\Student\Views\student_index', ['students' => $students]);
    }

    public function addStudent()
    {
        if ($this->request->getMethod() == 'POST') {

            $rules = [
                'name' => 'required',
                'email' => 'required|valid_email',
                'phone' => 'required'
            ];

            if (!$this->validate($rules)) {
                return view('Modules\Student\Views\student_add', [
                    'validation' => $this->validator
                ]);
            }

            $name = $this->request->getVar('name');
            $email = $this->request->getVar('email');
            $phone = $this->request->getVar('phone');
            $image = $this->request->getFile('profile_image');

            $profile_image = "";
            if ($image->isValid() && !$image->hasMoved()) {
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

            $studentObj = new StudentModel();
            $session = session();

            if ($studentObj->insert((object) $data)) {
                $session->setFlashdata('success', 'Student added successfully');
            } else {
                $session->setFlashdata('error', 'Student not added');
            }
            return redirect('student');
        }
        return view('Modules\Student\Views\student_add');
    }

    public function editStudent($id)
    {
        $studentObj = new StudentModel();
        $student = $studentObj->where('id', $id)->first();
        if ($this->request->getMethod() == "PUT") {
            $name = $this->request->getVar('name');
            $email = $this->request->getVar('email');
            $phone = $this->request->getVar('phone_number');
            $image = $this->request->getFile('profile_image');
            $profile_image = $student['profile_image'];

            if (isset($image) && !empty($image->getPath())) {
                $file_name = $image->getName();
                if ($image->move("image", $file_name)) {
                    $profile_image = base_url('uploads/' . $file_name);
                }
            }

            $data = [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'profile_image' => $profile_image
            ];

            if ($studentObj->update($id, (object) $data)) {
                $session = session();
                $session->setFlashdata('success', 'Student updated successfully');
            } else {
                $session = session();
                $session->setFlashdata('error', 'Student not updated');
            }
            return redirect('student');
        }
        return view('Modules\Student\Views\student_edit', [
            'student' => $student
        ]);
    }

    public function deleteStudent($id)
    {
        $studentObj = new StudentModel();
        $student = $studentObj->where('id', $id)->first();
        if ($student) {
            $studentObj->delete($id);
            $session = session();
            $session->setFlashdata('success', 'Student deleted successfully');
        } else {
            $session = session();
            $session->setFlashdata('error', 'Student not deleted');
        }
        return redirect('student');
    }
}
