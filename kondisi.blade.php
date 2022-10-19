<div class="col-auto">
    @if($friend_null->isEmpty() || $user_null->isEmpty())
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
    @elseif($friend_null[0]->user != $user_null[0]->user)
        @foreach ($user_null as $cek)
            @if ($cek->user == Auth::user()->id && $cek->friend == $friends->id)
            <a class="icon text-primary" href="#" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus teman" wire:click="removeFriend({{ $friends->id }})">
                <span class="svg-icon svg-icon-primary svg-icon-2hx">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                </span>
            </a>
            
            @elseif($duplicateS_null[0]->user == Auth::user()->id && $duplicateS_null[0]->friend == $friends->id)
            <a class="icon text-muted d-none" href="#" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambahkan teman" wire:click="addFriend({{ $friends->id }})">
                <span class="svg-icon svg-icon-muted svg-icon-2hx">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="#757476"/>
                        <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="#757476"/>
                        <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="#757476"/>
                    </svg>
                </span>
            </a>
            @elseif($user_null[0]->user == Auth::user()->id && $user_null[0]->friend != $friends->id)
                @if($user_null[1]->user == Auth::user()->id && $user_null[1]->friend == $friends->id)
                
                @else
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
                @endif
            @elseif($user_null[0]->user == Auth::user()->id && $user_null[0]->friend == $friends->id)
            
            @else
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
            @endif
        @endforeach
        
    @else
        @foreach ($teman_req as $item)
            @if ($item['user'] == Auth::user()->id && $item['friend'] == $friends->id)
            <a class="icon text-primary" href="#" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus teman" wire:click="removeFriend({{ $friends->id }})">
                <span class="svg-icon svg-icon-primary svg-icon-2hx">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                </span>
            </a>
            @elseif($item['user'] != Auth::user()->id)
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
            @endif
        @endforeach                                                        
    
    @endif
</div>