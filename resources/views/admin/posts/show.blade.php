@extends('layouts.admin')
@section('title', $post->title)

@section('content')

    
{{-- <div class="ms-5 mt-5">
    <a href="{{ route('admin.posts.index') }}" class="btn btn-primary ">
        <i class="fa-solid fa-arrow-left"></i>
    </a>
</div> --}}

<a  href="{{ route('admin.posts.index') }}">
    <button class="back-button m-5">
        <div class="back-button-box">
          <span class="back-button-elem">
            <svg viewBox="0 0 46 40" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z"
              ></path>
            </svg>
          </span>
          <span class="back-button-elem ">
            <svg viewBox="0 0 46 40">
              <path
                d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z"
              ></path>
            </svg>
          </span>
        </div>
    </button>
</a>



<section class="container d-flex justify-content-center mt-5">

    
    <div class="card my-3 overflow-hidden" style="width: 500px">
        <img src="{{asset('storage/'. $post->image)}}" alt="{{$post->title}}"> <br>
        <div class="card-body">
            <h1>{{$post->title}}</h1>
            <p>{{$post->content}}</p>
            @if($post->category)
                <p> Catrgory: {{$post->category->name}}</p>
            @endif
            @if($post->tags)
                {{-- $post->tags esso e un array di tags--}}
                @foreach ($post->tags as $tag)
                    <span class="badge bg-primary">{{$tag->name}}</span>
                @endforeach
            @endif
            <div class="my-3">
                <a href="{{route('admin.posts.edit', $post->slug)}}" >
                    <button class="btn button-edit">
                        Edit
                        <svg class="svg-edit" viewBox="0 0 512 512">
                            <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path>
                        </svg>
                        
                    </button>
                </a>
            </div>
        </div>
    </div>
    
   
</section>
@endsection

