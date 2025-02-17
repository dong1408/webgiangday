@extends('layouts.admin')

@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0 ">Chỉnh sửa vai trò</h5>
                <div class="form-search form-inline">
                    <form action="#">
                        <input type="" class="form-control form-search" placeholder="Tìm kiếm">
                        <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                    </form>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.role.update', $role->id) }}" method="POST"></form>
                <div class="form-group">
                    <label for="name" class="text-strong">Tên vai trò</label>
                    <input type="text" name="name" value="{{ $role->name }}" class="form-control" id="name">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description" class="text-strong">Mô tả</label>
                    <textarea name="description" class="form-control" id="description" rows="3">{{ $role->description }}</textarea>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <strong>Danh sách quyền thuộc vai trò {{ $role->name }}</strong>
                <small class="form-text text-muted pb-2">Check vào module hoặc các hành động bên dưới để chọn
                    quyền.</small>

                <!-- List Permission  -->
                @foreach ($permissions as $moduleName => $modulePermission)
                    <div class="card my-4 border">
                        <div class="card-header">
                            <input type="checkbox" class="check-all" id="{{ $moduleName }}">
                            <label for="{{ $moduleName }}" class="m-0">
                                <strong>Module {{ $moduleName }}</strong>
                            </label>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($modulePermission as $permission)
                                    <div class="col-md-3">
                                        <input type="checkbox" name="permission_id[]" value="{{ $permission->id }}"
                                            {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}
                                            class="permission" id="{{ $permission->slug }}">
                                        <label for="{{ $permission->slug }}">{{ $permission->name }}</label>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
                <input type="submit" name="btn-add" class="btn btn-primary" value="Cập nhật">
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('.check-all').click(function() {
            $(this).closest('.card').find('.permission').prop('checked', this.checked)
        })
    </script>
@endsection
