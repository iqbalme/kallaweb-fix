<div class="body flex-grow-1 px-3">
	<div class="container-lg">
		<div class="card mb-4">
            <div class="card-body">
				<div class="row justify-content-between p-3">
					<div class="col-4"><h3>List Tim</h3></div>
					<div class="col-auto"><button type="button" class="btn btn-success text-white mb-2" wire:click="bukaFormTeam">Tambah Tim</button></div>
					<hr>
				</div>
				<div class="table-responsive">
                    <table class="table border mb-0 table-striped">
                      <thead class="table-light fw-semibold">
                        <tr class="align-middle">
                          <th class="text-center">
                            No
                          </th>
                          <th class="text-center" colspan="2">Nama</th>
                          <th class="text-center">Jabatan</th>
                          <th class="text-center">Prodi</th>
						  <th class="text-center">Media Sosial</th>
						  <th></th>
                        </tr>
                      </thead>
                      <tbody>
					  @if(!$data['teams']->count())
						<tr class="align-middle">
                          <td class="text-center" colspan="7">
						  		Tidak ada data
						  </td>
						</tr>
					  @else
						@foreach($data['teams'] as $team)
                        <tr class="align-middle">
                          <td class="text-center">
						  {{ $loop->iteration }}
                          </td>
						  <td>
							@if(isset($team->gambar))
									<div class="avatar avatar-lg"><img class="avatar-img" src="{{ asset('storage/images/'.$team->gambar) }}" style="height:inherit;"></div>
							@else
									<div class="avatar avatar-lg"><img class="avatar-img" src="{{ asset('admin/thumbnail-default.jpg') }}"></div>
							@endif
						  </td>
                          <td>
                            {{ ucwords($team->nama) }}
                          </td>
						  <td>
                            {{ ucwords($team->jabatan) }}
                          </td>
                          <td>
                            @if(count($team->team_prodi))
                                {{implode(', ', $data['nama_prodi'][$loop->index])}}
                            @else
                                {{'-'}}
                            @endif
                          </td>
						  <td class="text-center">
							<div class="row justify-align-center">
								<div class="col">
								@if(count(unserialize($team->media_sosial)))
									@foreach(unserialize($team->media_sosial) as $key => $medsos)
										@if($key == 'facebook')
											<a href="{{'https://facebook.com/'.$medsos}}" target="_blank"><i class="fa-brands fa-facebook"></i></a>&nbsp;
										@endif
										@if($key == 'instagram')
											<a href="{{'https://instagram.com/'.$medsos}}" target="_blank"><i class="fa-brands fa-instagram"></i></a>&nbsp;
										@endif
										@if($key == 'linkedin')
											<a href="{{'https://linkedin.com/in/'.$medsos}}" target="_blank"><i class="fa-brands fa-linkedin"></i></a>&nbsp;
										@endif
										@if($key == 'email')
											<a href="{{'mailto:'.$medsos}}" target="_blank"><i class="fa-solid fa-envelope"></i></a>&nbsp;
										@endif
									@endforeach
								@else
									-
								@endif
								</div>
							</div>
                          </td>
                          <td class="text-end">
							<button type="button" class="btn btn-dark mt-1" wire:click="getTeam({{ $team->id }})">Edit</button>
							<button wire:click="hapusTeam({{$team->id}})" type="button" class="btn btn-danger text-white mt-1">Hapus</button>
                          </td>
                        </tr>
						@endforeach
					@endif
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="teamModalHapus" tabindex="-1" wire:ignore.self>
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Hapus Event</h5>
			<button type="button" class="btn-close" wire:click="closeHapusForm" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
			Apakah Anda yakin ingin menghapusnya?
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary text-white" wire:click="closeHapusForm">Tidak</button>
			<button type="button" class="btn btn-danger text-white" wire:click="hapusTeamItem">Ya, Hapus</button>
		  </div>
		</div>
	  </div>
	</div>

	@if($isUpdate)
		<livewire:team.team-update />
	@else
		<livewire:team.team-create />
	@endif
	
	<script>
		window.addEventListener('closeHapusTeam', event => {
			jQuery('#teamModalHapus').modal('hide');
			jQuery('.modal-backdrop').hide();
		});
		window.addEventListener('bukaFormHapus', event => {
			jQuery('#teamModalHapus').modal('show');
		});
		window.addEventListener('bukaFormTeam', event => {
			jQuery('#TeamModal').modal('show');
		});
		window.addEventListener('bukaFormTeamEdit', event => {
			jQuery('#TeamModalEdit').modal('show');
		});
	</script>
</div>
