<div class="body flex-grow-1 px-3">
	<div class="container">
		<div class="card mb-4">
            <form wire:submit.prevent="saveSettings">
			@csrf
				<div class="card-body p-5">
					<div class="d-flex justify-content-between">
						<div>
						  <h4 class="card-title mb-0">Permalink</h4>
						  <div class="small text-medium-emphasis">Set link post berdasarkan judul (bukan id)</div>
						</div>
					</div>
					<div class="form-check form-switch mt-2">
						<input class="form-check-input" type="checkbox" role="switch" wire:model="settings.post_slug">
						<label class="form-check-label">SEO Friendly</label>
					</div>
					<div class="row mt-3">
						<div class="col-lg-12">
							<div>
							  <h5 class="card-title mb-0">Judul Website</h5>
							</div>
							<div class="input-group mb-3 mt-2">
							  <input type="text" class="form-control" wire:model="settings.web_title">
							</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-lg-6">
							<div>
							  <h4 class="card-title mb-0">Logo Website</h4>
							</div>
							@if(!is_null($settings['web_logo']))
								@if($isLogoInitialized)
									<div class="mt-1 mb-1 rounded">
										<img src="{{ asset('storage/images/'.$settings['web_logo']) }}" alt="Web Logo" width="300" height="auto">
									</div>
								@else
									<div class="mt-1 mb-1 rounded">
										<img src="{{ $settings['web_logo']->temporaryUrl() }}" alt="Web Logo" width="200" height="200">
									</div>
								@endif
							<div class="d-grid gap-2 d-md-block">
							  <button class="btn btn-danger text-white" type="button" wire:click="removeLogo">Hapus</button>
							</div>
							@else
								<div class="input-group mb-3 mt-2">
								  <input type="file" class="form-control" wire:model.defer="settings.web_logo">
								  <label class="input-group-text">Upload</label>
								</div>
							@endif
						</div>
						<div class="col-lg-6">
							<div>
							  <h4 class="card-title mb-0">Gambar Ikon Website</h4>
							  <!--div class="small text-medium-emphasis">January - July 2022</div-->
							</div>
							@if(!is_null($settings['web_icon']))
								@if($isIconInitialized)
									<div class="mb-1 rounded">
										<img src="{{ asset('storage/images/'.$settings['web_icon']) }}" alt="Web Icon" width="200" height="auto">
									</div>
								@else
									<div class="mb-1 rounded">
										<img src="{{ $settings['web_icon']->temporaryUrl() }}" alt="Web Icon" width="200" height="200">
									</div>
								@endif
								<div class="d-grid gap-2 d-md-block">
									<button class="btn btn-danger text-white" type="button" wire:click="removeIcon">Hapus</button>
								</div>
							@else
								<div class="input-group mb-3 mt-2">
								  <input type="file" class="form-control" wire:model.defer="settings.web_icon">
								  <label class="input-group-text">Upload</label>
								</div>
							@endif
						</div>
					</div>

					<div class="row mt-3">
						<div class="col-lg-6">
							<div>
							  <h4 class="card-title mb-0">Struktur Organisasi</h4>
							</div>
							@if(!is_null($settings['struktur_organisasi']))
								@if($isStrukturInitialized)
									<div class="mt-1 mb-1 rounded">
										<img src="{{ asset('storage/images/'.$settings['struktur_organisasi']) }}" alt="Struktur Organisasi" width="300" height="auto">
									</div>
								@else
									<div class="mt-1 mb-1 rounded">
										<img src="{{ $settings['struktur_organisasi']->temporaryUrl() }}" alt="Struktur Organisasi" width="200" height="200">
									</div>
								@endif
								<div class="d-grid gap-2 d-md-block">
									<button class="btn btn-danger text-white" type="button" wire:click="removeStruktur">Hapus</button>
								</div>
							@else
								<div class="input-group mb-3 mt-2">
								  <input type="file" class="form-control" wire:model.defer="settings.struktur_organisasi">
								  <label class="input-group-text">Upload</label>
								</div>
							@endif
						</div>
						<div class="col-lg-6">
							<div>
							  <h4 class="card-title mb-0">Biaya Kuliah</h4>
							</div>
							@if(!is_null($settings['biaya_kuliah']))
								@if($isBiayaKuliahInitialized)
									<div class="mt-1 mb-1 rounded">
										<img src="{{ asset('storage/images/'.$settings['biaya_kuliah']) }}" alt="Biaya Kuliah" width="300" height="auto">
									</div>
								@else
									<div class="mt-1 mb-1 rounded">
										<img src="{{ $settings['biaya_kuliah']->temporaryUrl() }}" alt="Biaya Kuliah" width="200" height="200">
									</div>
								@endif
								<div class="d-grid gap-2 d-md-block">
									<button class="btn btn-danger text-white" type="button" wire:click="removeBiayaKuliah">Hapus</button>
								</div>
							@else
								<div class="input-group mb-3 mt-2">
								  <input type="file" class="form-control" wire:model.defer="settings.biaya_kuliah">
								  <label class="input-group-text">Upload</label>
								</div>
							@endif
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-lg-6">
							<div>
							  <h4 class="card-title mb-0">Registrasi Ulang</h4>
							</div>
							@if(!is_null($settings['registrasi_ulang']))
								@if($isRegistrasiUlangInitialized)
									<div class="mt-1 mb-1 rounded">
										<img src="{{ asset('storage/images/'.$settings['registrasi_ulang']) }}" alt="Registrasi Ulang" width="300" height="auto">
									</div>
								@else
									<div class="mt-1 mb-1 rounded">
										<img src="{{ $settings['registrasi_ulang']->temporaryUrl() }}" alt="Registrasi Ulang" width="200" height="200">
									</div>
								@endif
								<div class="d-grid gap-2 d-md-block">
									<button class="btn btn-danger text-white" type="button" wire:click="removeRegistrasiUlang">Hapus</button>
								</div>
							@else
								<div class="input-group mb-3 mt-2">
								  <input type="file" class="form-control" wire:model.defer="settings.registrasi_ulang">
								  <label class="input-group-text">Upload</label>
								</div>
							@endif
						</div>
						<div class="col-lg-6">
							<div>
							  <h4 class="card-title mb-0">Info Beasiswa</h4>
							</div>
							@if(!is_null($settings['info_beasiswa']))
								@if($isInfoBeasiswaInitialized)
									<div class="mt-1 mb-1 rounded">
										<img src="{{ asset('storage/images/'.$settings['info_beasiswa']) }}" alt="Info Beasiswa" width="300" height="auto">
									</div>
								@else
									<div class="mt-1 mb-1 rounded">
										<img src="{{ $settings['info_beasiswa']->temporaryUrl() }}" alt="Info Beasiswa" width="200" height="200">
									</div>
								@endif
								<div class="d-grid gap-2 d-md-block">
									<button class="btn btn-danger text-white" type="button" wire:click="removeInfoBeasiswa">Hapus</button>
								</div>
							@else
								<div class="input-group mb-3 mt-2">
								  <input type="file" class="form-control" wire:model.defer="settings.info_beasiswa">
								  <label class="input-group-text">Upload</label>
								</div>
							@endif
						</div>
					</div>
					<div class="row mt-3">
						<div class="col">
							<div>
							  <h5 class="card-title mb-0">Link Registrasi Ulang</h5>
							</div>
							<div class="input-group mb-3 mt-2">
							  <input type="text" class="form-control" wire:model.defer="settings.registrasi_ulang_link" placeholder="https://">
							</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col">
							<div>
							  <h5 class="card-title mb-0">Gambar yang ditampilkan jika registrasi belum dibuka (kosongkan jika tidak perlu)</h5>
							</div>
							@if(!is_null($settings['registrasi_tutup_picture']))
								@if($isRegistrationClosedPic)
									<div class="mt-1 mb-1 rounded">
										<img src="{{ asset('storage/images/'.$settings['registrasi_tutup_picture']) }}" alt="Gambar Info Registrasi" width="300" height="auto">
									</div>
								@else
									<div class="mt-1 mb-1 rounded">
										<img src="{{ $settings['registrasi_tutup_picture']->temporaryUrl() }}" alt="Gambar Info Registrasi" width="200" height="200">
									</div>
								@endif
								<div class="d-grid gap-2 d-md-block">
									<button class="btn btn-danger text-white" type="button" wire:click="removeGambarRegistrasiTutup">Hapus</button>
								</div>
							@else
								<div class="input-group mb-3 mt-2">
								  <input type="file" class="form-control" wire:model.defer="settings.registrasi_tutup_picture">
								  <label class="input-group-text">Upload</label>
								</div>
							@endif
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-lg-6">
							<div>
							  <h5 class="card-title mb-0">Tag Website (Pisahkan dengan koma)</h5>
							</div>
							<div class="input-group mb-3 mt-2">
							  <input type="text" class="form-control" wire:model.defer="settings.web_tag">
							</div>
						</div>
						<div class="col-lg-6">
							<div>
							  <h5 class="card-title mb-0">Keyword Website (Pisahkan dengan koma)</h5>
							</div>
							<div class="input-group mb-3 mt-2">
							  <input type="text" class="form-control" wire:model.defer="settings.web_keywords">
							</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-lg-6">
							<div>
							  <h5 class="card-title mb-0">FB Pixel</h5>
							</div>
							<div class="input-group mb-3 mt-2">
							  <input type="text" class="form-control" wire:model.defer="settings.fb_pixel">
							</div>
						</div>
						<div class="col-lg-6">
							<div>
							  <h5 class="card-title mb-0">Google Analytics</h5>
							</div>
							<div class="input-group mb-3 mt-2">
							  <input type="text" class="form-control" wire:model.defer="settings.google_analytics">
							</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="d-flex justify-content-between">
							<div>
							  <h4 class="card-title mb-0">Deskripsi Website</h4>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="input-group mb-3 mt-2">
							  <textarea class="form-control" wire:model.defer="settings.web_description"></textarea>
							</div>
						</div>
					</div>
                    <div class="row mt-3">
						<div class="d-flex justify-content-between">
							<div>
							  <h4 class="card-title mb-0">Visi Misi Kampus</h4>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="input-group mb-3 mt-2">
							  <textarea class="form-control" wire:model.defer="settings.visi_misi"></textarea>
							</div>
						</div>
					</div>

					<div class="row mt-3">
						<div class="col-lg-12">
							<div>
							  <h5 class="card-title mb-0">Alamat</h5>
							</div>
							<div class="input-group mb-3 mt-2">
							  <textarea class="form-control" wire:model="settings.alamat"></textarea>
							</div>
						</div>
						<div class="col-lg-6">
							<div>
							  <h5 class="card-title mb-0">Email</h5>
							</div>
							<div class="input-group mb-3 mt-2">
							  <input type="text" class="form-control" wire:model="settings.email">
							</div>
						</div>
						<div class="col-lg-6">
							<div>
							  <h5 class="card-title mb-0">No. Kontak</h5>
							</div>
							<div class="input-group mb-3 mt-2">
							  <input type="text" class="form-control" wire:model="settings.no_kontak">
							</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-lg-6">
							<div>
							  <h5 class="card-title mb-0">Facebook</h5>
							</div>
							<div class="input-group mb-3 mt-2">
							  <input type="text" class="form-control" wire:model="settings.facebook">
							</div>
						</div>
						<div class="col-lg-6">
							<div>
							  <h5 class="card-title mb-0">Instagram</h5>
							</div>
							<div class="input-group mb-3 mt-2">
							  <input type="text" class="form-control" wire:model="settings.instagram">
							</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-lg-6">
							<div>
							  <h5 class="card-title mb-0">Twitter</h5>
							</div>
							<div class="input-group mb-3 mt-2">
							  <input type="text" class="form-control" wire:model="settings.twitter">
							</div>
						</div>
						<div class="col-lg-6">
							<div>
							  <h5 class="card-title mb-0">Youtube</h5>
							</div>
							<div class="input-group mb-3 mt-2">
							  <input type="text" class="form-control" wire:model="settings.youtube">
							</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-lg-6">
							<div>
							  <h5 class="card-title mb-0">Tiktok</h5>
							</div>
							<div class="input-group mb-3 mt-2">
							  <input type="text" class="form-control" wire:model="settings.tiktok">
							</div>
						</div>
					</div>
					<!--div class="row mt-3">
						<div class="d-flex justify-content-between">
							<div>
							  <h4 class="card-title mb-0">Mode Pembayaran</h4>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="input-group mb-3 mt-2">
							  <select class="form-control" wire:model.defer="settings.payment_test">
								<option value="test">Test</option>
								<option value="live">Live</option>
							  </select>
							</div>
						</div>
					</div-->
					<hr>
					<div class="row mb-2">
						<button type="submit" class="btn btn-primary btn-lg">Simpan</button>
					</div>
					@if($messageSave)
						<div class="alert alert-success alert-dismissible fade show" role="alert" id="alertsave">
						  Pengaturan telah disimpan
						  <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
						</div>
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
	function refreshPage(){
		location.reload();
	}
	</script>
</div>
