<!DOCTYPE html>
<html>
<head>
    <title>Submit Project</title>
</head>
<body>

<h1>Submit Student Project</h1>

<a href="/projects">Back to Projects</a>

<?php if (session()->getFlashdata('errors')): ?>
    <?php foreach (session()->getFlashdata('errors') as $error): ?>
        <p style="color:red;"><?= esc($error) ?></p>
    <?php endforeach; ?>
<?php endif; ?>

<form action="/projects/store" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <label>Student Name</label><br>
    <input type="text" name="student_name" value="<?= old('student_name') ?>"><br><br>

    <label>Email</label><br>
    <input type="email" name="email" value="<?= old('email') ?>"><br><br>   

    <label>Project Title</label><br>
    <input type="text" name="project_title" value="<?= old('project_title') ?>"><br><br>

    <label>Description</label><br>
    <textarea name="description"><?= old('description') ?></textarea><br><br>

    <label>Upload File</label><br>
    <input type="file" name="file"><br><br>

    <button type="submit">Submit Project</button>
</form>

</body>
</html>