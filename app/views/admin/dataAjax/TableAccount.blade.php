 @foreach($accounts as $account)
 <tr >
 <td>{{ $account['name'] }}</td>
 <td>{{$account['email']}}</td>
 <td>{{$account['phone']}}</td>
 <td>{{ $account['address'] }}</td>
 @if($account['role'] == 0)
 <td class="{{ $account['role'] }}">Bác sĩ</td>
 @else
 <td class="{{ $account['role'] }}">Người quản trị</td>
 @endif
 @if($account['status'] == 0)
 <td class="{{ $account['status'] }}"><span class="label-default label label-danger">Không hoạt động</span></td>
 @else
 <td class="{{ $account['status'] }}"><span class="label-success label label-default">Hoạt động</span></td>
 @endif
 <td>
 <button type="button" class="btn btn-info btn-xs edit" id="{{ $account['id'] }}"><i class="fa fa-pencil"></i>
 </button>
 <button type="button" class="btn btn-danger btn-xs delete" id="{{ $account['id'] }}"><i class="fa fa-trash-o"></i>
 </button>
 </td>
 </tr>
 @endforeach