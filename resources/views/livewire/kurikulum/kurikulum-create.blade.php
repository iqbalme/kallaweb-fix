<div>
    <div class="modal fade" id="kurikulumModal" tabindex="-1" wire:ignore.self>
	  <div class="modal-dialog">
		<div class="modal-content">
			<form wire:submit.prevent="simpan">
			@csrf
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Kurikulum</h5>
				<button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="mb-3">
				  <h6 class="card-title mb-2">Pertanyaan</h6>
				  <input type="text" class="form-control" wire:model.lazy="soal" required>
				</div>
				<div class="mb-3">
				  <h6 class="card-title mb-2">Jawaban</h6>
					<div wire:ignore>
						<textarea name="jawaban" id="editor" required></textarea>
					</div>
				</div>
				@if(count($data['prodis']) >1)
					<div class="mb-3">
						<div class="mb-1"><strong>Program Studi</strong></div>
						@if(count($data['prodis'])>1)
							@foreach($data['prodis'] as $prodi)
								@if($prodi['id'] != 1)
									<div class="form-check" wire:ignore>
									<input class="form-check-input" type="radio" value="{{ $prodi['id'] }}" wire:model="kurikulum_prodi">
									<label class="form-check-label">
									{{ ucfirst($prodi['nama_prodi'])}}
									</label>
									</div>
								@endif
							@endforeach
						@endif
					</div>
				@endif
            </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary text-white" data-coreui-dismiss="modal">Tidak</button>
				<button type="submit" class="btn btn-primary text-white">Simpan</button>
			</div>
			</form>			
          </div>
		</div>
	</div>
	<script src="https://cdn.ckeditor.com/4.20.0/basic/ckeditor.js"></script>
	<script>
	window.addEventListener('closeModalKurikulum', event => {
		jQuery('#kurikulumModal').modal('hide');
		jQuery('.modal-backdrop').hide();
	});
		const editor = CKEDITOR.replace('editor', {
		  removeButtons: 'PasteFromWord'
		});
		editor.on('change', function (event) {
			Livewire.emit('setJawaban', event.editor.getData());
		})
		window.addEventListener('setInitialJawabanKur', event => {
			CKEDITOR.instances['editor'].setData('');
		});
	</script>
	<style>
		.ck-editor__editable_inline {
			min-height: 250px !important;
		}
	</style>
</div>
