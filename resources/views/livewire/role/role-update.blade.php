<div>
	<form wire:submit.prevent="update">
	@csrf
	<div class="row">
		<label class="col-form-label">Role</label>
		<div class="col-sm-12">
			<div class="col-sm-4">
			  <input type="text" class="form-control" wire:model="nama_role" placeholder="Nama Role" required>
			</div>
		</div>
	</div>
	<div class="row">
		<label class="col-form-label">Deskripsi Role</label>
		<div class="col-sm-12">
			<div class="col-sm-4">
			  <textarea class="form-control" wire:model="deskripsi_role" placeholder="Deskripsi Role"></textarea>
			</div>
		</div>
	</div>
		<div class="row">
			<label class="col-form-label">Program Studi</label>
			<div class="d-flex justify-content-between">
			</div>
			<div class="col-sm-4">
				<div class="input-group mb-3">
				  <select class="form-control" wire:model="prodi_id">
					@if($prodis)
						@foreach($prodis as $prodi)
							@if($prodi['id'] != 1)
								<option value="{{ $prodi['id'] }}">{{ $prodi['nama_prodi'] }}</option>
							@endif
						@endforeach
					@endif
				  </select>
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			<button type="button" class="btn btn-danger text-white mr-2" wire:click="$emit('refreshRole')">Batalkan</button>
			<button type="submit" class="btn btn-primary text-white">Simpan</button>
		</div>
	</div>
	</form>
</div>