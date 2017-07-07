<!DOCTYPE html>
<html>
<head>
	<title>Clear Parenthesis</title>
	<script
		  src="https://code.jquery.com/jquery-1.12.4.min.js"
		  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
		  crossorigin="anonymous"></script>		
</head>
<body>
	
	<h1>Part 1 - Problem 3 </h1>

	<form method="POST" action="check.php" id="clearParenthesisForm">
		<input type="text" name="parenthesis" value="" placeholder="Insert Ex: (((())))) (()...">
		<button class="submit"> Go</button>
	</form>

	
	<div id="results" style="display: none;">
		<h1>The clear parenthesis is :  <strong id="new_parenthesis"> this one </strong></h1>
	</div>

	<button> <a href="/">Back</a> </button>

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