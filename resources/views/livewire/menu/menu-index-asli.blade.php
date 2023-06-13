<div>
	<div class="container mb-5">
		<div class="row mb-5">
			<div class="col-lg-12">
				<div class="container">
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-success text-white" data-coreui-toggle="modal" data-coreui-target="#menuCreateModal">
					  Tambah Menu
					</button>
					isi tempmenu = {{ count($tempMenu) }}
				</div>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-lg-4">
				<div class="menu-origin" ondrop="onDropBack(event);" ondragover="onDragOver(event);" wire:ignore>
				</div>
			</div>
			<div class="col-lg-1 align-self-center panah">
				<i class="cil-arrow-thick-to-right"></i>
			</div>
			<div class="col-lg-6">
				<div id="tempatdrop" class="menu-dropzone" ondragover="onDragOver(event);" ondrop="onDrop(event);" data-id="0">
				</div>
			</div>
		</div>
	</div>
	<livewire:menu.menu-create />
	<style>
		.panah {
			font-size: 3.5rem;
		}
		
		.menu-origin {
		  background-color: #fff;
		  padding: 15px;
		  min-height: 300px;
		}

		.menu-draggable {
		  border: solid 2px #000;
		}

		.menu-dropzone {
		  background-color: #b0d2ff;
		  flex-basis: 100%;
		  flex-grow: 1;
		  padding: 30px 10px;
		  min-height: 300px;
		}
	</style>
	<link rel="stylesheet" href="cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.css">
	<script>
		let listMenu = [];
		function onDragStart(event) {
		  event.dataTransfer.setData('text/plain', event.target.id);
		}
		function onDragOver(event) {
		  event.preventDefault();
		}
		function onDrop(event) {
			const id = event.dataTransfer.getData('text');
			const draggableElement = document.getElementById(id);
			alert(draggableElement);
			const dropzone = event.target;
			//draggableElement.className = "alert alert-warning menu-draggable";
			dropzone.appendChild(draggableElement);
			let dataMenu = [];
			//dataMenu['id'] = draggableElement.dataset.id;
			dataMenu['parent'] = dropzone.dataset.id;
			listMenu.push(dataMenu);
			draggableElement.dataset.origin = 1;
			//Livewire.emit('addListMenu', draggableElement.dataset.element_id);
			event.dataTransfer.clearData();
		}
		function onDropBack(event){
			const id = event.dataTransfer.getData('text');
			const draggableElement = document.getElementById(id);
			listMenu.forEach( function(val, index){
				if(val.id == draggableElement.dataset.id){
					listMenu.splice(index, 1); 
				}
			});
			if(draggableElement.dataset.origin == 1){
				draggableElement.remove();
			}
		}
		window.addEventListener('addDragMenu', event => {
			jQuery('.menu-origin').append('<div data-id="'+event.detail.menu.id+'" data-element_id="'+event.detail.menu.element_id+'" data-origin="0" class="alert alert-primary menu-draggable" role="alert" draggable="true" ondragstart="onDragStart(event);">'+event.detail.menu.nama_menu+'</div>');
		});
	</script>
	<script src="{{ asset('admin/js/jquery.nestable.min.js') }}"></script>
</div>
