<div class="body flex-grow-1 px-3">
	<div class="container">
		<div class="card mb-4">
            <form wire:submit.prevent="saveSettings">
			@csrf			
				<div class="card-body p-5">
					<div class="row mt-3">
						<h4 class="card-title mb-2">Warna Tema Admin Dashboard</h4>
						<hr>
					</div>
					<div class="row mt-3">
						<div class="col-lg-3">
							<div class="mb-2">
							  <h6 class="card-title mb-0">Background</h6>
							</div>
							<input type="color" width="100" height="100" wire:model="settings.theme_color_sidebar_bg" />
						</div>
						<div class="col-lg-3">
							<div class="mb-2">
							  <h6 class="card-title mb-0">Teks Menu</h6>
							</div>
							<input type="color" width="100" height="100" wire:model="settings.theme_color_link" />
						</div>
						<div class="col-lg-3">
							<div class="mb-2">
							  <h6 class="card-title mb-0">Teks Menu Aktif</h6>
							</div>
							<input type="color" width="100" height="100" wire:model="settings.theme_color_link_active" />
						</div>
						<div class="col-lg-3">
							<div class="mb-2">
							  <h6 class="card-title mb-0">Background Menu Aktif</h6>
							</div>
							<input type="color" width="100" height="100" wire:model="settings.theme_color_link_active_bg" />
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-lg-3">
							<div class="mb-2">
							  <h6 class="card-title mb-0">Icon Menu Aktif</h6>
							</div>
							<input type="color" width="100" height="100" wire:model="settings.theme_color_icon_active" />
						</div>
						<div class="col-lg-3">
							<div class="mb-2">
							  <h6 class="card-title mb-0">Menu Hover</h6>
							</div>
							<input type="color" width="100" height="100" wire:model="settings.theme_color_link_hover" />
						</div>
						<div class="col-lg-3">
							<div class="mb-2">
							  <h6 class="card-title mb-0">Icon Menu Hover</h6>
							</div>
							<input type="color" width="100" height="100" wire:model="settings.theme_color_icon_hover" />
						</div>
					</div>
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
	</script>
</div>