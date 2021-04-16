@extends('layouts.student.app-new')
@section('content')

<div class="flex justify-center">
    <div class="flex flex-col items-start max-w-5xl py-5 md:flex-row md:mx-5 ">

        <div class="flex-none hidden mr-9 lg:block lg:sticky lg:self-start top-10 w-52">

            <div class="lg:sticky lg:text-center">

                <!-- isi sidebar -->
                <div class="flex flex-col pt-10">

                    <a href="{{route('user.post.create')}}">
                        <div class="pl-6 my-1 text-base text-left text-white sidebar-item bg-primary-lighter hover:bg-primary hover:text-white">
                            <i class="mr-1 text-sm text-white fas fa-plus"></i> Postingan Baru
                        </div>
                    </a>

                    <hr class="my-4 ml-2">

                    <a href="{{route('user.post.index')}}">
                        <div class="pl-6 my-1 text-base text-left border border-white sidebar-item hover:border-primary">
                            <i class="mr-1 text-sm fill-current fas fa-bars"></i> Postingan Terbaru
                        </div>
                    </a>

                    <a href="{{('user.post.my-post')}}">
                        <div class="pl-6 my-1 text-base text-left border border-white sidebar-item hover:border-primary">
                            <i class="mx-1 text-sm fill-current fas fa-history"></i> Postingan Saya
                        </div>
                    </a>

                    <a href="{{route('user.post.bookmark')}}">
                        <div class="pl-6 my-1 text-base text-left border border-white sidebar-item hover:border-primary">
                            <i class="ml-1 mr-2 text-sm fill-current fas fa-bookmark"></i> Disimpan
                        </div>
                    </a>

                </div>
                <!-- end of sidebar -->


            </div>

        </div>

        <<div class="flex-1 min-h-[100vh]">

            <!-- search section -->
            <form action="{{route('user.post.search')}}" method="POST" class="flex justify-end px-6 mb-8 pt-11">
                @csrf
                <select name="kategori" class="pl-5 mr-3 text-sm text-gray-500 rounded-full cursor-pointer pr-9 form-select">
                    <option value="semua" selected>Semua Topik</option>
                    @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                </select>
                <div class="flex w-auto md:w-72">
                    <input name="keyword" placeholder="Mau cari apa?" value="" class="w-full pl-5 pr-10 text-sm placeholder-gray-500 rounded-full form-input">
                    <button type="submit" class="-ml-8 text-gray-400 focus:outline-none hover:text-primary focus:text-primary-darker">
                        <i class="text-sm fill-current fas fa-search"></i>
                    </button>
                </div>
            </form>
            <!-- end of search section -->


            <!-- postingan list -->
            <div class="py-3">

                <p class="px-6 mb-5 text-lg text-gray-600 break-all line-clamp-1">
                    Hasil Pencarian :
                    <span class="font-semibold">{{$category}}</span>
                    <span class="font-semibold">{{$keyword}}</span>
                </p>

                @forelse($posts as $post)
                <div class="flex flex-col h-auto px-6 py-4 mx-4 mb-4 transition-all bg-gray-100 border border-gray-100 cursor-pointer lg:h-36 md:flex-row bg-opacity-30 md:hover:bg-gray-100 rounded-xl">

                    <div class="flex items-center self-start w-full mb-4 md:w-auto md:mr-5 md:block md:mb-0">

                        <!-- user info -->
                        <div class="flex items-center">
                            <a href="" class="flex mb-2 mr-3 md:mr-0 h-14 w-14">
                                <img loading="lazy" alt="eludic" class="relative object-cover bg-white rounded h-14 w-14" src="{{$post->creator->detail->photo ?? 'https://ui-avatars.com/api/?background=random&name='.$post->creator->name}}" />
                            </a>
                            <strong class="text-xs uppercase md:text-base md:hidden">
                                {{$post->creator->name}}
                            </strong>
                        </div>
                        <!-- end of user info -->

                        <!-- jumlah komen & tag -->
                        <div class="flex ml-auto">

                            <div class="flex items-center justify-center py-1 ml-auto md:hidden">
                                <div class="flex items-center px-3 py-2 text-gray-400 bg-gray-100 rounded-full">
                                    <i class="mr-2 text-xs fas fa-comment"></i>
                                    <span class="text-xs font-semibold leading-none">
                                        {{$post->comments->count()}}
                                    </span>
                                </div>
                            </div>

                            @foreach($post->tags as $tag)
                            <div class="md:hidden">
                                <a href="" class="block py-1 text-xs text-center rounded-full btn btn-outline-primary">{{$tag->name}}</a>
                            </div>
                            @endforeach

                        </div>
                        <!-- end of jumlah komen & tag -->

                    </div>

                    <div class="w-full md:mb-0">
                        <div class="flex flex-col justify-between h-full">

                            <div class="md:flex md:items-start lg:-mt-1">

                                <!-- title -->
                                <h4 class="mb-4 text-base break-words lg:mb-0 md:pr-6 lg:line-clamp-1">
                                    <a href="{{route('user.post.show', ['post' => $post])}}" class="text-lg font-semibold text-black conversation-list-link hover:text-black link" title="{{$post->title}}">{{$post->title}}</a>
                                </h4>
                                <!-- end of title -->

                                <!-- comment, like, tag -->
                                <div class="relative hidden text-center text-gray-400 md:flex md:items-center md:flex-row-reverse md:ml-auto">

                                    <div class="flex ml-5">
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
                                        <i class="mr-1 text-sm fas fa-thumbs-up"></i>
                                        <span class="relative text-xs font-semibold leading-none text-left">
                                            {{$post->reacts->where('type', 'like')->count()}}
                                        </span>
                                    </div>
                                    <div class="flex items-center justify-center">
                                        <i class="mr-1 text-sm fas fa-comment"></i>
                                        <span class="relative text-xs font-semibold leading-none text-left">
                                            {{$post->comments->count()}}
                                        </span>
                                    </div>
                                </div>
                                <!-- end of comment, like, tag -->
                            </div>
                            <!-- potongan konten -->
                            <div class="mt-2 mb-6 text-gray-800 lg:mb-0 lg:pr-8">
                                <a href="{{route('user.post.show', ['post' => $post])}}">
                                    <span class="normal-case break-words line-clamp-4 lg:line-clamp-2 ">
                                        {{$post->content}}
                                    </span>
                                </a>
                            </div>
                            <!-- end of potongan konten -->
                            <!-- last reply info -->
                            <div class="flex flex-col justify-between mt-4 text-xs text-gray-700 md:flex-row">
                                <div>
                                    Diposting
                                    <a href="#">
                                        <time class="font-bold ">
                                            {{$post->created_at->diffForHumans()}}
                                        </time>
                                    </a>
                                </div>
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
                @empty
                <h1>kek ono gambar 404 not found</h1>
                @endforelse
            </div>
            <!-- end of postingan list -->
            <div class="px-6">
                {{$posts->links()}}
            </div>
    </div>
</div>
@endsection