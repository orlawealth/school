<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>

    <div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px;">
    <?php $this->view('includes/crumbs', ['crumbs'=>$crumbs])?>
    
    <?php if($row):?>
        
        <div class="row" >
            <h4 class="text-center"><?=esc(ucwords($row->test))?></h4>
            <table class="table table-hover table-striped table-bordered" >
              
                <tr><th>Created by</th> <td><?=esc($row->user->firstname)?> <?=esc($row->user->lastname)?></td> 
                    <th>Date Created:</th> <td><?=get_date($row->date)?></td> 
                    <td>
                    <a href="<?=ROOT?>/single_class/<?=$row->class_id?>?tab=tests">
                <button class="btn btn-sm btn-primary"><i class="fa fa-chevron-right"></i> View class</button> 
            </a>
                    </td>
                </tr>

                <?php $active = $row->disabled ? "No":"Yes"; ?>
                <tr><td><b>Active: </b><?=$active?></td> <td colspan="5"> <b>Test Description:</b> <br> <?=esc($row->description)?> </td> </tr>

            </table>
        </div>



        <?php 
            switch ($page_tab) {
                case 'view':
                    # code...
                  include(views_path('test-tab-view'));
                    break;
                
                case 'add':
                    # code...
                    include(views_path('test-tab-add'));
                    break;
                
                case 'edit':
                    # code...
                    include(views_path('test-tab-edit'));
                    break;
                    
                case 'delete':
                    # code...
                    include(views_path('test-tab-lecturers-delete'));
                    break;

                default:
                    # code...
                    break;
            }
        
        
        ?>

        <?php else:?>
            <h4 class="text-center">That test was not found!</h4>
        <?php endif;?>

    </div>

<?php $this->view('includes/footer')?>
