@extends('layouts.admin')

@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0 ">Danh sách lớp học</h5>
                <div class="form-search form-inline">
                    <form action="#">
                        <input type="hidden" name="status">
                        <input type="text" name="keyword" class="form-control form-search" placeholder="Tìm kiếm">
                        <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="analytic">
                    <a href="#" style="color: red!important" class="text-primary">Kích
                        hoạt<span class="text-muted">(0)</span></a>
                    <a href="#" style="color: red!important" class="text-primary">Vô hiệu
                        hóa<span class="text-muted">(1)</span></a>
                </div>
                <form action="" method="POST">
                    @csrf
                    <div class="form-action form-inline py-3">
                        <select class="form-control mr-1" id="" name="action">
                            <option>Chọn</option>
                            {{-- @foreach ($list_act as $k => $v)
                                <option value="{{ $k }}">{{ $v }}</option>
                            @endforeach --}}
                        </select>
                        <input type="submit" name="btn-apply" value="Áp dụng" class="btn btn-primary">
                    </div>
                    <table class="table table-striped table-checkall">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" name="checkall">
                                </th>
                                <th scope="col">#</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Thời gian</th>
                                <th scope="col">Lịch học</th>
                                <th scope="col">Loại</th>
                                <th scope="col">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?= $count = 0 ?>
                            @foreach ($courses as $course)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="list_check[]" value="">
                                    </td>
                                    <td><?= $count++ ?></td>
                                    <td scope="row"><img src="{{ $course->image_url }}" alt=""
                                            style="width: 90px; height:auto"></td>
                                    <td>{{ $course->name }}</td>
                                    <td>{{ date('d/m/Y', strtotime($course->start_date)) }} -
                                        {{ date('d/m/Y', strtotime($course->end_date)) }}</td>
                                    <td>
                                        <div class="schedule">
                                            @foreach ($course->weeklySchedules as $item)
                                                <p><strong>{{ $days[$item['day_of_week']] }}:
                                                    </strong>{{ \Carbon\Carbon::parse($item->start_time)->format('h:i A') }}
                                                    -
                                                    {{ \Carbon\Carbon::parse($item->end_time)->format('h:i A') }}</p>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td>Online</td>
                                    <td>
                                        @if ($status == 'active')
                                            <a href="" class="btn btn-success btn-sm rounded-0 text-white"
                                                type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                    class="fa fa-edit"></i></a>

                                            <a href="" class="btn btn-danger btn-sm rounded-0 text-white"
                                                type="button" data-toggle="tooltip" data-placement="top" title="Delete"
                                                onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i
                                                    class="fa fa-trash"></i></a>
                                        @else
                                            <a href="" class="btn btn-success btn-sm rounded-0 text-white"
                                                type="button" data-toggle="tooltip" data-placement="top" title="Restore"
                                                onclick="return confirm('Bạn có muốn khôi phục?')"><i
                                                    class="fa-solid fa-trash-can-arrow-up"></i></a>
                                            <a href="" class="btn btn-danger btn-sm rounded-0 text-white"
                                                type="button" data-toggle="tooltip" data-placement="top"
                                                title="Force Delete"
                                                onclick="return confirm('Bạn có chắc chắn muốn xóa vĩnh viễn khỏi hệ thống?')"><i
                                                    class="fa fa-times" aria-hidden="true"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection
