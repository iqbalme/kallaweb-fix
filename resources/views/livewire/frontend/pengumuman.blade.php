<div>
	<div class="home-breadcrumb">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="{{route('home')}}">Home</a></li>
								<li>Pengumuman</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>
  <div style="margin-top:40px;margin-bottom:40px;">
	<div class="container">
				<div class="row">
					<!-- Blog Sidebar -->
					<div class="col text-center mb-4">
						<h2>Pengumuman</h2>
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
                        </tr>
                      </thead>
                      <tbody>
					  @if(!$data['pengumuman']->count())
						<tr class="align-middle">
                          <td class="text-center" colspan="4">
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
						  <td class="text-center">
						  @if(isset($pengumuman->file_pengumuman))
							  <a href="{{ asset('storage/files/'.$pengumuman->file_pengumuman) }}" target="blank" class="btn btn-info text-white">Lihat/Unduh</a>
						  @else
						  {{'-'}}
						  @endif
						  </td>
                        </tr>
						@endforeach
					@endif
                      </tbody>
                    </table>
                  </div>
		  <!-- Pagination -->
		  {{ $data['pengumuman']->links('vendor.livewire.bootstrap') }}
	</div>
  </div>
</div>