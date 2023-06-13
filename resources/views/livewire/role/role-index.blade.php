<div class="body flex-grow-1 px-3">
	<div class="container-lg">
		<div class="card mb-4">
            <div class="card-body">
				<div class="row justify-content-between p-3">
					<div class="col-4"><h3>List Role</h3></div>
					@if(!$isFormVisible)
						<div class="col-auto"><button type="button" class="btn btn-success text-white mb-2" wire:click="tambahRole()">Tambah Role</button></div>
					@endif
					<hr>
				</div>

				@if($isFormVisible)
					@if($isUpdate)
						<livewire:role.role-update :role="$role"/>
					@else
						<livewire:role.role-create />
					@endif
				@endif
				<div class="table-responsive">
                    <table class="table border mb-0 table-striped table-hover">
                      <thead class="table-light fw-semibold">
                        <tr class="align-middle">
                          <th class="text-center">
                            No
                          </th>
                          <th class="text-center">Nama Role</th>
                          <th class="text-center">Deskripsi</th>
						  <th class="text-center">Program Studi</th>
						  <th></th>
                        </tr>
                      </thead>
                      <tbody>
					  @if(count($data) < 2)
						<tr class="align-middle">
                          <td class="text-center" colspan="5">
						  Tidak ada data
						  </td>
						</tr>
					  @endif
					  @isset($data)
						@foreach($data as $role)
							@if($role->nama_role != 'Super Admin')
							<tr class="align-middle">
							  <td class="text-center">
							  {{ $loop->index }}
							  </td>
							  <td>
								{{ $role->nama_role }}
							  </td>
							  <td>
								{{ substr($role->deskripsi_role,0,45) }}
							  </td>
							  @if($role->id != 2)
							  <td>
								{{ $role->prodi->nama_prodi }}
							  </td>
							  @else
							  <td colspan="2">
								{{ $role->prodi->nama_prodi }}
							  </td>
							  @endif
							  @if($role->id != 2)
							  <td class="text-end">
								<button type="button" class="btn btn-dark" wire:click="getrole({{ $role->id }})" @if($isFormVisible) disabled @endif>Edit</button>
								<button wire:click="setroleId({{$role->id}})" type="button" class="btn btn-danger text-white" data-coreui-toggle="modal" data-coreui-target="#roleModalHapus" @if($isFormVisible) disabled @endif>Hapus</button>
							  </td>
							  @endif
							</tr>
							@endif
						@endforeach
					@endisset
                      </tbody>
                    </table>
                  </div>
            </div>
          </div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="roleModalHapus" tabindex="-1" wire:ignore.self>
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Hapus role</h5>
			<button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
			Apakah Anda yakin ingin menghapusnya?
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary text-white" data-coreui-dismiss="modal">Tidak</button>
			<button type="button" class="btn btn-danger text-white" wire:click="hapusrole" data-coreui-toggle="modal" data-coreui-target="#roleModalHapus">Ya, Hapus</button>
		  </div>
		</div>
	  </div>
	</div>
</div>
