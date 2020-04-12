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
		
		<th> View Answers</th>
	</tr>

		
<?php
if(isset($result)){
	foreach($result->result() as $row){
	echo '
	<tr>
	<td>'.$row->q_id.'</td>
	
	 <form method="post" action = "'.base_url('Teacher_ques/open_ans').'">

	
	<input type="hidden" name="hidden_id" value="'.$row->q_id.'"/>
	<td><button type="submit" name="submit" value="submit" class="btn btn-primary">View Answers</button></td>
	</form>
	
	</tr>
	';

}
 }
 ?>
</table>
</div>
</body>
</html>