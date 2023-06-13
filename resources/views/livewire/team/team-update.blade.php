<div>
    <div class="modal fade" id="TeamModalEdit" tabindex="-1" wire:ignore.self>
	  <div class="modal-dialog">
		<div class="modal-content">
			<form wire:submit.prevent="update">
			@csrf
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Tim</h5>
				<button type="button" class="btn-close" wire:click="closeModal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="mb-3">
				  <h6 class="card-title mb-2">Nama</h6>
				  <input type="text" class="form-control" wire:model.lazy="nama" required>
				</div>
				<div class="mb-3">
				  <h6 class="card-title mb-2">Deskripsi</h6>
					<div class="form-group">
						<textarea id="editor-tim-update" wire:model="deskripsi_tim" style="resize: none;"></textarea>
					</div>
				</div>
				<div class="mb-3">
				  <h6 class="card-title mb-2">Jabatan</h6>
				  <input type="text" class="form-control" wire:model.lazy="jabatan" required>
				</div>
				<div class="row">
					<div class="col-6 mb-3">
					  <h6 class="card-title mb-2">Facebook</h6>
					  <input type="text" class="form-control" wire:model.lazy="facebook">
					</div>
					<div class="col-6 mb-3">
					  <h6 class="card-title mb-2">Instagram</h6>
					  <input type="text" class="form-control" wire:model.lazy="instagram">
					</div>
				</div>
				<div class="row">
					<div class="col-6 mb-3">
					  <h6 class="card-title mb-2">Linked In</h6>
					  <input type="text" class="form-control" wire:model.lazy="linkedin">
					</div>
					<div class="col-6 mb-3">
					  <h6 class="card-title mb-2">Email</h6>
					  <input type="text" class="form-control" wire:model.lazy="email" required>
					</div>
				</div>
				<div class="row mt-3">
					<div class="d-flex justify-content-between">
						<div>
						  <h6 class="card-title mb-2">Gambar</h6>
						  <!--div class="small text-medium-emphasis">January - July 2022</div-->
						</div>
					</div>
					@if(isset($gambar))
					<div class="mb-1 rounded">
						@if($initGambar)
							<img src="{{ asset('storage/images/'.$gambar) }}" alt="avatar" width="200" height="200">
						@else
							<img src="{{ $gambar->temporaryUrl() }}" alt="avatar" width="200" height="200">
						@endif
					</div>
					<div class="d-grid gap-2 d-md-block">
					  <button class="btn btn-danger text-white" type="button" wire:click="hapusGambar">Hapus</button>
					</div>
					@else
						<div class="col-lg-12">
							<div class="input-group mb-3 mt-2">
							  <input type="file" class="form-control" wire:model="gambar" required>
							  <label class="input-group-text">Upload</label>
							</div>
						</div>
					@endif
				</div>
                @if(count($data['prodis']) >1)
                <hr>
                <div class="mt-3 mb-3">
                    <h6 class="card-title mb-1">Tampilkan pada</h6>
                    @foreach($data['prodis'] as $prodi)
						@if($prodi['id'] != 1)
							<div class="form-check" wire:ignore>
							<input class="form-check-input" type="checkbox" value="{{ $prodi['id'] }}" wire:model="team_prodis">
							<label class="form-check-label">
							{{ ucfirst($prodi['nama_prodi'])}}
							</label>
							</div>
						@endif
                    @endforeach
                </div>
                @endif
            </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary text-white" wire:click="closeModal">Tidak</button>
				<button type="submit" class="btn btn-primary text-white">Simpan</button>
			</div>
			</form>
          </div>
		</div>
	</div>

	{{-- <script src="//cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script> --}}
	<script>
		window.addEventListener('closeModalTeamUpdate', event => {
			jQuery('#TeamModalEdit').modal('hide');
			jQuery('.modal-backdrop').hide();
		});
		// window.addEventListener('setInitialDataTim', event => {
		// 	const editor_update = CKEDITOR.replace('editor-tim-update');
		// 	// CKEDITOR.instances['editor-tim-update'].setData(event.detail.deskripsi_tim);
		// 	// @this.set('deskripsi_tim', 'halo');
		// });
	</script>
	<style>
		textarea {
			border: 1px solid var(--cui-input-border-color, #b1b7c1);
			width: 100%;
			min-height: 250px !important;
			border-radius: 0.375rem;
		}
		.ck-editor__editable_inline {
			width: 100%;
			min-height: 250px !important;
		}
	</style>
</div>
