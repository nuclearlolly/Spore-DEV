<div class="card p-2 badge-primary text-center my-md-3">
    <a class=" " a href="{{ url('users') }}"><i class="fas fa-users"></i> Users online: {{ App\Models\User\User::where('last_seen', '>=', Carbon\Carbon::now()->subMinutes(5))->count() }}</a>
</div>
<hr>
<style>
    .badge-primary {
    color: #2b0089ff
}
</style>