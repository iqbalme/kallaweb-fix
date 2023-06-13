<div class="body flex-grow-1 px-3">
	<div class="container-lg">
		<div class="card mb-4">
            <div class="card-body">
				<div class="row justify-content-between p-3">
					<div class="col-4"><h3>Pengumuman</h3></div>
					<div class="col-auto"><button type="button" class="btn btn-success text-white mb-2" data-coreui-toggle="modal" data-coreui-target="#pengumumanModal">Tambah Pengumuman</button></div>
					<hr>
				</div>
				<div class="row justify-content-md-between">
				<!-- Perhalaman -->
				<div class="col-lg-auto">
					<div class="input-group mb-3">
					  <div class="input-group-prepend">
						<span class="input-group-text" id="basiaddon3">Perhalaman</span>
					  </div>
						  <select class="form-control" wire:model="perhalaman">
							<option value="5" selected>5</option>
							<option value="10">10</option>
							<option value="20">20</option>
							<option value="50">50</option>
							<option value="100">100</option>
						  </select>
					</div>
				</div>
				<!-- End Perhalaman -->

				<!-- Pencarian -->
				<div class="col-6">
					<div class="input-group mb-3">
					  <input type="text" class="form-control" placeholder="Ketik di sini..." wire:model="cari_pengumuman">
					  <div class="input-group-append">
						<span class="input-group-text" id="basiaddon2">Cari</span>
					  </div>
					</div>
				</div>
				<!-- End Pencarian -->
			</div>
				<div class="table-responsive">
                    <table class="table border mb-0 table-striped">
                      <thead class="table-light fw-semibold">
                        <tr class="align-middle">
                          <th class="text-center">
                            No
                          </th>
                          <th class="text-center">Judul/Topik</th>
						  <th class="text-center">Tanggal</th>
						  <th class="text-center">File</th>
						  <th></th>
                        </tr>
                      </thead>
                      <tbody>
					  @if(!$data['pengumuman']->count())
						<tr class="align-middle">
                          <td class="text-center" colspan="5">
						  Tidak ada data
						  </td>
						</tr>
					  @else
						@foreach($data['pengumuman'] as $pengumuman)
                        <tr class="align-middle">
                          <td class="text-center">
						  {{ $loop->iteration }}
                          </td>
						  <td>
                            {{ substr($pengumuman->judul,0,49) }}
                          </td>
						  <td class="text-center">
							{{ $pengumuman->created_at->format('d M Y H:i') }}
                          </td>
						  <td>
						  @if(isset($pengumuman->file_pengumuman))
							  <a href="{{ asset('storage/files/'.$pengumuman->file_pengumuman) }}" target="blank" class="btn btn-info text-white">Lihat</a>
						  @else
						  {{'-'}}
						  @endif
						  </td>
                          <td class="text-end">
							<button wire:click="hapusPengumuman({{$pengumuman->id}})" type="button" class="btn btn-danger text-white" data-coreui-toggle="modal" data-coreui-target="#pengumumanModalHapus">Hapus</button>
                          </td>
                        </tr>
						@endforeach
					@endif
                      </tbody>
                    </table>
                  </div>
            </div>
          </div>
		  <!-- Pagination -->
		  {{ $data['pengumuman']->links('vendor.livewire.bootstrap') }}
	</div>
	<!-- Modal -->
	<div class="modal fade" id="pengumumanModalHapus" tabindex="-1" wire:ignore.self>
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Hapus pengumuman</h5>
			<button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
			Apakah Anda yakin ingin menghapusnya?
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary text-white" data-coreui-dismiss="modal">Tidak</button>
			<button type="button" class="btn btn-danger text-white" wire:click="hapusPengumumanItem()">Ya, Hapus</button>
		  </div>
		</div>
	  </div>
	</div>
		<livewire:pengumuman.pengumuman-create />
	<script>
	window.addEventListener('closeHapusPengumuman', event => {
		jQuery('#pengumumanModalHapus').modal('hide');
		jQuery('.modal-backdrop').hide();
	});
	window.addEventListener('closeCreatePengumuman', event => {
		jQuery('#pengumumanModal').modal('hide');
		jQuery('.modal-backdrop').hide();
	});

	const myModalEl = document.getElementById('pengumumanModal')
	myModalEl.addEventListener('hidden.coreui.modal', event => {
	  Livewire.emitTo('pengumuman.pengumuman-create', 'resetPengumuman');
	});
	</script>
</div>
