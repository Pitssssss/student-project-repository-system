<!DOCTYPE html>
<html>
<head>
    <title>Student Project Repository System</title>
</head>
<body>

<h1>Student Project Repository System</h1>

<a href="/projects/create">Submit New Project</a>

<br><br>

<form method="get" action="/projects">
    <input type="text" name="keyword" placeholder="Search project or student..." value="<?= esc($keyword) ?>">
    <button type="submit">Search</button>
</form>

<?php if (session()->getFlashdata('success')): ?>
    <p style="color: green;"><?= esc(session()->getFlashdata('success')) ?></p>
<?php endif; ?>

<p>Total Projects: <?= esc($total) ?></p>

<?php foreach ($projects as $project): ?>
    <div style="border:1px solid #999; padding:10px; margin:10px 0;">
        <h3><?= esc($project['project_title']) ?></h3>
        <p><strong>Student:</strong> <?= esc($project['student_name']) ?></p>
        <p><strong>Email:</strong> <?= esc($project['email']) ?></p>
        <p><?= esc($project['description']) ?></p>

        <?php if ($project['file']): ?>
            <a href="/projects/download/<?= esc($project['file']) ?>">Download File</a>
        <?php endif; ?>
    </div>
<?php endforeach; ?>

<?= $pager->links() ?>

</body>
</html>