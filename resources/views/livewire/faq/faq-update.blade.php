<div>
    <div class="modal fade" id="faqModalEdit" tabindex="-1" wire:ignore.self>
	  <div class="modal-dialog">
		<div class="modal-content">
			<form wire:submit.prevent="update">
			@csrf
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit FAQ</h5>
				<button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="mb-3">
				  <h6 class="card-title mb-2">Pertanyaan</h6>
				  <input type="text" class="form-control" wire:model.lazy="faq.soal" required>
				</div>
				<div class="mb-3">
				  <h6 class="card-title mb-2">Jawaban</h6>
					<div wire:ignore>
						<textarea name="jawaban" id="editor-jawaban-update" required></textarea>
					</div>
				</div>
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
	window.addEventListener('closeEditFaq', event => {
		jQuery('#faqModalEdit').modal('hide');
		jQuery('.modal-backdrop').hide();
	});
	$(document).ready(function () {
		const editor = CKEDITOR.replace('editor-jawaban-update', {
		  removeButtons: 'PasteFromWord'
		});
		editor.on('change', function (event) {
			@this.set('faq.jawaban', event.editor.getData());
		});
		window.addEventListener('setInitialJawaban', event => {
			CKEDITOR.instances['editor-jawaban-update'].setData(event.detail.jawaban);
		});
	});	
	const myModalUpdate = document.getElementById('faqModalEdit');
	myModalUpdate.addEventListener('hidden.coreui.modal', event => {
	  window.livewire.emitTo('faq.faq-index', 'refreshFaq');
	});
	</script>
	<style>
		.ck-editor__editable_inline {
			min-height: 250px !important;
		}
	</style>
</div>
