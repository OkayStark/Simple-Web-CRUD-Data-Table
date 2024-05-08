<?= $this->extend('Modules\Student\Views\app') ?>

<?= $this->section("title") ?>
Edit Student Page
<?= $this->endSection() ?>

<?= $this->Section("body") ?>
<div class="panel panel-default">
    <div class="panel-heading">Update Student
        <a href="<?= base_url('student') ?>" style="margin-top: -7px;" class="btn btn-primary pull-right">List
            Student</a>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" id="frm-edit-student" action="<?= base_url('student/edit-student/'.$student['id'])?>" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="_method" value="PUT">

            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Name:</label>
                <div class="col-sm-10">
                    <input type="text" required value="<?= $student['name'] ?>" class="form-control" id="name"
                        name="name" placeholder="Enter Name">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-10">
                    <input type="email" required value="<?= $student['email'] ?>" class="form-control" id="email"
                        name="email" placeholder="Enter email">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="phone_number">Phone number:</label>
                <div class="col-sm-10">
                    <input type="text" required value="<?= $student['phone'] ?>" class="form-control" id="phone_number"
                        name="phone_number" placeholder="Enter Phone number">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="profile_image">Profile Image:</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="profile_image" name="profile_image">
                    <br />
                    <?php
                    if (!empty($student['profile_image'])){
                        ?>
                        <img src="<?= $student['profile_image'] ?>" class="image-student" />
                        <?php
                    }else{
                        echo "No image found";
                    }
                ?>
                
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

<script>
    $(document).ready(function () {
        $('#frm-edit-student').validate();
    });
</script>
<?= $this->endSection() ?>