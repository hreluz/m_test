<table class="table table-bordered">
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
