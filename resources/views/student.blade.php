<script type="text/javascript">
	function notaccepted(){
	    alert("Input was not accepted, please double-check");
	}
</script>

<html>


	<head>
		<title>Student generate</title>
	</head>

	<body>
		<a href="/student"><h1>Student generate</h1></a>

		Student ID:
		<form method = 'POST' action='{{ url('student') }}' role='form'>
			{{ csrf_field() }}
			Name: <input type="text" name="name" id="name" value="">
			Age: <input type="text" name="age" id="age" value="">
			Address: <input type="text" name="address" id="address" value="">
			<input type="submit" value="Submit">
		</form>
		<form action="generate">
			<input type="submit" value="Generate" />
		</form>
		</br>

		<table style="width:100%" border="1px">
			<tr>
				<th>id</th>
				<th>Name</th>
				<th>Age</th>
				<th>Address</th>
			</tr>

			@php
			foreach($datamain as $d){
				echo '<tr>';
				echo '<td>'.$d->id.'</td>';
				echo '<td><input type="text" value="'.$d->name.'"readonly></td>';
				echo '<td><input type="text" value="'.$d->age.'" readonly></td>';
				echo '<td><input type="text" value="'.$d->address.'" readonly></td>';
				echo '</tr>';
			}
			@endphp
		</table>
	</body>
</html>