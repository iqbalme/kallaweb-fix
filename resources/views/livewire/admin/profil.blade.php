<div>
<div class="body flex-grow-1 px-3 mb-3">
        <div class="container-lg">
          <div class="row">
			<form wire:submit.prevent="update">
			@csrf
				<h5 class="modal-title" id="exampleModalLabel">Edit Profil</h5>
				<hr>
				<div class="mt-2 mb-3 col-lg-5">
				  <h6 class="card-title mb-2">Nama</h6>
				  <input type="text" class="form-control" wire:model.lazy="nama">
				</div>
				<div class="mb-3 col-lg-5">
				  <h6 class="card-title mb-2">Email</h6>
				  <input type="text" class="form-control" wire:model.lazy="email">
				</div>
				<div class="mb-3 col-lg-5">
				  <h6 class="card-title mb-2">Password (Kosongkan jika tidak ingin mengubah password)</h6>
				  <input type="password" class="form-control" wire:model.lazy="password">
				</div>
				<div class="row mt-3 col-lg-5">
					<div class="d-flex justify-content-between">
						<div>
						  <h6 class="card-title mb-2">Gambar Profil</h6>
						  <!--div class="small text-medium-emphasis">January - July 2022</div-->
						</div>
					</div>

					@if(isset($avatar))
					<div class="mb-1 rounded">
						@if($avatarInitState)
							<img src="{{ asset('storage/images/'.$avatar) }}" alt="avatar" width="200" height="200">
						@else
							<img src="{{ $avatar->temporaryUrl() }}" alt="avatar" width="200" height="200">	
						@endif
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
				<div class="row mt-3 col-lg-5">
					<button type="submit" class="btn btn-primary text-white">Simpan</button>
				</div>
			</form>			
          </div>
		</div>
	</div>
</div>
