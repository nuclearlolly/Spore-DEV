@if ($deactivated)
    <div style="filter:grayscale(1); opacity:0.75">
@endif

<div class="header"><img class="header-img" style="border: 7px double #ffffffb6; border-radius: 20px;  background-image: url('{{ $user->profileImgUrl }}'); background-position: top middle; text-align: center; background-size: cover;"></div>


<div class="profile-section">
    <div class="pfp" style="margin-top: -100px;"><img class="avatar rounded" img src="/images/avatars/{{ $user->avatar }}"></div>
    <div class="username">
        <h1> {!! $user->displayName !!}
            <a href="{{ url('reports/new?url=') . $user->url }}">
                <i class="fas fa-exclamation-triangle fa-xs" data-toggle="tooltip" title="Click here to report this user." style="opacity: 50%; font-size:0.5em;"></i>
            </a>
        </h1>
    </div>
</div>
<div class="card">
<div class="card-header no-gutters justify-content-center" style="box-shadow: 0px 0px 6px 3px rgba(70, 0, 136, 0.03); display: flex;justify-content: space-between;padding: 10px;margin-bottom: 10px;">
    <div class="col col-md-1 text-center">
        <i class="fas fa-users"></i> {!! $user->rank->displayName !!}
    </div>

    <div class="col col-md-2 text-center">
        <i class="fas fa-link"></i>&nbsp;&nbsp;{!! $user->displayAlias !!}
    </div>

    <div class="col col-md-2 text-center">
        <i class="fas fa-calendar-alt"></i>&nbsp;&nbsp;{!! format_date($user->created_at, false) !!}
    </div>

    @if ($user->birthdayDisplay && isset($user->birthday))
        <div class="col col-md-2 text-center">
            <i class="fas fa-birthday-cake"></i> {!! $user->birthdayDisplay !!}
        </div>
        @endif

    @if ($user->settings->is_fto)
        <span class="badge badge-success" data-toggle="tooltip" title="This user has not owned any characters from this world before.">FTO</span>
    @endif
</div>
@if (isset($user->profile->parsed_text))
<div class="about-box" style="background-color: rgba(81, 20, 162, 0);">
    {!! $user->profile->parsed_text !!}
</div>
@endif
</div>
<hr>
<div class="card-deck mb-3 profile-assets" style="clear:both;">
    <div class="card profile-currencies profile-assets-card">
        <div class="card-header text-center" style="box-shadow: 0px 0px 6px 3px rgba(70, 0, 136, 0.03);">
                <h5>Bank</h5>
            </div>
        <div class="card-body text-center">
            <div class="profile-assets-content">
                @foreach ($user->getCurrencies(false, false, Auth::user() ?? null) as $currency)
                    <div>{!! $currency->display($currency->quantity) !!}</div>
                @endforeach
            </div>
            <div class="text-right"><a href="{{ $user->url . '/bank' }}">View all...</a></div>
        </div>
    </div>
    <div class="card profile-inventory profile-assets-card">
                <div class="card-header text-center" style="box-shadow: 0px 0px 6px 3px rgba(70, 0, 136, 0.03);">
                <h5>Inventory</h5>
            </div>
        <div class="card-body text-center">
            <div class="profile-assets-content">
                @if (count($items))
                    <div class="row">
                        @foreach ($items as $item)
                            <div class="col-md-3 col-6 profile-inventory-item">
                                @if ($item->imageUrl)
                                    <img src="{{ $item->imageUrl }}" data-toggle="tooltip" title="{{ $item->name }}" alt="{{ $item->name }}" />
                                @else
                                    <p>{{ $item->name }}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @else
                    <div>No items owned.</div>
                @endif
            </div>
            <div class="text-right"><a href="{{ $user->url . '/inventory' }}">View all...</a></div>
        </div>
    </div>
</div>

<div class="card">
<div class="card-header text-center" style="box-shadow: 0px 0px 6px 3px rgba(70, 0, 136, 0.03);">
    <h2><a href="{{ $user->url . '/characters' }}">Characters</a>
        @if (isset($sublists) && $sublists->count() > 0)
        @foreach ($sublists as $sublist)
        / <a href="{{ $user->url . '/sublist/' . $sublist->key }}">{{ $sublist->name }}</a>
        @endforeach
        @endif
        </h2>
</div>
    <div class="card-body">
        @foreach ($characters->take(4)->get()->chunk(4) as $chunk)
            <div class="row mb-4 justify-content-center">
             @foreach ($chunk as $character)
                <div class="col-md-3 col-6 text-center">
                    <div>
                     @if ((Auth::check() && Auth::user()->settings->content_warning_visibility == 0 && isset($character->character_warning)) || (isset($character->character_warning) && !Auth::check()))
                     <a href="{{ $character->url }}"><img src="{{ asset('images/content-warning.png') }}" class="img-thumbnail" alt="Content Warning - {{ $character->fullName }}" /></a>
                     @else
                     <a href="{{ $character->url }}"><img src="{{ $character->image->thumbnailUrl }}" class="img-thumbnail" alt="{{ $character->fullName }}" /></a>
                     @endif
                    </div>
                    <div class="mt-1">
                        <a href="{{ $character->url }}" class="h5 mb-0">
                         @if (!$character->is_visible)
                        <i class="fas fa-eye-slash"></i>
                         @endif {{ Illuminate\Support\Str::limit($character->fullName, 20, $end = '...') }}
                        </a>
                    </div>
                     @if ((Auth::check() && Auth::user()->settings->content_warning_visibility < 2 && isset($character->character_warning)) || (isset($character->character_warning) && !Auth::check()))
                    <div class="small">
                    <p><span class="text-danger"><strong>Character Warning:</strong></span> {!! nl2br(htmlentities($character->character_warning)) !!}</p>
                    </div>
                     @endif
                </div>
                 @endforeach
            </div>
        @endforeach
    <div class="text-right"><a href="{{ $user->url . '/characters' }}">View all...</a></div>
</div>
</div>
</div>
<hr class="mb-7"/>
    @if ($user->settings->allow_profile_comments)
            <div class="card">
            <button class="collapsible text-center"><h5>Show Comments ▾</h5></button>
                <div class="content">
                @comments(['model' => $user->profile, 'perPage' => 5])
            </div>

    @endif
@if ($deactivated)
</div>
@endif

<style>
.header-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.avatar {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.header {
width: 100%;
height: 250px;
background-size: cover;
background-position: center;
border-radius: 15px;
}
.profile-section {
display: flex;
align-items: center;
gap: 20px;
padding-left: 40px;
padding-top: 40px;
padding-bottom: 10px;
margin-top: -40px;
}
.pfp {
width: 160px;
height: 160px;
border-radius: 50%;
background-size: cover;
background-position: center;
}
.about-box {
background: rgba(255, 255, 255, 0.5);
border-radius: 20px;
padding: 25px;
margin-bottom: 20px;
}
.card-header {
    border-top-left-radius: 1.5em !important;
    border-top-right-radius: 1.5em !important;
}

@media (max-width: 768px) {
    .header {
        height: 180px;
    }
    .profile-section {
        flex-direction: column;
        align-items: center;
        padding-left: 0;
        padding-top: 20px;
        margin-top: -60px;
        text-align: center;
    }
    .pfp {
        width: 120px;
        height: 120px;
        margin-top: -40px !important;
    }
    .username h1 {
        font-size: 1.6rem;
        text-align: center;
        margin-top: -20px !important;
    }
    .about-box {
        margin-bottom: 20px;
        padding: 15px;
    }
}
</style>

<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>