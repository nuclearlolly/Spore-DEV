@if (Auth::user()->settings->is_guide_active == 1 && $guide->is_visible == 1)
    <div class="card mb-4">
        <div class="card-header">
            <x-admin-edit title="Guide" :object="$guide" />
            <h4 class="text-center">{!! $guide->title !!}</h4>
        </div>
        <div class="card-body">
            {!! $guide->parsed_text !!}
        </div>
        <div class="card-footer">
        <div class="d-flex flex-row align-items-center justify-content-between">
            <span class="text-right"><b>You can hide this pop-up by clicking the button at the right. If you miss it, you can change its visibility back in <a href="{{ url('account/settings')}}">your settings</a>.</b></span>
            {!! Form::open(['url' => 'account/guideHome', 'class' => 'text-right']) !!}
            {!! Form::submit('I understand - Dot not show', ['class' => 'btn btn-primary', 'name' => 'action']) !!}
            {!! Form::close() !!}
        </div>
    </div>
        </div>
    </div>

@endif
