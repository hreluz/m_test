<!DOCTYPE html>
<html>
<head>
	<title>Clear Parenthesis</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<script
		  src="https://code.jquery.com/jquery-1.12.4.min.js"
		  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
		  crossorigin="anonymous"></script>		
</head>
<body>
	
	<div class="container">
		<div class="panel">

			<h1>Part 1 - Problem 3 </h1>

			<form method="POST" action="check.php" id="clearParenthesisForm" class="form-inline">
				<input type="text" name="parenthesis" class="form-control" placeholder="Insert Ex: (((())))) (()...">
				<button class="submit btn btn-primary"> Go</button>
			</form>

			
			<div id="results" style="display: none;">
				<h1>The clear parenthesis is :  <strong id="new_parenthesis"> this one </strong></h1>
			</div>

		</div>
		
    	<p><a href="javascript:history.back()" class="btn btn-success">Back</a></p>
	</div>
	

	<script type="text/javascript">
		$(document).ready(function(){
			$('.submit').click(function(e){
				e.preventDefault();

				let form = $('#clearParenthesisForm');
				let url =  form.attr('action');
				let data = form.serialize();

		          $.ajax({
		              type: 'POST',
		              url: url,
		              data: data,
		              success: function(data){
		              	$('#new_parenthesis').html(data);
		              	$('#results').show();
		              }
		          });

			});
		});
	</script>
</body>
</html>