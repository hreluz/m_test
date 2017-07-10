<!DOCTYPE html>
<html>
<head>
	<title>Change String</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	
	<script
		  src="https://code.jquery.com/jquery-1.12.4.min.js"
		  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
		  crossorigin="anonymous"></script>		
</head>
<body>

	<div class="container">
		
		<div class="panel">
			<h1>Part 1 - Problem 1 </h1>

			<form method="POST" action="check.php" id="converStringForm" class="form-inline">
				<input type="text" name="string" class="form-control" placeholder="Insert string here ...">
				<button class="submit btn btn-primary"> Change</button>
			</form>

			
			<div id="results" style="display: none;">
				<h1>The new string is :  <strong id="new_string"> this one </strong></h1>
			</div>
		</div>

 		<a href="javascript:history.back()" class="btn btn-success">Back</a>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){
			$('.submit').click(function(e){
				e.preventDefault();

				let form = $('#converStringForm');
				let url =  form.attr('action');
				let data = form.serialize();

		          $.ajax({
		              type: 'POST',
		              url: url,
		              data: data,
		              success: function(data){
		              	$('#new_string').html(data);
		              	$('#results').show();
		              }
		          });

			});
		});
	</script>
</body>
</html>