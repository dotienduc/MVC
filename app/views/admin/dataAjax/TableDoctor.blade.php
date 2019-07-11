 @foreach($doctors as $doctor)
 <tr class="doctor">
 <td><img src="../img/team/{{ $doctor['image'] }}" class="img-circle" alt="User Image" height="50" width="50"></td>
 <td class="search">{{$doctor['name']}}</td>
 <td class="search">{{ $doctor['name_specialist'] }}</td>
 <td class="search">{{$doctor['email']}}</td>
 <td class="search">{{ $doctor['phone'] }}</td>
 <td>{{$doctor['address']}}</td>
 <td>
 <button type="button" class="btn btn-info btn-xs edit" id="{{ $doctor['id'] }}"><i class="fa fa-pencil"></i>
 </button>
 <button type="button" class="btn btn-danger btn-xs delete" id="{{ $doctor['id'] }}"><i class="fa fa-trash-o"></i>
 </button>
 </td>
 </tr>
 @endforeach