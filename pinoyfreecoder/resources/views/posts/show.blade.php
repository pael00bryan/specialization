@extends('layouts.app')

@section('content')
<div class="container">

    <strong>
        <h3>Post Details</h3>
    </strong>
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image}}" class="w-100">
        </div>
        <div class="col-4">
            <!-- <strong>
                <h1>{{ $post->user->username}}</h1>
            </strong> -->

            <div class="d-flex align-items-center">
                <div class="pr-3">
                    <img src="{{$post -> user -> profile ->profileImage()}}" alt="" class="rounded-circle w-100" style="max-width: 40px;">
                </div>
                <div>
                    <h5 class="font-weight-bold">
                        <a href="/profile/{{$post->user->id}}"> <span class="text-dark"> {{ $post->user->username}} </span></a>
                    </h5>
                </div>
            </div>


            <!-- <hr> -->
            <!-- <p>{{$post->caption}}</p> -->
            <p class="pt-2 pb-2">
                <!-- <span class="font-weight-bold">
                    <a href="/profile/{{$post->user->id}}"> <span class="text-dark"> {{ $post->user->username}}</span></a>: 
                </span> -->
                {{$post->caption}}
            </p>
            <div class="comment offset-1 w-15 ">
                <hr>
                <strong> <span><a href="#">Pangalan ni Sya</a>:</span> </strong>
                <p class="mt-1 ml-5">
                    Comment ni sya
                </p>
                <hr>
                
                <form class="pt-2" action="/p/{{$post->id}}/comment/" method="POST">
                    <div>

                        <textarea name="comments" id="comments"  style="font-family:sans-serif;font-size:1em;resize: vertical;width:27rem;height:5rem">           
                        </textarea>
                    </div>
                    <input class="btn btn-primary" type="submit" value="Comment">
                </form>
            </div>
        </div>
    </div>

</div>
@endsection