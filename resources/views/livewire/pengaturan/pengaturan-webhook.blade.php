<div class="body flex-grow-1 px-3">
	<div class="container">
		<div class="card mb-4">
            <form wire:submit.prevent="saveSettings">
			@csrf
				<div class="card-body p-5">
					<div class="row mt-1">
						<div class="col text-center">
							<h3>Webhook</h3>
						</div>
					</div>
					<hr>
					<div class="row mt-4">
						<div class="col-lg-4">
							<h5 class="card-title mb-2">Webhook URL untuk Admisi</h5>
						</div>
						<div class="col-lg-6">
							  <input type="text" class="form-control" wire:model="settings.admisi_webhook_url" placeholder="https://">
							</div>
					</div>
                    <div class="row mt-4">
						<div class="col-lg-12">
                            <div class="alert alert-primary" role="alert">
                                Kode spesifik disertakan pada header <code>secret-key : 7436RGW4GS37FG4F6LLHL</code> untuk memastikan bawa reqest tersebut adalah dari server ini. Silakan cek kode tersebut saat memproses data webhook untuk keamanan data.
                              </div>
                        </div>
                    </div>
					<div class="row mt-3">
						<div class="col-lg-4">
							<h5 class="card-title mb-2">Contoh Request</h5><br>
                            <code>method: POST</code>
						</div>
						<div class="col-lg-6">
							  <div class="form-control" id="webhook_req" style="background-color: #d8dbe0;border-color: #b1b7c1;opacity: 1;">{"nama" : "Budi Sudarto", "email" : "budisudarto@gmail.com", "hp" : "085362426119", "no_ktp" : "7326294748952100", "prodi" : "Bisnis Digital"}</div>
						</div>
					</div>

					<div class="row mt-4">
						<div class="col-lg-4">
							<h5 class="card-title mb-2">Incoming Webhook untuk Event</h5>
						</div>
						<div class="col-lg-6">
							  <input type="text" class="form-control" value="{{route('event.peserta.add')}}"disabled>
							</div>
					</div>
					<div class="row mt-3">
						<div class="col-lg-4">
							<h5 class="card-title mb-2">Contoh Request</h5>
						</div>
						<div class="col-lg-6">
							  <div class="form-control" id="webhook_req2" style="background-color: #d8dbe0;border-color: #b1b7c1;opacity: 1;">{"nama" : "Budi Sudarto", "email" : "budisudarto@gmail.com", "hp" : "085362426119", "event_id" : 2, "event_url" : "{{route('event.show', ['event_id' => 2])}}" }</div>
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
		function printTheJSONInPrettyFormat() {
			var badJSON = document.getElementById('webhook_req').innerText;
			var badJSON2 = document.getElementById('webhook_req2').innerText;
			var parseJSON = JSON.parse(badJSON);
			var parseJSON2 = JSON.parse(badJSON2);
			var JSONInPrettyFormat = JSON.stringify(parseJSON, undefined, 4);
			var JSONInPrettyFormat2 = JSON.stringify(parseJSON2, undefined, 4);
			document.getElementById('webhook_req').innerText = JSONInPrettyFormat;
			document.getElementById('webhook_req2').innerText = JSONInPrettyFormat2;
		}
		printTheJSONInPrettyFormat();
	</script>
</div>
