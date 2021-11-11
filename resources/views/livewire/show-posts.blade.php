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
                    <th scope="col" wire:click="order('id')">
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

                    <th scope="col" wire:click="order('title')" class="">
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
                    <th scope="col" wire:click="order('content')">Contenido
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