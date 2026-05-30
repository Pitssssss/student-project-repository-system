<?php

namespace App\Controllers;

use App\Models\ProjectModel;

class ProjectController extends BaseController

{
    public function index()
    {
        $model = new ProjectModel();
        $model->select('id, student_name, email, project_title, description, file');

        $keyword = $this->request->getGet('keyword');

        if ($keyword) {
            $model->groupStart()
                ->like('student_name', $keyword)
                ->orLike('project_title', $keyword)
                ->groupEnd();
        }

        $data = [
            'projects' => $model->paginate(5),
            'pager' => $model->pager,
            'keyword' => $keyword,
            'total' => $model->countAll()
        ];

        return view('projects/index', $data);
    }

    public function create()
    {
        return view('projects/create');
    }

    public function store()
    {
        $rules = [
            'student_name' => 'required|min_length[3]',
            'email' => 'required|valid_email',
            'project_title' => 'required|min_length[3]',
            'description' => 'required',
            'file' => 'uploaded[file]|max_size[file,2048]|ext_in[file,pdf,doc,docx,png,jpg,jpeg]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $uploadedFile = $this->request->getFile('file');
        $newName = $uploadedFile->getRandomName();
        $uploadedFile->move(WRITEPATH . 'uploads', $newName);

        $model = new ProjectModel();

        $model->save([
            'student_name' => $this->request->getPost('student_name'),
            'email' => $this->request->getPost('email'),
            'project_title' => $this->request->getPost('project_title'),
            'description' => $this->request->getPost('description'),
            'file' => $newName,
        ]);
        $email = service('email');

$email->setTo($this->request->getPost('email'));
$email->setSubject('Project Submission Confirmation');

$email->setMessage('
    <h2>Project Submitted Successfully</h2>
    <p>Hello ' . esc($this->request->getPost('student_name')) . ',</p>
    <p>Your project <strong>' . esc($this->request->getPost('project_title')) . '</strong> has been successfully submitted.</p>
    <p>Thank you for using the Student Project Repository System.</p>
');

$email->setAltMessage(
    'Hello ' . $this->request->getPost('student_name') .
    ', your project "' . $this->request->getPost('project_title') .
    '" has been successfully submitted.'
);

if ($email->send()) {
    log_message('info', 'Email sent successfully to ' . $this->request->getPost('email'));
} else {
    log_message('error', 'Email failed to send: ' . print_r($email->printDebugger(['headers']), true));
}
        return redirect()->to('/projects')->with('success', 'Project submitted successfully!');
    }

    public function download($filename)
    {
        return $this->response->download(WRITEPATH . 'uploads/' . $filename, null);
    }
}