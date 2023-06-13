<div>
    <div class="modal fade" id="userModal" tabindex="-1" wire:ignore.self>
	  <div class="modal-dialog">
		<div class="modal-content">
			<form wire:submit.prevent="tambahUser">
			@csrf
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
				<button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="mb-3">
				  <h6 class="card-title mb-2">Nama</h6>
				  <input type="text" class="form-control" wire:model.lazy="nama" required>
				</div>
				<div class="mb-3">
				  <h6 class="card-title mb-2">Email</h6>
				  <input type="email" class="form-control" wire:model.lazy="email" required>
				</div>
				<div class="mb-3">
				  <h6 class="card-title mb-2">Password</h6>
				  <input type="password" class="form-control" wire:model.lazy="password" required>
				</div>
				<div class="row mt-3">
					<div class="d-flex justify-content-between">
						<div>
						  <h6 class="card-title mb-2">Gambar Profil</h6>
						  <!--div class="small text-medium-emphasis">January - July 2022</div-->
						</div>
					</div>
					@if(isset($avatar))
					<div class="mb-1 rounded">
						<img src="{{ $avatar->temporaryUrl() }}" alt="avatar" width="200" height="200">
					</div>
					<div class="d-grid gap-2 d-md-block">
					  <button class="btn btn-danger text-white" type="button" wire:click="removeAvatar">Hapus</button>
					</div>
					@else
						<div class="col-lg-12">
							<div class="input-group mb-3 mt-2">
							  <input type="file" class="form-control" wire:model="avatar">
							  <label class="input-group-text">Upload</label>
							</div>
							@error('avatar') <span class="error">{{ $message }}</span> @enderror
						</div>
					@endif
				</div>
					<div class="mb-3 mt-3">
					<h6 class="card-title mb-2">Roles</h6>
					@if(count($roles) > 1)
						@foreach($roles as $role)
							@if($role->nama_role != 'Super Admin')
							<div class="form-check">
							  <input class="form-check-input" type="checkbox" value="{{ $role->id }}" wire:model="user_roles">
							  <label class="form-check-label">
							  {{ $role->nama_role }}
							  </label>
							</div>
							@endif
						@endforeach
					@else
						{{'Tidak ada role yang tersedia, buat role terlebih dahulu'}}
					@endif
				</div>
				
            </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger text-white" data-coreui-dismiss="modal">Batal</button>
				@if(count($roles) > 1)
					<button type="submit" class="btn btn-primary text-white" data-coreui-toggle="modal" data-coreui-target="#userModal" @if(!count($user_roles)) {{'disabled'}} @endif>Simpan</button>
				@else
					<button type="button" class="btn btn-primary text-white" disabled>Simpan</button>
				@endif
			</div>
			</form>			
          </div>
		</div>
	</div>
</div>
