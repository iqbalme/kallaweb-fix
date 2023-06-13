<div class="body flex-grow-1 px-3">
	<div class="container">
		<div class="card mb-4">
			<div class="row text-center mt-5">
				<div class="container">
					<h3>Pengaturan Mail</h3>
				</div>
			</div>
			<hr>
            <form wire:submit.prevent="saveSettings">
			@csrf			
				<div class="card-body p-5">
					<div class="row mt-3 mb-4">
						<div class="col-lg-4 mt-1">
							  <h5 class="card-title mb-0">SMTP Server</h5>
						</div>
						<div class="col-lg-6">
							<div class="input-group">
							  <input type="text" class="form-control" wire:model.defer="settings.smtp_server">
							</div>
						</div>
					</div>
					<div class="row mt-3 mb-4">
						<div class="col-lg-4 mt-1">
							  <h5 class="card-title mb-0">Port</h5>
						</div>
						<div class="col-lg-6">
							<div class="input-group">
							  <input type="number" class="form-control" wire:model.defer="settings.smtp_port">
							</div>
						</div>
					</div>
					<div class="row mt-3 mb-4">
						<div class="col-lg-4 mt-1">
							  <h5 class="card-title mb-0">Username</h5>
						</div>
						<div class="col-lg-6">
							<div class="input-group">
							  <input type="text" class="form-control" wire:model.defer="settings.smtp_username">
							</div>
						</div>
					</div>
					<div class="row mt-3 mb-4">
						<div class="col-lg-4 mt-1">
							  <h5 class="card-title mb-0">Password</h5>
						</div>
						<div class="col-lg-6">
							<div class="input-group">
							  <input type="password" class="form-control" wire:model.defer="settings.smtp_password">
							</div>
						</div>
					</div>
					<div class="row mt-3 mb-4">
						<div class="col-lg-4 mt-1">
							  <h5 class="card-title mb-0">Encryption</h5>
						</div>
						<div class="col-lg-6">
							<div class="input-group">
								<select class="form-control" wire:model="settings.smtp_encryption">
									<option value="tls">TLS</option>
									<option value="ssl">SSL</option>
									<option value="starttls">STARTTLS</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row mt-3 mb-4">
						<div class="col-lg-4 mt-1">
							  <h5 class="card-title mb-0">Nama Pengirim</h5>
						</div>
						<div class="col-lg-6">
							<div class="input-group">
							  <input type="text" class="form-control" wire:model.defer="settings.email_nama">
							</div>
						</div>
					</div>
					<div class="row mt-3 mb-4">
						<div class="col-lg-4 mt-1">
							  <h5 class="card-title mb-0">Email Pengirim</h5>
						</div>
						<div class="col-lg-6">
							<div class="input-group">
							  <input type="email" class="form-control" wire:model.defer="settings.email_pengirim">
							</div>
						</div>
					</div>
					<hr>
					<div class="container p-3">
					<div class="row mb-2">
						<button type="submit" class="btn btn-primary btn-lg">Simpan</button>
					</div>
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