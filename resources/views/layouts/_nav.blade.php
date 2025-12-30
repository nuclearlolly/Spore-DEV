<nav class="navbar navbar-expand-md navbar-dark bg-dark" id="headerNav">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img class="img-fluid" src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/9a7ad07f-4b02-4a9f-baec-6981cebc1ebb/dl6m97c-5b6cdfaa-495e-4631-808c-d29824602405.png/v1/fill/w_1280,h_377/loho_by_nuclearlolly_dl6m97c-fullview.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9Mzc3IiwicGF0aCI6Ii9mLzlhN2FkMDdmLTRiMDItNGE5Zi1iYWVjLTY5ODFjZWJjMWViYi9kbDZtOTdjLTViNmNkZmFhLTQ5NWUtNDYzMS04MDhjLWQyOTgyNDYwMjQwNS5wbmciLCJ3aWR0aCI6Ijw9MTI4MCJ9XV0sImF1ZCI6WyJ1cm46c2VydmljZTppbWFnZS5vcGVyYXRpb25zIl19.ECu686IdukYJGsHz4woaLXDtIOJlBJiM8lRxPwmhH_k" style="height:35px"/>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    @if (Auth::check() && Auth::user()->is_news_unread && Config::get('lorekeeper.extensions.navbar_news_notif'))
                        <a class="nav-link d-flex text-warning" href="{{ url('news') }}"><strong>News </strong><i class="fas fa-bell fa-shakealert-icon"></i></a>
                    @else
                        <a class="nav-link" href="{{ url('news') }}">News</a>
                    @endif
                </li>
                <li class="nav-item">
                    @if (Auth::check() && Auth::user()->is_sales_unread && Config::get('lorekeeper.extensions.navbar_news_notif'))
                        <a class="nav-link d-flex text-warning" href="{{ url('sales') }}"><strong>Sales </strong><i class="fas fa-bell fa-shakealert-icon"></i></a>
                    @else
                        <a class="nav-link" href="{{ url('sales') }}">Sales</a>
                    @endif
                </li>
                <li class="nav-item">
                        @if (Auth::check() && Auth::user()->is_raffles_unread && config('lorekeeper.extensions.navbar_news_notif'))
                            <a class="nav-link d-flex text-warning" href="{{ url('raffles') }}">
                                Raffles <i class="fas fa-bell fa-shakealert-icon"></i>
                            </a>
                        @else
                            <a class="nav-link" href="{{ url('raffles') }}">
                                Raffles
                            </a>
                        @endif
                </li>
                    <li class="nav-item dropdown">
                        <a id="inventoryDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Resources
                        </a>

                        <div class="dropdown-menu" aria-labelledby="inventoryDropdown">
                            <a class="dropdown-item" href="{{ url('info/Rules') }}">
                                <i class="fas fa-list"></i> Rules
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ url('faq') }}">
                            <i class="fas fa-star"></i> Newbie Guide
                            </a>
                            <a class="dropdown-item" href="{{ url('faq') }}">
                            <i class="fas fa-award"></i> Achievements
                            </a>
                        </div>
                    </li>

