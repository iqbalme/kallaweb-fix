<div class="body flex-grow-1 px-3">
	<div class="container-lg">
		<div class="card mb-4">
            <div class="card-body">
				<h3>Carousel</h3>
				<div class="row mt-3">
					<div class="col-lg-12">
					<button type="button" class="btn btn-success text-white mb-2 mr-2" data-coreui-toggle="modal" data-coreui-target="#CarouselModal">Tambah Item</button>
					</div>
				</div>
				<hr>
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
					  <input type="text" class="form-control" placeholder="Ketik di sini..." wire:model="cari_Carousel">
					  <div class="input-group-append">
						<span class="input-group-text">Cari</span>
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
                          <th class="text-center">Tipe</th>
                          <th></th>
                          <th class="text-center">Judul</th>
						  <th></th>
                        </tr>
                      </thead>
                      <tbody>
					  @if(count($data['carousel'])==0)
						<tr class="align-middle">
                          <td class="text-center" colspan="5">
						  Tidak ada data
						  </td>
						</tr>
					  @endif
					  @isset($data['carousel'])
						@foreach($data['carousel'] as $carousel)
                        <tr class="align-middle">
                          <td class="text-center">
						  {{ $loop->iteration }}
                          </td>
						  <td>
                             {{ ucfirst($carousel->tipe) }}
                          </td>
						  <td>
                            gambar
                          </td>
						  <td>
						   {{ ucfirst($carousel->judul) }}
                          </td>
						  <td>
							<button type="button" class="btn btn-dark" wire:click="getCarousel({{ $carousel->id }})" @if($isFormVisible) disabled @endif>Edit</button>
							<button wire:click="setCarouselId({{$carousel->id}})" type="button" class="btn btn-danger text-white" data-coreui-toggle="modal" data-coreui-target="#CarouselModal" @if($isFormVisible) disabled @endif>Hapus</button>
						  </td>
                        </tr>
						@endforeach
					  @endisset
                      </tbody>
                    </table>
                  </div>
            </div>
          </div>
		  <!-- Pagination -->
		  {{ $data['carousel']->links('vendor.livewire.bootstrap') }}
	</div>
	<!-- Modal -->
	<div class="modal fade" id="CarouselModalEdit" tabindex="-1" wire:ignore.self>
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title">Hapus Item</h5>
			<button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
			Apakah Anda yakin ingin menghapusnya?
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary text-white" data-coreui-dismiss="modal">Tidak</button>
			<button type="button" class="btn btn-danger text-white" wire:click="hapusCarousel({{$carousel_id}})" data-coreui-toggle="modal" data-coreui-target="#CarouselModalEdit">Ya, Hapus</button>
		  </div>
		</div>
	  </div>
	</div>

	@if($isCarouselUpdate)
		<livewire:carousel.carousel-update />
	@else
		<livewire:carousel.carousel-create />
	@endif
	
</div>