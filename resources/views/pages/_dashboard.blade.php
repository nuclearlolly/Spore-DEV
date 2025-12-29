<div class="row">
    <div class="col-md-2 text-center">
        <img src="/images/avatars/{{ Auth::user()->avatar }}" class="img-fluid rounded" style="max-height:160px" alt="{{ Auth::user()->name }}'s Avatar"/>
    </div>
    <div class="col-md-6">
        <h1>Welcome back</h1>
        <h1>{!! Auth::user()->displayName !!}!</h1>
    </div>
    <div class="col-6 col-md-2 text-center align-items-center" style="margin-bottom:10px;">
        <a href="{{ url(__('dailies.dailies')) }}"><img class="img-fluid" src="{{ asset('images/inventory.png') }}" style="height:120px; width:120px"/></a>
        <h5 class="card-title"><a href="{{ url(__('dailies.dailies')) }}">Dailies</a></h5>
    </div>
    <div class="col-6 col-md-2 text-center align-items-center" style="margin-bottom:10px;">
        <a href="{{ url('prompts/prompts') }}"><img class="img-fluid" src="{{ asset('images/inventory.png') }}" style="height:120px; width:120px"/></a>
        <h5 class="card-title"><a href="{{ url('prompts/prompts') }}">Prompts</a></h5>
    </div>
@include('widgets._dashboard_guide')
<div class="row">
    <div class="col-md-8">

        </div>
    <div class="col-md-4 mb-4 align-items-center">
        @include('widgets._news', ['textPreview' => true])
        </div>
        <hr class="mb-1">
        @include('widgets._sales')
        </div>
</div>



@include('widgets._recent_gallery_submissions', ['gallerySubmissions' => $gallerySubmissions])