<li class="nav-item dropdown megamenu">
    <a id="loreDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        Galaxy
    </a>
        <div class="dropdown-menu" aria-labelledby="inventoryDropdown">
                <div class="p-2">
                  <div class="row">
                    <div class="col-sm-4">
                      <h6 class="font-weight-bold text-uppercase text-center">Explore</h6>
                      <div class="dropdown-divider"></div>
                      <ul class="list-unstyled">
                        <a class="dropdown-item" a href="{{ url('shops') }}"><i class="fas fa-coins"></i> Shops</a>
                        <a class="dropdown-item" a href="{{ url('world/item-index') }}"><i class="fas fa-book"></i> Items</a>
                        <a class="dropdown-item" a href="{{ url('gallery') }}"> <i class="fas fa-palette"></i> Gallery</a>
                        <a class="dropdown-item" a href="{{ url(__('dailies.dailies')) }}"><i class="fas fa-clipboard-list"></i> Dailies</a>
                      </ul>
                    </div>
                    <div class="col-sm-4">
                      <h6 class="font-weight-bold text-uppercase text-center">Activities</h6>
                      <div class="dropdown-divider"></div>
                      <ul class="list-unstyled">
                        <a class="dropdown-item" a href="{{ url('prompts') }}"><i class="fas fa-pen"></i> Prompts</a>
                        <a class="dropdown-item" a href="{{ url(__('dailies.dailies')) }}"><i class="fas fa-clipboard-list"></i> Fetch Quests</a>
                        <a class="dropdown-item" a href="{{ url('shops') }}"><i class="fas fa-award"></i> Forage</a>
                        <a class="dropdown-item" a href="{{ url('shops') }}"><i class="fas fa-award"></i> Encounters</a>
                      </ul>
                    </div>
                    <div class="col-sm-4">
                      <h6 class="font-weight-bold text-uppercase text-center">Fauna</h6>
                      <div class="dropdown-divider"></div>
                      <ul class="list-unstyled">
                        <a class="dropdown-item" a href="{{ url('users') }}"><i class="fas fa-users"></i> Users</a>
                        <a class="dropdown-item" a href="{{ url('masterlist') }}"><i class="fas fa-star"></i> Species</a>
                        <a class="dropdown-item" a href="{{ url('sublist/NPC') }}"><i class="fas fa-star"></i> NPCs</a>
                      </ul>
                    </div>
                  </div>
                </div>
        </div>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                @include('layouts._searchindexbar')
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    @if (Auth::user()->isStaff)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('admin') }}"><i class="fas fa-crown"></i></a>
                        </li>
                    @endif
                    @if (Auth::user()->notifications_unread)
                        <li class="nav-item">
                            <a class="nav-link btn btn-secondary btn-sm" href="{{ url('notifications') }}"><span class="fas fa-envelope"></span> {{ Auth::user()->notifications_unread }}</a>
                        </li>
                    @endif

                    <li class="nav-item dropdown">
                        <a id="browseDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Submit
                        </a>

                        <div class="dropdown-menu" aria-labelledby="browseDropdown">
                            <a class="dropdown-item" href="{{ url('submissions/new') }}">
                                Submit Prompt
                            </a>
                            <a class="dropdown-item" href="{{ url('claims/new') }}">
                                Submit Claim
                            </a>
                            <a class="dropdown-item" href="{{ url('reports/new') }}">
                                Submit Report
                            </a>
                        </div>
                    </li>

    <img src="/images/avatars/{{ Auth::user()->avatar }}" class="rounded text-center align-self-center" height="40" width="40" alt="{{ Auth::user()->name }}'s Avatar"/>
    <li class="nav-item dropdown megamenu">
        <a id="loreDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> {{ Auth::user()->name }} <span class="caret"></span></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="inventoryDropdown">
                <div class="p-2">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="font-weight-bold text-uppercase text-center">My Characters</h6>
                      <div class="dropdown-divider"></div>
                      <ul class="list-unstyled">
                        <a class="dropdown-item" a href="{{ url('characters') }}"><i class="fas fa-star"></i> Characters</a>
                        <a class="dropdown-item" a href="{{ url('characters/myos') }}"><i class="fas fa-heart"></i> MYO Slots</a>
                        <a class="dropdown-item" a href="{{ url('characters/transfers/incoming') }}"><i class="fas fa-arrow-right"></i> Transfers</a>
                      </ul>
                    </div>
                    <div class="col-sm-3">
                      <h6 class="font-weight-bold text-uppercase text-center">My Stuff</h6>
                      <div class="dropdown-divider"></div>
                      <ul class="list-unstyled">
                        <a class="dropdown-item" a href="{{ url('account/bookmarks') }}"><i class="fas fa-bookmark"></i> Bookmarks</a>
                        <a class="dropdown-item" a href="{{ Auth::user()->url . '/character-designs' }}"><i class="fas fa-palette"></i> Designs</a>
                        <a class="dropdown-item" a href="{{ url('inventory') }}"><i class="fas fa-box"></i> Inventory</a>
                        <a class="dropdown-item" a href="{{ url('bank') }}"><i class="fas fa-wallet"></i> Bank</a>
                      </ul>
                    </div>
                    <div class="col-sm-3">
                      <h6 class="font-weight-bold text-uppercase text-center">Redeem</h6>
                      <div class="dropdown-divider"></div>
                      <ul class="list-unstyled">
                        <a class="dropdown-item" a href="{{ Auth::user()->url }}"><i class="fas fa-inbox"></i> Mail</a>
                        <a class="dropdown-item" a href="{{ url('redeem-code') }}"><i class="fas fa-code"></i> Redeem Code</a>
                        <a class="dropdown-item" a href="{{ url('') }}"><i class="fas fa-gifts"></i> Supporter</a>
                        <a class="dropdown-item" a href="{{ url('trades/open')}}"><i class="fas fa-arrow-right"></i> Trades</a>

                      </ul>
                    </div>
                    <div class="col-sm-3">
                      <h6 class="font-weight-bold text-uppercase text-center">My Account</h6>
                      <div class="dropdown-divider"></div>
                      <ul class="list-unstyled">
                        <a class="dropdown-item" a href="{{ Auth::user()->url }}"><i class="fas fa-user"></i> Profile</a>
                        <a class="dropdown-item" a href="{{ url('notifications') }}"><i class="fas fa-bell"></i> Notifications</a>
                        <a class="dropdown-item" a href="{{ url('account/settings') }}"><i class="fas fa-cog"></i> Settings</a>
                        <a class="dropdown-item" a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                      </ul>
                    </div>
                </div>
            </div>
        </li>
    </ul>
                @endguest
            </ul>
        </div>
    </div>
</nav>