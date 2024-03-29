<x-app-layout>
    <div class="page-header min-height-300 border-radius-xl"
        style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
        <span class="mask bg-gradient-primary opacity-6"></span>
    </div>
    <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <img src="../assets/img/bruce-mars.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
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

    <form method="POST" action="{{ route('addProfile') }}">
        @csrf
        <div class="row">
            <div class="col-4 mt-4">
                <div class="card mb-4">
                    <div class="card-body p-3">
                        <div class="col-xl-12 col-md-12 mb-xl-0 mb-4">
                            <div class="card card-blog card-plain">

                                <div class="card-body px-1 pb-0">
                                    <div class="row">
                                        <div class="col-6">
                                            <!-- First name Input Field -->
                                            <x-input-label for="fname" :value="__('First Name')" />
                                            <div class="mb-3">
                                                <x-text-input id="fname" name="fname" :value="old('fname')"
                                                    placeholder="First Name" required autofocus />

                                                <x-input-error :messages="$errors->get('fname')" class="mt-2" />
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <!-- Last name Input Field -->
                                            <x-input-label for="lname" :value="__('Last Name')" />
                                            <div class="mb-3">
                                                <x-text-input id="lname" name="lname" :value="old('lname')"
                                                    placeholder="Last Name" required autofocus />

                                                <x-input-error :messages="$errors->get('lname')" class="mt-2" />
                                            </div>


                                        </div>
                                    </div>

                                    <!-- Input Field -->
                                    <x-input-label for="uname" :value="__('User Name/ Nick Name')" />
                                    <div class="mb-3">
                                        <x-text-input id="uname" name="uname" :value="old('lname')" required autofocus
                                            autocomplete="uname" placeholder="User Name/ Nick Name" />

                                        <x-input-error :messages="$errors->get('uname')" class="mt-2" />
                                    </div>

                                    <!-- Group Radio Fields -->
                                    <x-input-label for="group" :value="__('Group')" />
                                    <div class="mb-3">
                                        <x-radio-component name="group" :options="[
                                            'science' => 'Science',
                                            'arts' => 'Arts',
                                            'businessStudy' => 'Business Study',
                                        ]" selected="science" />

                                        <x-input-error :messages="$errors->get('group')" class="mt-2" />
                                    </div>
                                    <div class="row">

                                        <div class="col-6">
                                            <!-- Batch Select Fields -->
                                            <div class="mb-3">
                                                <x-select-input name="batch" title="Batch no." autofocus
                                                    :options="[
                                                        'batch1' => '1998',
                                                        'batch2' => '1999',
                                                        'batch3' => '2000',
                                                    ]" selected="" />
                                            </div>

                                        </div>
                                        <div class="col-6">
                                            <!-- Session Select Fields -->
                                            <div class="mb-3">
                                                <x-select-input name="session" title="Session no." autofocus
                                                    :options="[
                                                        'batch1' => '1998',
                                                        'batch2' => '1999',
                                                        'batch3' => '2000',
                                                    ]" selected="" />
                                            </div>

                                        </div>
                                    </div>

                                    <!-- Registration Field -->

                                    <x-input-label for="regno" :value="__('Registration No.')" />
                                    <div class="mb-3">
                                        <x-text-input id="regno" name="regno" type="number" :value="old('regno')"
                                            required autofocus autocomplete="regno" placeholder="Registration No.." />

                                        <x-input-error :messages="$errors->get('regno')" class="mt-2" />
                                    </div>

                                    <!-- Date fo Birth Fields -->
                                    <x-input-label for="dob" :value="__('Date of Brith')" />
                                    <div class="mb-3">
                                        <x-text-input id="dob" name="dob" type="date" :value="old('dob')"
                                            required autofocus autocomplete="regno" />

                                        <x-input-error :messages="$errors->get('dob')" class="mt-2" />
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <!-- Religion groups -->
                                            <div class="mb-3">
                                                <x-select-input name="religion" title="Religion" autofocus
                                                    :options="[
                                                        'islam' => 'Islam',
                                                        'hinduism' => 'Hinduism',
                                                        'buddhism' => 'Buddhism',
                                                        'christianity' => 'Christianity',
                                                    ]" selected="" />

                                            </div>

                                        </div>
                                        <div class="col-6">
                                            <!-- Blood groups -->
                                            <div class="mb-3">
                                                <x-select-input name="blood-group" title="Blood Group" autofocus
                                                    :options="[
                                                        'a+' => 'A+',
                                                        'a-' => 'A-',
                                                        'b+' => 'B+',
                                                        'b-' => 'B-',
                                                        'o+' => 'O+',
                                                        'o-' => 'O+',
                                                        'ab+' => 'AB+',
                                                        'ab-' => 'AB+',
                                                    ]" selected="" />

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8 mt-4">
                <div class="card mb-4">
                    <div class="card-body p-3">
                        <div class="col-xl-12 col-md-12 mb-xl-0 mb-4">
                            <div class="card card-blog card-plain">
                                <div class="card-body px-1 pb-0">

                                    <div class="row">
                                        <div class="col-6">
                                            <!-- Mobile No Field -->
                                            <x-input-label for="mobile" :value="__('Mobile No.')" />
                                            <div class="mb-3">
                                                <x-text-input id="mobile" name="mobile" :value="old('mobile')" required
                                                    autofocus autocomplete="mobile" placeholder="Mobile No." />

                                                <x-input-error :messages="$errors->get('occupation')" class="mt-2" />
                                            </div>
                                        </div>
                                        <div class="col-6">

                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-6">
                                            <!-- Facebook No Field -->
                                            <x-input-label for="fbid" :value="__('Facebook ID:')" />
                                            <div class="mb-3">
                                                <x-text-input id="fbid" name="fbid" :value="old('fbid')"
                                                    required autofocus autocomplete="fbid"
                                                    placeholder="Facebook ID" />

                                                <x-input-error :messages="$errors->get('fbid')" class="mt-2" />
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <!-- Whats APP No Field -->
                                            <x-input-label for="whatapp" :value="__('Whats APP No.')" />
                                            <div class="mb-3">
                                                <x-text-input id="whatapp" name="whatapp" :value="old('whatapp')"
                                                    required autofocus autocomplete="whatapp"
                                                    placeholder="Whats App no." />

                                                <x-input-error :messages="$errors->get('whatapp')" class="mt-2" />
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-4">
                                            <!-- Occupation Field -->
                                            <x-input-label for="occupation" :value="__('Occupation')" />
                                            <div class="mb-3">
                                                <x-text-input id="occupation" name="occupation" :value="old('occupation')"
                                                    required autofocus autocomplete="occupation"
                                                    placeholder="Occupation" />

                                                <x-input-error :messages="$errors->get('occupation')" class="mt-2" />
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <!-- Organization Field -->
                                            <x-input-label for="organization" :value="__('Organization')" />
                                            <div class="mb-3">
                                                <x-text-input id="organization"
                                                    name="organization" :value="old('organization')" required autofocus
                                                    autocomplete="organization" placeholder="Organization" />

                                                <x-input-error :messages="$errors->get('organization')" class="mt-2" />
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <!-- Designation Field -->
                                            <x-input-label for="designation" :value="__('Designation')" />
                                            <div class="mb-3">
                                                <x-text-input id="designation"
                                                    name="designation" :value="old('Designation')" required autofocus
                                                    autocomplete="designation" placeholder="Designation" />

                                                <x-input-error :messages="$errors->get('designation')" class="mt-2" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">

                                            <!-- Office Address Field -->
                                            <x-input-label for="officeaddress" :value="__('Office Address')" />
                                            <div class="mb-3">
                                                <x-textarea-input name="officeaddress" id="officeaddress" rows="4" cols="50" :value="old('officeaddress')"/>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <!-- Emergency Contact Info -->
                                            <x-input-label for="emergencyContact" :value="__('Emergency Contact Info')" />
                                            <div class="mb-3">
                                                <x-textarea-input name="emergencyContact" rows="4" cols="50" :value="old('emergencyContact')"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <!-- Present Address Field -->

                                            <x-input-label for="presentadd" :value="__('Present Address')" />
                                            <div class="mb-3">
                                                <x-textarea-input name="presentadd" rows="4" cols="50" :value="old('presentadd')"/>
                                            </div>

                                        </div>
                                        <div class="col-6">
                                            <!-- Permanent Address Field -->
                                            <x-input-label for="permanentadd" :value="__('Permanent Address')" />
                                            <div class="mb-3">
                                                <x-textarea-input name="permanentadd" rows="4" cols="50" :value="old('permanentadd')"/>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body p-3">
                        <div class="col-xl-12 col-md-12 mb-xl-0 mb-4">
                            <div class="card card-blog card-plain">
                                <div class="card-body px-1 pb-0">

                                    <div class="row">
                                        <div class="col-6">
                                            <!-- Image Upload -->
                                            <x-input-label for="userImg" :value="__('Upload Image')" />
                                            <div class="mb-3">
                                                <input type="file" class="form-control" name="userImg"
                                                    id="userImg">
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            </div>

                                        </div>
                                        <div class="col-6">

                                            <!-- Profile Image Upload -->
                                            <x-input-label for="profileImg" :value="__('Profile Background Image')" />
                                            <div class="mb-3">
                                                <input type="file" class="form-control" name="profileImg"
                                                    id="profileImg">

                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4">
                                            <!-- Email Address -->
                                            <x-input-label for="email" :value="__('Email')" />
                                            <div class="mb-3">
                                                <x-text-input id="email" class="form-control" type="email"
                                                    name="email" :value="old('email')" required autofocus
                                                    autocomplete="username" placeholder="Email" aria-label="Email"
                                                    aria-describedby="email-addon" />

                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            </div>

                                        </div>
                                        <div class="col-4">
                                            <!-- Password -->
                                            <x-input-label for="password" :value="__('Password')" />
                                            <div class="mb-3">
                                                <x-text-input id="password" class="form-control" type="password"
                                                    name="password" required autocomplete="current-password"
                                                    placeholder="Password" />
                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                            </div>

                                        </div>
                                        <div class="col-4">
                                            <!-- Confirm Password -->
                                            <x-input-label for="password" :value="__('Confirm Password')" />
                                            <div class="mb-3">
                                                <x-text-input id="password" class="form-control" type="password"
                                                    name="password" required autocomplete="current-password"
                                                    placeholder="Confirm Password" />
                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">




            <div class="text-start">
                <x-primary-button class="btn bg-gradient-info w-20 mt-4 mb-0">
                    {{ __('Add Information') }}
                </x-primary-button>
            </div>
        </div>
    </form>






</x-app-layout>
