<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<div class="table-responsive">
  <table class="table table-striped table-bordered">
<tr>
		<th>Quiz_id</th>
		<th>Question</th>
		<th>Answer</th>
		<th>Marks</th>
		
	</tr>

	<?php
if(isset($output)){
	$score = 0;
	foreach($output->result() as $row){
	echo '
	<tr>
	<td>'.$row->q_id.'</td>
	<td>'.$row->question.'</td>
	<td>'.$row->answer.'</td>
	 <form method="post" action = "'.base_url('Teacher_ques/store_score').'">

	<td><input type="text"  id = "stud_score" name="score" placeholder ="enter score"> 
		<input type="hidden" name="hidden_id" value="'.$row->q_id.'"/>
	<input type="hidden" name="hidden_score" id="score_stud" />

	
	<script type="text/javascript">
		
         var score = 0;
         function add(){
       score =  score + parseInt(document.getElementById("stud_score").value);
       parseInt(document.getElementById("score_stud").value)= score;}

        add();
           
	</script>
	</td>
	
	</tr>
	';

}
 }
 ?>


 
  </table>
  <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
</body>
</html>
