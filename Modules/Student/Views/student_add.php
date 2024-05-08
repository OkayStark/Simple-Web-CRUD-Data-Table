<?= $this->extend('Modules\Student\Views\app') ?>

<?= $this->section("title") ?>
Add Student Page
<?= $this->endSection() ?>

<?= $this->Section("body") ?>

<?php
if (isset($validation)) {
    echo "<div class='alert alert-danger'>";
    echo $validation->listErrors();
    echo "</div>";
}
?>

<div class="panel panel-default">
    <div class="panel-heading">Create Student
        <a href="<?= base_url('student') ?>" style="margin-top: -7px;" class="btn btn-primary pull-right">List
            Student</a>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" id="frm-add-student" action="<?= base_url('student/add-student') ?>" method="POST"
            enctype="multipart/form-data">
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="phone">Phone number:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone number">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="profile_image">Profile Image:</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="profile_image" name="profile_image">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section("scripts") ?>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script> -->

<script>

    // $(document).ready(function () {
    //     $('#frm-add-student').validate();
    // });


</script>
<?= $this->endSection() ?>