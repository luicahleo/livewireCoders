<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="container">
        {{-- <div class="row">
            <div class="col border">1</div>
            <div class="col border">2</div>
            <div class="col border">3</div>
            <div class="col border">4</div>
            <div class="col border">5</div>
            <div class="col border">6</div>
            <div class="col border">7</div>
            <div class="col border">8</div>
            <div class="col border">9</div>
            <div class="col border">10</div>
            <div class="col border">11</div>
            <div class="col border">12</div>
        </div> --}}
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

    <div class="container mt-4"><h2>Lista de Posts</h2></div>

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