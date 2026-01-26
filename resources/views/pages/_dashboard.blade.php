@include('widgets._online_count')
<div class="row">
    <div class="col-md-2 text-center">
        <img src="/images/avatars/{{ Auth::user()->avatar }}" class="img-fluid rounded" style="max-height:160px" alt="{{ Auth::user()->name }}'s Avatar" />
    </div>
    <div class="col-md-6">
        <h1>Welcome back</h1>
        <h1>{!! Auth::user()->displayName !!}!</h1>
    </div>
    <div class="col-6 col-md-2 text-center align-items-center" style="margin-bottom:10px;">
        <a href="{{ url(__('dailies.dailies')) }}"><img class="img-fluid" src="{{ asset('images/inventory.png') }}" style="height:120px; width:120px" /></a>
        <h5 class="card-title"><a href="{{ url(__('dailies.dailies')) }}">Dailies</a></h5>
    </div>
    <div class="col-6 col-md-2 text-center align-items-center" style="margin-bottom:10px;">
        <a href="{{ url('prompts/prompts') }}"><img class="img-fluid" src="{{ asset('images/inventory.png') }}" style="height:120px; width:120px" /></a>
        <h5 class="card-title"><a href="{{ url('prompts/prompts') }}">Shops</a></h5>
    </div>
</div>
@include('widgets._dashboard_guide')
<div class="row">
    <div class="col-md-8">
        @include('widgets._carousel')
        <hr class="mb-1 align-items-center" style="margin-top: 15px;">
        <div class="card my-2 text-center">
            <div class="card-header">
                <h4 class="mb-0"><i class="fas fa-money-bill-wave"></i> Check-in</h4>
            </div>
            <div class="card-body" style="padding-top: 0px;">
                <div class="row align-items-center text-left">
                    <div class="col-md-6">
                        <h5 class="mb-0">
                            <div class="sidebar-header">Activities</div>
                        </h5>
                        <div class="sidebar-section p-2" style="height:130px;">
                            <a class="dropdown-item" a href="{{ url('prompts') }}" style="font-family: Raleway;letter-spacing: 1px;text-transform: uppercase;font-weight: 900;"><i class="fas fa-pen"></i> Prompts</a>
                            <a class="dropdown-item" a href="{{ url('shops') }}" style="font-family: Raleway;letter-spacing: 1px;text-transform: uppercase;font-weight: 900;"><i class="fas fa-tree"></i> Forage</a>
                            <a class="dropdown-item" a href="{{ url('shops') }}" style="font-family: Raleway;letter-spacing: 1px;text-transform: uppercase;font-weight: 900;"><i class="fas fa-map"></i> Explore</a>
                            <a class="dropdown-item" a href="{{ url(__('dailies.dailies')) }}" style="font-family: Raleway;letter-spacing: 1px;text-transform: uppercase;font-weight: 900;"><i class="fas fa-clipboard-list"></i> Fetch Quests</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5 class="mb-0">
                            <div class="sidebar-header">Hoard</div>
                        </h5>
                        <div class="sidebar-section p-2" style="height:130px;">
                            <a class="dropdown-item" a href="{{ url('users') }}" style="font-family: Raleway;letter-spacing: 1px;text-transform: uppercase;font-weight: 900;"><i class="fas fa-award"></i> Achievements</a>
                            <a class="dropdown-item" a href="{{ url('masterlist') }}" style="font-family: Raleway;letter-spacing: 1px;text-transform: uppercase;font-weight: 900;"><i class="fas fa-book"></i> Collections</a>
                            <a class="dropdown-item" a href="{{ url('shops') }}" style="font-family: Raleway;letter-spacing: 1px;text-transform: uppercase;font-weight: 900;"><i class="fas fa-award"></i> Craft</a>
                            <a class="dropdown-item" a href="{{ url('shops') }}" style="font-family: Raleway;letter-spacing: 1px;text-transform: uppercase;font-weight: 900;"><i class="fas fa-award"></i> Cultivate</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
</div>
    <div class="col-md-4 mb-4 align-items-center">
        @include('widgets._news', ['textPreview' => true])
        <hr class="mb-1 align-items-center">
        @include('widgets._sales')
    </div>
</div>
@include('widgets._recent_gallery_submissions', ['gallerySubmissions' => $gallerySubmissions])

<style>
    .mb-4 {
        margin-bottom: 0rem !important;
    }
</style>
