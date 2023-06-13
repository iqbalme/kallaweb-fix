<div class="body flex-grow-1 px-3">
	<div class="container">
		<div class="card mb-4">
            <form wire:submit.prevent="saveSettings">
			@csrf			
				<div class="card-body p-5">
					<div class="row mt-3">
						<div class="col-lg-4">
							<h5 class="card-title mb-3">Status Admisi</h5>
						</div>
						<div class="col-lg-6">
							<div class="form-check">
							  <input class="form-check-input" type="checkbox" wire:model="settings.status_pendaftaran">
							  <label class="form-check-label">
							  <h6 class="card-title mb-0">&nbsp;&nbsp;Aktif</h6>
							  </label>
							</div>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col-lg-4">
							<h5 class="card-title mb-2">Nominal</h5>
						</div>
						<div class="col-lg-4">
							<div class="input-group mb-2">
							  <span class="input-group-text">Rp.</span>
							  <input type="text" class="form-control" wire:model="settings.nominal_admisi">
							  <span class="input-group-text">.00</span>
							</div>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col-lg-4">
							<h5 class="card-title mb-2">Biaya Layanan</h5>
						</div>
						<div class="col-lg-4">
							<div class="input-group mb-2">
							  <span class="input-group-text">Rp.</span>
							  <input type="text" class="form-control" wire:model="settings.biaya_layanan_admisi">
							  <span class="input-group-text">.00</span>
							</div>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col-lg-4">
							<h5 class="card-title mb-3">Izinkan Voucher</h5>
						</div>
						<div class="col-lg-6">
							<div class="form-check mt-1">
							  <input class="form-check-input" type="checkbox" wire:model="settings.is_voucher">
							  <label class="form-check-label">
							  <h6 class="card-title mb-0">&nbsp;&nbsp;Aktif</h6>
							  </label>
							</div>
						</div>
					</div>
					<div class="row mt-1">
						<div class="col-lg-4">
							<h5 class="card-title mb-2">Pesan Saat Admisi Tidak Aktif</h5>
						</div>
						<div class="col-lg-4">
							  <input type="text" class="form-control" wire:model="settings.pesan_admisi_non_aktif">
							</div>
					</div>
					<hr>
					<div class="row mb-2">
						<button type="submit" class="btn btn-primary btn-lg">Simpan</button>
					</div>
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
	function printTheJSONInPrettyFormat() {
      var badJSON = document.getElementById('webhook_req').innerText;
      var parseJSON = JSON.parse(badJSON);
      var JSONInPrettyFormat = JSON.stringify(parseJSON, undefined, 4);
      document.getElementById('webhook_req').innerText = JSONInPrettyFormat;
   }
    window.addEventListener('prettyReqForm', event => {
		printTheJSONInPrettyFormat();
	});
	</script>
</div>