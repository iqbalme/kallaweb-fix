<div class="body flex-grow-1 px-3">
	<div class="container-lg">
		<div class="card mb-4">
            <div class="card-body">
				<div class="row justify-content-between p-3">
					<div class="col-4"><h3>List Testimoni</h3></div>
					<div class="col-auto"><button type="button" class="btn btn-success text-white mb-2" wire:click="bukaFormTestimoni">Tambah Testimoni</button></div>
					<hr>
				</div>
				<div class="table-responsive">
                    <table class="table border mb-0 table-striped">
                      <thead class="table-light fw-semibold">
                        <tr class="align-middle">
                          <th class="text-center">
                            No
                          </th>
                          <th class="text-center" colspan="2">Nama</th>
                          <th class="text-center">Keterangan</th>
						  <th></th>
                        </tr>
                      </thead>
                      <tbody>
					  @if(!$data->count())
						<tr class="align-middle">
                          <td class="text-center" colspan="5">
						  Tidak ada data
						  </td>
						</tr>
					  @else
						@foreach($data as $testimoni)
                        <tr class="align-middle">
                          <td class="text-center">
						  {{ $loop->iteration }}
                          </td>
						  <td>
						  @if(isset($testimoni->gambar))
							  <div class="avatar avatar-lg"><img class="avatar-img" src="{{ asset('storage/images/'.$testimoni->gambar) }}"></div>
						  @else
							  <div class="avatar avatar-lg"><img class="avatar-img" src="{{ asset('admin/thumbnail-default.jpg') }}"></div>
						  @endif
						  </td>
                          <td>
                            {{ $testimoni->nama }}
                          </td>
						  <td>
                            {{ $testimoni->keterangan }}
                          </td>
                          <td class="text-end">
							<button type="button" class="btn btn-dark" wire:click="getTestimoni({{ $testimoni->id }})">Edit</button>
							<button wire:click="hapusTestimoni({{$testimoni->id}})" type="button" class="btn btn-danger text-white">Hapus</button>
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
	<div class="modal fade" id="testimoniModalHapus" tabindex="-1" wire:ignore.self>
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Hapus Event</h5>
			<button type="button" class="btn-close" wire:click="closeHapusForm" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
			Apakah Anda yakin ingin menghapusnya?
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary text-white" wire:click="closeHapusForm">Tidak</button>
			<button type="button" class="btn btn-danger text-white" wire:click="hapusTestimoniItem">Ya, Hapus</button>
		  </div>
		</div>
	  </div>
	</div>

	@if($isUpdate)
		<livewire:testimoni.testimoni-update />
	@else
		<livewire:testimoni.testimoni-create />
	@endif
	<script>
	window.addEventListener('closeHapusTestimoni', event => {
		jQuery('#testimoniModalHapus').modal('hide');
		jQuery('.modal-backdrop').hide();
	});
	window.addEventListener('bukaFormHapus', event => {
		jQuery('#testimoniModalHapus').modal('show');
	});
	window.addEventListener('bukaFormTestimoni', event => {
		jQuery('#testimoniModal').modal('show');
	});
	window.addEventListener('bukaFormTestimoniEdit', event => {
		jQuery('#testimoniModalEdit').modal('show');
	});
	</script>
</div>
