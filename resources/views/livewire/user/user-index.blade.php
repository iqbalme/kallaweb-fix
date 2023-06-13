<div class="body flex-grow-1 px-3">
	<div class="container-lg">
		<div class="card mb-4">
            <div class="card-body">
				<div class="row justify-content-between p-3">
					<div class="col-4"><h3>List User</h3></div>
					<div class="col-auto"><button type="button" class="btn btn-success text-white mb-2" wire:click="tambahUser"  data-coreui-toggle="modal" data-coreui-target="#userModal">Tambah User</button></div>
					<hr>
				</div>
				<div class="table-responsive mt-3">
                    <table class="table border mb-0 table-striped">
                      <thead class="table-light fw-semibold">
                        <tr class="align-middle">
                          <th class="text-center">
                            No
                          </th>
						  <th></th>
                          <th class="text-center">Nama</th>
                          <th class="text-center">Email</th>
                          <th class="text-center">Role</th>
						  <th></th>
                        </tr>
                      </thead>
                      <tbody>
					  @if($data->count() < 2)
						<tr class="align-middle">
                          <td class="text-center" colspan="6">
						  Tidak ada data
						  </td>
						</tr>
					  @else
						@foreach($data as $user)
						@if($loop->index > 0)
                        <tr class="align-middle">
                          <td class="text-center">
						  {{ $loop->index }}
                          </td>
						  <td>
						  @if(isset($user->avatar))
							  <div class="avatar avatar-lg"><img class="avatar-img" src="{{ asset('storage/images/'.$user->avatar) }}"></div>
						  @else
							  <div class="avatar avatar-lg"><img class="avatar-img" src="{{ asset('admin/user.png') }}"></div>
						  @endif
						  </td>
                          <td>
                            {{ $user->nama }}
                          </td>
						  <td>
                            {{ $user->email }}
                          </td>
						  <td>
							<button type="button" class="btn btn-info text-white" wire:click="getUserRole({{$user->id}})">Lihat</button>
                          </td>
                          <td class="text-end">
							<button type="button" class="btn btn-dark" wire:click="getUser({{ $user->id }})"  data-coreui-toggle="modal" data-coreui-target="#userModalEdit">Edit</button>
							<button wire:click="setUserId({{$user->id}})" type="button" class="btn btn-danger text-white">Hapus</button>
                          </td>
                        </tr>
						@endif
						@endforeach
					@endif
                      </tbody>
                    </table>
                  </div>
            </div>
          </div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="userModalHapus" tabindex="-1" wire:ignore.self>
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Hapus Prodi</h5>
			<button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
			Apakah Anda yakin ingin menghapusnya?
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary text-white" data-coreui-dismiss="modal">Tidak</button>
			<button type="button" class="btn btn-danger text-white" wire:click="hapusUser">Ya, Hapus</button>
		  </div>
		</div>
	  </div>
	</div>

	<div class="modal fade" id="roleModalView" tabindex="-1" wire:ignore.self>
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Role</h5>
			<button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
			<ul>
			@foreach($user_roles_data as $user_role)
				<li>{{ucfirst($user_role[0]).' = '.$user_role[1]}}</li>
			@endforeach
			</ul>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-primary text-white" data-coreui-dismiss="modal">Tutup</button>
		  </div>
		</div>
	  </div>
	</div>
	@if($isUpdate)
		<livewire:user.user-update />
	@else
		<livewire:user.user-create />
	@endif
	<script>
	window.addEventListener('closeModalUserUpdate', event => {
		jQuery('#userModalEdit').modal('hide');
	});
	window.addEventListener('bukaModalUserHapus', event => {
		jQuery('#userModalHapus').modal('show');
	});
	window.addEventListener('closeModalUserHapus', event => {
		jQuery('#userModalHapus').modal('hide');
	});
	window.addEventListener('bukaModalRole', event => {
		jQuery('#roleModalView').modal('show');
	});
	 </script>
</div>
