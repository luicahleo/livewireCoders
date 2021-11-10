<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="container mb-4">
        <x-jet-input type="text" wire:model="search" placeholder="Buscador" />
    </div>

    @if ($posts->count())

        <div class="container">Lista de Posts</div>

        <div class="container">
            <table class="table table-bordered border-primary">
                <thead>
                    <tr>
                        <th scope="col" wire:click="order('id')">ID</th>
                        <th scope="col" wire:click="order('title')">Titulo</th>
                        <th scope="col" wire:click="order('content')">Contenido</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($posts as $post)

                    <tr>
                        <th scope="row">{{$post->id}}</th>
                        <td>{{$post->title}}</td>
                        <td>{{$post->content}}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            {{-- <div>
                {{$posts->links()}}
            </div> --}}
        </div>
        
    @else

    <div class="container">
        No hay registros que mostrar
    </div>
        
    @endif


</div>