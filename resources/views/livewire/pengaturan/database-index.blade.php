<div class="body flex-grow-1 px-3">
	<div class="container">
		<div class="card mb-4">
            <div class="card-body p-5">
                <div class="row mt-1">
                    <div class="col text-center">
                        <h3>Reset Database</h3>
                    </div>
                </div>
                <hr>
                <div class="alert alert-danger" role="alert">
                    Pastikan Anda tahu apa yang akan dilakukan, kehilangan data akan permanen dan tidak bisa dikembalikan !!
                  </div>
                <div class="row mt-4 justify-content-between">
                    <div class="col-lg-3">
                        <h5>Hapus Data Pendaftar</h5>
                    </div>
                    <div class="col-lg-2">
                        <button type="button" class="btn btn-danger text-white" wire:click="hapusDataPendaftar''">Hapus</button>
                    </div>
                    <div class="col-lg-3">
                        <h5>Hapus Data Berita</h5>
                    </div>
                    <div class="col-lg-2">
                        <button type="button" class="btn btn-danger text-white" wire:click="hapusDataBerita''">Hapus</button>
                    </div>
                </div>
                <div class="row mt-4 justify-content-between">
                    <div class="col-lg-3">
                        <h5>Hapus Data User</h5>
                    </div>
                    <div class="col-lg-2">
                        <button type="button" class="btn btn-danger text-white" wire:click="hapusDataUser''">Hapus</button>
                    </div>
                    <div class="col-lg-3">
                        <h5>Hapus Data Role</h5>
                    </div>
                    <div class="col-lg-2">
                        <button type="button" class="btn btn-danger text-white" wire:click="hapusDataRole">Hapus</button>
                    </div>
                </div>
                <div class="row mt-4 justify-content-between">
                    <div class="col-lg-3">
                        <h5>Hapus Data Voucher</h5>
                    </div>
                    <div class="col-lg-2">
                        <button type="button" class="btn btn-danger text-white" wire:click="hapusDataVoucher''">Hapus</button>
                    </div>
                    <div class="col-lg-3">
                        <h5>Hapus Data Event</h5>
                    </div>
                    <div class="col-lg-2">
                        <button type="button" class="btn btn-danger text-white" wire:click="hapusDataEvent">Hapus</button>
                    </div>
                </div>
                <div class="row mt-4 justify-content-between">
                    <div class="col-lg-3">
                        <h5>Hapus Data Dosen</h5>
                    </div>
                    <div class="col-lg-2">
                        <button type="button" class="btn btn-danger text-white" wire:click="hapusDataDosen">Hapus</button>
                    </div>
                    <div class="col-lg-3">
                        <h5>Hapus Data Testimoni</h5>
                    </div>
                    <div class="col-lg-2">
                        <button type="button" class="btn btn-danger text-white" wire:click="hapusDataTestimoni">Hapus</button>
                    </div>
                </div>
                <div class="row mt-4 justify-content-between">
                    <div class="col-lg-3">
                        <h5>Hapus Data Kategori</h5>
                    </div>
                    <div class="col-lg-2">
                        <button type="button" class="btn btn-danger text-white" wire:click="hapusDataKategori''">Hapus</button>
                    </div>
                    <div class="col-lg-3">
                        <h5>Hapus Data Prodi</h5>
                    </div>
                    <div class="col-lg-2">
                        <button type="button" class="btn btn-danger text-white" wire:click="hapusDataProdi">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
