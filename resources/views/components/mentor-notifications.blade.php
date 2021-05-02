<div>
    <div class="static mr-1 xs:mr-5 md:relative" x-data="{ isOpen2 : false }">
        @if($unreadNotifications->isNotEmpty())
        <span class="flex h-3 w-3">
            <span class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-purple-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-3 w-3 bg-indigo-500"></span>
        </span>
        @endif
        <button class="p-0 m-0 text-gray-500 transition-all duration-300 ease-in-out menu-btn hover:text-gray-900 focus:text-gray-900 focus:outline-none" @click="isOpen2 = true">
            <i class="fas fa-bell"></i>
        </button>
        <div x-cloak x-show.transition.origin.top="isOpen2" @click.away="isOpen2 = false" class="absolute right-0 z-20 w-full py-2 mt-5 bg-white rounded shadow-md md:w-80 animated">
            <!-- top -->
            <div class="flex flex-row items-center justify-between px-4 py-2 text-sm font-semibold capitalize">
                <h1>notifications</h1>
                <div class="px-1 text-xs text-indigo-500 bg-indigo-100 border border-indigo-200 rounded">
                    <strong>{{$unreadNotifications->count()}}</strong>
                </div>
            </div>
            <hr>
            <!-- end top -->
            <!-- body -->
            <!-- item -->
            @foreach($notifications as $notification)
            @if($notification->type == 'App\Notifications\NewTutoringRequest')
            @php
            $student = \App\Models\User::find($notification->data['student_id']);
            @endphp
            @if(!$notification->read_at)
            <span class="flex h-3 w-3">
                <span class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-purple-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-3 w-3 bg-indigo-500"></span>
            </span>
            @endif
            <a href="{{route('mentor.notification.handling', ['notification' => $notification])}}" class="flex px-4 py-4 text-sm font-medium tracking-wide capitalize transition-all duration-300 ease-in-out bg-white md:flex md:flex-row md:items-center md:justify-start hover:bg-gray-200">
                <div class="px-3 py-2 mr-3 bg-gray-100 border border-gray-300 rounded">
                    <i class="text-sm fas fa-user"></i>
                </div>
                <div class="flex flex-row flex-1">
                    <div class="flex-1">
                        <h1 class="text-sm font-semibold">Request Tutoring baru</h1>
                        <p class="text-xs text-gray-500">{{$student->name}} mengirim request tutoring baru kepada anda</p>
                    </div>
                    <div class="text-xs text-right text-gray-500">
                        <p>{{$notification->created_at->diffForHumans()}}</p>
                    </div>
                </div>
            </a>
            <a href="{{route('mentor.notification.destroy', ['notification' => $notification])}}">Hapus</a>
            <hr>
            @endif
            @endforeach
            <!-- end item -->
            <!-- end body -->
            <!-- bottom -->
            <hr>
            @if($notifications->isNotEmpty())
            <div class="px-4 py-2 mt-2">
                <a href="{{route('mentor.notification.destroy-all')}}" class="block p-1 text-xs text-center uppercase transition-all duration-500 ease-in-out border border-gray-300 rounded hover:text-indigo-500">
                    Hapus semua notifikasi
                </a>
            </div>
            @endif
            @if($unreadNotifications->isNotEmpty())
            <div class="px-4 py-2 mt-2">
                <a href="{{route('mentor.notification.read-all')}}" class="block p-1 text-xs text-center uppercase transition-all duration-500 ease-in-out border border-gray-300 rounded hover:text-indigo-500">
                    Tandai Baca Semua
                </a>
            </div>
            @endif
            <!-- end bottom -->
        </div>
    </div>
</div>