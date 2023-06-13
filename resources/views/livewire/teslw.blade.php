<div>
	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary" data-coreui-toggle="modal" data-coreui-target="#exampleModal">
	  Launch demo modal
	</button>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" data-backdrop="false" wire:ignore.self>
	  <div class="modal-dialog">
		<div class="modal-content">
		  <form wire:submit.prevent="">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Tambah Voucher</h5>
			<button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary text-white" data-coreui-dismiss="modal">Tidak</button>
			<button type="button" class="btn btn-primary text-white" wire:click="tutup">Simpan</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<script>
	window.addEventListener('postUpdated', event => {
		jQuery('#exampleModal').modal('hide');
	});
	 </script>
</div>
