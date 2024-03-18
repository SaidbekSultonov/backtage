<table class="table table-striped table-sm table-bordered">
	<thead>
		<tr>
			<th>№</th>
			<th>{{ translate('Full name') }}</th>
			<th>{{ translate('Phone') }}</th>
		</tr>	
	</thead>
	<tbody>
		@if(!empty($models) && count($models) > 0) @php $i = 1; @endphp
			@foreach($models as $key => $value)
				<tr>
					<td>{{ $i++; }}</td>
					<td>
						<a href="{{route('forthebuilder.clients.show',[$value->client_id,0,0])}}">
							{{ (($value->client) ? $value->client->last_name.' '.$value->client->first_name.' '.$value->client->middle_name : ''); }}
						</a>
					</td>
					<td>
						<a href="{{route('forthebuilder.clients.show',[$value->client_id,0,0])}}">
							{{ (($value->client) ? $value->client->phone : ''); }}
						</a>
					</td>
				</tr>
			@endforeach
		@else
			<tr>
				<td colspan="3" class="text-center">
					<i>
						{{ translate('No data!') }}
					</i>
				</td>
			</tr>
		@endif
	</tbody>
</table>