<div>
	<div class="body flex-grow-1 px-3">
	<div class="container-lg">
		<div class="card mb-4">
            <div class="card-body">
			<div class="row justify-content-between p-3">
				<div class="col-4"><h3>List Pendaftar</h3></div>
					<div class="col-auto">
						@if(count($data['pendaftars'])>0)
							<button type="button" class="btn btn-success text-white mb-2" wire:click="exportPendaftar">Ekspor Data</button>
						@endif
					</div>
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
					  <input type="text" class="form-control" placeholder="Ketik di sini..." wire:model="cari_pendaftar">
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
                          <th class="text-center">Nama</th>
                          <th class="text-center">Email</th>
                          <th class="text-center">No. HP</th>
                          <th class="text-center">No. KTP</th>
                          <th class="text-center">Asal Sekolah</th>
                          <th class="text-center">Program Studi</th>
						  <th class="text-center">Aktif</th>
						  <!--th>Lihat</th-->
                        </tr>
                      </thead>
                      <tbody>
					  @if(count($data['pendaftars'])==0)
						<tr class="align-middle">
                          <td class="text-center" colspan="9">
						  Tidak ada data
						  </td>
						</tr>
					  @endif
					  @isset($data['pendaftars'])
						@foreach($data['pendaftars'] as $pendaftar)
                        <tr class="align-middle">
                          <td class="text-center">
						  {{ $loop->iteration }}
                          </td>
                          <td>{{ $pendaftar['nama'] }}</td>
						  <td>{{ $pendaftar['email'] }}</td>
						  <td>{{ $pendaftar['hp'] }}</td>
						  <td>{{ $pendaftar['no_ktp'] }}</td>
						  <td>{{ $pendaftar['asal_sekolah'] }}</td>
						  <td>{{ $pendaftar['prodi']['nama_prodi'] }}</td>
						  <td class="text-center">
							@if($pendaftar['aktif'])
								<span class="badge text-bg-success text-white">Ya</span>
							@else
								<span class="badge text-bg-dark">Tidak</span>
							@endif
							<div class="small text-medium-emphasis">{{ date('d-m-Y', strtotime($pendaftar->created_at)) }}</div>
                          </td>
						  <!--td><button type="button" class="btn btn-primary">Invoice</button></td-->
                        </tr>
						@endforeach
					  @endisset
                      </tbody>
                    </table>
                  </div>
            </div>
        </div>
	</div>
	</div>
</div>
