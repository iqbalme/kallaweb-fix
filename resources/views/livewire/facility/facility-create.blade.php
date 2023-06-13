<div>
    <div class="modal fade" id="galeriModal" tabindex="-1" wire:ignore.self>
	  <div class="modal-dialog">
		<div class="modal-content">
			<form wire:submit.prevent="simpan">
			@csrf
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Galeri</h5>
				<button type="button" class="btn-close" wire:click="closeFormGaleri" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row mt-3">
					<div class="d-flex justify-content-between">
						<div>
						  <h6 class="card-title mb-2">Gambar</h6>
						  <!--div class="small text-medium-emphasis">January - July 2022</div-->
						</div>
					</div>
					@if(isset($gambar))
					<div class="mb-1 rounded">
						<img src="{{ $gambar->temporaryUrl() }}" alt="avatar" width="200" height="200">
					</div>
					<div class="d-grid gap-2 d-md-block">
					  <button class="btn btn-danger text-white" type="button" wire:click="hapusGambar">Hapus</button>
					</div>
					@else
						<div class="col-lg-12">
							<div class="input-group mb-3 mt-2">
							  <input type="file" class="form-control" wire:model="gambar" required>
							  <label class="input-group-text">Upload</label>
							</div>
						</div>
					@endif
				</div>
				<div class="mb-3">
				  <h6 class="card-title mt-3 mb-2">Judul Galeri</h6>
				  <input type="text" class="form-control" wire:model.lazy="judul">
				</div>
            </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary text-white" wire:click="closeFormGaleri">Tidak</button>
				<button type="submit" class="btn btn-primary text-white">Simpan</button>
			</div>
			</form>			
          </div>
		</div>
	</div>
	<script>
		window.addEventListener('closeModalGaleri', event => {
		jQuery('#galeriModal').modal('hide');
		jQuery('.modal-backdrop').hide();
	});
	</script>
</div>
