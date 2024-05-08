<?= $this->extend('Modules\Student\Views\app') ?>

<?= $this->section("title") ?>
List Student Page
<?= $this->endSection() ?>

<?= $this->section("styles") ?>
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.6/css/dataTables.dataTables.min.css">
<?= $this->endSection() ?>

<?= $this->Section("body") ?>
<div class="panel panel-default">
    <div class="panel-heading">Student List
        <a href="<?= base_url('student/add-student') ?>" style="margin-top: -7px;"
            class="btn btn-primary pull-right">Add Student</a>
    </div>
    <div class="panel-body">
        <table class="table" id="tbl-student-list">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Profile Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($students) && !empty($students)) {
                    foreach ($students as $student) {
                        ?>
                        <tr>
                            <td><?= $student['id'] ?></td>
                            <td><?= $student['name'] ?></td>
                            <td><?= $student['email'] ?></td>
                            <td><?= $student['phone'] ?></td>
                            <td><img src="<?= $student['profile_image'] ?>" alt="profile image"
                                    class="img-thumbnail image-student"></td>
                            <td>
                                <a href="<?= base_url('student/edit-student/' . $student['id']) ?>"
                                    class="btn btn-primary">Edit</a>
                                <a href="#"
                                    onclick="if(confirm('Are you sure you want to delete this student?')){ $('#frm-delete-student-<?= $student['id'] ?>').submit(); }"
                                    class="btn btn-danger">Delete</a>

                                <form action="<?= base_url('student/delete-student/' . $student['id']) ?>" method="POST"
                                    style="display: none;" id="frm-delete-student-<?= $student['id'] ?>">
                                    <input type="hidden" name="_method" value="DELETE">
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section("scripts") ?>
<script src="https://cdn.datatables.net/2.0.6/js/dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#tbl-student-list').DataTable();
    });
</script>
<?= $this->endSection() ?>