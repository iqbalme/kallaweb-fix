<div>
	<form wire:submit.prevent="create">
	@csrf
	<div class="row">
		<label class="col-form-label">Program Studi</label>
		<div class="col-sm-12 mb-2">
			<div class="col-sm-4">
			  <input type="text" class="form-control" wire:model="nama_prodi" placeholder="Nama Program Studi">
			</div>
		</div>
	</div>
	<div class="row">
		<label class="col-form-label">Deskripsi Program Studi</label>
		<div class="col-sm-12">
			<div class="col-sm-4 mb-2">
			  <textarea class="form-control" wire:model="deskripsi_prodi" placeholder="Deskripsi Program Studi"></textarea>
			</div>
		</div>
	</div>
	<div class="row">
		<label class="col-form-label">Gambar</label>
		<div class="col-sm-5">
			@if(isset($thumbnail))
				<div class="mb-1 rounded">
					<img src="{{ $thumbnail->temporaryUrl() }}" alt="Thumbnail" width="200" height="200">
				</div>
				<div class="d-grid gap-2 d-md-block mb-3">
				  <button class="btn btn-danger text-white" type="button" wire:click="removeThumbnail">Hapus</button>
				</div>
			@else
				<div class="input-group mb-3 mt-2">
				  <input type="file" class="form-control" wire:model.defer="thumbnail">
				  <label class="input-group-text">Upload</label>
				</div>
			@endif
		</div>
	</div>
	<div class="row">
		<label class="col-form-label">Subdomain</label>
		<div class="col-sm-12 mb-2">
			<div class="col-sm-4">
			  <input type="text" class="form-control" wire:model="subdomain" placeholder="contoh: manajemen-retail">
			</div>
		</div>
	</div>
    <div class="row">
		<label class="col-form-label">Visi Misi</label>
		<div class="col-sm-5">
			@if(isset($visi_misi))
				<div class="mb-1 rounded">
					<img src="{{ $visi_misi->temporaryUrl() }}" alt="Thumbnail" width="200" height="200">
				</div>
				<div class="d-grid gap-2 d-md-block mb-3">
				  <button class="btn btn-danger text-white" type="button" wire:click="removeVisimisi">Hapus</button>
				</div>
			@else
				<div class="input-group mb-3 mt-2">
				  <input type="file" class="form-control" wire:model.defer="visi_misi">
				  <label class="input-group-text">Upload</label>
				</div>
			@endif
		</div>
	</div>
    <div class="row">
		<label class="col-form-label">Logo</label>
		<div class="col-sm-5">
			@if(isset($logo_prodi))
				<div class="mb-1 rounded">
					<img src="{{ $logo_prodi->temporaryUrl() }}" alt="Thumbnail" width="200" height="200">
				</div>
				<div class="d-grid gap-2 d-md-block mb-3">
				  <button class="btn btn-danger text-white" type="button" wire:click="removeLogoprodi">Hapus</button>
				</div>
			@else
				<div class="input-group mb-3 mt-2">
				  <input type="file" class="form-control" wire:model.defer="logo_prodi">
				  <label class="input-group-text">Upload</label>
				</div>
			@endif
		</div>
	</div>
    <div class="row">
		<label class="col-form-label">Struktur</label>
		<div class="col-sm-5">
			@if(isset($struktur))
				<div class="mb-1 rounded">
					<img src="{{ $struktur->temporaryUrl() }}" alt="Thumbnail" width="200" height="200">
				</div>
				<div class="d-grid gap-2 d-md-block mb-3">
				  <button class="btn btn-danger text-white" type="button" wire:click="removeStruktur">Hapus</button>
				</div>
			@else
				<div class="input-group mb-3 mt-2">
				  <input type="file" class="form-control" wire:model.defer="struktur">
				  <label class="input-group-text">Upload</label>
				</div>
			@endif
		</div>
	</div>
    <div class="row">
        <div class="col-sm-6">
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                <ul style="margin:0;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                </div>
            @endif
        </div>
    </div>
	<div class="row mb-3">
		<div class="col-sm-3">
			<button type="button" class="btn btn-danger text-white mr-2" wire:click="$emit('refreshProdi')">Batalkan</button>
			<button type="submit" class="btn btn-primary text-white">Simpan</button>
		</div>
	</div>
	</form>
</div>
