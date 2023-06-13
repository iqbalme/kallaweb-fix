<div class="body flex-grow-1 px-3">
	<div class="container">
		<div class="card mb-4">
            <form wire:submit.prevent="saveSettings">
			@csrf			
				<div class="card-body p-5">
					<!---div class="row mt-3 mb-4">
						<div class="col-lg-4 mt-1">
							  <h5 class="card-title mb-0">Xendit Public Key</h5>
						</div>
						<div class="col-lg-6">
							<div class="input-group">
							  <input type="text" class="form-control" wire:model.defer="settings.xendit_key_public">
							</div>
						</div>
					</div-->
					<div class="row mt-3 mb-4">
						<div class="col-lg-4 mt-1">
							  <h5 class="card-title mb-0">Xendit Secret Key</h5>
						</div>
						<div class="col-lg-6">
							<div class="input-group">
							  <input type="text" class="form-control" wire:model.defer="settings.xendit_key_secret">
							</div>
						</div>
					</div>
					<div class="row mt-3 mb-4">
						<div class="col-lg-4 mt-1">
							  <h5 class="card-title mb-0">Xendit Callback Token</h5>
						</div>
						<div class="col-lg-6">
							<div class="input-group">
							  <input type="text" class="form-control" wire:model.defer="settings.xendit_callback_token">
							</div>
						</div>
					</div>
					<div class="row mt-3 mb-4">
						<div class="col-lg-4 mt-1">
							  <h5 class="card-title mb-0">Mode Pembayaran</h5>
						</div>
						<div class="col-lg-6">
							<div class="input-group">
							  <select class="form-control" wire:model="settings.mode_pembayaran">
								<option value="test">Test</option>
								<option value="live">Live</option>
							  </select>
							</div>
						</div>
					</div>
					<div class="row mt-3 mb-4">
						<div class="col-lg-4 mt-1">
							  <h5 class="card-title mb-0">Xendit Invoice Callback</h5>
						</div>
						<div class="col-lg-6">
							<div class="input-group">
							  <input type="text" class="form-control" value="{{route('xendit.invoice.update')}}" disabled>
							</div>
						</div>
					</div>
					<div class="row mt-3 mb-4">
						<div class="col-lg-4 mt-1">
							  <h5 class="card-title mb-0">Informasi</h5>
						</div>
						<div class="col-lg-6">
							<div class="input-group">
							  <ul>
								<li>
									Pastikan telah memiliki akun Xendit. Jika belum terdaftar, Anda bisa membuat akun dnegan melakukan klik pada link ini: <a href="https://dashboard.xendit.co/register/" target="blank">Daftar Xendit</a>. Anda juga memiliki opsi untuk memasukkan kode Promo, silakan masukkan kode berikut ini: <strong><i>BB1192D5</i></strong>.
								</li>
								<li>Untuk mendapatkan <i>Xendit Secret Key</i> dan <i>Xendit Callback Token</i>, silakan buka link ini: <a href="https://dashboard.xendit.co/settings/developers#callbacks" target="blank">https://dashboard.xendit.co/settings/developers#callbacks</a>.</li>
								<li>Secret Key dan Callback Token untuk Data tes dan Data live berbeda. Untuk pembayaran secara real, maka harus menggunakan secret key dan callback token yang data live.</li>
								<li>Sebelumnya lanjut, Anda harus memilih mode pembayaran. Jika akun live belum siap, maka Anda bisa memilih mode pembayaran "Test". Namun jika Anda memilih mode pembayaran "Live" maka pastikan <i>Xendit Callback Token</i> Anda adalah token untuk live, bukan token untuk demo/test.<br><br><a href="https://i.postimg.cc/fLNm4wS2/token-xendit.png" target="blank"><img src="https://i.postimg.cc/fLNm4wS2/token-xendit.png" style="max-width:95%"></a></li>
								<li>Lalu scroll ke bawah dan cari <i>Invoices -> Invoice Terbayarkan</i>, lalu isi dengan<i>Xendit Invoice Callback</i> di atas pada kotak input tersebut dan atur pengaturan lainnya seperti gambar di bawah ini:<br><br><a href="https://i.postimg.cc/s2K0x0PJ/xendit-invoice-callback.png" target="blank"><img src="https://i.postimg.cc/s2K0x0PJ/xendit-invoice-callback.png" style="max-width:95%"></a></li>
								<li>Selanjutnya tekan <i>"Tes dan Simpan"</i></li>
								<li>Pastikan Anda mendapat response status 200 dan pesan "Sukses validasi callback" seperti gambar di bawah ini:<br><br><a href="https://i.postimg.cc/hv0H8PTH/respon-token.png" target="blank"><img src="https://i.postimg.cc/hv0H8PTH/respon-token.png" style="max-width:95%"></a></li>
								<li>Jika terjadi perubahan secret key, atau Anda ingin menggunakan data live, maka Anda harus mengatur kembali seperti awal dan silakan sesuaikan pengaturan di halaman ini dengan pengaturan di halaman Xendit lalu menyimpannya kembali di kedua halaman tersebut.</li>
							  </ul>
							</div>
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
	function refreshPage(){
		location.reload();
	}
	</script>
</div>