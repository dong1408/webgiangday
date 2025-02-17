@extends('layouts.admin')

@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Chỉnh sửa thông tin người dùng
            </div>
            <div class="card-body">
                <form action="{{ route('admin.user.update', $user->id) }}" method="POST"></form>
                    @csrf
                    <div class="form-group">
                        <label for="name">Họ và tên</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="name">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" value="{{ $user->email }}" class="form-control" id="email"
                            readonly>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    {{-- <div class="form-group">
                        {!! Form::label('password', 'Mật khẩu') !!}
                        {!! Form::password('password', ['class' => 'form-control', 'id' => 'password']) !!}
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! Form::label('password-confirm', 'Xác nhận mật khẩu') !!}
                        {!! Form::password('password_confirm', ['class' => 'form-control', 'id' => 'password-confirm']) !!}
                    </div> --}}
                    <div class="form-group">
                        @php
                            $list_role = $roles->pluck('name', 'id')->toArray();
                            $roleOfUser = $user->roles->pluck('id')->toArray();
                        @endphp
                        <label for="">Vai trò</label><br>
                        @foreach ($roles as $role)
                            <input type="checkbox" name="role_id[]" id="{{ $role->id }}" value="{{ $role->id }}"
                                {{ in_array($role->id, $roleOfUser) ? 'checked' : '' }}>
                            <label for="{{ $role->id }}">{{ $role->name }}</label><br>
                        @endforeach

                    </div>
                    <button type="submit" name="btn_add" class="btn btn-primary">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
@endsection
