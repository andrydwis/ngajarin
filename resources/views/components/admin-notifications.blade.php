<div>
    <div class="static mr-1 xs:mr-5 md:relative" x-data="{ openDropdown : false }">
        <div @click="openDropdown = true" class="cursor-pointer">
            @if($unreadNotifications->isNotEmpty())
            <span class="absolute flex ml-2">
                <span class="absolute inline-flex w-3 h-3 bg-purple-400 rounded-full opacity-75 animate-ping"></span>
                <span class="relative inline-flex w-3 h-3 bg-indigo-500 rounded-full opacity-75"></span>
            </span>
            @endif
            <button class="p-0 m-0 text-gray-500 transition-all duration-300 ease-in-out menu-btn hover:text-gray-900 focus:text-gray-900 focus:outline-none">
                <i class="text-lg fas fa-bell"></i>
            </button>
        </div>


        <div x-cloak x-show.transition.origin.top="openDropdown" @click.away="openDropdown = false" class="absolute right-0 z-20 w-full mt-5 bg-white border-t-4 border-b-4 rounded shadow-md border-primary-lighter md:w-80">

            <!-- top -->
            <div class="flex flex-row items-center justify-between px-4 py-2 text-sm font-semibold capitalize">
                <h1>notifications</h1>
                <div class="px-1 text-xs text-indigo-500 bg-indigo-100 border border-indigo-200 rounded">
                    <strong>{{$unreadNotifications->count()}}</strong>
                </div>
            </div>
            <hr>
            <!-- end top -->

            <div class="overflow-y-scroll" style="max-height: 70vh">

                <!-- notif submission -->
                @foreach($notifications as $notification)
                @if($notification->type == 'App\Notifications\NewSubmission')

                @php
                $student = \App\Models\User::find($notification->data['student_id']);
                $submission = \App\Models\Submission::find($notification->data['submission_id'])
                @endphp

                <div class="flex flex-col">
                    @if(!$notification->read_at)
                    <span class="absolute left-0 flex mt-3 ml-2">
                        <span class="absolute inline-flex w-3 h-3 bg-purple-400 rounded-full opacity-75 animate-ping"></span>
                        <span class="relative inline-flex w-3 h-3 bg-indigo-500 rounded-full opacity-75"></span>
                    </span>
                    @endif

                    <div class="flex px-4 py-4 text-sm tracking-wide transition-all duration-300 ease-in-out bg-white md:flex md:flex-row md:items-center md:justify-start hover:bg-gray-200">
                        <div class="self-start px-3 py-2 mr-3 bg-gray-100 border border-gray-300 rounded">
                            <i class="text-sm fas fa-file"></i>
                        </div>

                        <div class="flex flex-col flex-1">
                            <a href="{{route('admin.notification.handling', ['notification' => $notification])}}" class="flex flex-col">
                                <div class="font-semibold">Pengumpulan Submission baru</div>
                                <div class="text-gray-500">
                                    <b>{{$student->name}}</b> Mengumpulkan submission {{$submission->title}}
                                </div>
                            </a>

                            <div class="flex items-center justify-between mt-2 text-xs text-gray-500">
                                <div>
                                    {{$notification->created_at->diffForHumans()}}
                                </div>
                                <div>
                                    @if(!$notification->read_at)
                                    <button @click="window.location.href='{{route('admin.notification.destroy', ['notification' => $notification])}}'" class="px-1 text-xs btn hover:bg-primary-lighter hover:text-white">hapus</button>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <hr>
                @endif

                @endforeach
                <!-- end notif submission -->


                <!-- notif chat -->
                @foreach($chats as $chat)

                @php
                $sender = \App\Models\User::find($chat->data['sender_id']);
                $notification = \App\Models\Notification::where('data', json_encode($chat->data))->latest()->first();
                @endphp

                <div>
                    @if(!$notification->read_at)
                    <span class="absolute left-0 flex mt-3 ml-2">
                        <span class="absolute inline-flex w-3 h-3 bg-purple-400 rounded-full opacity-75 animate-ping"></span>
                        <span class="relative inline-flex w-3 h-3 bg-indigo-500 rounded-full opacity-75"></span>
                    </span>
                    @endif
                    <a href="{{route('admin.notification.handling', ['notification' => $notification])}}" class="flex px-4 py-4 text-sm tracking-wide transition-all duration-300 ease-in-out bg-white md:flex md:flex-row md:items-center md:justify-start hover:bg-gray-200">
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
                <hr>
                @endforeach
                <!-- notif chat -->

            </div>

            <!-- bottom -->
            <hr>
            <div class="p-4">
                @if($notifications->isNotEmpty() || $chats->isNotEmpty())
                <div>
                    <a href="{{route('admin.notification.read-all')}}" class="block py-2 text-xs text-center uppercase transition-all duration-300 ease-in-out border border-gray-200 hover:text-white hover:bg-primary-lighter">
                        Tandai Baca Semua
                    </a>
                </div>
                @endif
                @if($notifications->isNotEmpty() || $chats->isNotEmpty())
                <div>
                    <a href="{{route('admin.notification.destroy-all')}}" class="block py-2 text-xs text-center uppercase transition-all duration-300 ease-in-out border border-gray-200 hover:text-white hover:bg-danger-lighter">
                        Hapus semua notifikasi
                    </a>
                </div>
                @endif
            </div>
            <!-- end bottom -->

        </div>
    </div>
</div>