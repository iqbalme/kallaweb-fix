<div>
	<form wire:submit.prevent="create">
	@csrf
	<div class="mb-3 row">
		<div class="col-sm-12 mb-2">
			<div class="col-sm-4">
			  <input type="text" class="form-control" wire:model="nama_katalog" placeholder="Nama Item">
			</div>
		</div>
		<div class="col-sm-12">
			<div class="col-sm-4 mb-2">
			  <textarea class="form-control" wire:model="deskripsi_katalog" placeholder="Deskripsi Item"></textarea>
			</div>
		</div>
		<div class="col-sm-12 mb-2">
			<div class="col-sm-4">
			  <input type="number" class="form-control" wire:model="harga" placeholder="Harga">
			</div>
		</div>
		<div class="mb-3">
			<div class="form-check">
			  <input class="form-check-input" type="checkbox" wire:model.defer="allow_in_cart">
			  <label class="form-check-label">
			  Single Item
			  </label>
			</div>
		</div>
		<div class="col-sm-3">
			<button type="button" class="btn btn-danger text-white mr-2" wire:click="batalkanKatalog()">Batalkan</button>
			<button type="submit" class="btn btn-primary text-white">Simpan</button>
		</div>
	</div>
	</form>
</div>