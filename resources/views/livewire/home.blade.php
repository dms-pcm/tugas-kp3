<div wire:poll>
    <!-- Layout -->
    <div class="layout">
        <!-- Navigation -->
        <nav class="navigation d-flex flex-column text-center navbar navbar-light hide-scrollbar">
            <!-- Brand -->
            <a title="Messenger" class="d-none d-xl-block mb-6" onclick="load()" style="cursor:pointer">
                <img src="{{asset(url('assets/img/icon.png'))}}" width="50%" height="auto" alt="">
            </a>
            <!-- Nav items -->
            <ul class="d-flex nav navbar-nav flex-row flex-xl-column flex-grow-1 justify-content-between align-items-center w-100 py-4 py-lg-2 px-lg-3" role="tablist">
                <!-- Chats -->
                <li class="nav-item">
                    <a class="nav-link active py-0 py-lg-8" id="tab-chats" href="#tab-content-chats" title="Chats" data-bs-toggle="tab" role="tab" wire:ignore.self>
                        @php
                        
                        $notifications = App\Models\Message::where('is_read', '0')->where('receiver_id', Auth::user()->id)->get();
                        @endphp
                        @if ($notifications->count() > 0)
                        <div class="icon icon-xl icon-badged">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                            <div class="badge badge-circle bg-primary">
                                <span>{{ $notifications->count() }}</span>
                            </div>
                        </div>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                        @endif
                    </a>
                </li>
                <!-- List Friends -->
                <li class="nav-item">
                    <a class="nav-link py-0 py-lg-8" id="tab-friends" href="#tab-content-list-friends" title="List Friends" data-bs-toggle="tab" role="tab" wire:ignore.self>
                        {{--@php
                            $req_friend = App\Models\Friend::where('status', 'pending')->where('friend', Auth::user()->id)->get();
                        @endphp

                        @if($req_friend->count() > 0)
                            <div class="icon icon-xl icon-badged">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                <div class="badge badge-circle bg-primary">
                                    <span>{{ $req_friend->count() }}</span>
                                </div>
                            </div>
                        @else
                            <div class="icon icon-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            </div>
                        @endif--}}
                        <div class="icon icon-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        </div>
                    </a>
                </li>
                <!-- Add Friends -->
                <li class="nav-item">
                    <a class="nav-link py-0 py-lg-8" id="tab-friends" href="#tab-content-friends" title="Friends" data-bs-toggle="tab" role="tab" wire:ignore.self>
                        @php
                            error_reporting(0);
                            $req_friend = App\Models\Friend::where('status', 'pending')->where('friend', Auth::user()->id)->get();
                            $friend_null = App\Models\Friend::orderBy('friend','desc')->where('friend',$friends->id)->get();
                            $user_null = App\Models\Friend::orderBy('user','desc')->where('user',Auth::user()->id)->get();
                            $duplicateF_null = App\Models\Friend::orderBy('friend','desc')->limit(1)->get();
                            $duplicateS_null = App\Models\Friend::orderBy('user','desc')->limit(1)->get();
                            $notif = count($req_friend);
                        @endphp

                        @if(!$friend_null->isEmpty() || !$user_null->isEmpty())
                            <div class="icon icon-xl">
                                <i class="fas fa-users fs-2" style="margin-top:7px"></i>
                            </div>
                        @else
                            @if($notif != 0)
                                <div class="icon icon-xl icon-badged">
                                    <i class="fas fa-users fs-2" style="margin-top:7px"></i>
                                    <div class="badge badge-circle bg-primary">
                                        <span>{{ $notif }}</span>
                                    </div>
                                </div>
                            @else
                                <div class="icon icon-xl">
                                    <i class="fas fa-users fs-2" style="margin-top:7px"></i>
                                </div>
                            @endif
                        @endif
                    </a>
                </li>
                <!-- Settings -->
                <li class="nav-item">
                    <a class="nav-link py-0 py-lg-8" id="tab-settings" href="#tab-content-settings" title="Settings" data-bs-toggle="tab" role="tab" wire:ignore.self wire:click="show">
                        <div class="icon icon-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                        </div>
                    </a>
                </li>
                <!-- Profile -->
                <li class="nav-item d-none d-xl-block">
                    @if($profile)
                    <a href="#" class="nav-link p-0 mt-lg-2" data-bs-toggle="modal" data-bs-target="#modal-profile">
                        <div class="avatar avatar-online mx-auto">
                            <img class="avatar-img" src="{{ asset('storage/avators/' . $profile[0]->avator) }}" alt="{{ Auth::user()->full_name }}">
                        </div>
                    </a>
                    @endif
                </li>
            </ul>
        </nav>

        <!-- Navigation -->

        <!-- Sidebar -->
        <aside class="sidebar bg-light">
            <div class="tab-content h-100" role="tablist">
                <!-- Friends -->
                <div class="tab-pane fade h-100" id="tab-content-friends" role="tabpanel" wire:ignore.self>
                    <div class="d-flex flex-column h-100">
                        <div class="hide-scrollbar">
                            <div class="container py-8">
                                <!-- Title -->
                                <div class="mb-8">
                                    <h2 class="fw-bold m-0">Tambah teman</h2>
                                </div>
                                <!-- Search -->
                                <div class="mb-6">
                                    <form action="#">
                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <div class="icon icon-lg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control form-control-lg ps-0" placeholder="Cari teman" aria-label="Cari teman...">
                                        </div>
                                    </form>
                                </div>
                                <!-- List -->
                                <div class="card-list">
                                    @foreach ($noFriends as $friends)
                                    @if($friends['wolak'])
                                    @php
                                        error_reporting(0);
                                        $req_friend = App\Models\Friend::where('status', 'pending')->where('friend', Auth::user()->id)->get();
                                        $friend_null = App\Models\Friend::orderBy('friend','desc')->where('friend',$friends->id)->get();
                                        $user_null = App\Models\Friend::orderBy('user','desc')->where('user',Auth::user()->id)->get();
                                        $duplicateF_null = App\Models\Friend::orderBy('friend','desc')->limit(1)->get();
                                        $duplicateS_null = App\Models\Friend::orderBy('user','desc')->limit(1)->get();
                                    @endphp

                                        @if($friend_null->isEmpty() || $user_null->isEmpty())
                                            <!-- Card -->
                                            <div class="card border-0">
                                                <div class="card-body">
                                                    <div class="row align-items-center gx-5">
                                                        <div class="col-auto">
                                                            <!-- <a href="#" class="avatar ">
                                                                <img class="avatar-img" src="{{ asset('storage/avators/' . $friends->avator) }}" alt="{{ $friends->full_name}}">
                                                            </a> -->
                                                            @if (Cache::has('is_online' . $friends->id))
                                                                <div class="avatar avatar-online">
                                                                    <img src="{{ asset('storage/avators/' . $friends->avator) }}" alt="{{ $friends->full_name}}" class="avatar-img">
                                                                </div>
                                                            @else
                                                                <div class="avatar avatar-offline">
                                                                    <img src="{{ asset('storage/avators/' . $friends->avator) }}" alt="{{ $friends->full_name}}" class="avatar-img">
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="col">
                                                            <h5><a><small>@</small>{{ $friends->username}}</a></h5>
                                                                @if (Cache::has('is_online' . $friends->id))
                                                                    <p class="text-truncate small">Online</p>
                                                                @else
                                                                    <p class="text-truncate small">Last seen: {{ \Carbon\Carbon::parse($friends->last_seen)->diffForHumans() }} </p>
                                                                @endif
                                                        </div>
                                                        <div class="col-auto">
                                                            @foreach($req_friend as $notif)
                                                                @if($notif['friend'] == Auth::user()->id &&  $notif['user'] == $friends->id)
                                                                    <span class="svg-icon svg-icon-primary svg-icon-2hx">
                                                                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                                                                        width="24" height="24" viewBox="0 0 512.000000 512.000000"
                                                                        preserveAspectRatio="xMidYMid meet">
                                                                        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                                                        fill="#33b5e5" stroke="none">
                                                                        <path d="M2538 4934 c-364 -66 -652 -347 -733 -718 -24 -107 -17 -330 14 -431
                                                                        101 -337 361 -578 704 -650 90 -20 268 -19 365 1 463 95 784 543 723 1009 -69
                                                                        524 -557 883 -1073 789z"/>
                                                                        <path d="M1281 4399 c-159 -24 -282 -87 -401 -208 -96 -96 -157 -203 -185
                                                                        -321 -21 -93 -19 -250 4 -342 110 -431 590 -651 986 -454 50 25 104 56 120 70
                                                                        l30 25 -36 38 c-148 155 -265 393 -305 623 -26 154 -11 434 31 542 5 12 -1 17
                                                                        -22 22 -61 12 -161 14 -222 5z"/>
                                                                        <path d="M2551 2799 c-275 -26 -541 -123 -775 -282 -132 -89 -333 -293 -425
                                                                        -430 -196 -296 -280 -589 -281 -979 l0 -138 939 0 938 0 6 148 c3 81 12 180
                                                                        21 220 98 447 409 800 829 941 l81 27 -95 83 c-277 243 -592 379 -951 411
                                                                        -126 11 -165 11 -287 -1z"/>
                                                                        <path d="M1185 2675 c-577 -90 -1040 -531 -1161 -1105 -11 -52 -17 -155 -21
                                                                        -337 l-5 -263 379 0 380 0 6 203 c7 232 30 388 84 566 95 314 257 578 505 824
                                                                        l129 127 -108 -1 c-59 -1 -144 -7 -188 -14z"/>
                                                                        <path d="M4055 2024 c-11 -2 -51 -11 -88 -20 -289 -66 -550 -300 -652 -586
                                                                        -45 -128 -59 -224 -52 -366 31 -646 693 -1057 1296 -804 222 93 418 301 501
                                                                        529 188 522 -100 1077 -635 1225 -68 19 -320 34 -370 22z m305 -924 l0 -540
                                                                        -155 0 -155 0 0 385 0 385 -90 0 -90 0 0 155 0 155 245 0 245 0 0 -540z"/></g>
                                                                        </svg>
                                                                    </span>
                                                                @endif
                                                            @endforeach
                                                            <a class="icon text-muted" href="#" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambahkan teman" wire:click="addFriend({{ $friends->id }})">
                                                                <span class="svg-icon svg-icon-muted svg-icon-2hx">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="#757476"/>
                                                                        <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="#757476"/>
                                                                        <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="#757476"/>
                                                                    </svg>
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Card -->
                                        @elseif($friend_null[0]->user != $user_null[0]->user)
                                            @foreach ($user_null as $cek)
                                                @if ($cek->user == Auth::user()->id && $cek->friend == $friends->id)
                                                
                                                @elseif($duplicateS_null[0]->user == Auth::user()->id && $duplicateS_null[0]->friend == $friends->id)
                                                    <!-- Card -->
                                                        <div class="card border-0">
                                                            <div class="card-body">
                                                                <div class="row align-items-center gx-5">
                                                                    <div class="col-auto">
                                                                        <!-- <a href="#" class="avatar ">
                                                                            <img class="avatar-img" src="{{ asset('storage/avators/' . $friends->avator) }}" alt="{{ $friends->full_name}}">
                                                                        </a> -->
                                                                        @if (Cache::has('is_online' . $friends->id))
                                                                            <div class="avatar avatar-online">
                                                                                <img src="{{ asset('storage/avators/' . $friends->avator) }}" alt="{{ $friends->full_name}}" class="avatar-img">
                                                                            </div>
                                                                        @else
                                                                            <div class="avatar avatar-offline">
                                                                                <img src="{{ asset('storage/avators/' . $friends->avator) }}" alt="{{ $friends->full_name}}" class="avatar-img">
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    <div class="col">
                                                                        <h5><a><small>@</small>{{ $friends->username}}</a></h5>
                                                                            @if (Cache::has('is_online' . $friends->id))
                                                                                <p class="text-truncate small">Online</p>
                                                                            @else
                                                                                <p class="text-truncate small">Last seen: {{ \Carbon\Carbon::parse($friends->last_seen)->diffForHumans() }} </p>
                                                                            @endif
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <a class="icon text-muted d-none" href="#" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambahkan teman" wire:click="addFriend({{ $friends->id }})">
                                                                            <span class="svg-icon svg-icon-muted svg-icon-2hx">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="#757476"/>
                                                                                    <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="#757476"/>
                                                                                    <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="#757476"/>
                                                                                </svg>
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <!-- Card -->
                                                @elseif($user_null[0]->user == Auth::user()->id && $user_null[0]->friend != $friends->id)
                                                    @if($user_null[1]->user == Auth::user()->id && $user_null[1]->friend == $friends->id)
                                                    
                                                    @else
                                                        <!-- Card -->
                                                            <div class="card border-0">
                                                                <div class="card-body">
                                                                    <div class="row align-items-center gx-5">
                                                                        <div class="col-auto">
                                                                            <!-- <a href="#" class="avatar ">
                                                                                <img class="avatar-img" src="{{ asset('storage/avators/' . $friends->avator) }}" alt="{{ $friends->full_name}}">
                                                                            </a> -->
                                                                            @if (Cache::has('is_online' . $friends->id))
                                                                                <div class="avatar avatar-online">
                                                                                    <img src="{{ asset('storage/avators/' . $friends->avator) }}" alt="{{ $friends->full_name}}" class="avatar-img">
                                                                                </div>
                                                                            @else
                                                                                <div class="avatar avatar-offline">
                                                                                    <img src="{{ asset('storage/avators/' . $friends->avator) }}" alt="{{ $friends->full_name}}" class="avatar-img">
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                        <div class="col">
                                                                            <h5><a><small>@</small>{{ $friends->username}}</a></h5>
                                                                                @if (Cache::has('is_online' . $friends->id))
                                                                                    <p class="text-truncate small">Online</p>
                                                                                @else
                                                                                    <p class="text-truncate small">Last seen: {{ \Carbon\Carbon::parse($friends->last_seen)->diffForHumans() }} </p>
                                                                                @endif
                                                                        </div>
                                                                        <div class="col-auto">
                                                                            @foreach($req_friend as $notif)
                                                                                @if($notif['friend'] == Auth::user()->id &&  $notif['user'] == $friends->id)
                                                                                    <span class="svg-icon svg-icon-primary svg-icon-2hx">
                                                                                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24" viewBox="0 0 512.000000 512.000000"
                                                                                        preserveAspectRatio="xMidYMid meet">
                                                                                        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                                                                        fill="#33b5e5" stroke="none">
                                                                                        <path d="M2538 4934 c-364 -66 -652 -347 -733 -718 -24 -107 -17 -330 14 -431
                                                                                        101 -337 361 -578 704 -650 90 -20 268 -19 365 1 463 95 784 543 723 1009 -69
                                                                                        524 -557 883 -1073 789z"/>
                                                                                        <path d="M1281 4399 c-159 -24 -282 -87 -401 -208 -96 -96 -157 -203 -185
                                                                                        -321 -21 -93 -19 -250 4 -342 110 -431 590 -651 986 -454 50 25 104 56 120 70
                                                                                        l30 25 -36 38 c-148 155 -265 393 -305 623 -26 154 -11 434 31 542 5 12 -1 17
                                                                                        -22 22 -61 12 -161 14 -222 5z"/>
                                                                                        <path d="M2551 2799 c-275 -26 -541 -123 -775 -282 -132 -89 -333 -293 -425
                                                                                        -430 -196 -296 -280 -589 -281 -979 l0 -138 939 0 938 0 6 148 c3 81 12 180
                                                                                        21 220 98 447 409 800 829 941 l81 27 -95 83 c-277 243 -592 379 -951 411
                                                                                        -126 11 -165 11 -287 -1z"/>
                                                                                        <path d="M1185 2675 c-577 -90 -1040 -531 -1161 -1105 -11 -52 -17 -155 -21
                                                                                        -337 l-5 -263 379 0 380 0 6 203 c7 232 30 388 84 566 95 314 257 578 505 824
                                                                                        l129 127 -108 -1 c-59 -1 -144 -7 -188 -14z"/>
                                                                                        <path d="M4055 2024 c-11 -2 -51 -11 -88 -20 -289 -66 -550 -300 -652 -586
                                                                                        -45 -128 -59 -224 -52 -366 31 -646 693 -1057 1296 -804 222 93 418 301 501
                                                                                        529 188 522 -100 1077 -635 1225 -68 19 -320 34 -370 22z m305 -924 l0 -540
                                                                                        -155 0 -155 0 0 385 0 385 -90 0 -90 0 0 155 0 155 245 0 245 0 0 -540z"/></g>
                                                                                        </svg>
                                                                                    </span>
                                                                                @endif
                                                                            @endforeach
                                                                            <a class="icon text-muted" href="#" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambahkan teman" wire:click="addFriend({{ $friends->id }})">
                                                                                <span class="svg-icon svg-icon-muted svg-icon-2hx">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="#757476"/>
                                                                                        <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="#757476"/>
                                                                                        <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="#757476"/>
                                                                                    </svg>
                                                                                </span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <!-- Card -->
                                                    @endif
                                                @elseif($user_null[0]->user == Auth::user()->id && $user_null[0]->friend == $friends->id)
                                                @else
                                                    <!-- Card -->
                                                        <div class="card border-0">
                                                            <div class="card-body">
                                                                <div class="row align-items-center gx-5">
                                                                    <div class="col-auto">
                                                                        <!-- <a href="#" class="avatar ">
                                                                            <img class="avatar-img" src="{{ asset('storage/avators/' . $friends->avator) }}" alt="{{ $friends->full_name}}">
                                                                        </a> -->
                                                                        @if (Cache::has('is_online' . $friends->id))
                                                                            <div class="avatar avatar-online">
                                                                                <img src="{{ asset('storage/avators/' . $friends->avator) }}" alt="{{ $friends->full_name}}" class="avatar-img">
                                                                            </div>
                                                                        @else
                                                                            <div class="avatar avatar-offline">
                                                                                <img src="{{ asset('storage/avators/' . $friends->avator) }}" alt="{{ $friends->full_name}}" class="avatar-img">
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    <div class="col">
                                                                        <h5><a><small>@</small>{{ $friends->username}}</a></h5>
                                                                            @if (Cache::has('is_online' . $friends->id))
                                                                                <p class="text-truncate small">Online</p>
                                                                            @else
                                                                                <p class="text-truncate small">Last seen: {{ \Carbon\Carbon::parse($friends->last_seen)->diffForHumans() }} </p>
                                                                            @endif
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        @foreach($req_friend as $notif)
                                                                            @if($notif['friend'] == Auth::user()->id &&  $notif['user'] == $friends->id)
                                                                                <span class="svg-icon svg-icon-primary svg-icon-2hx">
                                                                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24" viewBox="0 0 512.000000 512.000000"
                                                                                    preserveAspectRatio="xMidYMid meet">
                                                                                    <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                                                                    fill="#33b5e5" stroke="none">
                                                                                    <path d="M2538 4934 c-364 -66 -652 -347 -733 -718 -24 -107 -17 -330 14 -431
                                                                                    101 -337 361 -578 704 -650 90 -20 268 -19 365 1 463 95 784 543 723 1009 -69
                                                                                    524 -557 883 -1073 789z"/>
                                                                                    <path d="M1281 4399 c-159 -24 -282 -87 -401 -208 -96 -96 -157 -203 -185
                                                                                    -321 -21 -93 -19 -250 4 -342 110 -431 590 -651 986 -454 50 25 104 56 120 70
                                                                                    l30 25 -36 38 c-148 155 -265 393 -305 623 -26 154 -11 434 31 542 5 12 -1 17
                                                                                    -22 22 -61 12 -161 14 -222 5z"/>
                                                                                    <path d="M2551 2799 c-275 -26 -541 -123 -775 -282 -132 -89 -333 -293 -425
                                                                                    -430 -196 -296 -280 -589 -281 -979 l0 -138 939 0 938 0 6 148 c3 81 12 180
                                                                                    21 220 98 447 409 800 829 941 l81 27 -95 83 c-277 243 -592 379 -951 411
                                                                                    -126 11 -165 11 -287 -1z"/>
                                                                                    <path d="M1185 2675 c-577 -90 -1040 -531 -1161 -1105 -11 -52 -17 -155 -21
                                                                                    -337 l-5 -263 379 0 380 0 6 203 c7 232 30 388 84 566 95 314 257 578 505 824
                                                                                    l129 127 -108 -1 c-59 -1 -144 -7 -188 -14z"/>
                                                                                    <path d="M4055 2024 c-11 -2 -51 -11 -88 -20 -289 -66 -550 -300 -652 -586
                                                                                    -45 -128 -59 -224 -52 -366 31 -646 693 -1057 1296 -804 222 93 418 301 501
                                                                                    529 188 522 -100 1077 -635 1225 -68 19 -320 34 -370 22z m305 -924 l0 -540
                                                                                    -155 0 -155 0 0 385 0 385 -90 0 -90 0 0 155 0 155 245 0 245 0 0 -540z"/></g>
                                                                                    </svg>
                                                                                </span>
                                                                            @endif
                                                                        @endforeach
                                                                        <a class="icon text-muted" href="#" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambahkan teman" wire:click="addFriend({{ $friends->id }})">
                                                                            <span class="svg-icon svg-icon-muted svg-icon-2hx">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="#757476"/>
                                                                                    <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="#757476"/>
                                                                                    <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="#757476"/>
                                                                                </svg>
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <!-- Card -->
                                                @endif
                                            @endforeach
                                        @else
                                            @foreach ($teman_req as $item)
                                                @if ($item['user'] == Auth::user()->id && $item['friend'] == $friends->id)

                                                @elseif($item['user'] != Auth::user()->id)
                                                    <!-- Card -->
                                                    <div class="card border-0">
                                                        <div class="card-body">
                                                            <div class="row align-items-center gx-5">
                                                                <div class="col-auto">
                                                                    <!-- <a href="#" class="avatar ">
                                                                        <img class="avatar-img" src="{{ asset('storage/avators/' . $friends->avator) }}" alt="{{ $friends->full_name}}">
                                                                    </a> -->
                                                                    @if (Cache::has('is_online' . $friends->id))
                                                                        <div class="avatar avatar-online">
                                                                            <img src="{{ asset('storage/avators/' . $friends->avator) }}" alt="{{ $friends->full_name}}" class="avatar-img">
                                                                        </div>
                                                                    @else
                                                                        <div class="avatar avatar-offline">
                                                                            <img src="{{ asset('storage/avators/' . $friends->avator) }}" alt="{{ $friends->full_name}}" class="avatar-img">
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                <div class="col">
                                                                    <h5><a><small>@</small>{{ $friends->username}}</a></h5>
                                                                        @if (Cache::has('is_online' . $friends->id))
                                                                            <p class="text-truncate small">Online</p>
                                                                        @else
                                                                            <p class="text-truncate small">Last seen: {{ \Carbon\Carbon::parse($friends->last_seen)->diffForHumans() }} </p>
                                                                        @endif
                                                                </div>
                                                                <div class="col-auto">
                                                                    @foreach($req_friend as $notif)
                                                                        @if($notif['friend'] == Auth::user()->id &&  $notif['user'] == $friends->id)
                                                                            <span class="svg-icon svg-icon-primary svg-icon-2hx">
                                                                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24" viewBox="0 0 512.000000 512.000000"
                                                                                preserveAspectRatio="xMidYMid meet">
                                                                                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                                                                fill="#33b5e5" stroke="none">
                                                                                <path d="M2538 4934 c-364 -66 -652 -347 -733 -718 -24 -107 -17 -330 14 -431
                                                                                101 -337 361 -578 704 -650 90 -20 268 -19 365 1 463 95 784 543 723 1009 -69
                                                                                524 -557 883 -1073 789z"/>
                                                                                <path d="M1281 4399 c-159 -24 -282 -87 -401 -208 -96 -96 -157 -203 -185
                                                                                -321 -21 -93 -19 -250 4 -342 110 -431 590 -651 986 -454 50 25 104 56 120 70
                                                                                l30 25 -36 38 c-148 155 -265 393 -305 623 -26 154 -11 434 31 542 5 12 -1 17
                                                                                -22 22 -61 12 -161 14 -222 5z"/>
                                                                                <path d="M2551 2799 c-275 -26 -541 -123 -775 -282 -132 -89 -333 -293 -425
                                                                                -430 -196 -296 -280 -589 -281 -979 l0 -138 939 0 938 0 6 148 c3 81 12 180
                                                                                21 220 98 447 409 800 829 941 l81 27 -95 83 c-277 243 -592 379 -951 411
                                                                                -126 11 -165 11 -287 -1z"/>
                                                                                <path d="M1185 2675 c-577 -90 -1040 -531 -1161 -1105 -11 -52 -17 -155 -21
                                                                                -337 l-5 -263 379 0 380 0 6 203 c7 232 30 388 84 566 95 314 257 578 505 824
                                                                                l129 127 -108 -1 c-59 -1 -144 -7 -188 -14z"/>
                                                                                <path d="M4055 2024 c-11 -2 -51 -11 -88 -20 -289 -66 -550 -300 -652 -586
                                                                                -45 -128 -59 -224 -52 -366 31 -646 693 -1057 1296 -804 222 93 418 301 501
                                                                                529 188 522 -100 1077 -635 1225 -68 19 -320 34 -370 22z m305 -924 l0 -540
                                                                                -155 0 -155 0 0 385 0 385 -90 0 -90 0 0 155 0 155 245 0 245 0 0 -540z"/></g>
                                                                                </svg>
                                                                            </span>
                                                                        @endif
                                                                    @endforeach
                                                                    <a class="icon text-muted" href="#" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambahkan teman" wire:click="addFriend({{ $friends->id }})">
                                                                        <span class="svg-icon svg-icon-muted svg-icon-2hx">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="#757476"/>
                                                                                <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="#757476"/>
                                                                                <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="#757476"/>
                                                                            </svg>
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Card -->
                                                @endif
                                            @endforeach
                                        @endif
                                    @else
                                    
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- List Friends -->
                <div class="tab-pane fade h-100" id="tab-content-list-friends" role="tabpanel" wire:ignore.self>
                    <div class="d-flex flex-column h-100">
                        <div class="hide-scrollbar">
                            <div class="container py-8">
                                <!-- Title -->
                                <div class="mb-8">
                                    <h2 class="fw-bold m-0">List teman</h2>
                                </div>
                                <!-- Search -->
                                <div class="mb-6">
                                    <form action="#">
                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <div class="icon icon-lg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control form-control-lg ps-0" placeholder="Cari teman" aria-label="Cari teman...">
                                        </div>
                                    </form>
                                </div>
                                <!-- List -->
                                <div class="card-list">
                                    @foreach ($list as $friends)
                                    @if($friends->user == Auth::user()->id)
                                        @foreach ($friends['list_teman'] as $data)
                                        <!-- Card -->
                                        <div class="card border-0">
                                            <div class="card-body">
                                                <div class="row align-items-center gx-5">
                                                    <div class="col-auto">
                                                        <!-- <a href="#" class="avatar ">
                                                            <img class="avatar-img" src="{{ asset('storage/avators/' . $friends->avator) }}" alt="{{ $friends->full_name}}">
                                                        </a> -->
                                                        @if (Cache::has('is_online' . $data->id))
                                                            <div class="avatar avatar-online">
                                                                <img src="{{ asset('storage/avators/' . $data->avator) }}" alt="{{ $data->full_name}}" class="avatar-img">
                                                            </div>
                                                        @else
                                                            <div class="avatar avatar-offline">
                                                                <img src="{{ asset('storage/avators/' . $data->avator) }}" alt="{{ $data->full_name}}" class="avatar-img">
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="col">
                                                        <h5><a><small>@</small>{{ $data->username}}</a></h5>
                                                            @if (Cache::has('is_online' . $data->id))
                                                                <p class="text-truncate small">Online</p>
                                                            @else
                                                                <p class="text-truncate small">Last seen: {{ \Carbon\Carbon::parse($data->last_seen)->diffForHumans() }} </p>
                                                            @endif
                                                    </div>
                                                    <div class="col-auto">
                                                        @php
                                                            error_reporting(0);
                                                            $req_friend = App\Models\Friend::where('status', 'pending')->where('friend', Auth::user()->id)->get();
                                                            $friend_null = App\Models\Friend::orderBy('friend','desc')->where('friend',$data->id)->get();
                                                            $user_null = App\Models\Friend::orderBy('user','desc')->where('user',Auth::user()->id)->get();
                                                            $duplicateF_null = App\Models\Friend::orderBy('friend','desc')->limit(1)->get();
                                                            $duplicateS_null = App\Models\Friend::orderBy('user','desc')->limit(1)->get();
                                                        @endphp

                                                        @if($friend_null->isEmpty() || $user_null->isEmpty())
                                                            @foreach($req_friend as $notif)
                                                                @if($notif['friend'] == Auth::user()->id &&  $notif['user'] == $data->id)
                                                                    <span class="svg-icon svg-icon-primary svg-icon-2hx">
                                                                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                                                                        width="24" height="24" viewBox="0 0 512.000000 512.000000"
                                                                        preserveAspectRatio="xMidYMid meet">
                                                                        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                                                        fill="#33b5e5" stroke="none">
                                                                        <path d="M2538 4934 c-364 -66 -652 -347 -733 -718 -24 -107 -17 -330 14 -431
                                                                        101 -337 361 -578 704 -650 90 -20 268 -19 365 1 463 95 784 543 723 1009 -69
                                                                        524 -557 883 -1073 789z"/>
                                                                        <path d="M1281 4399 c-159 -24 -282 -87 -401 -208 -96 -96 -157 -203 -185
                                                                        -321 -21 -93 -19 -250 4 -342 110 -431 590 -651 986 -454 50 25 104 56 120 70
                                                                        l30 25 -36 38 c-148 155 -265 393 -305 623 -26 154 -11 434 31 542 5 12 -1 17
                                                                        -22 22 -61 12 -161 14 -222 5z"/>
                                                                        <path d="M2551 2799 c-275 -26 -541 -123 -775 -282 -132 -89 -333 -293 -425
                                                                        -430 -196 -296 -280 -589 -281 -979 l0 -138 939 0 938 0 6 148 c3 81 12 180
                                                                        21 220 98 447 409 800 829 941 l81 27 -95 83 c-277 243 -592 379 -951 411
                                                                        -126 11 -165 11 -287 -1z"/>
                                                                        <path d="M1185 2675 c-577 -90 -1040 -531 -1161 -1105 -11 -52 -17 -155 -21
                                                                        -337 l-5 -263 379 0 380 0 6 203 c7 232 30 388 84 566 95 314 257 578 505 824
                                                                        l129 127 -108 -1 c-59 -1 -144 -7 -188 -14z"/>
                                                                        <path d="M4055 2024 c-11 -2 -51 -11 -88 -20 -289 -66 -550 -300 -652 -586
                                                                        -45 -128 -59 -224 -52 -366 31 -646 693 -1057 1296 -804 222 93 418 301 501
                                                                        529 188 522 -100 1077 -635 1225 -68 19 -320 34 -370 22z m305 -924 l0 -540
                                                                        -155 0 -155 0 0 385 0 385 -90 0 -90 0 0 155 0 155 245 0 245 0 0 -540z"/></g>
                                                                        </svg>
                                                                    </span>
                                                                @endif
                                                            @endforeach
                                                            <a class="icon text-muted" href="#" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambahkan teman" wire:click="addFriend({{ $data->id }})">
                                                                <span class="svg-icon svg-icon-muted svg-icon-2hx">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="#757476"/>
                                                                        <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="#757476"/>
                                                                        <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="#757476"/>
                                                                    </svg>
                                                                </span>
                                                            </a>
                                                        @elseif($friend_null[0]->user != $user_null[0]->user)
                                                            @foreach ($user_null as $cek)
                                                                @if ($cek->user == Auth::user()->id && $cek->friend == $data->id)
                                                                <a class="icon text-primary" href="#" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus teman" wire:click="removeFriend({{ $data->id }})">
                                                                    <span class="svg-icon svg-icon-primary svg-icon-2hx">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                                                    </span>
                                                                </a>
                                                                
                                                                @elseif($duplicateS_null[0]->user == Auth::user()->id && $duplicateS_null[0]->friend == $data->id)
                                                                <a class="icon text-muted d-none" href="#" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambahkan teman" wire:click="addFriend({{ $data->id }})">
                                                                    <span class="svg-icon svg-icon-muted svg-icon-2hx">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="#757476"/>
                                                                            <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="#757476"/>
                                                                            <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="#757476"/>
                                                                        </svg>
                                                                    </span>
                                                                </a>
                                                                @elseif($user_null[0]->user == Auth::user()->id && $user_null[0]->friend != $data->id)
                                                                    @if($user_null[1]->user == Auth::user()->id && $user_null[1]->friend == $data->id)
                                                                    
                                                                    @else
                                                                    @foreach($req_friend as $notif)
                                                                        @if($notif['friend'] == Auth::user()->id &&  $notif['user'] == $data->id)
                                                                            <span class="svg-icon svg-icon-primary svg-icon-2hx">
                                                                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24" viewBox="0 0 512.000000 512.000000"
                                                                                preserveAspectRatio="xMidYMid meet">
                                                                                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                                                                fill="#33b5e5" stroke="none">
                                                                                <path d="M2538 4934 c-364 -66 -652 -347 -733 -718 -24 -107 -17 -330 14 -431
                                                                                101 -337 361 -578 704 -650 90 -20 268 -19 365 1 463 95 784 543 723 1009 -69
                                                                                524 -557 883 -1073 789z"/>
                                                                                <path d="M1281 4399 c-159 -24 -282 -87 -401 -208 -96 -96 -157 -203 -185
                                                                                -321 -21 -93 -19 -250 4 -342 110 -431 590 -651 986 -454 50 25 104 56 120 70
                                                                                l30 25 -36 38 c-148 155 -265 393 -305 623 -26 154 -11 434 31 542 5 12 -1 17
                                                                                -22 22 -61 12 -161 14 -222 5z"/>
                                                                                <path d="M2551 2799 c-275 -26 -541 -123 -775 -282 -132 -89 -333 -293 -425
                                                                                -430 -196 -296 -280 -589 -281 -979 l0 -138 939 0 938 0 6 148 c3 81 12 180
                                                                                21 220 98 447 409 800 829 941 l81 27 -95 83 c-277 243 -592 379 -951 411
                                                                                -126 11 -165 11 -287 -1z"/>
                                                                                <path d="M1185 2675 c-577 -90 -1040 -531 -1161 -1105 -11 -52 -17 -155 -21
                                                                                -337 l-5 -263 379 0 380 0 6 203 c7 232 30 388 84 566 95 314 257 578 505 824
                                                                                l129 127 -108 -1 c-59 -1 -144 -7 -188 -14z"/>
                                                                                <path d="M4055 2024 c-11 -2 -51 -11 -88 -20 -289 -66 -550 -300 -652 -586
                                                                                -45 -128 -59 -224 -52 -366 31 -646 693 -1057 1296 -804 222 93 418 301 501
                                                                                529 188 522 -100 1077 -635 1225 -68 19 -320 34 -370 22z m305 -924 l0 -540
                                                                                -155 0 -155 0 0 385 0 385 -90 0 -90 0 0 155 0 155 245 0 245 0 0 -540z"/></g>
                                                                                </svg>
                                                                            </span>
                                                                        @endif
                                                                    @endforeach
                                                                    <a class="icon text-muted" href="#" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambahkan teman" wire:click="addFriend({{ $data->id }})">
                                                                        <span class="svg-icon svg-icon-muted svg-icon-2hx">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="#757476"/>
                                                                                <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="#757476"/>
                                                                                <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="#757476"/>
                                                                            </svg>
                                                                        </span>
                                                                    </a>
                                                                    @endif
                                                                @elseif($user_null[0]->user == Auth::user()->id && $user_null[0]->friend == $data->id)
                                                                
                                                                @else
                                                                @foreach($req_friend as $notif)
                                                                    @if($notif['friend'] == Auth::user()->id &&  $notif['user'] == $data->id)
                                                                    <span class="svg-icon svg-icon-primary svg-icon-2hx">
                                                                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                                                                        width="24" height="24" viewBox="0 0 512.000000 512.000000"
                                                                        preserveAspectRatio="xMidYMid meet">
                                                                        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                                                        fill="#33b5e5" stroke="none">
                                                                        <path d="M2538 4934 c-364 -66 -652 -347 -733 -718 -24 -107 -17 -330 14 -431
                                                                        101 -337 361 -578 704 -650 90 -20 268 -19 365 1 463 95 784 543 723 1009 -69
                                                                        524 -557 883 -1073 789z"/>
                                                                        <path d="M1281 4399 c-159 -24 -282 -87 -401 -208 -96 -96 -157 -203 -185
                                                                        -321 -21 -93 -19 -250 4 -342 110 -431 590 -651 986 -454 50 25 104 56 120 70
                                                                        l30 25 -36 38 c-148 155 -265 393 -305 623 -26 154 -11 434 31 542 5 12 -1 17
                                                                        -22 22 -61 12 -161 14 -222 5z"/>
                                                                        <path d="M2551 2799 c-275 -26 -541 -123 -775 -282 -132 -89 -333 -293 -425
                                                                        -430 -196 -296 -280 -589 -281 -979 l0 -138 939 0 938 0 6 148 c3 81 12 180
                                                                        21 220 98 447 409 800 829 941 l81 27 -95 83 c-277 243 -592 379 -951 411
                                                                        -126 11 -165 11 -287 -1z"/>
                                                                        <path d="M1185 2675 c-577 -90 -1040 -531 -1161 -1105 -11 -52 -17 -155 -21
                                                                        -337 l-5 -263 379 0 380 0 6 203 c7 232 30 388 84 566 95 314 257 578 505 824
                                                                        l129 127 -108 -1 c-59 -1 -144 -7 -188 -14z"/>
                                                                        <path d="M4055 2024 c-11 -2 -51 -11 -88 -20 -289 -66 -550 -300 -652 -586
                                                                        -45 -128 -59 -224 -52 -366 31 -646 693 -1057 1296 -804 222 93 418 301 501
                                                                        529 188 522 -100 1077 -635 1225 -68 19 -320 34 -370 22z m305 -924 l0 -540
                                                                        -155 0 -155 0 0 385 0 385 -90 0 -90 0 0 155 0 155 245 0 245 0 0 -540z"/></g>
                                                                        </svg>
                                                                    </span>
                                                                    @endif
                                                                @endforeach
                                                                <a class="icon text-muted" href="#" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambahkan teman" wire:click="addFriend({{ $data->id }})">
                                                                    <span class="svg-icon svg-icon-muted svg-icon-2hx">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="#757476"/>
                                                                            <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="#757476"/>
                                                                            <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="#757476"/>
                                                                        </svg>
                                                                    </span>
                                                                </a>
                                                                @endif
                                                            @endforeach
                                                            
                                                        @else
                                                            @foreach ($teman_req as $item)
                                                                @if ($item['user'] == Auth::user()->id && $item['friend'] == $data->id)
                                                                <a class="icon text-primary" href="#" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus teman" wire:click="removeFriend({{ $data->id }})">
                                                                    <span class="svg-icon svg-icon-primary svg-icon-2hx">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                                                    </span>
                                                                </a>
                                                                @elseif($item['user'] != Auth::user()->id)
                                                                @foreach($req_friend as $notif)
                                                                    @if($notif['friend'] == Auth::user()->id &&  $notif['user'] == $data->id)
                                                                    <span class="svg-icon svg-icon-primary svg-icon-2hx">
                                                                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                                                                        width="24" height="24" viewBox="0 0 512.000000 512.000000"
                                                                        preserveAspectRatio="xMidYMid meet">
                                                                        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                                                        fill="#33b5e5" stroke="none">
                                                                        <path d="M2538 4934 c-364 -66 -652 -347 -733 -718 -24 -107 -17 -330 14 -431
                                                                        101 -337 361 -578 704 -650 90 -20 268 -19 365 1 463 95 784 543 723 1009 -69
                                                                        524 -557 883 -1073 789z"/>
                                                                        <path d="M1281 4399 c-159 -24 -282 -87 -401 -208 -96 -96 -157 -203 -185
                                                                        -321 -21 -93 -19 -250 4 -342 110 -431 590 -651 986 -454 50 25 104 56 120 70
                                                                        l30 25 -36 38 c-148 155 -265 393 -305 623 -26 154 -11 434 31 542 5 12 -1 17
                                                                        -22 22 -61 12 -161 14 -222 5z"/>
                                                                        <path d="M2551 2799 c-275 -26 -541 -123 -775 -282 -132 -89 -333 -293 -425
                                                                        -430 -196 -296 -280 -589 -281 -979 l0 -138 939 0 938 0 6 148 c3 81 12 180
                                                                        21 220 98 447 409 800 829 941 l81 27 -95 83 c-277 243 -592 379 -951 411
                                                                        -126 11 -165 11 -287 -1z"/>
                                                                        <path d="M1185 2675 c-577 -90 -1040 -531 -1161 -1105 -11 -52 -17 -155 -21
                                                                        -337 l-5 -263 379 0 380 0 6 203 c7 232 30 388 84 566 95 314 257 578 505 824
                                                                        l129 127 -108 -1 c-59 -1 -144 -7 -188 -14z"/>
                                                                        <path d="M4055 2024 c-11 -2 -51 -11 -88 -20 -289 -66 -550 -300 -652 -586
                                                                        -45 -128 -59 -224 -52 -366 31 -646 693 -1057 1296 -804 222 93 418 301 501
                                                                        529 188 522 -100 1077 -635 1225 -68 19 -320 34 -370 22z m305 -924 l0 -540
                                                                        -155 0 -155 0 0 385 0 385 -90 0 -90 0 0 155 0 155 245 0 245 0 0 -540z"/></g>
                                                                        </svg>
                                                                    </span>
                                                                    @endif
                                                                @endforeach
                                                                <a class="icon text-muted" href="#" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambahkan teman" wire:click="addFriend({{ $data->id }})">
                                                                    <span class="svg-icon svg-icon-muted svg-icon-2hx">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="#757476"/>
                                                                            <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="#757476"/>
                                                                            <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="#757476"/>
                                                                        </svg>
                                                                    </span>
                                                                </a>
                                                                @endif
                                                            @endforeach                                                        
                                                        
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Card -->
                                        @endforeach
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Chats -->
                <div class="tab-pane fade h-100 show active" id="tab-content-chats" role="tabpanel" wire:ignore.self>
                    <div class="d-flex flex-column h-100 position-relative">
                        <div class="hide-scrollbar">
                            <div class="container py-8">
                                <!-- Title -->
                                <div class="mb-8">
                                    <h2 class="fw-bold m-0">Chats</h2>
                                </div>
                                <!-- Search -->
                                <div class="mb-6">
                                    <form action="#">
                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <div class="icon icon-lg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                                </div>
                                            </div>

                                            <input type="text" class="form-control form-control-lg ps-0" placeholder="Cari pesan" aria-label="Cari pesan..." wire:model="cari_pesan">
                                        </div>
                                    </form>
                                </div>
                                <!-- Chats -->
                                <div class="card-list">
                                    @foreach ($users as $item)
                                    <!-- Card -->
                                    <a type="button" wire:click="startChat({{ $item->id }})" onclick="myFunction()" class="card border-0 text-reset">
                                        @php
                                        
                                        $user = Auth::user()->id;
                                        $notifications = App\Models\Message::where('is_read', '0')->where('sender_id', $item->id)->get();
                                        $pesan_sender = App\Models\Message::where('thread', Auth::user()->id.'-'.$item->id)->orWhere('thread', $item->id.'-'.Auth::user()->id)->get();
                                        $last_sender = $pesan_sender->last();
                                        $punya_teman = App\Models\Friend::where('friend', $user)->orWhere('user', $item->id)->get();
                                        $jam = App\Models\Message::where('thread', Auth::user()->id.'-'.$item->id)->orWhere('thread', $item->id.'-'.Auth::user()->id)->get();
                                        $last_jam = $jam->last();
                                        @endphp
                                        
                                        <div class="card-body">
                                            <div class="row gx-5">
                                                <div class="col-auto">
                                                @if (Cache::has('is_online' . $item->id))
                                                    <div class="avatar avatar-online">
                                                        <img src="{{ asset('storage/avators/' . $item->avator) }}" alt="{{ $item->full_name}}" class="avatar-img">
                                                    </div>
                                                @else
                                                    <div class="avatar avatar-offline">
                                                        <img src="{{ asset('storage/avators/' . $item->avator) }}" alt="{{ $item->full_name}}" class="avatar-img">
                                                    </div>
                                                @endif
                                                </div>
                                                <div class="col">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <h5 class="me-auto mb-0">
                                                            {{ $item->full_name}}
                                                        </h5>
                                                        @foreach($punya_teman as $teman)
                                                            @if(($teman->user == $user && $teman->friend == $item->id) || ($teman->user == $item->id && $teman->friend == $user))
                                                            <div class="icon icon-sm">
                                                                <i class="fas fa-user-friends" style="color:#2787f5;"></i>
                                                            </div>
                                                            @endif
                                                        @endforeach

                                                        @if ($last_jam->sender_id == Auth::user()->id && $last_jam->receiver_id == $item->id)
                                                            <span class="text-muted extra-small ms-2">{{ date('h:i a', strtotime($last_jam->created_at)) }}</span>
                                                        @elseif($last_jam->sender_id == $item->id && $last_jam->receiver_id == Auth::user()->id)
                                                            <span class="text-muted extra-small ms-2">{{ date('h:i a', strtotime($last_jam->created_at)) }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="line-clamp me-auto">
                                                            @if(!$pesan_sender->isEmpty())
                                                                @if($last_sender['message'] != null)
                                                                    <p style="word-break: break-all;" wire:ignore.self>{{$last_sender['message']}}</p>
                                                                @else
                                                                    Pesan Telah dihapus
                                                                @endif
                                                            @else
                                                            Belum ada obrolan
                                                            @endif
                                                        </div>
                                                        {{--<div class="line-clamp me-auto">
                                                            @if (Cache::has('is_online' . $item->id))
                                                                <p class="text-truncate small">Online</p>
                                                            @else
                                                                <p class="text-truncate small">Last seen: {{ \Carbon\Carbon::parse($item->last_seen)->diffForHumans() }} </p>
                                                            @endif
                                                        </div>--}}
                                                        
                                                        @if ($notifications->count() > 0)
                                                            @if($notifications[0]->receiver_id == Auth::user()->id)
                                                            <div class="badge badge-circle bg-primary ms-5">
                                                                <span>{{ $notifications->count() }}</span>
                                                            </div>
                                                            @endif
                                                        @else
                                                            <span></span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .card-body -->
                                    </a>
                                    <!-- Card -->
                                    @endforeach
                                </div>
                                <!-- Chats -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Settings -->
                <div class="tab-pane fade h-100" id="tab-content-settings" role="tabpanel" wire:ignore.self>
                    <div class="d-flex flex-column h-100">
                        <div class="hide-scrollbar">
                            <div class="container py-8">
                                <!-- Title -->
                                <div class="mb-8">
                                    <h2 class="fw-bold m-0">Settings</h2>
                                </div>
                                <!-- Profile -->
                                <div class="card border-0">
                                    <div class="card-body">
                                        <div class="row align-items-center gx-5">
                                            <div class="col-auto">
                                                @if ($avator)
                                                    <img src="{{ $avator->temporaryUrl() }}" class="img-thumbnail" style="border-radius: 50px; height:50px; width:50px;object-fit:cover;" alt="Preview">
                                                @elseif($profile)
                                                <div class="avatar">
                                                    <img src="{{ asset('storage/avators/' . $profile[0]->avator) }}" alt="{{ Auth::user()->full_name }}" class="avatar-img">
                                                    <!-- <div class="badge badge-circle bg-secondary border-outline position-absolute bottom-0 end-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                                                    </div> -->
                                                    <!-- <input id="upload-profile-photo" class="d-none" type="file">
                                                    <label class="stretched-label mb-0" for="upload-profile-photo"></label> -->
                                                </div>
                                                @endif
                                            </div>
                                            <div class="col">
                                                <h5>{{ Auth::user()->full_name }}</h5>
                                                <p><small>@</small>{{ Auth::user()->username }}</p>
                                            </div>
                                            <div class="col-auto">
                                                <a wire:click="logout" class="text-danger" style="cursor:pointer;">
                                                    <div class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Profile -->

                                <!-- Account -->
                                <div class="mt-8">
                                    <div class="d-flex align-items-center mb-4 px-6">
                                        <small class="text-muted me-auto">Kelola akun</small>
                                    </div>
                                    <div class="card border-0">
                                        <div class="card-body py-2">
                                            <!-- Accordion -->
                                            <div class="accordion accordion-flush" id="accordion-profile">
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="accordion-profile-1">
                                                        <a href="#" class="accordion-button text-reset collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-profile-body-1" aria-expanded="false" aria-controls="accordion-profile-body-1" wire:ignore.self>
                                                            <div>
                                                                <h5>Settings profile</h5>
                                                                <p>Ubah profile kamu</p>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div id="accordion-profile-body-1" class="accordion-collapse collapse" aria-labelledby="accordion-profile-1" data-parent="#accordion-profile" wire:ignore.self>
                                                        <div class="accordion-body">
                                                            <form wire:submit.prevent="editProfile({{Auth::user()->id}})">
                                                                <div class="form-group mb-6">
                                                                    <label class="btn btn-primary">
                                                                        <i class="fa fa-image"></i> Update Foto
                                                                        <input type="file" value="{{ old('avator') }}" class="form-style d-none @error('avator') is-invalid @enderror" wire:model="avator">
                                                                    </label>
                                                                    @error('avator')
                                                                        <span class="text-danger" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-floating mb-6">
                                                                    <input type="text" class="form-control @error('full_name') is-invalid @enderror" placeholder="Name" wire:model="full_name">
                                                                    @error('full_name')
                                                                        <span class="text-danger" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                    <label for="profile-name">Nama</label>
                                                                </div>
                                                                <div class="form-floating mb-6">
                                                                    <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Name" wire:model="username">
                                                                    @error('username')
                                                                        <span class="text-danger" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                    <label for="profile-name">Username</label>
                                                                </div>
                                                                <div class="form-floating mb-6">
                                                                    <input type="email" class="form-control" id="profile-email" placeholder="Email address" wire:model="email">
                                                                    <label for="profile-email">Email</label>
                                                                </div>
                                                                <div class="form-floating mb-6">
                                                                    <input type="text" class="form-control" id="profile-phone" placeholder="Phone" wire:model="no_hp">
                                                                    <label for="profile-phone">No. Handphone</label>
                                                                </div>
                                                                <div class="form-floating mb-6">
                                                                    <textarea maxlength="80" class="form-control" placeholder="Bio" id="profile-bio" data-autosize="true" style="min-height: 120px;" wire:model="bio" wire:ignore.self></textarea>
                                                                    <label for="profile-bio">Bio</label>
                                                                </div>
                                                                <button type="submit" class="btn btn-block btn-lg btn-primary w-100">Simpan</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Switch -->
                                                <div class="accordion-item">
                                                    <div class="accordion-header">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <h5>Tema</h5>
                                                                <p>Pilih tema gelap atau putih</p>
                                                            </div>
                                                            <div class="col-auto">
                                                                <a class="switcher-btn text-reset" href="#!" title="Themes">
                                                                    <div class="switcher-icon switcher-icon-dark icon icon-lg d-none" data-theme-mode="dark" wire:ignore.self>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
                                                                    </div>
                                                                    <div class="switcher-icon switcher-icon-light icon icon-lg d-none" data-theme-mode="light" wire:ignore.self>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sun"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion accordion-flush" id="accordion-security">
                                                    <div class="accordion-item">
                                                        <div class="accordion-header" id="accordion-security-1">
                                                            <a href="#" class="accordion-button text-reset collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-security-body-1" aria-expanded="false" aria-controls="accordion-security-body-1" wire:ignore.self>
                                                                <div>
                                                                    <h5>Password</h5>
                                                                    <p>Ubah password kamu</p>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div id="accordion-security-body-1" class="accordion-collapse collapse" aria-labelledby="accordion-security-1" data-parent="#accordion-security" wire:ignore.self>
                                                            <div class="accordion-body">
                                                                <form wire:submit.prevent="changePassword()">
                                                                    <div class="form-floating mb-6">
                                                                        <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="profile-current-password" name="current_password" wire:model="current_password" placeholder="Current Password">
                                                                        <label for="profile-current-password">Password saat ini</label>
                                                                        @error('current_password')
                                                                            <span class="text-danger" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-floating mb-6">
                                                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="profile-new-password" name="password" wire:model="password" placeholder="New password">
                                                                        <label for="profile-new-password">Password baru</label>
                                                                        @error('password')
                                                                            <span class="text-danger" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-floating mb-6">
                                                                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="profile-confirm-password" name="password_confirmation" wire:model="password_confirmation" placeholder="Confirm password">
                                                                        <label for="profile-confirm-password">Konfirmasi password</label>
                                                                        @error('password_confirmation')
                                                                            <span class="text-danger" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <button type="submit" class="btn btn-block btn-lg btn-primary w-100">Simpan</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Account -->

                                <!-- Security -->
                                {{--<div class="mt-8">
                                    <div class="d-flex align-items-center my-4 px-6">
                                        <small class="text-muted me-auto">Keamanan</small>
                                    </div>
                                    <div class="card border-0">
                                        <div class="card-body py-2">
                                            <!-- Accordion -->
                                            <div class="accordion accordion-flush" id="accordion-security">
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="accordion-security-1">
                                                        <a href="#" class="accordion-button text-reset collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-security-body-1" aria-expanded="false" aria-controls="accordion-security-body-1">
                                                            <div>
                                                                <h5>Password</h5>
                                                                <p>Ubah password kamu</p>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div id="accordion-security-body-1" class="accordion-collapse collapse" aria-labelledby="accordion-security-1" data-parent="#accordion-security">
                                                        <div class="accordion-body">
                                                            <form action="#" autocomplete="on">
                                                                <div class="form-floating mb-6">
                                                                    <input type="password" class="form-control" id="profile-current-password" placeholder="Current Password" autocomplete="">
                                                                    <label for="profile-current-password">Password saat ini</label>
                                                                </div>
                                                                <div class="form-floating mb-6">
                                                                    <input type="password" class="form-control" id="profile-new-password" placeholder="New password" autocomplete="">
                                                                    <label for="profile-new-password">Password baru</label>
                                                                </div>
                                                            </form>
                                                            <button type="button" class="btn btn-block btn-lg btn-primary w-100">Simpan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>--}}
                                <!-- Security -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <!-- Sidebar -->

        <!-- Chat -->
        @if ($noChat)
        <main class="main is-visible">
            <div class="container h-100">
                <div class="d-flex flex-column h-100 position-relative">
                    <!-- Chat: Header -->
                    <div class="chat-header border-bottom py-4 py-lg-7">
                        <div class="row align-items-center">
                            <!-- Mobile: close -->
                            <div class="col-2 d-xl-none">
                                <a class="icon icon-lg text-muted" wire:click="back()" style="cursor:pointer;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
                                </a>
                            </div>
                            <!-- Mobile: close -->
                            <!-- Content -->
                            <div class="col-8 col-xl-12">
                                <div class="row align-items-center text-center text-xl-start">
                                    <!-- Title -->
                                    <div class="col-12 col-xl-6">
                                        <div class="row align-items-center gx-5">
                                            <div class="col-auto">
                                            @if (Cache::has('is_online' . $current->id))
                                                <div class="avatar avatar-online d-none d-xl-inline-block">
                                                    <img class="avatar-img" src="{{ asset('storage/avators/' . $current->avator) }}" alt="{{ $current->full_name}}">
                                                </div>
                                            @else
                                                <div class="avatar avatar-offline d-none d-xl-inline-block">
                                                    <img class="avatar-img" src="{{ asset('storage/avators/' . $current->avator) }}" alt="{{ $current->full_name}}">
                                                </div>
                                            @endif
                                            </div>

                                            <div class="col overflow-hidden">
                                                <h5 class="text-truncate">{{ $current->full_name}}</h5>
                                                <!-- <p class="text-truncate">is typing<span class='typing-dots'><span>.</span><span>.</span><span>.</span></span></p> -->
                                                @if (Cache::has('is_online' . $current->id))
                                                <p class="text-truncate small">Online</p>
                                                @else
                                                <p class="text-truncate small">Last seen: {{ \Carbon\Carbon::parse($current->last_seen)->diffForHumans() }} </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Title -->

                                    <!-- Toolbar -->
                                    <div class="col-xl-6 d-none d-xl-block">
                                        <div class="row align-items-center justify-content-end gx-6">
                                            <div class="col-auto">
                                                <a href="#" class="icon icon-lg text-muted" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-more" aria-controls="offcanvas-more">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Toolbar -->
                                </div>
                            </div>
                            <!-- Content -->

                            <!-- Mobile: more -->
                            <div class="col-2 d-xl-none text-end">
                                <a href="#" class="icon icon-lg text-muted" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-more" aria-controls="offcanvas-more">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                </a>
                            </div>
                            <!-- Mobile: more -->

                        </div>
                    </div>
                    <!-- Chat: Header -->

                    <!-- Chat: Content -->
                    <div class="chat-body hide-scrollbar flex-1 h-100" id="content_to_scroll">
                        <div class="chat-body-inner">
                            <div class="py-2 py-lg-2">
                                @if ($messages->count())
                                <!-- Divider -->
                                <div style="margin-bottom:40px">

                                </div>
                                    @foreach ($messages as $chat)
                                    @if ($chat->sender_id == Auth::user()->id && $chat->receiver_id == $receiver)
                                    <!-- Message -->
                                    <div class="message message-out">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal-profile" class="avatar avatar-responsive">
                                            <img class="avatar-img" src="{{ asset('storage/avators/' . Auth::user()->avator) }}" alt="{{ Auth::user()->full_name }}">
                                        </a>
                                        <div class="message-inner">
                                            <div class="message-body">
                                                <div class="message-content">
                                                    @if ($chat->message == null)
                                                    <div class="message-text">
                                                        <p>Pesan telah dihapus</p>
                                                    </div>
                                                    @else
                                                    <div class="message-text">
                                                        <p style="word-break: break-all;">{!! nl2br(e( $chat->message)) !!}</p>
                                                    </div>
                                                    <!-- Dropdown -->
                                                    <div class="message-action">
                                                        <div class="dropdown">
                                                            <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" wire:ignore.self>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                            </a>
                                                            <ul class="dropdown-menu" wire:ignore.self>
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center text-danger" wire:click="deleteMessage({{ $chat->id }})" style="cursor:pointer;">
                                                                        <span class="me-auto">Delete</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="message-footer">
                                                <span class="extra-small text-muted">{{ date('h:i a', strtotime($chat->created_at)) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    @elseif($chat->sender_id == $receiver && $chat->receiver_id == Auth::user()->id)
                                    <!-- Message -->
                                    <div class="message">
                                        <a class="avatar avatar-responsive">
                                            <img class="avatar-img" src="{{ asset('storage/avators/' . $current->avator) }}" alt="{{ Auth::user()->full_name }}">
                                        </a>
                                        <div class="message-inner">
                                            <div class="message-body">
                                                <div class="message-content">
                                                    @if ($chat->message == null)
                                                    <div class="message-text">
                                                        <p>Pesan telah dihapus</p>
                                                    </div>
                                                    @else
                                                    <div class="message-text">
                                                        <p style="word-break: break-all;">{!! nl2br(e( $chat->message)) !!}</p>
                                                    </div>
                                                    <!-- Dropdown -->
                                                    <div class="message-action">
                                                        <div class="dropdown">
                                                            <a class="icon text-muted" role="button" data-bs-toggle="dropdown" aria-expanded="false" wire:ignore.self>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                            </a>
                                                            <ul class="dropdown-menu" wire:ignore.self>
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center text-danger" wire:click="deleteMessage({{ $chat->id }})" style="cursor:pointer;">
                                                                        <span class="me-auto">Delete</span>
                                                                        <div class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="message-footer">
                                                <span class="extra-small text-muted">{{ date('h:i a', strtotime($chat->created_at)) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                @else
                                    <div class="d-flex flex-column h-100 justify-content-center text-center py-12">
                                        <div class="mb-6">
                                            <span class="icon icon-xl text-muted">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                                            </span>
                                        </div>
                                        <p class="text-muted">Belum ada obrolan,<br> mulailah obrolan dahulu</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Chat: Content -->

                    <!-- Chat: Footer -->
                    <div class="chat-footer pb-3 pb-lg-7 position-absolute bottom-0 start-0">
                        <!-- Chat: Files -->
                        <div class="dz-preview bg-dark" id="dz-preview-row" data-horizontal-scroll="">
                        </div>
                        <!-- Chat: Files -->

                        <!-- Chat: Form -->
                        <form class="chat-form rounded-pill bg-dark" data-emoji-form="" wire:submit.prevent="sendChat">
                            <!-- <input type="hidden" value="{{ $receiver }}" wire:model.defer="receiver_id"> -->
                            <div class="row align-items-center gx-0">
                                <div class="col-auto">
                                    {{--@if ($media)
                                        <img src="{{ $media->temporaryUrl() }}" class="img-thumbnail" style="border-radius: 50px; height:50px; width:50px;" alt="Preview">
                                    @endif--}}
                                    <input type="file" class="d-none" id="dz-btn" wire:model="media">
                                    <label class="btn btn-icon btn-link text-body rounded-circle" for="dz-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg>
                                    </label>
                                    
                                    <!-- <a href="#" class="btn btn-icon btn-link text-body rounded-circle" id="dz-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg>
                                    </a> -->
                                    <!-- <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input d-none" id="dz-btn">
                                            <label class="btn btn-icon btn-link text-body rounded-circle custom-file-label" for="dz-btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg>
                                            </label>
                                        </div>
                                    </div> -->
                                </div>
                                <!-- required oninvalid="this.setCustomValidity('Anda belum mengetik pesan')" -->
                                <div class="col">
                                    <div class="input-group" id="isiChat">
                                        <textarea class="form-control px-0 @error('message') is-invalid @enderror auto-size" style="height:15px !important;" onfocus="myFunction()" autofocus type="text" placeholder="Type your message..." rows="1" data-emoji-input="" data-autosize="true" wire:model.defer="message" wire:ignore.self required oninvalid="this.setCustomValidity('Anda belum mengetik pesan')"></textarea>
                                        <a href="#" class="input-group-text text-body pe-0 d-none" data-emoji-btn="">
                                            <span class="icon icon-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-smile"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg>
                                            </span>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <button class="btn btn-icon btn-primary rounded-circle ms-5" onclick="myFunction()">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                                    </button>
                                    @error('message')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </form>
                        <!-- Chat: Form -->
                    </div>
                    <!-- Chat: Footer -->
                </div>
            </div>
        </main>
        @else
        <main class="main">
            <div class="container h-100">
                <div class="d-flex flex-column h-100 justify-content-center text-center">
                    <div class="mb-6">
                        <span class="icon icon-xl text-muted">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                        </span>
                    </div>
                    <p class="text-muted">Pilih room chat, dan mulai lah ngobrol.</p>
                </div>
            </div>
        </main>
        @endif
        <!-- Chat -->

        <!-- Detail profile Chat -->
        @if ($noChat)
        <div class="offcanvas offcanvas-end offcanvas-aside" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvas-more" wire:ignore.self>
            <!-- Offcanvas Header -->
            <div class="offcanvas-header py-4 py-lg-7 border-bottom">
                <a class="icon icon-lg text-muted" href="#" data-bs-dismiss="offcanvas">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
                </a>

                <div class="visibility-xl-invisible overflow-hidden text-center">
                    <h5 class="text-truncate">{{ $current->full_name}}</h5>
                    @if (Cache::has('is_online' . $current->id))
                    <p class="text-truncate small">Online</p>
                    @else
                    <p class="text-truncate small">Last seen: {{ \Carbon\Carbon::parse($current->last_seen)->diffForHumans() }} </p>
                    @endif
                </div>

                <!-- Space -->
                <div></div>
            </div>
            <!-- Offcanvas Header -->

            <!-- Offcanvas Body -->
            <div class="offcanvas-body hide-scrollbar">
                <!-- Avatar -->
                <div class="text-center py-10">
                    <div class="row gy-6">
                        <div class="col-12">
                            <div class="avatar avatar-xl mx-auto">
                                <img src="{{ asset('storage/avators/' . $current->avator) }}" alt="{{ $current->full_name}}" class="avatar-img bunder">
                                <!-- <a class="badge badge-lg badge-circle bg-primary text-white border-outline position-absolute bottom-0 end-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                </a> -->
                            </div>
                        </div>

                        <div class="col-12">
                            <h4><small>@</small>{{ $current->username}}</h4>
                            @if($current->bio != null)
                            <p style="word-break: break-all;">{!! nl2br(e($current->bio)) !!}</p>
                            @else
                            <p style="word-break: break-all;">No Bio</p>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Avatar -->

                <!-- Tabs -->
                <ul class="nav nav-pills nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="pill" href="#offcanvas-tab-profile" role="tab" aria-controls="offcanvas-tab-profile" aria-selected="true" wire:ignore.self>
                            Profile
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="pill" href="#offcanvas-tab-media" role="tab" aria-controls="offcanvas-tab-media" aria-selected="true" wire:ignore.self>
                            Media
                        </a>
                    </li>
                </ul>
                <!-- Tabs -->

                <!-- Tabs: Content -->
                <div class="tab-content py-2" role="tablist">
                    <!-- Profile -->
                    <div class="tab-pane fade show active" id="offcanvas-tab-profile" role="tabpanel" wire:ignore.self>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="row align-items-center gx-6">
                                    <div class="col">
                                        <h5>Nama Lengkap</h5>
                                        <p>{{$current->full_name}}</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row align-items-center gx-6">
                                    <div class="col">
                                        <h5>E-mail</h5>
                                        @if($current->email != null)
                                        <p>{{$current->email}}</p>
                                        @else
                                        <p>Email belum dimasukan</p>
                                        @endif
                                    </div>

                                    <div class="col-auto d-none">
                                        <div class="btn btn-sm btn-icon btn-dark">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row align-items-center gx-6">
                                    <div class="col">
                                        <h5>No. Handphone</h5>
                                        @if($current->no_hp != null)
                                        <p>{{$current->no_hp}}</p>
                                        @else
                                        <p>No. Handphone belum dimasukan</p>
                                        @endif
                                    </div>

                                    <div class="col-auto d-none">
                                        <div class="btn btn-sm btn-icon btn-dark">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone-call"><path d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <ul class="list-group list-group-flush border-top mt-8">
                            <li class="list-group-item">
                                <a class="text-danger" wire:click="clearChats" onclick="confirm('Are you sure of clearing chats?')" class="btn btn-light border px-3" style="cursor:pointer;">Hapus Chat</a>
                                <!-- <a href="#" class="text-danger" class="btn btn-light border px-3">Hapus Chat</a> -->
                            </li>
                        </ul>
                    </div>
                    <!-- Profile -->

                    <!-- Media -->
                    <div class="tab-pane fade" id="offcanvas-tab-media" role="tabpanel" wire:ignore.self>
                        <div class="row row-cols-3 g-3 py-6">
                            <div class="col">
                                <img class="img-fluid rounded" src="{{asset('assets/img/yo2.jpg')}}" alt="">
                            </div>

                            <div class="col">
                                <img class="img-fluid rounded" src="{{asset('assets/img/yo.jpg')}}" alt="">
                            </div>

                            <div class="col">
                                <img class="img-fluid rounded" src="{{asset('assets/img/yo2.jpg')}}" alt="">
                            </div>

                            <div class="col">
                                <img class="img-fluid rounded" src="{{asset('assets/img/yo.jpg')}}" alt="">
                            </div>

                            <div class="col">
                                <img class="img-fluid rounded" src="{{asset('assets/img/yo2.jpg')}}" alt="">
                            </div>

                            <div class="col">
                                <img class="img-fluid rounded" src="{{asset('assets/img/yo.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- Media -->
                </div>
                <!-- Tabs: Content -->
            </div>
            <!-- Offcanvas Body -->
        </div>
        @endif
        <!-- Detail profile Chat -->
    </div>
    <!-- Layout -->

    <!-- Modal: Profile -->
    <div class="modal fade" id="modal-profile" tabindex="-1" aria-labelledby="modal-profile" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-xl-down">
            <div class="modal-content">
                @if($profile)
                <!-- Modal body -->
                <div class="modal-body py-0">
                    <!-- Header -->
                    <div class="profile modal-gx-n">
                        <div class="profile-img text-primary rounded-top-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 400 140.74"><defs><style>.cls-2{fill:#fff;opacity:0.1;}</style></defs><g><g><path d="M400,125A1278.49,1278.49,0,0,1,0,125V0H400Z"/><path class="cls-2" d="M361.13,128c.07.83.15,1.65.27,2.46h0Q380.73,128,400,125V87l-1,0a38,38,0,0,0-38,38c0,.86,0,1.71.09,2.55C361.11,127.72,361.12,127.88,361.13,128Z"/><path class="cls-2" d="M12.14,119.53c.07.79.15,1.57.26,2.34v0c.13.84.28,1.66.46,2.48l.07.3c.18.8.39,1.59.62,2.37h0q33.09,4.88,66.36,8,.58-1,1.09-2l.09-.18a36.35,36.35,0,0,0,1.81-4.24l.08-.24q.33-.94.6-1.9l.12-.41a36.26,36.26,0,0,0,.91-4.42c0-.19,0-.37.07-.56q.11-.86.18-1.73c0-.21,0-.42,0-.63,0-.75.08-1.51.08-2.28a36.5,36.5,0,0,0-73,0c0,.83,0,1.64.09,2.45C12.1,119.15,12.12,119.34,12.14,119.53Z"/><circle class="cls-2" cx="94.5" cy="57.5" r="22.5"/><path class="cls-2" d="M276,0a43,43,0,0,0,43,43A43,43,0,0,0,362,0Z"/></g></g></svg>

                            <div class="position-absolute top-0 start-0 py-6 px-5">
                                <button type="button" class="btn-close btn-close-white btn-close-arrow opacity-100" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                        </div>
                        <div class="profile-body">
                            <div class="avatar avatar-xl">
                                <img class="avatar-img" src="{{ asset('storage/avators/' . $profile[0]->avator) }}" alt="{{ Auth::user()->full_name }}">
                            </div>

                            <h4 class="mb-1"><small>@</small>{{ Auth::user()->username }}</h4>
                            <p>Online</p>
                            @if(Auth::user()->bio != null)
                            <div class="col-8 d-inline-flex justify-content-center">
                                <p style="word-break: break-all;">{!! nl2br(e(Auth::user()->bio)) !!}</p>
                            </div>
                            @else
                            <p>No Bio</p>
                            @endif
                        </div>
                    </div>
                    <!-- Header -->
                    <hr class="hr-bold modal-gx-n my-0">
                    <!-- List -->
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row align-items-center gx-6">
                                <div class="col">
                                    <h5>Nama Lengkap</h5>
                                    @if(Auth::user()->full_name != null)
                                    <p>{{Auth::user()->full_name}}</p>
                                    @else
                                    <p>Nama belum dimasukan</p>
                                    @endif
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row align-items-center gx-6">
                                <div class="col">
                                    <h5>Email</h5>
                                    @if(Auth::user()->email != null)
                                    <p id="t1">{{Auth::user()->email}}</p>
                                    <!-- <p id="t2"></p> -->
                                    @else
                                    <p>Email belum dimasukan</p>
                                    @endif
                                </div>

                                @if(Auth::user()->email != null)
                                <div class="col-auto d-none">
                                    <button class="btn btn-sm btn-icon btn-dark" onclick="hide()">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                @else
                                <div class="col-auto d-none">
                                    <div class="btn btn-sm btn-icon btn-dark">
                                        <i class="fas fa-eye"></i>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row align-items-center gx-6">
                                <div class="col">
                                    <h5>No. Handphone</h5>
                                    @if(Auth::user()->no_hp != null)
                                    <p>{{Auth::user()->no_hp}}</p>
                                    @else
                                    <p>No. Handphone belum dimasukan</p>
                                    @endif
                                </div>
                                @if(Auth::user()->no_hp != null)
                                <div class="col-auto d-none">
                                    <div class="btn btn-sm btn-icon btn-dark">
                                        <i class="fas fa-eye"></i>
                                    </div>
                                </div>
                                @else
                                <div class="col-auto d-none">
                                    <div class="btn btn-sm btn-icon btn-dark">
                                        <i class="fas fa-eye"></i>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </li>
                    </ul>
                    <!-- List  -->
                    <hr class="hr-bold modal-gx-n my-0">
                    <!-- List -->
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a wire:click="logout" class="text-danger" style="cursor:pointer;">Logout</a>
                        </li>
                    </ul>
                </div>
                <!-- Modal body -->
                @endif
            </div>
        </div>
    </div>

    <!-- Modal: User profile -->
    <div class="modal fade" id="modal-user-profile" tabindex="-1" aria-labelledby="modal-user-profile" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-xl-down">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body py-0">
                    <!-- Header -->
                    <div class="profile modal-gx-n">
                        <div class="profile-img text-primary rounded-top-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 400 140.74"><defs><style>.cls-2{fill:#fff;opacity:0.1;}</style></defs><g><g><path d="M400,125A1278.49,1278.49,0,0,1,0,125V0H400Z"/><path class="cls-2" d="M361.13,128c.07.83.15,1.65.27,2.46h0Q380.73,128,400,125V87l-1,0a38,38,0,0,0-38,38c0,.86,0,1.71.09,2.55C361.11,127.72,361.12,127.88,361.13,128Z"/><path class="cls-2" d="M12.14,119.53c.07.79.15,1.57.26,2.34v0c.13.84.28,1.66.46,2.48l.07.3c.18.8.39,1.59.62,2.37h0q33.09,4.88,66.36,8,.58-1,1.09-2l.09-.18a36.35,36.35,0,0,0,1.81-4.24l.08-.24q.33-.94.6-1.9l.12-.41a36.26,36.26,0,0,0,.91-4.42c0-.19,0-.37.07-.56q.11-.86.18-1.73c0-.21,0-.42,0-.63,0-.75.08-1.51.08-2.28a36.5,36.5,0,0,0-73,0c0,.83,0,1.64.09,2.45C12.1,119.15,12.12,119.34,12.14,119.53Z"/><circle class="cls-2" cx="94.5" cy="57.5" r="22.5"/><path class="cls-2" d="M276,0a43,43,0,0,0,43,43A43,43,0,0,0,362,0Z"/></g></g></svg>

                            <div class="position-absolute top-0 start-0 p-5">
                                <button type="button" class="btn-close btn-close-white btn-close-arrow opacity-100" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                        </div>
                        <div class="profile-body">
                            <div class="avatar avatar-xl">
                                <img class="avatar-img" src="{{asset(url('assets/img/yo2.jpg'))}}" alt="#">
                                <a href="#" class="badge badge-lg badge-circle bg-primary text-white border-outline position-absolute bottom-0 end-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                </a>
                            </div>
                            <h4 class="mb-1">Mas Bo</h4>
                            <p>last seen 5 minutes ago</p>
                        </div>
                    </div>
                    <!-- Header -->
                    <hr class="hr-bold modal-gx-n my-0">
                    <!-- List -->
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row align-items-center gx-6">
                                <div class="col">
                                    <h5>Email</h5>
                                    <p>msbo@gmail.com</p>
                                </div>

                                <div class="col-auto">
                                    <div class="btn btn-sm btn-icon btn-dark">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row align-items-center gx-6">
                                <div class="col">
                                    <h5>No. Handphone</h5>
                                    <p>08xxxxxxxxxx</p>
                                </div>

                                <div class="col-auto">
                                    <div class="btn btn-sm btn-icon btn-dark">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone-call"><path d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <!-- List -->
                </div>
                <!-- Modal body -->
            </div>
        </div>
    </div>

    <script>

        document.addEventListener('livewire:load', function () {

            
        });
        
        function hide() {
            let data = $('#t1').text();
            var hiddenEmail = "";
            for (i = 0; i < data.length; i++) {
                if (i > 2 && i< data.indexOf("@") ) {
                hiddenEmail += "*";
                } else {
                hiddenEmail += data[i];
                }
            }
            $('#t2').text(hiddenEmail)
        }

    </script>
</div>
