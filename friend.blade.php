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
                
            </div>
        </div>
    </div>
</div>
<!-- Card -->