{% extends 'layout.php' %}

{% block content %}
	{% if employee %}
		<h1>{{ employee.name }}</h1>

		<ul>
			<li>{{ employee.email }}</li>
			<li>{{ employee.phone }}</li>
			<li>{{ employee.address }}</li>
			<li>{{ employee.position }}</li>
			<li>{{ employee.salary }}</li>
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
<a href = "javascript:history.back()">Back to previous page</a>
{% endblock %}