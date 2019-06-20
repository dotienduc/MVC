@foreach($schedule as $row)
<tr>
	<td>{{ $row['name'] }}</td>
	@foreach($specialist as $value)
	@if($value['id'] == $row['id_specialist'])
	<td>{{ $value['name_specialist'] }}</td>
	@endif
	@endforeach
	<td>{{ $row['weeksday'] }}</td>
	<td><span class="glyphicon glyphicon-time"></span>{{ $row['work_time'] }}</td>
	<td>
		<button class="btn btn-info btn-xs btn-edit " id="{{ $row['id_timeserving'] }}" title="{{ $row['id_doctor'] }}"><i class="fa fa-pencil" aria-hidden="true"></i></button>
		<button class="btn btn-danger btn-xs delete" id="{{ $row['id_timeserving'] }}" title="{{ $row['id_doctor'] }}" ><i class="fa fa-trash-o" aria-hidden="true"></i></button>
	</td>
</tr>
@endforeach