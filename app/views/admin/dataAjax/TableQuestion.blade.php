 @foreach($questions as $question)
 <tr >
 	<td>{{ $question['name'] }}</td>
 	<td>{{$question['email']}}</td>
 	<td>{{$question['subject']}}</td>
 	<td>{{ $question['message'] }}</td>
 	@if( $question['status'] == 0 )
 	<td >Chưa trả lời</td>
 	@endif
 	<td>
 		<a href="../QuestionController/formQuestion/{{ $question['id'] }}">
 			<button type="button" class="btn btn-info btn-xs edit" id="{{ $question['id'] }}"><i class="fa fa-pencil"></i>
 			</button>
 		</a>
 		<button type="button" class="btn btn-danger btn-xs delete" id="{{ $question['id'] }}"><i class="fa fa-trash-o"></i>
 		</button>
 	</td>
 </tr>
 @endforeach