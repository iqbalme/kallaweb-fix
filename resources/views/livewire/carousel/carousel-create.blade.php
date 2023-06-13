<div>
<div class="modal fade" id="CarouselModal" tabindex="-1" wire:ignore>
	  <div class="modal-dialog">
		<div class="modal-content">
            <form wire:submit.prevent="saveSettings">
			@csrf			
				<div class="card-body p-4">
					<div class="row">
						<h4 class="card-title mb-2">Tambah</h4>
						<hr>
					</div>
					<div class="row mt-3">
						<div class="col-lg-3">
							<div class="mb-2">
							  <h6 class="card-title mb-0">Tipe</h6>
							</div>
							<select class="form-control" wire:model="carousel_tipe">
								<option value="post">Post</option>
								<option value="custom">Custom</option>
							</select>
						</div>
						@isset($posts)
						<div class="col-lg-9">
							<div class="mb-2">
							  <h6 class="card-title mb-0">Pilih Publikasi</h6>
							</div>
							<select class="form-control">
									@foreach($posts as $key => $val)
										<option value="{{ $val }}">{{ $key }}</option>
									@endforeach
							</select>
						</div>
						@endisset
						@if($carousel_tipe == 'custom')
						<div class="col-lg-9">
							<div class="mb-2">
							  <h6 class="card-title mb-0">Judul</h6>
							</div>
							<input type="text" class="form-control">
						</div>
						@endif
					</div>
					@if($carousel_tipe === 'custom')
					<div class="row mt-3">
						<div class="col-lg-12">
							<div class="mb-2">
							  <h6 class="card-title mb-0">Deskripsi</h6>
							</div>
							<input type="text" class="form-control">
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-lg-4">
							<div class="mb-2">
							  <h6 class="card-title mb-0">Aktifkan Link</h6>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="form-check">
							  <input class="form-check-input" type="checkbox" wire:model.defer="carousel.status_pendaftaran">
							  <label class="form-check-label">
							  Aktif
							  </label>
							</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-lg-12">
							<div class="mb-2">
							  <h6 class="card-title mb-0">Link</h6>
							</div>
							<input type="text" class="form-control">
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-lg-12">
							<div>
							  <h6 class="card-title mb-0">Gambar Carousel</h6>
							</div>
							@if(isset($carousel['gambar']))
								@if($isImageInitialized)
									<div class="mb-1 rounded">
										<img src="{{ asset('storage/images/'.$carousel['gambar']) }}" alt="Web Icon" width="200" height="auto">
									</div>
								@else
									<div class="mb-1 rounded">
										<img src="{{ $carousel['gambar']->temporaryUrl() }}" alt="Carousel Picture" width="200" height="200">
									</div>
								@endif
							<div class="d-grid gap-2 d-md-block">
							  <button class="btn btn-danger text-white" type="button" wire:click="removeImage">Hapus</button>
							</div>
							@else
								<div class="input-group mb-3 mt-2">
								  <input type="file" class="form-control" wire:model.defer="carousel.gambar">
								  <label class="input-group-text">Upload</label>
								</div>
							@endif
						</div>
					</div>
					@endif
					<hr>
					<div class="row mb-2">
						<button type="submit" class="btn btn-primary btn-lg">Simpan</button>
					</div>
					@if($messageSave)
						<div class="alert alert-success alert-dismissible fade show" role="alert" id="alertsave">
						  Pengaturan telah disimpan
						  <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
						</div>
						<script>
							setTimeout(closeAlert, 3000);
						</script>
					@endif
				</div>
			</form>
		</div>
	</div>
	<script>
	function closeAlert(){
		const alert = coreui.Alert.getOrCreateInstance('#alertsave')
		alert.close();
	}
	</script>
</div>
</div>