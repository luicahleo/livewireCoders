<div>
    <a class="btn btn-outline-success" wire:click="$set('open_edit', true)">
        <i class="fas fa-edit"></i>
    </a>

    {{-- el modal siempre necesita estos tres campos --}}
    <x-jet-dialog-modal wire:model="open_edit">
        <x-slot name='title'>
            Editar el post
        </x-slot>

        <x-slot name='content'>

            <div class="alert alert-warning" role="alert" wire:loading wire:target='image'>
                Imagen cargando, espere hasta que se haya procesado!
              </div>

              {{-- para mostrar imagenen al cargar --}}
            @if ($image)
            <img class="mb-4" src="{{$image->temporaryUrl()}}" alt="">
                
            @else
              <img src="{{Storage::url($post->image)}}" alt="">

            @endif


            <div class="mb-4">
                <x-jet-label value="Titulo del post" />
                <x-jet-input type="text" class="w-full" wire:model="post.title" />
            </div>

            {{-- este text area es bootstrap --}}
            <div class="form-group">
                <label for="textArea">Contenido del post</label>
                <textarea wire:model.defer="post.content" class="form-control rounded-0" id="textArea"
                    rows="3"></textarea>
                {{-- mensaje de error de validacion del campo title --}}
                @error('content')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mt-2">
                <input type="file" wire:model='image' id="{{$identificador}}">
                @error('image')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </x-slot>

        <x-slot name='footer'>
            <x-jet-secondary-button wire:click="$set('open_edit', false)">Cacelar</x-jet-secondary-button>
            {{-- wire:loading.attr='disabled' wire:target='save' class="disabled:opacity-50"   .... esta linea es para decirle que solo ejecute el metodo save
            que desabilite el boton mientras esta cargando con una opacidad del 50 % --}}
            {{--   wire:target='save, image' esto es para que desabilite cuando se graba o se esta cargando la imagen--}}
            <x-jet-danger-button wire:click='save' wire:loading.attr='disabled' wire:target='save, image' class="disabled:opacity-50">
                Actualizar
            </x-jet-danger-button>

        </x-slot>
    </x-jet-dialog-modal>
</div>