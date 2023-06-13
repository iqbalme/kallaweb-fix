<div>
    <div class="home-breadcrumb">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="{{route('home')}}">Home</a></li>
								<li>Kontak Kami</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <section class="ftco-section">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-11 col-md-12">
                <div class="wrapper">
                    <div class="row no-gutters">
                        <div class="col-md-7 d-flex align-items-stretch">
                            <div class="contact-wrap w-100 p-md-5 p-4">
                                <h2 class="mb-4">Hubungi Kami</h2>

                                <!-- Contact Form -->
					<div class="col-md-12">
						<div class="contact_form">
							<form id="contactForm" class="comment_form" wire:submit.prevent="kirimPesan">
							@csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form_title">Saya adalah</div>
                                    <div class="form-group">
                                        <select class="form-control comment_input" wire:model="data.entitas">
                                            <option value="Siswa">Siswa</option>
                                            <option value="Orang Tua">Orang Tua</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
								</div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
									<div class="form_title">Nama Lengkap</div>
                                    <div class="form-group">
									    <input type="text" class="form-control comment_input" wire:model="data.nama" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form_title">Email</div>
                                        <input type="email" class="form-control comment_input" wire:model="data.email" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form_title">No. Telp./HP</div>
                                        <input type="text" class="form-control comment_input" wire:model="data.no_hp" maxLength="15" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
									<div class="form_title">Asal Sekolah</div>
                                    <div class="form-group">
									    <input type="text" class="form-control comment_input" wire:model="data.asal_sekolah" required>
                                    </div>
                                </div>
                            </div>
							<div class="row">
                                <div class="col-md-12">
									<div class="form_title">Dari mana Anda tahu Kalla Institute?</div>
                                    <div class="form-group">
                                        <select class="form-control comment_input" wire:model="sumber_info">
                                            <option value="Guru Sekolah">Guru Sekolah</option>
                                            <option value="Brosur">Brosur</option>
                                            <option value="Billboard">Billboard</option>
                                            <option value="Mahasiswa Kalla Institute">Mahasiswa Kalla Institute</option>
                                            <option value="Education Fair / Expo">Education Fair / Expo</option>
                                            <option value="Facebook">Facebook</option>
                                            <option value="Instagram">Instagram</option>
                                            <option value="Teman/Kerabat/Keluarga">Teman/Kerabat/Keluarga</option>
                                            <option value="Website">Website</option>
                                            <option value="Koran">Koran</option>
                                            <option value="Radio">Radio</option>
                                        </select>
                                    </div>
								</div>
                            </div>
								@if($data['sumber_info'] == 'Mahasiswa Kalla Institute')
								<div class="row">
                                    <div class="col-md-12">
                                        <div class="form_title">Jika dari Mahasiswa Kalla Institute, sebutkan nama Mahasiswa tersebut</div>
                                        <div class="form-group">
                                            <input type="text" class="form-control comment_input" wire:model="data.mahasiswa_penunjuk">
                                        </div>
                                    </div>
                                </div>
								@endif
								<div class="row">
                                    <div class="col-md-12">
                                        <div class="form_title">Kapan Anda tertarik masuk Kalla Institute?</div>
                                        <div class="form-group">
                                            <select class="form-control comment_input" wire:model="data.angkatan">
                                                <option value="Angkatan 2022">Angkatan 2022</option>
                                                <option value="Angkatan 2023">Angkatan 2023</option>
                                                <option value="Angkatan 2024">Angkatan 2024</option>
                                                <option value="Angkatan 2025">Angkatan 2025</option>
                                            </select>
                                        </div>
                                    </div>
								</div>
								<div class="row">
                                    <div class="col-md-12">
                                        <div class="form_title">Pesan</div>
                                        <div class="form-group">
                                            <textarea class="form-control comment_input comment_textarea" wire:model="data.pesan" required></textarea>
                                        </div>
                                    </div>
                                </div>
								<div class="row justify-content-between">
									<div class="col-4">&nbsp;</div>
									<div class="col-6 text-right">
									<button type="submit" class="btn btn-md btn-success">Kirim Pesan</button>
									</div>
								</div>
							</form>
						</div>
					</div>
                            </div>
                        </div>
                        <div class="col-md-5 d-flex align-items-stretch">
                            <div class="info-wrap bg-success w-100 p-lg-5 p-4">
                        @isset($data['alamat'])
                            <div class="dbox w-100 d-flex align-items-start">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="fa fa-map-marker"></span>
                                </div>
                                <div class="text pl-3">
                                    <p><span>Alamat:</span> {{$data['alamat']}}</p>
                                </div>
                            </div>
                        @endisset
                        @isset($data['no_kontak'])
                        <div class="dbox w-100 d-flex align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-phone"></span>
                            </div>
                            <div class="text pl-3">
                            <p><span>Telepon:</span> <a href="{{'tel://'.$data['no_kontak']}}">{{$data['no_kontak']}}</a></p>
                          </div>
                      </div>
                      @endisset
                      @isset($data['email'])
                        <div class="dbox w-100 d-flex align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-paper-plane"></span>
                            </div>
                            <div class="text pl-3">
                            <p><span>Email:</span> <a href="{{'mailto:'.$data['email']}}">{{$data['email']}}</a></p>
                          </div>
                      </div>
                      @endisset
                      @isset($data['youtube'])
                        <div class="dbox w-100 d-flex align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="ri-youtube-fill"></span>
                            </div>
                            <div class="text pl-3">
                            <p><!--span>Website</span--> <a href="{{'https://youtube.com/'.$data['youtube']}}" target="blank">{{$data['youtube']}}</a></p>
                          </div>
                      </div>
                      @endisset
                      @isset($data['instagram'])
                        <div class="dbox w-100 d-flex align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="ri-instagram-fill"></span>
                            </div>
                            <div class="text pl-3">
                            <p><!--span>Website</span--> <a href="{{'https://instagram.com/'.$data['instagram']}}" target="blank">{{$data['instagram']}}</a></p>
                          </div>
                      </div>
                      @endisset
                      @isset($data['facebook'])
                        <div class="dbox w-100 d-flex align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="ri-facebook-fill"></span>
                            </div>
                            <div class="text pl-3">
                            <p><!--span>Website</span--> <a href="{{'https://facebook.com/'.$data['facebook']}}" target="blank">{{$data['facebook']}}</a></p>
                          </div>
                      </div>
                      @endisset
                      @isset($data['tiktok'])
                        <div class="dbox w-100 d-flex align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa-brands fa-tiktok"></span>
                            </div>
                            <div class="text pl-3">
                            <p><!--span>Website</span--> <a href="{{'https://tiktok.com/'.$data['tiktok']}}" target="blank">{{$data['tiktok']}}</a></p>
                          </div>
                      </div>
                      @endisset
                      @isset($data['twitter'])
                        <div class="dbox w-100 d-flex align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="ri-twitter-fill"></span>
                            </div>
                            <div class="text pl-3">
                            <p><!--span>Website</span--> <a href="{{'https://twitter.com/'.$data['twitter']}}" target="blank">{{$data['twitter']}}</a></p>
                          </div>
                      </div>
                      @endisset
                  </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="contact_map" style="margin-top:30px">

    <!-- Google Map -->

    <div class="map">
        <div id="google_map" class="google_map">
            <div class="map_container">
                <div id="map" style="position: relative; overflow: hidden;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7947.5541558417435!2d119.450046!3d-5.139557!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbefd322672b63b%3A0xb9c9aaa7bb2ce719!2sKalla%20Institute!5e0!3m2!1sen!2sid!4v1668422926645!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>

