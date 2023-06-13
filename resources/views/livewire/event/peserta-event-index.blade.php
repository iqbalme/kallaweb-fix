<div>
    <div class="table-responsive">
		<table class="table border mb-0 table-striped">
		  <thead class="table-light fw-semibold">
			<tr class="align-middle">
			  <th class="text-center">
				No
			  </th>
			  <th class="text-center">Nama</th>
			  <th class="text-center">Email</th>
			  <th class="text-center">No. HP</th>
			</tr>
		  </thead>
		  <tbody>
		  @if(isset($data))
			@foreach($data as $peserta)
			<tr class="align-middle">
			  <td class="text-center">
			  {{ $loop->iteration }}
			  </td>
			  <td>
				{{ ucfirst($peserta->nama) }}
			  </td>
			  <td>
				{{ $peserta->email }}
			  </td>
			  <td>
				{{ $peserta->no_hp }}
			  </td>
			</tr>
			@endforeach
		   @else
			  <tr class="align-middle">
				<td class="text-center" colspan="4">
					Tidak ada data
				</td>
			  </tr>
		   @endif
		  </tbody>
		</table>
	  </div>
	  @if(isset($data))
	  <div class="row">
		<div class="col text-center">
			
		</div>
	  </div>
	  @endif
</div>
