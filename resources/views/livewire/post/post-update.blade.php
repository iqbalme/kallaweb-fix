<div>
    <div class="body flex-grow-1 px-3">
	<div class="container-lg">
		<div class="card mb-4">
			<form wire:submit.prevent="updatePost">
			@csrf
			<div class="card-body">
				<div class="mb-3">
				  <h6 class="card-title mb-2">Judul</h6>
				  <input type="text" class="form-control" wire:model.lazy="judul" required>
				</div>
				<div class="mb-3">
				  <h6 class="card-title mb-2">Isi Post</h6>
						<div class="form-group" wire:ignore>
							<textarea name="konten" id="editor" required>{{ $konten }}</textarea>
						</div>
				</div>
				<div class="mb-3">
						<div class="form-check">
						  <input class="form-check-input" type="checkbox" wire:model="is_headline">
						  <label class="form-check-label">
						  <strong>&nbsp;&nbsp;Jadikan Headline</strong>
						  </label>
						</div>
					</div>
				@if(count($data['categories']))
				<div class="mb-3">
					<h6 class="card-title mb-2">Kategori</h6>
					@foreach($data['categories'] as $category)
					<div class="form-check">
					  <input class="form-check-input" type="checkbox" value="{{ $category->id }}" wire:model.defer="categories">
					  <label class="form-check-label">
					  {{ ucfirst($category->nama_kategori) }}
					  </label>
					</div>
					@endforeach
				</div>
				@endif
                @if(count($data['prodis']) >1)
				<div class="mb-3">
					<h6 class="card-title mb-1">Tampilkan pada</h6>
					@if(count($data['prodis']))
						@foreach($data['prodis'] as $prodi)
							@if($prodi['id'] != 1)
								<div class="form-check" wire:ignore>
								<input class="form-check-input" type="checkbox" value="{{ $prodi->id }}" wire:model="post_prodis">
								<label class="form-check-label">
								{{ ucfirst($prodi->nama_prodi)}}
								</label>
								</div>
							@endif
						@endforeach
					@endif
				</div>
                @endif
				<div class="mb-3">
				  <h6 class="card-title mb-2">Tag (Pisahkan dengan koma)</h6>
				  <input type="text" class="form-control" wire:model.lazy="tags">
				</div>
				<div class="row mt-3">
					<div class="d-flex justify-content-between">
						<div>
						  <h6 class="card-title mb-2">Thumbnail</h6>
						</div>
					</div>
					@if(isset($thumbnail))
					<div class="mb-1 rounded">
						@if($first_thumbnail)
							<img src="{{ asset('storage/images/'.$thumbnail) }}" alt="thumbnail post" width="200" height="200">
						@else
							<img src="{{ $thumbnail->temporaryUrl() }}" alt="thumbnail post" width="200" height="200">
						@endif
					</div>
					<div class="d-grid gap-2 d-md-block">
					  <button class="btn btn-danger text-white" type="button" wire:click="removeThumbnail">Hapus</button>
					</div>
					@else
						<div class="col-lg-7">
							<div class="input-group mb-3 mt-2">
							  <input type="file" class="form-control" wire:model.defer="thumbnail" required>
							  <label class="input-group-text">Upload</label>
							</div>
						</div>
					@endif
                    @if ($errors->any())
                    <div class="row mt-2">
                        <div class="col-sm-6">

                                <div class="alert alert-danger" role="alert">
                                <ul style="margin:0;">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                </div>

                        </div>
                    </div>
                    @endif
					<div class="row mt-2">
					<hr>
					<div class="col-lg-6 mb-2">
							<button type="button" class="btn btn-warning btn-lg text-white w-100" wire:click="updatePost(false)">Simpan</button>
					</div>
					<div class="col-lg-6 mb-2">
						<button type="submit" class="btn btn-primary btn-lg w-100">Publish</button>
					</div>
					</div>
				</div>
            </div>
			</form>
          </div>
		</div>
	</div>
	<!--script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script-->
	<script src="//cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
	<script type="text/javascript">
		// ClassicEditor
			// .create( document.querySelector( '#editor' ), {
				// ckfinder: {
					// uploadUrl: "{{route('ckeditor.image-upload') .'?_token='.csrf_token()}}"
				// }
			// })
			// .then( editor => {
				// editor.model.document.on('change:data', () => {
					// Livewire.emit('setKonten', editor.getData());
					// @this.set('konten', editor.getData());
					//console.log(editor.getData());
				// })
			// })
			// .catch( error => {
				// console.error( error );
		// });
		const editor = CKEDITOR.replace('editor');
		editor.on('change', function (event) {
			//console.log(event.editor.getData())
			Livewire.emit('setKonten', event.editor.getData());
		})
	</script>
	<style>
	.ck-editor__editable_inline {
		min-height: 250px !important;
	}
	</style>
</div>
