<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ route('index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Modules</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseGovernorates"
                   aria-expanded="false" aria-controls="collapseGovernorates">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Governorates
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseGovernorates" aria-labelledby="headingOne"
                     data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('governorates.index') }}">All</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCities"
                   aria-expanded="false" aria-controls="collapseCities">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Cities
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseCities" aria-labelledby="headingOne"
                     data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('cities.index') }}">All</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCategories"
                   aria-expanded="false" aria-controls="collapseCategories">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Categories
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseCategories" aria-labelledby="headingOne"
                     data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('categories.index') }}">All</a>
                    </nav>
                </div>
                {{-- clients --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseClients"
                   aria-expanded="false" aria-controls="collapseClients">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Clients
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseClients" aria-labelledby="headingOne"
                     data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('clients.index') }}">All</a>
                    </nav>
                </div>
                {{-- articles --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseArticles"
                   aria-expanded="false" aria-controls="collapseArticles">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Articles
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseArticles" aria-labelledby="headingOne"
                     data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('articles.index') }}">All</a>
                    </nav>
                </div>
{{--              communication Request      --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseContactus"
                   aria-expanded="false" aria-controls="collapseContactus">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Communication Request
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseContactus" aria-labelledby="headingOne"
                     data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('communication-requests.index') }}">All</a>
                    </nav>
                </div>
{{--                donation request--}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseDonation"
                   aria-expanded="false" aria-controls="collapseDonation">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Donation Request
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseDonation" aria-labelledby="headingOne"
                     data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('donation-requests.index') }}">All</a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>
