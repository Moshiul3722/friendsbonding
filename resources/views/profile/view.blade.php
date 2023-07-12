<x-app-layout>
    <div class="page-header min-height-300 border-radius-xl"
        style="background-image: url({{ getAssetUrl(auth()->user()->profile->profileImg, 'storage/uploads') }}); background-position-y: 50%;">
        <span class="mask bg-gradient-primary opacity-6"></span>
    </div>
    <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <img class="w-100 border-radius-lg shadow-sm"
                        src="{{ getAssetUrl(auth()->user()->image, 'storage/uploads') }}" alt="profile_image">
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        {{ Auth::user()->name }}
                    </h5>
                    <p class="mb-0 font-weight-bold text-sm">
                        CEO / Co-Founder
                    </p>
                </div>
            </div>

        </div>
    </div>
    <div class="row" style="font-size: 18px">
        <div class="col-4 mt-4">
            <div class="card mb-4">
                <div class="card-body p-3">
                    <div class="col-xl-12 col-md-12 mb-xl-0 mb-4">
                        <div class="card card-blog card-plain">

                            <div class="card-body pb-0">
                                <div class="row">
                                    <div>
                                        <x-input-label for="fname" :value="__('Name :')" />
                                        <span>{{ ucfirst(trans(auth()->user()->name)) }}</span>
                                    </div>
                                    <div class="mt-1">
                                        <x-input-label for="fname" :value="__('Nick Name :')" />
                                        <span>{{ ucfirst(trans(auth()->user()->profile->uname)) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





    </div>

</x-app-layout>
