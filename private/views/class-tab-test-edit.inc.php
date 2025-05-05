<div class="card-group justify-content-center">

        <?php if(isset($test_row) && is_object($test_row)):?>
           <form method="post">
			<h3>Edit Tes</h3>

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
				<input autofocus class="form-control"	value="<?=get_var('test', $test_row->test)?>" type="text" name="test" placeholder="Test Title" ><br>
				<textarea class="form-control" name="description" placeholder="Add a description"><?=get_var('description', $test_row->description)?></textarea><br>
                <?php
					$disabled = get_var('disabled', $test_row->disabled);
					$active_checked = $disabled ? "":"checked";
					$disabled_checked = $disabled ? "checked":"";
				?>
				
				<input type="radio" name="disabled" value="0" <?=$active_checked?> > Active  |
                <input type="radio" name="disabled" value="1" <?=$disabled_checked?> > Disabled <br> <br>
                <input class="btn btn-primary float-end" type="submit" value="Save changes">

				<a href="<?=ROOT?>/single_class/<?=$row->class_id?>?tab=tests">
					<input class="btn btn-danger" type="button" value="Back">
				</a>
		   </form>
        <?php else: ?>
            <center>
                <h4>Sorry, that test was not found</h4>
            
                <a href="<?=ROOT?>/single_class/<?=$row->class_id?>?tab=tests">
					<input class="btn btn-danger" type="button" value="Back">
				</a>
            </center>
        <?php endif; ?>
		</div>