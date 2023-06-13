<div>
	<div class="page-content" style="background-image: url({{asset('frontend/assets/images/wizard-v1.jpg')}})">
		<div class="wizard-v1-content">
			<div class="wizard-form">
		        <form class="form-register" wire:submit.prevent="registrasiBaru">
		        	<div id="form-total" role="application" class="wizard clearfix"><div class="steps clearfix"><ul role="tablist"><li role="tab" class="first {{$currentStep == 1 ? 'current' : ''}}" aria-disabled="false" aria-selected="true"><a id="form-total-t-0" href="#" aria-controls="form-total-p-0"><div class="title">
			            	<span class="step-icon"><i class="zmdi zmdi-account"></i></span>
			            	<span class="step-number">Langkah 1</span>
			            	<span class="step-text">Data Diri</span>
			            </div></a></li><li role="tab" class="second {{$currentStep == 2 ? 'current' : ''}}" aria-disabled="false" aria-selected="false"><a id="form-total-t-1" href="#" aria-controls="form-total-p-1"><div class="title">
			            	<span class="step-icon"><i class="zmdi zmdi-card"></i></span>
			            	<span class="step-number">Langkah 2</span>
			            	<span class="step-text">Info Pembayaran</span>
			            </div></a></li><li role="tab" class="last {{$currentStep == 3 ? 'current' : ''}}" aria-disabled="false" aria-selected="false"><a id="form-total-t-2" href="#" aria-controls="form-total-p-2"><span class="current-info audible"> </span><div class="title">
			            	<span class="step-icon"><i class="zmdi zmdi-receipt"></i></span>
			            	<span class="step-number">Langkah 3</span>
			            	<span class="step-text">Konfirmasi</span>
			            </div></a></li></ul></div><div class="content clearfix">
						@if($currentStep == 1)
		        		<!-- SECTION 1 -->
						<div>
			            <h2 id="form-total-h-0" tabindex="-1" class="title">
			            	<span class="step-icon"><i class="zmdi zmdi-account"></i></span>
			            	<span class="step-number">Langkah 1</span>
			            	<span class="step-text">Data Diri</span>
			            </h2>
			            <div id="form-total-p-0" role="tabpanel" aria-labelledby="form-total-h-0" class="body" aria-hidden="true">
			                <div class="inner">
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label for="username">Nama Lengkap*</label>
										<input type="text" placeholder="Nama Lengkap" class="form-control" wire:model="data.nama_lengkap" required>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label for="username">No. KTP*</label>
										<input type="text" placeholder="No. KTP" class="form-control valid" wire:model="data.no_ktp" required maxlength="16">
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label for="email">Email*</label>
										<input type="email" placeholder="Email" class="form-control valid" wire:model="data.email" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label for="email">Asal Sekolah*</label>
										<input type="email" placeholder="Asal Sekolah" class="form-control valid" wire:model="data.asal_sekolah" required">
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder">
										<label for="password">No. HP.*</label>
										<input type="text" placeholder="No. HP" class="form-control" maxlength="15"  wire:model="data.no_hp" required>
									</div>
									<div class="form-holder">
										<label for="confirm_password">Program Studi*</label>
										<select class="form-control" wire:model="data.prodi">
										@foreach($prodis as $prodi)
											<option value="{{$prodi->id}}">{{ucfirst($prodi->nama_prodi)}}</option>
										@endforeach
										</select>
									</div>
								</div>
							</div>
			            </div>
						</div>
						@endif
						@if($currentStep == 2)
						<!-- SECTION 2 -->
						<div>
			            <h2 id="form-total-h-1" tabindex="-1" class="title">
			            	<span class="step-icon"><i class="zmdi zmdi-card"></i></span>
			            	<span class="step-number">Langkah 2</span>
			            	<span class="step-text">Info Pembayaran</span>
			            </h2>
			            <div id="form-total-p-2" role="tabpanel" aria-labelledby="form-total-h-1" class="body" aria-hidden="false">
			                <div class="inner">
			                	<h3>Info Pembayaran</h3>
								<div class="form-row table-responsive">
									<table class="table">
										<tbody>
											<tr class="space-row">
												<th>Biaya Pendaftaran</th>
												<td id="username-val">Rp. {{number_format($settings['nominal_admisi'])}}</td>
											</tr>
											@isset($settings['biaya_layanan_admisi'])
											<tr class="space-row">
												<th>Biaya Layanan</th>
												<td id="username-val">Rp. {{number_format($settings['biaya_layanan_admisi'])}}</td>
											</tr>
											@endisset
											<tr class="space-row">
												<th>Potongan</th>
												<td id="email-val">Rp. {{number_format($discount)}}</td>
											</tr>
											<tr class="space-row">
												<th>Total</th>
												<td id="card-type-val">Rp. {{number_format($total_after_voucher)}}</td>
											</tr>
										</tbody>
									</table>
								</div>
								@if($settings['is_voucher'])
								<div class="row justify-content-center">
									<div class="col-md-10">
										<input type="text" placeholder="Kode Voucher" class="form-control" maxlength="10"wire:model="kodeVoucher" required>
									</div>
									<div class="col-md-2">
										<button type="button" wire:click="radeemVoucher" class="btn btn-secondary">Pakai</button>
									</div>
								</div>
								@endif
							</div>
			            </div>
						</div>
						@endif
						@if($currentStep == 3)
			            <!-- SECTION 3 -->
						<div>
			            <h2 id="form-total-h-2" tabindex="-1" class="title">
			            	<span class="step-icon"><i class="zmdi zmdi-receipt"></i></span>
			            	<span class="step-number">Langkah 3</span>
			            	<span class="step-text">Konfirmasi</span>
			            </h2>
			            <div role="tabpanel" class="body">
			                <div class="inner">
			                	<h3>Konfirmasi Detail</h3>
								<div class="form-row table-responsive">
									<table class="table">
										<tbody>
											<tr class="space-row">
												<th>Nama Lengkap</th>
												<td id="username-val">{{$data['nama_lengkap']}}</td>
											</tr>
											<tr class="space-row">
												<th>No. KTP</th>
												<td id="email-val">{{$data['no_ktp']}}</td>
											</tr>
											<tr class="space-row">
												<th>Email</th>
												<td id="card-type-val">{{$data['email']}}</td>
											</tr>
											<tr class="space-row">
												<th>No. HP.</th>
												<td id="card-number-val">{{$data['no_hp']}}</td>
											</tr>
											<tr class="space-row">
												<th>Program Studi</th>
												<td id="cvc-val">
												@foreach($prodis as $prodi)
													@if($prodi->id == $data['prodi'])
														{{$prodi->nama_prodi}}
													@endif
												@endforeach
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
			            </div>
						<section id="form-total-p-2" role="tabpanel" aria-labelledby="form-total-h-2" class="body" aria-hidden="false">
			                <div class="inner">
								<div class="form-row table-responsive">
									<table class="table">
										<tbody>
											<tr class="space-row">
												<th>Jumlah Pembayaran</th>
												<td id="username-val">Rp. {{number_format($total_after_voucher)}}</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
			            </section>
						</div>
						@endif
		        	</div><div class="actions clearfix">
					<ul role="menu" aria-label="Pagination">
					<li><a href="#" role="menuitem" wire:click="previous"><i class="zmdi zmdi-arrow-left"></i></a></li>
					@if($currentStep < 3)
					<li><a href="#" role="menuitem" wire:click="next"><i class="zmdi zmdi-arrow-right"></i></a></li>
					@else
					<button type="submit" class="btn btn-md btn-success">Daftar</button>	
					@endif
					</ul></div></div>
		        </form>
			</div>
		</div>
	</div>
	
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/raleway-font.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/material-design-iconic-font.min.css')}}">
	<!-- Jquery -->
	<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style-colorlib-form.css')}}"/>
	<style>
	.inner h3 {
		font-family: 'Raleway', sans-serif;
	}
	</style>
	<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
	<script>
		jQuery( document ).ready(function() {
			$.getScript("{{asset('frontend/assets/js/jquery.steps.js')}}");
			$.getScript("https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js");
		});
	</script>
</div>