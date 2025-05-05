<center> <h4>My Classes</h4></center>
<nav class="navbar bg-body-tertiary">
    <form class="form-inline">
        <div class="input-group">
        <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i> </span>
        <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
        </div>
    </form>
</nav>

<hr>
<?php $rows = $student_classes;?>
<?php include(views_path('classes')) ?>