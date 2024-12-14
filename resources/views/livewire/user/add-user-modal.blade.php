@if(isset($user))
    <form action="{{ route('user-management.users.update', $user) }}" id="UserForm" method="POST"
          enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="hidden" name="id" value="{{ $user->id }}">
        @else
            <form action="{{ route('user-management.users.store') }}" method="POST" id="UserForm"
                  enctype="multipart/form-data">
                @endif
                @csrf

                @php
                    if(isset($user))
                      $col = 'col-md-6';
                    else
                       $col = 'col-md-4';
                @endphp


                <div class="row">
                    <div class="{{$col}} mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Full Name</label>
                        <input type="text" name="name" class="form-control form-control-solid-bg mb-2"
                               placeholder="Full Name" @isset($user) value="{{ $user->name }}" @endisset>
                    </div>

                    <div class="{{$col}} mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Email</label>
                        <input type="text" name="email" class="form-control form-control-solid-bg mb-2"
                               placeholder="example@domain.com" @isset($user) value="{{ $user->email }}" @endisset>
                    </div>

                    @if( !isset($user))
                        <div class="col-md-4 mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Password</label>
                            <input type="password" name="password" class="form-control form-control-solid-bg mb-2"
                                   placeholder="************">
                        </div>
                    @endif

                    <div class="col-md-6 mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Role</label>
                        <select id="select2_role" class="form-select form-select-solid" name="role_id"
                                data-placeholder="Select a Role">
                            <option></option>
                            @foreach($roles as $role)
                                <option value="{{$role->id}}" class="text-capitalize"
                                        @if(isset($user) && $user->hasRole($role->name)) selected @endif> {{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-12 form-group">
                        <input type="submit" class="btn btn-light-success btn-sm float-end" value="Submit"
                               id="btn-submit">
                    </div>
                </div>
            </form>
    </form>

    <script>
        $('#select2_role').select2({
            dropdownParent: $('#modal'),
        });
    </script>
