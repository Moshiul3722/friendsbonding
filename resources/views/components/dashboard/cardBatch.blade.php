@props(['backgroundImage'])

<div class="col-lg-4">
    <div class="card h-100 p-3">
        <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100"
            style="background-image: url('{{ $backgroundImage }}');">
            <span class="mask bg-gradient-dark"></span>
            <div
                class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3 justify-content-center align-items-center">
                <h5 class="text-white font-weight-bolder my-6 h2">{{ $title }}</h5>
            </div>
        </div>
    </div>
</div>
