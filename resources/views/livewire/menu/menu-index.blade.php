<div>
	
	<div class="container mb-5">
		<div class="row mb-5">
			<div class="col-lg-12">
				<div class="container">
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-success text-white" data-coreui-toggle="modal" data-coreui-target="#menuCreateModal">
					  Tambah Menu
					</button>
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-lg-4">
			<h3>Menu</h3>
				<div class="menu-origin">
					<div id="menu_sementara" class="dd" wire:ignore>
					</div>
				</div>
			</div>
			<div class="col-lg-1 align-self-center panah">
				<i class="cil-arrow-thick-to-right"></i>
			</div>
			<div class="col-lg-6">
			<h3>List Menu Web</h3>
				<div class="menu-dropzone">
					<div id="list_menu" class="dd" wire:ignore>
						@php
				    		function get_menu($menus, $class = 'dd-list') {
								
				    			$html = '<ol class="'.$class.'">';
				    			foreach($menus as $key => $value) {
				    				$html .= '<li class="dd-item"  data-id="'.uniqid().'" data-menu="'.$value['menu'].'" data-link="'.$value['link'].'">
													<div class="container">
														<div class="row justify-content-between">
															<div class="dd-handle col">
																'.$value['menu'].'
															</div>
															<div class="dd-handle col-auto">
																<button class="badge bg-primary border-0" wire:click.prevent="">Edit</button>&nbsp;
																<button class="badge bg-danger border-0" wire:click.prevent="">Hapus</button>
															</div>
														</div>
								    				</div>';
											        if( !empty($value['children']) ) {
											            $html .= get_menu($value['children'],'children');
											        }
													
							    	$html .'</li>';
									
				    			}

				    			$html .= '</ol>';

				    			return $html;
				    		}

				    		echo get_menu($menus);

				    	@endphp
					</div>
				</div>
			</div>
		</div>
		<hr>
		<div class="row justify-content-end">
			<div class="col-lg-3">
				<!-- Button trigger modal -->
					<button type="button" class="btn btn-success text-white" onclick="getMenuData()">
					  Simpan Pengaturan Menu
					</button>
			</div>
		</div>
	</div>
	<button onclick="getNested()">tes</button>
	<livewire:menu.menu-create />
	<style>
		.panah {
			font-size: 3.5rem;
		}
		
		.menu-origin {
		  background-color: #fff6b5;
		  padding: 30px 10px;
		  /* min-height: 300px; */
		}

		.menu-draggable {
		  border: solid 2px #000;
		}

		.menu-dropzone {
		  background-color: #b0d2ff;
		  padding: 30px 10px;
		}
		.dd-item {
			cursor: move;
		}
		.dd-handle {
			border: none !important;
			border-radius: 0px !important;
		}
		.dd-collapse, .dd-expand {
			display: none !important;
		}		
		
	</style>
	<link rel="stylesheet" href="{{ asset('admin/css/jquery.nestable.min.css') }}">
	<script src="{{ asset('admin/js/jquery.nestable.min.js') }}"></script>
	<script>
		window.addEventListener('addDragMenu', event => {
			let r = (Math.random() + 1).toString(36).substring(7);
			if (jQuery('.menu-origin .dd').children('.dd-list').length){
				jQuery('.menu-origin .dd .dd-list').append('<li class="dd-item" data-menu="'+event.detail.menu.nama_menu+'" data-link="'+event.detail.menu.link+'"><div class="container"><div class="row justify-content-between"><div class="dd-handle col">'+event.detail.menu.nama_menu+'</div><div class="dd-handle col-auto"><button class="badge bg-primary border-0" wire:click.prevent="">Edit</button>&nbsp;<button class="badge bg-danger border-0" wire:click.prevent="">Hapus</button></div></div></div></li>');
			} else {
				jQuery('.menu-origin .dd').append('<ol class="dd-list"><li class="dd-item" data-menu="'+event.detail.menu.nama_menu+'" data-link="'+event.detail.menu.link+'"><div class="container"><div class="row justify-content-between"><div class="dd-handle col">'+event.detail.menu.nama_menu+'</div><div class="dd-handle col-auto"><button class="badge bg-primary border-0" wire:click.prevent="">Edit</button>&nbsp;<button class="badge bg-danger border-0" wire:click.prevent="">Hapus</button></div></div></div></li></ol>');
				jQuery('.menu-origin .dd .dd-empty').remove();
			};
		});
		jQuery('.dd').nestable();
		function getMenuData(){
			Livewire.emit('simpanMenu', jQuery('#list_menu').nestable('serialize'));
		};
	</script>
	
</div>
