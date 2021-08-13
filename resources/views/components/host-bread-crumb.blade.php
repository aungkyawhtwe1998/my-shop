<div class="row">
    <div class="col-12 colt-lg-6">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent">
                <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
                {{ $slot }}
            </ol>
        </nav>
    </div>
</div>
