{% extends 'layout.php' %}

{% block content %}

	<div class="panel">
		<hr>
		<div class="jumbotron">


			{% if employee %}
				<h1>{{ employee.name }}</h1>

				<ul>
					<li>Email : {{ employee.email }}</li>
					<li>Phone : {{ employee.phone }}</li>
					<li>Address: {{ employee.address }}</li>
					<li>Position: {{ employee.position }}</li>
					<li>Salary : {{ employee.salary }}</li>
					<li>
						Skills
						<ol>
							{% for key,skill in employee.skills %}
								{% for name in skill %}
									<li>{{ name }}</li>
								{% endfor %}
							{% endfor %}
						</ol>
					</li>
				</ul>

			{% else %}
				<h1>Employee was not found</h1>
			{% endif %}

	        <p><a class="btn btn-lg btn-success" href="javascript:history.back()" role="button">Back</a></p>

    	 </div>
	</div>

{% endblock %}