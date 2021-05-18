@if(!Route::currentRouteNamed('root.index'))
<div>
    <div class="static mr-1 xs:mr-3 md:relative" x-data="{ openDropdown : false }">
        <div @click="openDropdown = true" class="cursor-pointer">
            @if($unreadNotifications->isNotEmpty())
            <span class="absolute flex ml-2">
                <span class="absolute inline-flex w-3 h-3 bg-purple-400 rounded-full opacity-75 animate-ping"></span>
                <span class="relative inline-flex w-3 h-3 bg-indigo-500 rounded-full opacity-75"></span>
            </span>
            @endif
            <button class="p-0 m-0 text-gray-100 transition-all duration-300 focus:outline-none">
                <i class="text-lg fas fa-bell"></i>
            </button>
        </div>

        <div x-cloak x-show.transition.origin.top="openDropdown" @click.away="openDropdown = false" class="fixed right-0 z-20 w-full mt-5 bg-white border-t-4 border-b-4 rounded shadow-md md:absolute border-primary-lighter md:w-80">

            <!-- top -->
            <div class="flex flex-row items-center justify-between px-4 py-2 text-sm font-semibold capitalize">
                <h1>Notifikasi</h1>
                <div class="px-1 text-xs text-indigo-500 bg-indigo-100 border border-indigo-200 rounded">
                    <strong>{{$unreadNotifications->count()}}</strong>
                </div>
            </div>
            <hr>
            <!-- end top -->

            <div class="overflow-y-scroll" style="max-height: 70vh">
                <!-- item -->
                @foreach($notifications as $notification)

                <!-- notif tutoring -->
                @if($notification->type == 'App\Notifications\ProcessedTutoring')
                @php
                $mentor = \App\Models\User::find($notification->data['mentor_id']);
                @endphp
                <div class="flex flex-col">
                    @if(!$notification->read_at)
                    <span class="relative flex transform translate-x-3 translate-y-6">
                        <span class="absolute inline-flex w-3 h-3 bg-purple-400 rounded-full opacity-75 animate-ping"></span>
                        <span class="relative inline-flex w-3 h-3 bg-indigo-500 rounded-full opacity-75"></span>
                    </span>
                    @endif
                    <div class="flex px-4 py-4 text-sm tracking-wide transition-all duration-300 ease-in-out bg-white md:flex md:flex-row md:items-center md:justify-start hover:bg-gray-200">

                        <div class="self-start px-3 py-2 mr-3 bg-gray-100 border border-gray-300 rounded">
                            <i class="text-sm fas fa-user"></i>
                        </div>

                        <div class="flex flex-col flex-1">
                            <a href="{{route('student.notification.handling', ['notification' => $notification])}}" class="flex flex-col">
                                <div class="font-semibold">Pembaruan Status Tutoring</div>
                                <div class="text-gray-500">
                                    {{$mentor->name}} menjawab request tutoring yang anda ajukan
                                </div>
                            </a>
                            <div class="flex items-center justify-between mt-2 text-xs text-gray-500">
                                <div>
                                    {{$notification->created_at->diffForHumans()}}
                                </div>
                                <div>
                                    @if(!$notification->read_at)
                                    <button @click="window.location.href = '{{route('student.notification.destroy', ['notification' => $notification])}}'" class="px-1 text-xs btn hover:bg-primary-lighter hover:text-white">Hapus</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                @endif

                <!-- notif submission -->
                @if($notification->type == 'App\Notifications\ReviewSubmission')
                @php
                $reviewer = \App\Models\User::find($notification->data['reviewer_id']);
                @endphp
                <div class="flex flex-col">
                    @if(!$notification->read_at)
                    <span class="relative flex transform translate-x-3 translate-y-6">
                        <span class="absolute inline-flex w-3 h-3 bg-purple-400 rounded-full opacity-75 animate-ping"></span>
                        <span class="relative inline-flex w-3 h-3 bg-indigo-500 rounded-full opacity-75"></span>
                    </span>
                    @endif
                    <div class="flex px-4 py-4 text-sm tracking-wide transition-all duration-300 ease-in-out bg-white md:flex md:flex-row md:items-center md:justify-start hover:bg-gray-200">
                        <div class="self-start px-3 py-2 mr-3 bg-gray-100 border border-gray-300 rounded">
                            <i class="text-sm fas fa-file"></i>
                        </div>

                        <div class="flex flex-col flex-1">

                            <a href="{{route('student.notification.handling', ['notification' => $notification])}}" class="flex flex-col">
                                <div class="font-semibold">Submission telah direview</div>
                                <div class="text-gray-500">
                                    {{$reviewer->name}} telah Mereview submission kamu
                                </div>
                            </a>

                            <div class="flex items-center justify-between mt-2 text-xs text-gray-500">
                                <div>
                                    {{$notification->created_at->diffForHumans()}}
                                </div>
                                <div>
                                    @if(!$notification->read_at)
                                    <button @click="window.location.href='{{route('student.notification.destroy', ['notification' => $notification])}}'" class="px-1 text-xs btn hover:bg-primary-lighter hover:text-white">Hapus</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                @endif
                @endforeach

                <!-- notif CHAT -->
                @foreach($chats as $chat)
                @php
                $sender = \App\Models\User::find($chat->data['sender_id']);
                $notification = \App\Models\Notification::where('data', json_encode($chat->data))->latest()->first();
                @endphp
                <div>
                    @if(!$notification->read_at)
                    <span class="relative flex transform translate-x-3 translate-y-6">
                        <span class="absolute inline-flex w-3 h-3 bg-purple-400 rounded-full opacity-75 animate-ping"></span>
                        <span class="relative inline-flex w-3 h-3 bg-indigo-500 rounded-full opacity-75"></span>
                    </span>
                    @endif
                    <a href="{{route('student.notification.handling', ['notification' => $notification])}}" class="flex px-4 py-4 text-sm tracking-wide transition-all duration-300 ease-in-out bg-white md:flex md:flex-row md:items-center md:justify-start hover:bg-gray-200">
                        <div class="self-start px-3 py-2 mr-3 bg-gray-100 border border-gray-300 rounded">
                            <i class="text-sm fas fa-comment"></i>
                        </div>
                        <div class="flex-col flex-1">
                            <div class="font-semibold">{{$sender->name}}</div>
                            <div class="text-gray-500">
                                {{$sender->name}} mengirim <b>{{$chat->amount}}</b> pesan baru
                            </div>
                            <div class="mt-2 text-xs text-gray-500">
                                {{$notification->created_at->diffForHumans()}}
                            </div>
                        </div>
                    </a>
                </div>

                @endforeach
                <!-- end item -->
            </div>

            <!-- bottom -->
            <hr>
            <div class="p-4">
                @if($notifications->isNotEmpty() || $chats->isNotEmpty())
                <div>
                    <a href="{{route('student.notification.read-all')}}" class="block py-2 text-xs text-center uppercase transition-all duration-300 ease-in-out border border-gray-200 hover:text-white hover:bg-primary-lighter">
                        Tandai Baca Semua
                    </a>
                </div>
                @endif
                @if($notifications->isNotEmpty() || $chats->isNotEmpty())
                <div>
                    <a href="{{route('student.notification.destroy-all')}}" class="block py-2 text-xs text-center uppercase transition-all duration-300 ease-in-out border border-gray-200 hover:text-white hover:bg-danger-lighter">
                        Hapus semua notifikasi
                    </a>
                </div>
                @endif
            </div>
            <!-- end bottom -->

        </div>

    </div>
</div>
 @endif