<?php

namespace App\Tests;

use CodeIgniter\Test\CIUnitTestCase;

class ProjectTest extends CIUnitTestCase
{
    public function testHomePage()
    {
        $this->assertTrue(true);
    }

    public function testValidationPass()
    {
        $validation = service('validation');

        $validation->setRules([
            'email' => 'required|valid_email'
        ]);

        $this->assertTrue(
            $validation->run([
                'email' => 'test@gmail.com'
            ])
        );
    }

    public function testProjectTitleEquals()
    {
        $projectTitle = 'Student Project Repository System';

        $this->assertEquals('Student Project Repository System', $projectTitle);
    }
}