{% extends 'layout.php' %}

{% block content %}

	<h1>Developers SAC</h1>
	<form>
		<input type="text" name="email" placeholder="Enter email">
		<input type="text" name="name" placeholder="Enter Name">
		<input type="text" name="position" placeholder="Enter Position">
		<button type="submit">Search</button>		
	</form>

	<table>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Position</th>
			<th>Salary</th>
			<th>Detail</th>
		</tr>
		
		{% for employee in employees %}
			<tr>
				<td>{{ employee.name }}</td>
				<td>{{ employee.email }}</td>
				<td>{{ employee.position }}</td>							
				<td>{{ employee.salary }}</td>	
				<td> <a href="/employees/{{ employee.id }}">Detail</a> </td>						
			</tr>
		{% endfor %}

	</table>

{% endblock %}