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
            <div class="mb-4">
                <x-jet-label value="Titulo del post" />
                {{-- wire:model.defer solamente actuara cuando desencadenemos una accion --}}
                <x-jet-input type="text" class="w-full"  wire:model.defer="title"/>
            </div>
            <div class="mb-4">
                {{-- este text area es bootstrap --}}
                <div class="form-group">
                    <label for="textArea">Contenido del post</label>
                    <textarea wire:model.defer="content" class="form-control rounded-0" id="textArea" rows="3"></textarea>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button >Cacelar</x-jet-secondary-button>
            <x-jet-danger-button wire:click='save'>Crear post</x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>