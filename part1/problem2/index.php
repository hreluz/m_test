<!DOCTYPE html>
<html>
<head>
	<title>Change String</title>
	<script
		  src="https://code.jquery.com/jquery-1.12.4.min.js"
		  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
		  crossorigin="anonymous"></script>		
</head>
<body>
	
	<h1>Part 1 - Problem 2 </h1>

	<form method="POST" action="check.php" id="missingNumbersForm">
		<input type="text" name="numbers" value="" placeholder="Insert Ex: 1, 2, 5 ,8...">
		<button class="submit"> Go</button>
	</form>

	
	<div id="results" style="display: none;">
		<h1>The complete range is :  <strong id="new_range"> this one </strong></h1>
	</div>

	<button> <a href="/">Back</a> </button>

	<script type="text/javascript">
		$(document).ready(function(){
			$('.submit').click(function(e){
				e.preventDefault();

				let form = $('#missingNumbersForm');
				let url =  form.attr('action');
				let data = form.serialize();

		          $.ajax({
		              type: 'POST',
		              url: url,
		              data: data,
		              success: function(data){
		              	$('#new_range').html(data);
		              	$('#results').show();
		              }
		          });

			});
		});
	</script>
</body>
</html>