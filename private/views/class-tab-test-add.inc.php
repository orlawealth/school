<div class="card-group justify-content-center">
           <form method="post">
			<h3>Add A Test</h3>

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
				<input autofocus class="form-control"	value="<?=get_var('test')?>" type="text" name="test" placeholder="Test Title" ><br>
				<textarea class="form-control" name="description" placeholder="Add a description"><?=get_var('description')?></textarea><br>
                <input class="btn btn-primary float-end" type="submit" value="Create">

				<a href="<?=ROOT?>/single_class/<?=$row->class_id?>?tab=tests">
					<input class="btn btn-danger" type="button" value="Cancel">
				</a>
		   </form>

		</div>