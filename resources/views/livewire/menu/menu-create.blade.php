<div>
	<div class="modal fade" id="menuCreateModal" tabindex="-1" aria-labelledby="menuCreateModalLabel" aria-hidden="true" wire:ignore.self>
	  <div class="modal-dialog">
		<form wire:submit.prevent="create">
			@csrf
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="menuCreateModalLabel">Tambah Menu</h5>
			
			<button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
			<div class="container">
			
			<div class="mb-3 row">
				<div class="col-sm-12">
					<label class="col-form-label">Nama Menu</label>
					  <input type="text" class="form-control" wire:model="nama_menu" placeholder="Nama Menu">
				</div>
			</div>
			<div class="mb-3 row">
				<div class="col-sm-12">
					<label class="col-form-label">Tipe Menu</label>
					  <select class="form-control" wire:model="tipe_menu">
							<option value="link">Tautan</option>
							<option value="kategori">Kategori</option>
							<option value="prodi">Program Studi</option>
							<option value="katalog">Katalog</option>
					  </select>
				</div>
			</div>
			<div class="mb-3 row">
				@if($tipe_menu !== 'link')
					<div class="col-sm-12">
						<label class="col-form-label">Link Menu</label>
						  <select class="form-control">
								<option value="kategori">Kategori</option>
						  </select>
					</div>
				@endif
				@if($tipe_menu === 'link')
					<div class="col-sm-12">
						<label class="col-form-label">Link Menu</label>
						  <input type="text" class="form-control" wire:model="link" placeholder="https://">
					</div>
				@endif
			</div>
			</div>
			
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save changes</button>
			</div>
			
		</div>
		</form>
	  </div>
	</div>
	<script>
	window.addEventListener('closeModal', event => {
		jQuery('#menuCreateModal').modal('hide');
	});
	</script>
</div>