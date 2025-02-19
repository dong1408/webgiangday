@extends('layouts.admin')

@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Thêm Khóa Học Mới
            </div>
            <div class="card-body">
                <form action="{{ route('admin.course.store') }}" method="POST">
                    @csrf
                    <button type="submit">Create google meet link</button>
                </form>
                <form action="{{ route('admin.course.store') }}" method="POST">
                    @csrf

                    {{-- <div class="mb-3">
                    <label for="course_id" class="form-label">Khóa học</label>
                    <select class="form-control" name="course_id" id="course_id" required>
                        <option value="">Chọn khóa học</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                </div> --}}

                    {{-- <div class="mb-3">
                    <label for="subject_id" class="form-label">Môn học</label>
                    <select class="form-control" name="subject_id" id="subject_id" required>
                        <option value="">Chọn môn học</option>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                </div> --}}

                    <div class="form-group">
                        <label for="name" class="form-label">Tên khóa học</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label">Mô Tả Khóa Học</label>
                        <textarea class="form-control" name="description" rows="4"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="grade_level" class="form-label">Khối lớp</label>
                        <input type="number" class="form-control" name="grade_level" id="grade_level" min="1"
                            max="12" required>
                    </div>

                    <div class="form-group">
                        <label for="start_date" class="form-label">Ngày Bắt Đầu</label>
                        <input type="date" class="form-control" name="start_date" required>
                    </div>

                    <div class="form-group">
                        <label for="end_date" class="form-label">Ngày Kết Thúc</label>
                        <input type="date" class="form-control" name="end_date" required>
                    </div>

                    <div class="form-group">
                        <label for="price" class="form-label">Giá Khóa Học</label>
                        <input type="number" class="form-control" name="price" step="0.01" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Loại lớp học</label>
                        <select class="form-control" name="class_type" id="class_type" required>
                            <option value="offline">Offline</option>
                            <option value="online">Online</option>
                        </select>
                    </div>

                    <div class="form-group" id="location_field">
                        <label for="location" class="form-label">Địa điểm (Offline)</label>
                        <input type="text" class="form-control" name="location" id="location">
                    </div>

                    <div class="form-group" id="google_meet_field" style="display: none;">
                        <label for="google_meet_link" class="form-label">Google Meet Link (Online)</label>
                        <input type="url" class="form-control" name="google_meet_link" id="google_meet_link">
                    </div>

                    <h4>Thêm Lịch Học</h4>
                    <div id="schedule-container">
                        <div class="schedule-item border p-3 mb-2">
                            <label class="form-label">Ngày trong tuần</label>
                            <select class="form-control" name="schedules[0][day_of_week]" required>
                                <option value="1">Thứ Hai</option>
                                <option value="2">Thứ Ba</option>
                                <option value="3">Thứ Tư</option>
                                <option value="4">Thứ Năm</option>
                                <option value="5">Thứ Sáu</option>
                                <option value="6">Thứ Bảy</option>
                                <option value="7">Chủ Nhật</option>
                            </select>

                            <label class="form-label mt-2">Giờ bắt đầu</label>
                            <input type="time" class="form-control" name="schedules[0][start_time]" required>

                            <label class="form-label mt-2">Giờ kết thúc</label>
                            <input type="time" class="form-control" name="schedules[0][end_time]" required>

                            <button type="button" class="btn btn-danger btn-sm mt-2 remove-schedule">Xóa</button>
                        </div>
                    </div>

                    <button type="button" class="btn btn-secondary" id="add-schedule">Thêm lịch học</button>
                    <button type="submit" class="btn btn-primary">Tạo lớp học</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('.check-all').click(function() {
            $(this).closest('.card').find('.permission').prop('checked', this.checked)
        });

        document.getElementById('class_type').addEventListener('change', function() {
            let type = this.value;
            document.getElementById('location_field').style.display = (type === 'offline') ? 'block' : 'none';
            document.getElementById('google_meet_field').style.display = (type === 'online') ? 'block' : 'none';
        });

        document.addEventListener("DOMContentLoaded", function() {
            let scheduleIndex = 1;
            document.getElementById("add-schedule").addEventListener("click", function() {
                let container = document.getElementById("schedule-container");
                let newSchedule = container.firstElementChild.cloneNode(true);
                newSchedule.querySelectorAll("input, select").forEach(el => {
                    el.name = el.name.replace(/\d+/, scheduleIndex);
                    el.value = "";
                });
                newSchedule.querySelector(".remove-schedule").addEventListener("click", function() {
                    this.parentElement.remove();
                });
                container.appendChild(newSchedule);
                scheduleIndex++;
            });

            document.querySelectorAll(".remove-schedule").forEach(button => {
                button.addEventListener("click", function() {
                    this.parentElement.remove();
                });
            });
        });
    </script>
@endsection
