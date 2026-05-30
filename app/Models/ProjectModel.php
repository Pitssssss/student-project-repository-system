<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $table = 'projects';
    protected $primaryKey = 'id';

    protected $allowedFields = [
    'student_name',
    'email',
    'project_title',
    'description',
    'file'
];

    protected $useTimestamps = true;
}