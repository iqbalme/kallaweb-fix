<div class="body flex-grow-1 px-3">
	<div class="container-lg">
		<div class="card mb-4">
            <div class="card-body">
				<div class="row justify-content-between p-3">
					<div class="col-4"><h3>List FAQ</h3></div>
					<div class="col-auto"><button type="button" class="btn btn-success text-white mb-2" data-coreui-toggle="modal" data-coreui-target="#faqModal">Tambah FAQ</button></div>
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
					  <input type="text" class="form-control" placeholder="Ketik di sini..." wire:model="cari_faq">
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
                          <th class="text-center">Soal</th>
                          <th class="text-center">Jawaban</th>
						  <th></th>
                        </tr>
                      </thead>
                      <tbody>
					  @if(!$data['faq']->count())
						<tr class="align-middle">
                          <td class="text-center" colspan="4">
						  Tidak ada data
						  </td>
						</tr>
					  @else
						@foreach($data['faq'] as $faq)
                        <tr class="align-middle">
                          <td class="text-center">
						  {{ $loop->iteration }}
                          </td>
                          <td>
                            {{ $faq->soal }}
                          </td>
						  <td class="text-center">
							{!! $faq->jawaban !!}
                          </td>
                          <td class="faq-action text-end">
							<button type="button" class="btn btn-dark" wire:click="getFaq({{ $faq->id }})">Edit</button>
							<button wire:click="hapusFaq({{$faq->id}})" type="button" class="btn btn-danger text-white" data-coreui-toggle="modal" data-coreui-target="#faqModalHapus">Hapus</button>
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
		  {{ $data['faq']->links('vendor.livewire.bootstrap') }}
	</div>
	<!-- Modal -->
	<div class="modal fade" id="faqModalHapus" tabindex="-1" wire:ignore.self>
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Hapus FAQ</h5>
			<button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
			Apakah Anda yakin ingin menghapusnya?
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary text-white" data-coreui-dismiss="modal">Tidak</button>
			<button type="button" class="btn btn-danger text-white" wire:click="hapusFaqItem()">Ya, Hapus</button>
		  </div>
		</div>
	  </div>
	</div>

	@if($isUpdate)
		<livewire:faq.faq-update />
	@else
		<livewire:faq.faq-create />
	@endif
    <style>
        .faq-action button {
            margin-bottom: 3px;
        }
    </style>
	<script>
	window.addEventListener('closeHapusFaq', event => {
		jQuery('#faqModalHapus').modal('hide');
		jQuery('.modal-backdrop').hide();
	});
	window.addEventListener('bukaFormFaqEdit', event => {
		jQuery('#faqModalEdit').modal('show');
	});
	const myModalCreate = document.getElementById('faqModal');
	myModalCreate.addEventListener('hidden.coreui.modal', event => {
	  Livewire.emitTo('faq.faq-create', 'resetFaq');
	});
	</script>
</div>
