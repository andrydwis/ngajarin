@extends('layouts.student.app-new')
@section('content')

<div class="flex justify-center">

    <a href="{{route('user.post.index')}}" class="fixed z-20 inline lg:hidden left-4 bottom-4">
        <button class="text-white duration-300 rounded-full w-14 h-14 focus:outline-none bg-primary-lighter hover:bg-primary">
            <i class="mr-1 text-xl fill-current fas fa-chevron-left"></i>
        </button>
    </a>

    <div class="flex flex-col items-start max-w-5xl py-5 md:flex-row md:mx-5 ">

        <div class="flex-none hidden mr-9 lg:block lg:sticky lg:self-start top-10 w-52">

            <div class="lg:sticky lg:text-center">

                <!-- isi sidebar -->
                <div class="flex flex-col pt-10">

                    <a href="#textbox-comment">
                        <div class="py-2 my-1 text-base text-white rounded-full bg-primary-lighter hover:bg-primary hover:text-white">
                            <i class="mr-1 text-sm text-white fas fa-share"></i> Balas Postingan
                        </div>
                    </a>

                    <hr class="my-4 ml-2">

                    <a href="{{route('user.post.index')}}">
                        <div class="pl-6 my-1 text-base text-left border border-white sidebar-item hover:border-primary">
                            <i class="mr-1 text-sm fill-current fas fa-bars"></i> Postingan Terbaru
                        </div>
                    </a>

                    <a href="{{route('user.post.my-post')}}">
                        <div class="pl-6 my-1 text-base text-left border border-white sidebar-item hover:border-primary">
                            <i class="mx-1 text-sm fill-current fas fa-history"></i> Postingan Saya
                        </div>
                    </a>

                    <a href="{{route('user.post.bookmark')}}">
                        <div class="pl-6 my-1 text-base text-left border border-white sidebar-item hover:border-primary">
                            <i class="ml-1 mr-2 text-sm fill-current fas fa-bookmark"></i> Disimpan
                        </div>
                    </a>

                    <a href="{{route('user.post.index')}}">
                        <div class="pl-6 my-1 text-base text-left border border-white sidebar-item hover:border-primary">
                            <i class="ml-1 mr-3 text-sm fill-current fas fa-chevron-left"></i> Kembali
                        </div>
                    </a>

                </div>
                <!-- end of sidebar -->

            </div>

        </div>

        <div class="flex-1 md:min-w-[36rem] lg:min-w-[42rem]">

            <!-- conversation list -->
            <div class="pt-10 pb-3">

                <!-- POST TITLE -->
                <div class="flex flex-col px-6 py-4 mx-4 transition-all bg-gray-100 border border-gray-100 cursor-pointer md:flex-row rounded-xl">
                    <div class="flex-col items-start justify-start w-full md:flex lg:-mt-1">

                        <!-- title -->
                        <div class="flex w-full">
                            <div class="flex-1 mb-4 text-base break-words lg:mb-0 md:pr-6 lg:line-clamp-1">
                                <span class="text-lg font-semibold text-black conversation-list-link hover:text-black link">
                                    {{$post->title}}
                                </span>
                            </div>
                            <div class="hidden ml-auto md:flex">
                                <div>
                                    @foreach($post->tags as $tag)
                                    <span class="block py-1 mx-0 my-0 ml-1 text-center rounded-full btn btn-outline-primary">
                                        {{$tag->name}}
                                    </span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- end of title -->

                        <!-- comment, like, tag -->
                        <div class="relative flex flex-row-reverse items-center mt-2 text-center text-gray-400 md:mt-3">

                            <div class="flex ml-5 md:hidden ">
                                <div>
                                    @foreach($post->tags as $tag)
                                    <a href="#" class="block py-1 mx-0 my-0 ml-1 text-center rounded-full btn btn-outline-primary"> {{$tag->name}}
                                    </a>
                                    @endforeach
                                </div>
                            </div>

                            @if(!$post->bookmarked())
                            <form action="{{route('user.post.bookmark-process', ['post' => $post])}}" method="POST">
                                @csrf
                                <button type="submit" class="focus:outline-none">
                                    <div class="flex items-center justify-center ml-4 hover:text-primary-lighter">
                                        <i class="mr-1 text-sm far fa-bookmark"></i>
                                        <span class="relative text-xs font-semibold leading-none text-left">
                                            Simpan
                                        </span>
                                    </div>
                                </button>
                            </form>
                            @elseif($post->bookmarked())
                            <form action="{{route('user.post.bookmark-process', ['post' => $post])}}" method="POST">
                                @csrf
                                <button type="submit" class="focus:outline-none">
                                    <div class="flex items-center justify-center ml-4 hover:text-primary-lighter">
                                        <i class="mr-1 text-sm fill-current fas fa-bookmark"></i>
                                        <span class="relative text-xs font-semibold leading-none text-left ">
                                            Tersimpan
                                        </span>
                                    </div>
                                </button>
                            </form>
                            @endif


                            <div class="flex items-center justify-center ml-4">

                                <form action="{{route('user.post.dislike', ['post' => $post->slug])}}" method="post">
                                    @csrf
                                    @if(in_array(auth()->user()->id, $post->dislikes()))
                                    <!-- dislike -->
                                    <button type="submit" class="focus:outline-none">
                                        <i class="mr-1 text-sm md:text-base text-primary-lighter hover:text-opacity-30 fas fa-thumbs-down"></i>
                                    </button>
                                    @else
                                    <!-- un-dislike -->
                                    <button type="submit" class="focus:outline-none">
                                        <i class="mr-1 text-sm text-gray-400 md:text-base hover:text-primary-lighter fas fa-thumbs-down"></i>
                                    </button>
                                    @endif
                                </form>

                                <span class="relative text-xs font-semibold leading-none text-left">
                                    {{count($post->dislikes())}}
                                </span>
                            </div>

                            <div class="flex items-center justify-center">
                                <form action="{{route('user.post.like', ['post' => $post->slug])}}" method="post">
                                    @csrf
                                    @if(in_array(auth()->user()->id, $post->likes()))
                                    <!-- unlike -->
                                    <button type="submit" class="focus:outline-none">
                                        <i class="mr-1 text-sm md:text-base text-primary-lighter hover:text-opacity-30 fas fa-thumbs-up"></i>
                                    </button>
                                    @else
                                    <!-- like -->
                                    <button type="submit" class="focus:outline-none">
                                        <i class="mr-1 text-sm text-gray-400 md:text-base hover:text-primary-lighter fas fa-thumbs-up"></i>
                                    </button>
                                    @endif
                                </form>

                                <span class="relative text-xs font-semibold leading-none text-left">
                                    {{count($post->likes())}}
                                </span>
                            </div>

                        </div>
                        <!-- end of comment, like, tag -->

                    </div>
                </div>
                <!-- end of POST TITLE -->
                <!-- ////////////////////////////////////// -->


                <!-- AUTHOR POST -->
                <div class="w-0 h-6 ml-12 border"></div>
                <div class="flex flex-col px-6 py-4 mx-4 transition-all bg-gray-100 bg-opacity-100 border border-gray-100 md:flex-row rounded-xl">

                    <div class="flex items-center self-start w-full mb-4 md:w-auto md:mr-5 md:block md:mb-0">

                        <!-- user info -->
                        <div class="flex items-center">
                            <a href="" class="block mb-2 mr-3 md:mr-0 h-14 w-14">
                                <img loading="lazy" alt="eludic" class="object-cover bg-white rounded h-14 w-14" src="{{$post->creator->detail->photo ?? 'https://ui-avatars.com/api/?background=random&name='.$post->creator->name}}" />
                            </a>
                            <div class="flex flex-col md:hidden">
                                <div class="flex items-center mb-1">
                                    <strong class="flex text-xs uppercase md:text-base">
                                        {{ $post->creator->name}}
                                    </strong>
                                    <span class="block px-2 py-[2px] text-gray-600 tracking-wide border-gray-300 mx-0 my-0 ml-1 text-xs text-center border rounded-full">Penulis</span>
                                </div>
                                <p class="text-xs text-gray-700 md:text-sm">
                                    Diposting
                                    <time>
                                        {{\Carbon\Carbon::parse($post->created_at)->isoFormat('dddd, D MMMM Y')}}
                                    </time>
                                </p>
                            </div>
                        </div>
                        <!-- end of user info -->

                    </div>

                    <div class="w-full md:mb-0">
                        <div class="flex flex-col justify-between h-full">

                            <!-- nama penulis -->
                            <div class="flex-col hidden mb-5 md:flex">
                                <div class="flex items-center mb-1">
                                    <strong class="flex text-xs uppercase break-all md:text-base line-clamp-1">
                                        {{ $post->creator->name}}
                                    </strong>
                                    <span class="block px-2 py-[2px] text-gray-600 tracking-wide border-gray-300 mx-0 my-0 ml-1 text-xs text-center border rounded-full">Penulis</span>
                                </div>
                                <p class="text-sm text-gray-700">
                                    Diposting
                                    <time>
                                        {{\Carbon\Carbon::parse($post->created_at)->isoFormat('dddd, D MMMM Y')}}
                                    </time>
                                </p>
                            </div>
                            <!-- end of nama penulis -->

                            <!-- potongan konten -->
                            <div class="mt-2 mb-6 text-gray-800 lg:mb-0 lg:pr-8">
                                <span class="prose normal-case break-all md:break-word">
                                    {{ $post->content }}
                                </span>
                            </div>
                            <!-- end of potongan konten -->

                            <!-- last reply info -->
                            <div class="flex flex-col justify-between mt-4 text-xs text-gray-700 md:flex-row">
                                <div class="flex gap-2 mt-2 text-sm md:mt-0">
                                    @if($post->creator->id == auth()->user()->id)
                                    <a href="{{route('user.post.edit', ['post' => $post->slug])}}" class="pr-2 font-semibold border-r-2 hover:text-primary">Edit</a>
                                    <form action="{{route('user.post.destroy', ['post' => $post->slug])}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="font-semibold hover:text-primary">Hapus</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                            <!-- end of last reply info -->
                        </div>
                    </div>
                </div>
                <!-- end of AUTHOR POST -->
                <!-- ////////////////////////////////////// -->


                <!-- COMMENT SECTION -->
                @foreach($comments as $comment)
                <div class="w-0 h-10 ml-20 border"></div>
                <div class="flex flex-col px-6 py-4 mx-4 transition-all border border-gray-100 bg-gray-50 hover:bg-gray-100 bg-opacity-70 md:flex-row rounded-xl">

                    <div class="flex items-center self-start w-full mb-4 md:w-auto md:mr-5 md:block md:mb-0">

                        <!-- user info -->
                        <div class="flex items-center">
                            <div class="block mb-2 mr-3 md:mr-0 h-14 w-14">
                                <img loading="lazy" alt="eludic" class="object-cover bg-white rounded h-14 w-14" src="{{$comment->creator->detail->photo ?? 'https://ui-avatars.com/api/?background=random&name='.$comment->creator->name}}" />
                            </div>

                            <!-- nama penulis mobile -->
                            <div class="flex flex-col md:hidden">
                                <div class="flex items-center mb-1">
                                    <strong class="flex text-xs uppercase break-all md:text-base line-clamp-1">
                                        {{ $comment->creator->name}}
                                    </strong>

                                    @if( $comment->creator->name == $post->creator->name)
                                    <span class="block px-2 py-[2px] text-gray-600 tracking-wide border-gray-300 mx-0 my-0 ml-1 text-xs text-center border rounded-full">Penulis</span>
                                    @endif

                                </div>
                                <p class="text-xs text-gray-700">
                                    Membalas
                                    <time>
                                        {{$comment->created_at->diffForHumans()}}
                                    </time>
                                </p>
                            </div>
                            <!-- end of nama penulis mobile -->

                        </div>
                        <!-- end of user info -->

                    </div>

                    <div class="w-full">
                        <div class="flex flex-col justify-between h-full">

                            <!-- nama penulis -->
                            <div class="flex-col hidden md:flex">
                                <div class="flex items-center mb-1">
                                    <strong class="flex text-xs uppercase break-all md:text-base line-clamp-1">
                                        {{ $comment->creator->name}}
                                    </strong>

                                    @if( $comment->creator->name == $post->creator->name)
                                    <span class="block px-2 py-[2px] text-gray-600 tracking-wide border-gray-300 mx-0 my-0 ml-1 text-xs text-center border rounded-full">Penulis</span>
                                    @endif

                                </div>
                                <p class="text-xs text-gray-700">
                                    Membalas
                                    <time>
                                        {{$comment->created_at->diffForHumans()}}
                                    </time>
                                </p>
                            </div>
                            <!-- end of nama penulis -->

                            <!-- Comment -->
                            <div class="mt-2 mb-6 text-gray-800 lg:mb-0 lg:pr-8">
                                <span class="prose normal-case break-all md:break-word">
                                    {{$comment->content}}
                                </span>
                            </div>
                            <!-- end of Comment -->

                            <!-- reaction -->
                            <div class="flex justify-end gap-5 mt-4 text-sm text-gray-400">

                                <div class="flex items-center justify-center">
                                    <form action="{{route('user.post.comment.dislike', ['comment' => $comment])}}" method="post">
                                        @csrf
                                        @if(in_array(auth()->user()->id, $comment->dislikes()))
                                        <!-- dislike -->
                                        <button type="submit" class="focus:outline-none">
                                            <i class="mr-1 text-sm md:text-base text-primary-lighter hover:text-opacity-30 fas fa-thumbs-down"></i>
                                        </button>
                                        @else
                                        <!-- un-dislike -->
                                        <button type="submit" class="focus:outline-none">
                                            <i class="mr-1 text-sm text-gray-400 md:text-base hover:text-primary-lighter fas fa-thumbs-down"></i>
                                        </button>
                                        @endif
                                    </form>

                                    <span class="relative text-xs font-semibold leading-none text-left">
                                        {{count($comment->dislikes())}}
                                    </span>
                                </div>


                                <div class="flex items-center justify-center">

                                    <form action="{{route('user.post.comment.like', ['comment' => $comment])}}" method="post">
                                        @csrf
                                        @if(in_array(auth()->user()->id, $comment->likes()))
                                        <!-- unlike -->
                                        <button type="submit" class="focus:outline-none">
                                            <i class="mr-1 text-sm md:text-base text-primary-lighter hover:text-opacity-30 fas fa-thumbs-up"></i>
                                        </button>
                                        @else
                                        <!-- like -->
                                        <button type="submit" class="focus:outline-none">
                                            <i class="mr-1 text-sm text-gray-400 md:text-base hover:text-primary-lighter fas fa-thumbs-up"></i>
                                        </button>
                                        @endif
                                    </form>

                                    <span class="relative text-xs font-semibold leading-none text-left">
                                        {{count($comment->likes())}}
                                    </span>
                                </div>

                            </div>
                            <!-- end of reaction -->

                        </div>
                    </div>
                </div>
                @endforeach
                <!-- end of COMMENT SECTION -->
                <!-- ////////////////////////////////////// -->

            </div>
            <!-- end of conversation list -->

            <!-- reply post -->
            <div class="pt-10 pb-3">

                <div class="flex flex-col px-6 py-4 mx-4 transition-all border border-gray-100 shadow md:flex-row rounded-xl">

                    <div class="flex items-center self-start w-full mb-2 md:w-auto md:mr-5 md:block md:mb-0">

                        <!-- user info -->
                        <div class="flex items-center">
                            <div class="block mb-2 mr-3 md:mr-0 h-14 w-14">
                                <img loading="lazy" alt="eludic" class="object-cover bg-white rounded h-14 w-14" src="{{$user->detail->photo ?? 'https://ui-avatars.com/api/?background=random&name='.$user->name}}" />
                            </div>

                            <!-- nama penulis mobile -->
                            <div class="flex flex-col md:hidden">
                                <div class="flex items-center mb-1">
                                    <strong class="flex text-xs uppercase break-all md:text-base line-clamp-1">
                                        {{$user->name}}
                                    </strong>
                                </div>
                            </div>
                            <!-- end of nama penulis mobile -->

                        </div>
                        <!-- end of user info -->

                    </div>


                    <div class="w-full">
                        <div class="flex flex-col justify-between h-full">

                            <!-- nama penulis -->
                            <div class="flex-col hidden md:flex">
                                <div class="flex items-center mb-1">
                                    <strong class="flex text-xs uppercase break-all md:text-base line-clamp-1">
                                        {{$user->name}}
                                    </strong>
                                </div>
                            </div>
                            <!-- end of nama penulis -->

                            <!-- Comment -->
                            <div id="textbox-comment" class="mt-4 mb-6 text-gray-800 lg:mb-0 lg:pr-8">
                                <form action="{{route('user.post.comment.store', ['post' => $post->slug])}}" method="post">
                                    @csrf
                                    <textarea class="w-full form-textarea" name="komentar" id="komentar" rows="10">{{old('komentar')}}</textarea>

                                    @error('komentar')
                                    <div class="mt-2 alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror

                                    <div class="flex justify-end">
                                        <button type="submit" class="px-10 text-base rounded-full btn btn-primary bg-primary-lighter hover:bg-primary">
                                            Kirim
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <!-- end of Comment -->
                        </div>
                    </div>
                </div>

            </div>
            <!-- end of reply post -->

        </div>
    </div>
</div>
@endsection