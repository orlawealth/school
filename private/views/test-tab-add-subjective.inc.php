<?php if(isset($_GET['type']) && $_GET['type'] == "objective"): ?>
    <center><h5>Add Objective Questions</h5></center>
<?php else: ?>
    <center><h5>Add Subjective Questions</h5></center>
<?php endif; ?>
<div class="card-group justify-content-center">

    <form method="post" enctype="multipart/form-data">
        <h3>Add a Test</h3>

        <?php if(count($errors) > 0): ?>
            <div class="alert alert-warning alert-dismissible fade show p-1" role="alert">
                <strong>Errors: </strong> 
                <?php foreach($errors as $error): ?>
                <br> <?=$error?>
                <?php endforeach; ?>
                <span type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </span>
            </div>
        <?php endif; ?>
                
        <label for="Question:"></label>
        <textarea autofocus class="form-control" name="question" value="<?=get_var('question')?>" placeholder="Type your question here"></textarea>
        <div class="input-group mb-3 pt-4">
            <label class="input-group-text" for="inputGroupFile011">Comment(Optional)</label>
            <input type="text" class="form-control" name="comment" value="<?=get_var('comment')?>" id="inputGroupFile011" placeholder="comment">
        </div>

        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupFile01"> <i class="fa fa-image"></i> Image(Optional)</label>
            <input type="file" class="form-control" name="image"  id="inputGroupFile01">
        </div>

        <?php if(isset($_GET['type']) && $_GET['type'] == "objective"):?>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile011"> Answer</label>
                <input type="text" class="form-control" name="correct_answer" value="<?=get_var('correct_answer')?>" id="inputGroupFile011" placeholder="Enter the correct answer here">
            </div>
        <?php endif; ?>
        <a href="<?=ROOT?>/single_test/<?=$row->test_id?>">
					<button type="button" class="btn btn-primary" type="button" value="Cancel"> <i class="fa fa-chevron-left"></i> Back </button>
		</a>

        <button class="btn btn-danger float-end">Save Question</button>
        
    </form> 
</div>