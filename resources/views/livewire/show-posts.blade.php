<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    {{$search}}


    <div class="container">Lista de Posts</div>
    <div class="container">
        <input type="text" wire:model='search'>
    </div>
    <div class="container">
        <table class="table table-bordered border-primary">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Contenido</th>
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

</div>