</div>
<style>
    .form_title {
		font-weight: bold;
	}
    .contact-wrap {
        background: #fff;
    }
    .ftco-section {
        padding: 7em 0;
    }
    .info-wrap h3 {
        color: #fff;
    }
    .info-wrap {
        margin-top: -20px;
        margin-bottom: -20px;
        border-radius: 5px;
    }
    .info-wrap .dbox {
        width: 100%;
        color: rgba(255, 255, 255, 0.8);
        margin-bottom: 25px;
    }
    .info-wrap .dbox .icon {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
    }
    .info-wrap .dbox .icon span {
        font-size: 20px;
        color: #fff;
    }
    .form-group {
        margin-bottom: 1rem;
    }
    #contactForm .form-control {
        font-size: 16px;
    }
    .form-control {
        height: 52px;
        background: #fff;
        color: #000;
        font-size: 14px;
        border-radius: 2px;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        border: 1px solid rgba(0, 0, 0, 0.1);
    }
    .form-control {
        display: block;
        width: 100%;
        height: calc(1.5em + 0.75rem + 2px);
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        -webkit-transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
        transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
        -o-transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
    }
    .comment_textarea
    {
        width: 100%;
        height: 150px;
        padding-top: 15px;
    }
    .info-wrap .dbox p span {
        font-weight: 600;
        color: #fff;
    }
    .info-wrap .dbox .text {
        width: calc(100% - 50px);
    }

    .pl-3, .px-3 {
        padding-left: 1rem !important;
    }
</style>
</div>
