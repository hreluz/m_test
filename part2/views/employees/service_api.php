<div class="panel">
	<h2>Service Employee API by Salary</h2>
	<form action="/api/employees" target="_blank" class="form-inline">
		<div class="form-group">
			<input type="number" class="form-control"  name="s_min" placeholder="Salary Min">
		</div>

		<div class="form-group">
			<input type="number" class="form-control"  name="s_max" placeholder="Salary Max">
		</div>


		<div class="form-group">
			<select name="type" class="form-control" >
				<option value="xml">XML</option>
				<option value="json">JSON</option>
			</select>
		</div>

		<button type="submit" class="btn btn-success">Go</button>		
	</form>
</div>