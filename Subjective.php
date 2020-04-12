<div class="container p-3 mt-3">
    <div class="card bg-light border-primary mb-3 ">
        <div class="card-header d-flex justify-content-between">
            <h3 style="width: 100%;height: 50px; background: #27293d !important; position: relative; color: white;" class="p-4">
                <a href="#menu-toggle" class="menuopener" id="menu-toggle" style="position: absolute!important;right: 0!important;">
                    <i class="fa fa-bars"></i>
                </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Create Quiz
            </h3>

        </div>
        <h3>Quiz Created:</h3>
            <div class="col-md-10 offset-md-1">
                <table class="table table-bordered" style="">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Class</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Quiz at</th>
                            <th scope="col">Share</th>
                            <th scope="col">Attempts</th>
                        </tr>
                    </thead>
                    <?php $count = 1;
                   	if(isset($data)){
                    foreach ($data->result() as $row) {
                    ?>
                        <tbody>
                            <tr>
                                <th scope="row"><?php echo $count++; ?></th>
                                <td><?php echo $row->title;
	?></td>
                                <td><?php echo $row->class;
	?></td>
                                <td><?php echo $row->subject;
	?></td>
                                <td><?php echo $row->date; ?></td>

    
       <!-- <td>
        	 <form method="POST" action = "<?php base_url('addsubquiz/show') ?>">
       
        <input type="hidden" name="hidden_id" value="<?php $row->q_id; ?>"/><button type="submit" name="submit" value="Link" class="btn btn-primary">Link</button>   </form>   
    
          </td>-->
          <?php echo '
          <form method="post" action = "'.base_url('Teacher_subquiz/show').'">
       
        <input type="hidden" name="hidden_id" value="'.$row->q_id.'"/>
        <td><button type="submit" name="submit" value="Link" class="btn btn=primary">Link</button> </td>
        </form>';?>
                       
                                </tr>
                            </tbody>
                             <?php } }
            ?>

                        </table>
                    </div>
                </div>
            </div>
           