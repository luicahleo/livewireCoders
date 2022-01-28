<div>

    <x-jet-danger-button wire:click="$set('open', true)">
        Crear nuevo post
    </x-jet-danger-button>

    {{-- usaremos el modal dado por jetsream --}}
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Crear nuevo post
        </x-slot>
        <x-slot name="content">
         {{-- mensaje de alerta para indicar que se esta cargando --}}
         {{--  wire:loading wire:target='image', le decimos que actue de acuerdo al propiedad image--}}
         <div class="alert alert-warning" role="alert" wire:loading wire:target='image'>
            Imagen cargando, espere hasta que se haya procesado!
          </div>

            {{-- para mostrar imagenen al cargar --}}
            @if ($image)
            <img class="mb-4" src="{{$image->temporaryUrl()}}" alt="">
                
            @endif


            <div class="mb-4">
                <x-jet-label value="Titulo del post" />
                {{-- wire:model.defer solamente actuara cuando desencadenemos una accion --}}
                <x-jet-input type="text" class="w-full" wire:model="title" />

                {{-- mensaje de error de validacion del campo title --}}
                @error('title')
                <span class="text-danger">{{$message}}</span>
                @enderror

                {{-- esta vez vamos a usar componentes de jetstream para mostrar el error, pero no me funciona porque estoy con bootstrap --}}
                {{-- <x-jet-input-error for='title'/> --}}

            </div>
            <div class="mb-4">
                {{-- este text area es bootstrap --}}
                <div class="form-group">
                    <label for="textArea">Contenido del post</label>
                    <textarea wire:model.defer="content" class="form-control rounded-0" id="textArea"
                        rows="3"></textarea>
                    {{-- mensaje de error de validacion del campo title --}}
                    @error('content')
                    <span class="text-danger">{{$message}}</span>
                    @enderror


                </div>

                <div>
                    <input type="file" wire:model='image' id="{{$identificador}}">
                    @error('image')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button>Cacelar</x-jet-secondary-button>
            {{-- wire:loading.attr='disabled' wire:target='save' class="disabled:opacity-50"   .... esta linea es para decirle que solo ejecute el metodo save
            que desabilite el boton mientras esta cargando con una opacidad del 50 % --}}
            {{--   wire:target='save, image' esto es para que desabilite cuando se graba o se esta cargando la imagen--}}
            <x-jet-danger-button wire:click='save' wire:loading.attr='disabled' wire:target='save, image' class="disabled:opacity-50">
                Crear post
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>