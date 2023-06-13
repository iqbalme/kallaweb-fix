<div class="body flex-grow-1 px-3">
	<div class="container-lg">
		<div class="card mb-4">
            <div class="card-body">
				<div class="row justify-content-between p-3">
					<div class="col-4"><h3>List Fasilitas</h3></div>
					<div class="col-auto"><button type="button" class="btn btn-success text-white mb-2" wire:click="tambahFasilitas">Tambah Gambar</button></div>
					<hr>
				</div>
				<div class="table-responsive">
                    <table class="table border mb-0 table-striped">
                      <thead class="table-light fw-semibold">
                        <tr class="align-middle">
                          <th class="text-center">
                            No
                          </th>
                          <th></th>
                          <th>Judul Gambar</th>
						  <th></th>
                        </tr>
                      </thead>
                      <tbody>
					  @if(!$data->count())
						<tr class="align-middle">
                          <td class="text-center" colspan="4">
						  Tidak ada data
						  </td>
						</tr>
					  @else
						@foreach($data as $galeri)
                        <tr class="align-middle">
                          <td class="text-center">
						  {{ $loop->iteration }}
                          </td>
						  <td>
						  @if(isset($galeri->gambar))
							  <div class="avatar avatar-lg"><img class="avatar-img" src="{{ asset('storage/images/'.$galeri->gambar) }}"></div>
						  @else
							  <div class="avatar avatar-lg"><img class="avatar-img" src="{{ asset('admin/thumbnail-default.jpg') }}"></div>
						  @endif
						  </td>
                          <td class="text-center">
                            @if(isset($galeri->judul)) {{$galeri->judul}} @else {{'-'}} @endif
                          </td>
                          <td class="text-end">
							<button wire:click="setGaleriId({{$galeri->id}})" type="button" class="btn btn-danger text-white">Hapus</button>
                          </td>
                        </tr>
						@endforeach
					@endif
                      </tbody>
                    </table>
                  </div>
            </div>
          </div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="galeriModalHapus" tabindex="-1" wire:ignore.self>
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Hapus Gambar</h5>
			<button type="button" class="btn-close" wire:click="$emit('closeHapusGaleri')" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
			Apakah Anda yakin ingin menghapusnya?
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary text-white" wire:click="closeFormHapus">Tidak</button>
			<button type="button" class="btn btn-danger text-white" wire:click="hapusGaleri">Ya, Hapus</button>
		  </div>
		</div>
	  </div>
	</div>

	<livewire:facility.facility-create />
	<script>
	window.addEventListener('bukaModalHapus', event => {
		jQuery('#galeriModalHapus').modal('show');
	});
	window.addEventListener('closeHapusGaleri', event => {
		jQuery('#galeriModalHapus').modal('hide');
		jQuery('.modal-backdrop').hide();
	});
	window.addEventListener('bukaFormGaleri', event => {
		jQuery('#galeriModal').modal('show');
	});
	</script>
</div>
