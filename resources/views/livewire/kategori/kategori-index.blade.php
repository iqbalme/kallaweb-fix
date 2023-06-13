<div class="body flex-grow-1 px-3">
	<div class="container-lg">
		<div class="card mb-4">
            <div class="card-body">
				<div class="row justify-content-between p-3">
					<div class="col-4"><h3>List Kategori</h3></div>
					@if(!$isFormVisible)
						<div class="col-auto"><button type="button" class="btn btn-success text-white mb-2" wire:click="tambahKategori()">Tambah Kategori</button></div>
					@endif
					<hr>
				</div>
				@if ($isFormVisible)
					@if($isUpdate)
						<livewire:kategori.kategori-update />
					@else
						<livewire:kategori.kategori-create />
					@endif
				@endif
				<div class="table-responsive">
                    <table class="table border mb-0 table-striped">
                      <thead class="table-light fw-semibold">
                        <tr class="align-middle">
                          <th class="text-center">
                            No
                          </th>
                          <th class="text-center">Kategori</th>
                          <th class="text-center">Deskripsi</th>
						  <th></th>
                        </tr>
                      </thead>
                      <tbody>
					  @if(count($data) === 0)
						<tr class="align-middle">
                          <td class="text-center" colspan="4">
						  Tidak ada data
						  </td>
						</tr>
					  @endif
					  @isset($data)
						@foreach($data as $category)
                        <tr class="align-middle">
                          <td class="text-center">
						  {{ $loop->iteration }}
                          </td>
                          <td>
                            {{ ucfirst($category->nama_kategori) }}
                          </td>
						  <td>
                            {{ ucfirst($category->deskripsi_kategori) }}
                          </td>
                          <td class="text-end">
							<button type="button" class="btn btn-dark" wire:click="getKategori({{ $category->id }})" @if($isFormVisible) disabled @endif>Edit</button>
							<button wire:click="setKategorId({{$category->id}})" type="button" class="btn btn-danger text-white" data-coreui-toggle="modal" data-coreui-target="#categoryModalEdit" @if($isFormVisible) disabled @endif>Hapus</button>
                          </td>
                        </tr>
						@endforeach
					@endisset
                      </tbody>
                    </table>
                  </div>
            </div>
          </div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="categoryModalEdit" tabindex="-1" wire:ignore.self>
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Hapus Prodi</h5>
			<button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
			Apakah Anda yakin ingin menghapusnya?
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary text-white" data-coreui-dismiss="modal">Tidak</button>
			<button type="button" class="btn btn-danger text-white" wire:click="hapusKategori({{$category_id}})" data-coreui-toggle="modal" data-coreui-target="#categoryModalEdit">Ya, Hapus</button>
		  </div>
		</div>
	  </div>
	</div>
</div>
