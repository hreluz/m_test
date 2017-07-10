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

	<hr>

	Service Employee API by Salary
	<form action="/api/employees" target="_blank">
		<input type="number" name="s_min" placeholder="Salary Min">
		<input type="number" name="s_max" placeholder="Salary Max">
		<select name="type">
			<option value="xml">xml</option>
			<option value="json">json</option>
		</select>
		<button type="submit">Go</button>		
	</form>

{% endblock %}