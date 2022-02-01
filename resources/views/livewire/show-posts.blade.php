<div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-10 mb-3">
                <x-jet-input type="text" wire:model="search" placeholder="Buscador" />


            </div>
            <div class="col-12 col-md-4 col-lg-2 ">
                @livewire('create-post')

            </div>
        </div>
    </div>

    @if ($posts->count())

        <div class="container mt-4">
            <h2>Lista de Posts</h2>
        </div>

        <div class="container mt-2">
            <table class="table-responsive table-bordered border-primary">
                <thead>
                    <tr>
                        <th scope="col" wire:click="order('id')" class="w-24">
                            ID
                            @if ($sort == 'id')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt mr-4"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt mr-4"></i>
                                @endif
                            @else
                                <i class="fas fa-sort mr-4"></i>
                            @endif
                        </th>

                        <th scope="col" wire:click="order('title')" class="float-right">
                            Titulo
                            @if ($sort == 'title')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt mr-4"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt mr-4"></i>
                                @endif
                            @else
                                <i class="fas fa-sort mr-4"></i>
                            @endif

                        </th>
                        <th scope="col" wire:click="order('content')" class="float-right">Contenido
                            @if ($sort == 'content')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt mr-4"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt mr-4"></i>
                                @endif
                            @else
                                <i class="fas fa-sort mr-4"></i>
                            @endif
                        </th>
                        <th class="float-right"></th>


                    </tr>
                </thead>

                <tbody>
                    {{-- buble para recorrer todos los post --}}
                    @foreach ($posts as $item)

                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->content }}</td>
                            <th>
                                {{-- @livewire('edit-post', ['post' => $post], key($post->id)) --}}
                                <a class="btn btn-outline-success" wire:click="edit({{ $item }})">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </th>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>

    @else

        <div class="container">
            No hay registros que mostrar
        </div>

    @endif

    @if ($post->hasPages())
        <div class="px-6 py-3">
            {{ $posts->links() }}
        </div>
    @endif



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
                <img class="mb-4" src="{{ $image->temporaryUrl() }}" alt="">

            @else
                <img src="{{ Storage::url($post->image) }}" alt="">

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
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-2">
                <input type="file" wire:model="image" id="{{ $identificador }}">
                {{-- <x-jet-input-error for="image" /> --}}
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </x-slot>

        <x-slot name='footer'>
            <x-jet-secondary-button wire:click="$set('open_edit', false)">Cacelar</x-jet-secondary-button>
            {{-- wire:loading.attr='disabled' wire:target='save' class="disabled:opacity-50" .... esta linea es para
            decirle que solo ejecute el metodo save
            que desabilite el boton mientras esta cargando con una opacidad del 50 % --}}
            {{-- wire:target='save, image' esto es para que desabilite cuando se graba o se esta cargando la imagen --}}
            <x-jet-danger-button wire:click='update' wire:loading.attr='disabled' wire:target='save, image'
                class="disabled:opacity-50">
                Actualizar
            </x-jet-danger-button>

        </x-slot>
    </x-jet-dialog-modal>












    {{-- el modal siempre necesita estos tres campos --}}
    {{-- <x-jet-dialog-modal wire:model="open_edit">
        <x-slot name='title'>
            Editar el post
        </x-slot>
        <x-slot name='content'>
            <div class="mb-4">
                <x-jet-label value="Titulo del post" />
                <x-jet-input type="text" class="w-full" />
            </div>
        </x-slot>
        <x-slot name='footer'>
            <x-jet-secondary-button wire:click="$set('open_edit', false)">
                Cacelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click='save' wire:loading.attr='disabled' wire:target='save, image'
                class="disabled:opacity-50">
                Crear post
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal> --}}
</div>
