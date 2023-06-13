<div class="body flex-grow-1 px-3">
	<div class="container-lg">
		<div class="card mb-4">
            <div class="card-body">
				<div class="row justify-content-between p-3">
					<div class="col-4"><h3>List Event</h3></div>
					<div class="col-auto"><button type="button" class="btn btn-success text-white mb-2" wire:click="bukaFormEvent">Tambah Event</button></div>
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
				<div class="col-8">
					<div class="input-group mb-3">
					  <input type="text" class="form-control" placeholder="Ketik di sini..." wire:model="cari_event">
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
                          <th class="text-center" colspan="2">Nama Event</th>
                          <th class="text-center">Tanggal</th>
                          <th class="text-center">Prodi</th>
						  <th class="text-center">Pendaftar</th>
						  <th class="text-center">Voucher</th>
						  <th></th>
                        </tr>
                      </thead>
                      <tbody>
					  @if(!$data['events']->count())
						<tr class="align-middle">
                          <td class="text-center" colspan="8">
						  Tidak ada data
						  </td>
						</tr>
					  @else
						@foreach($data['events'] as $event)
                        <tr class="align-middle">
                          <td class="text-center">
						  {{ $loop->iteration }}
                          </td>
						  <td>
						  @if(isset($event->gambar_event))
							  <div class="avatar avatar-lg"><img class="avatar-img" src="{{ asset('storage/images/'.$event->gambar_event) }}"></div>
						  @else
							  <div class="avatar avatar-lg"><img class="avatar-img" src="{{ asset('admin/thumbnail-default.jpg') }}"></div>
						  @endif
						  </td>
                          <td>
                            {{ substr($event->nama_event,0,49) }}
                          </td>
						  <td class="text-center">
							<div>
							<span class="badge text-bg-info text-white">{{ $event->waktu_mulai->format('d M Y H:i') }}</span></div>
							<span class="badge text-bg-warning text-white">{{ $event->waktu_berakhir->format('d M Y H:i') }}</span>
							<!--div class="small text-medium-emphasis">{{date('H:i', strtotime($event->waktu_mulai)).'-'.date('H:i', strtotime($event->waktu_berakhir))}}</div-->
                          </td>
                          <td class="text-center">
                            @if(count($event->event_prodi))
                                {{implode(', ', $data['nama_prodi'][$loop->index])}}
                            @else
                                {{'-'}}
                            @endif
                          </td>
						  <td class="text-center">
							<button type="button" class="btn btn-info text-white" wire:click="lihatPesertaEvent({{ $event->id }})">{{$event->peserta_event->count()}}</button>
                          </td>
						  <td class="text-center">
							@if($event->voucher_id)
								<span class="badge text-bg-success text-white">Aktif</span>
							@else
								<span class="badge text-bg-danger text-white">Tidak</span>
							@endif
                          </td>
                          <td class="text-end">
							<button type="button" class="btn btn-dark" wire:click="getEvent({{ $event->id }})">Edit</button>
							<button wire:click="hapusEvent({{$event->id}})" type="button" class="btn btn-danger text-white" data-coreui-toggle="modal" data-coreui-target="#eventModalHapus">Hapus</button>
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
		  {{ $data['events']->links('vendor.livewire.bootstrap') }}
	</div>
	<!-- Modal -->
	<div class="modal fade" id="eventModalHapus" tabindex="-1" wire:ignore.self>
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
			<button type="button" class="btn btn-danger text-white" wire:click="hapusEventItem()">Ya, Hapus</button>
		  </div>
		</div>
	  </div>
	</div>

	<div class="modal fade" id="eventListPeserta" tabindex="-1" wire:ignore.self>
	  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">List Peserta Event</h5>
			<button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
			<livewire:event.peserta-event-index />
		  </div>
		</div>
	  </div>
	</div>

	@if($isUpdate)
		<livewire:event.event-update />
	@else
		<livewire:event.event-create />
	@endif
	<script>
	window.addEventListener('closeHapusEvent', event => {
		jQuery('#eventModalHapus').modal('hide');
		jQuery('.modal-backdrop').hide();
	});
	window.addEventListener('bukaFormEvent', event => {
		jQuery('#eventModal').modal('show');
	});
	window.addEventListener('bukaFormEventEdit', event => {
		jQuery('#eventModalEdit').modal('show');
	});
	window.addEventListener('bukaListPeserta', event => {
		//console.log(event);
		Livewire.emitTo('event.peserta-event-index', 'get_peserta', event.detail.event);
		jQuery('#eventListPeserta').modal('show');
	});
	</script>
</div>
