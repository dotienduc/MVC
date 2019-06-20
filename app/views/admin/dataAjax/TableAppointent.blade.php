 @foreach($appointents as $appointent)
 <tr >
 <td>{{ $appointent['first_name'] }} {{ $appointent['last_name'] }}</td>
 <td>{{$appointent['email']}}</td>
 <td>{{$appointent['phone']}}</td>
 <td>{{ $appointent['message'] }}</td>
<td class="{{ $appointent['id_doctor'] }}">{{ $appointent['name'] }}</td>
<td class="{{ $appointent['id_timeserving'] }}">{{ $appointent['weeksday'] }} {{ $appointent['work_time'] }}</td>
<td class="{{ $appointent['id_subject'] }}">{{ $appointent['name_specialist'] }}</td>
 @if($appointent['status'] == 0)
 <td class="{{ $appointent['status'] }}"><span class="label-default label label-danger" id="{{ $appointent['id'] }}">Chờ</span></td>
 @else
 <td class="{{ $appointent['status'] }}"><span class="label-success label label-default" id="{{ $appointent['id'] }}">Duyệt</span></td>
 @endif
 <td>
 <button type="button" class="btn btn-info btn-xs edit" id="{{ $appointent['id'] }}"><i class="fa fa-pencil"></i>
 </button>
 <button type="button" class="btn btn-danger btn-xs delete" id="{{ $appointent['id'] }}"><i class="fa fa-trash-o"></i>
 </button>
 </td>
 </tr>
 @endforeach