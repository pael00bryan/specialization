@extends('layouts.app')

@section('content')


<li class="nav-item dropdown d-flex ml-1">


    <a id="profileDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        <strong>Users</strong>

    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
        @foreach($users as $user)
        <a id="navbarDropdown" class=" dropdown-item" href="/profile/{{$user->id}}" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ $user->username }}
        </a>
        @endforeach
        
    </div>
</li>
<div class="container ">
    @foreach($posts as $post)

    <div class="row">
        <!-- <image-composer></image-composer> -->

        <div class="col-6 offset-3 pt-4 pb-2">
            <a href="/profile/{{$post->user->id}}">
                <img src="/storage/{{ $post->image}}" class="w-100">
            </a>


            <p class="pt-2 pb-4">
                <span class="font-weight-bold">
                    <a href="/profile/{{$post->user->id}}"> <span class="text-dark"> {{ $post->user->username}} </span></a>
                </span>
                {{$post->caption}}
            </p>
        </div>

    </div>


    @endforeach

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{$posts->links()}}
        </div>
    </div>

</div>
@endsection