<div>
	<form wire:submit.prevent="create">
	@csrf
	<div class="row">
		<label class="col-form-label">Role</label>
		<div class="col-sm-12">
			<div class="col-sm-4">
			  <input type="text" class="form-control" wire:model="roles.nama_role" placeholder="Nama Role" required>
			</div>
		</div>
	</div>
	<div class="row">
		<label class="col-form-label">Deskripsi Role</label>
		<div class="col-sm-12">
			<div class="col-sm-4">
			  <textarea class="form-control" wire:model="roles.deskripsi_role" placeholder="Deskripsi Role"></textarea>
			</div>
		</div>
	</div>
		<div class="row">
			<label class="col-form-label">Program Studi</label>
			<div class="d-flex justify-content-between">
			</div>
			<div class="col-sm-4">
				<div class="input-group mb-3">
				  @if($roles['prodis'])
				  <select class="form-control" wire:model="roles.prodi">
						@foreach($roles['prodis'] as $prodi)
							@if($prodi['id'] != 1)
								<option value="{{ $prodi['id'] }}">{{ $prodi['nama_prodi'] }}</option>
							@endif
						@endforeach
				  </select>
				  @else
					  Tambahkan Program Studi terlebih dahulu
				  @endif
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			<button type="button" class="btn btn-danger text-white mr-2" wire:click="$emit('refreshRole')">Batalkan</button>
			@if($roles['prodis'])
				<button type="submit" class="btn btn-primary text-white">Simpan</button>
			@else
				<button type="button" class="btn btn-primary text-white" disabled>Simpan</button>
			@endif
		</div>
	</div>
	</form>
</div>
