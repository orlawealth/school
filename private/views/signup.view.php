<?php $this->view('includes/header') ?>

<div class="container-fluid">
    <form action="" method="post">
        <div class="p-4 mx-auto shadow rounded" style="margin-top:50px; width: 100%; max-width: 340px;">
            <h2 class="text-center">My school</h2>
            <img src="<?=ROOT?>/assets/logo.png" class="border border-primary d-block mx-auto rounded-circle" style="width:100px; " alt="">
            <h3> Add user </h3>

            <?php if(count($errors)): ?>
            <div class="alert alert-warning alert-dismissible fade show p-1" role="alert">
                <strong>Errors: </strong> 
                <?php foreach($errors as $error): ?>
                <br> <?=$error?>
                <?php endforeach; ?>
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php endif; ?>
            
            <input class=" my-2 form-control" value ="<?=get_var('firstname')?>"   type="text" name="firstname" placeholder="First name">
            <input class=" my-2 form-control" value ="<?=get_var('lastname')?>" type="text" name="lastname" placeholder="Last name">
            <input class=" my-2 form-control" value ="<?=get_var('email')?>" type="email" name="email" placeholder="Email">
            
            <select class="my-2 form-control"  name="gender" id="">
                <option <?=get_select('gender', '')?> value="">--Select a Gender--</option>
                <option <?=get_select('gender', 'male')?> value="male">Male</option>
                <option <?=get_select('gender', 'female')?> value="female">Female</option>
            </select>
            <?php if($mode == 'students'):?>
                <input type="hidden" value ="student" name="rank" > 
            <?php else:?>
                <select class="my-2 form-control" name="rank" id="">
                    <option <?=get_select('rank', '')?>  value="">--Select a Rank--</option>
                    <option <?=get_select('rank', 'student')?> value="student">Student</option>
                    <option <?=get_select('rank', 'reception')?> value="reception">Reception</option>
                    <option <?=get_select('rank', 'lecturer')?> value="lecturer">Lecturer</option>
                    <option <?=get_select('rank', 'admin')?> value="admin">Admin</option>
                    
                    <?php if(Auth::getRank() == 'super_admin'):?>
                    <option <?=get_select('rank', 'super_admin')?> value="super_admin">Super Admin</option>
                    <?php endif;?>
                </select>
            <?php endif;?>

            <input class=" my-2 form-control" value ="<?=get_var('password')?>"  type="text" name="password" placeholder="Password">
            <input class=" my-2 form-control" value ="<?=get_var('password2')?>" type="text" name="password2" placeholder="Retype Password">
            <br>
            <button class="btn btn-primary float-end"> Add User </button>
            
            <?php if($mode == 'students'):?>
                <a href="<?=ROOT?>/students">
                    <button type="button" class="btn btn-danger"> Cancel </button>
                </a>
            <?php else:?>
                <a href="<?=ROOT?>/users">
                    <button type="button" class="btn btn-danger"> Cancel </button>
                </a>
            <?php endif;?>
        </div>
    </form>

</div>

<?php $this->view('includes/footer') ?>