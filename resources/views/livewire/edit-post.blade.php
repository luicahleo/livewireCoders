<div>
    <a class="btn btn-outline-success" wire:click="$set('open', true)">
        <i class="fas fa-edit"></i>
    </a>

    {{-- el modal siempre necesita estos tres campos --}}
    <x-jet-dialog-modal wire:model="open">
        <x-slot name='title'>
            Editar el post {{$post->title}}
        </x-slot>
        <x-slot name='content'>
            <div class="mb-4">
                <x-jet-label value="Titulo del post" />
                <x-jet-input type="text" class="w-full" />
            </div>
        </x-slot>
        <x-slot name='footer'>

        </x-slot>
    </x-jet-dialog-modal>
</div>