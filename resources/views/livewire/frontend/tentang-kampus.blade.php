<div>
   	<div class="home-breadcrumb">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="{{route('home')}}">Home</a></li>
								<li>Tentang Kampus</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

   <div style="margin-top:40px;margin-bottom:10px;" id="blog" class="blog">
		<div class="container">
			<div class="row">
                @if(Request()->request->all()['is_main_domain'])
				<div class="col">
					<!--Content-->

					<article class="entry entry-single">

              <div class="entry-content">
                <h2>Deskripsi sejarah singkat</h2>

				<p>Pada Hari Selasa, 9 Juli 2019 bertempat di rumah Dinas Wakil Presiden telah diserahkan SK Ijin Operasional Institut Teknologi dan Bisnis Kalla oleh Menristek Dikti kepada Ketua Yayasan Hadji Kalla Ibu Fatimah Kalla untuk mengeluarkan SK ijin pendirian Institut Teknologi dan Bisnis Kalla.</p>

				<blockquote>
				<p><span style="color:#7f8c8d">Ada 4 program studi yang dibuka yaitu Kewirausahaan, Manajemen Retail, Bisnis Digital dan Sistem Informasi.</span></p>
				</blockquote>

				<p>Melalui proses yang cukup panjang berawal dari ijin dan restu Pak JK selaku Pembina Yayasan pada tanggal 10 November 2018. Dilanjutkan permohonan rekomendasi ke LLDikti Wilayah IX untuk bahan pengajuan ijin ke Kemenristek Dikti. Setelah melalui proses bimbingan teknis, open recruitment calon dosen dan site visit serta verifikasi berkas oleh Tim Dikti ke Makassar pada tanggal 2 Juli 2019 akhirnya Kemenristek Dikti memutuskan untuk memberikan ijin pendirian.</p>

				<p>Bapak Jusuf Kalla dalam sambutannya menyampaikan alasan pendirian Kalla Institute ini. Pada tahun 1950 an ada banyak pengusaha pribumi di Makassar. Namun sangat sedikit yang bisa bertahan sampai tiga generasi seperti Kalla Group. Apa yang menjadi rahasia bisnis akan diajarkan di Kalla Institute ini dengan spirit kewirausahaan berbasis values Jalan Kalla dengan kombinasi nilai nilai agama dan kearifan lokal serta modernitas. Juga disertai dengan pemanfaatan teknologi sehingga cepat dan solutif dalam bekerja.</p>

				<p>Pada kesempatan itu Fatimah Kalla menambahkan bahwa pengalaman Kalla Group 67 tahun di bisnis dan 35 tahun di sekolah akan dipadukan di sebuah perguruan tinggi. Sharing pengalaman dengan memberikan sentuhan wirausaha yang dilengkapi oleh ilmu manajemen modern dan profeasional. Sebelum menyerahkan SK Menristek Dikti berpesan bahwa Perguruan Tinggi harus menghasilkan lulusan yang dibutuhkan oleh pasar. Oleh karena itu perlu ada kampus yang memadukan akademik dan praktis.</p>

				<p>Acara dihadiri oleh Wapres, Menristek Dikti dan tim, Kepala LLDikti Wilayah IX Prof Jasruddin dan tim dan Ketua Yayasan Kalla Ibu Fatimah Kala dan tim. Ibu Fatimah Kalla menekankan bahwa Kalla Institute ini bukan komersil tapi mengedepankan kualitas. Untuk persiapan akan dilakukan langkah membangun kemitraan dengan kampus besar yang sudah besar seperti SBM ITB, PPM Business School, ESQ Business School dan Prasetiya Mulya. Juga ke dunia teknologi seperti Google, Oracle, Microsoft dan lainnya. Mitra ini akan bekerja sama dalam pengembangan kurikulum, persiapan calon dosen, manajemen kampus dan lain sebagainya yang bisa membuat gerakan kampus lebih cepat.</p>
              </div>

            </article>


					<!-- End Content-->
				</div>
                @else
                    <div class="col tentang">
                        <img src="{{asset($gambar_tentang_prodi)}}">
                    </div>
                @endif
			</div>
		</div>
	</div>
	 <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<style>
        .tentang {
			padding: 20px 10px;
		}
		.tentang img {
			max-width: -webkit-fill-available;
		}
		.blog {
		  padding: 10px 0 20px 0;
		  font-family: "Open Sans", sans-serif;
		  color: #444444;
		}

		.blog h1,h2,h3,h4,h5,h6 {
		  font-family: "Raleway", sans-serif;
		  margin-bottom: 20px;
		}

		.blog .entry {
		  padding: 30px;
		  margin-bottom: 60px;
		  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
		}

		.blog .entry .entry-content p {
		  line-height: 24px;
          text-align: justify;
		}

		.blog .entry .entry-content h3 {
		  font-size: 22px;
		  margin-top: 30px;
		  font-weight: bold;
		}

		.blog .entry .entry-content blockquote {
		  overflow: hidden;
		  background-color: #fafafa;
		  padding: 60px;
		  position: relative;
		  text-align: left;
		  margin: 20px 10px 20px 50px;
		}

		.blog .entry .entry-content blockquote p {
		  color: #444444;
		  line-height: 1.6;
		  margin-bottom: 0;
		  font-style: italic;
		  font-weight: 500;
		  font-size: 22px;
		}

		.blog .entry .entry-content blockquote::after {
		  content: "";
		  position: absolute;
		  left: 0;
		  top: 0;
		  bottom: 0;
		  width: 3px;
		  background-color: #556270;
		  margin-top: 20px;
		  margin-bottom: 20px;
		}

		.blog .entry-single {
		  margin-bottom: 30px;
		}
	</style>
</div>
