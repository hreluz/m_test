{% extends 'layout.php' %}

{% block content %}

	<h1>Developers SAC</h1>
	
	{% include 'employees/partials/filters.php' %}
	{% include 'employees/partials/table.php' %}

	<hr>

	{% include 'employees/service_api.php' %}

{% endblock %}