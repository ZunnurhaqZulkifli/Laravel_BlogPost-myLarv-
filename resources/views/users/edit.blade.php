@extends('layout')

@section('content')
    <div class="display-3 text-light mb-3">{{ $user->name }}'s Profile Editor</div>
    <form method="POST" enctype="multipart/form-data" action="{{ route('users.update', ['user' => $user->id]) }}"
        class="form-horizontal border-white card bg-transparent">

        @csrf
        @method('PUT')

        <div class="row p-2">
            <div class="col-4">
                <div class="text-center">
                    <img src="{{ $user->image ? $user->image->url() : '' }}" class="card img-thumbnail avatar img-fluid"
                        style="height:345px;width:350px;" />
                </div>
            </div>

            <div class="col-8">
                <div class="card border-white bg-transparent">
                    <div class="p-3">
                        <div class="display-6 text-light text-center">Edit Your Profile</div>

                        <div class="form-group">
                            <label class="text-light">{{ __('Name') }} : </label>
                            <input class="text-white form-control" placeholder="{{ $user->name }}" value=""
                                type="text" />
                        </div>

                        <div class="form-group mt-2">
                            <label class="text-light">Default {{ __('Language') }} : </label>
                            <select class="form-control text-light" name="locale">
                                @foreach (App\User::LOCALES as $locale => $label)
                                    <option class="text-light" value="{{ $locale }}"
                                        {{ $user->locale !== $locale ?: 'selected' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        @errors @enderrors

                        <div class="mt-4 text-center mb-2">
                            <h6 class="text-light">Upload a different photo</h6>
                            <input class="form-control-file text-white" type="file" name="avatar" />
                        </div>

                        <div class="form-group">
                            <input type="submit" class="mt-2 w-100 btn btn-outline-zunnur" value="Save Changes" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
