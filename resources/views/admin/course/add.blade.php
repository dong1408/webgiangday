@extends('layouts.admin')

@section('integration_file_manage')
    <script type="text/javascript"
        src='https://cdn.tiny.cloud/1/qbw7rset86a37udw8sv86njuneptk0ctw88a570llag2w9od/tinymce/5/tinymce.min.js'
        referrerpolicy="origin"></script>
    <script type="text/javascript">
        var editor_config = {
            path_absolute: "http://localhost:8000/admin/",
            selector: '#description',
            relative_urls: false,
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table directionality",
                "emoticons template paste textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            file_picker_callback: function(callback, value, meta) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName(
                    'body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document
                    .getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
                if (meta.filetype == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.openUrl({
                    url: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no",
                    onMessage: (api, message) => {
                        callback(message.content);
                    }
                });
            }
        };

        tinymce.init(editor_config);
    </script>
@endsection

@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if (session('fail'))
                <div class="alert alert-danger">
                    {{ session('fail') }}
                </div>
            @endif
            @if (session('clearLocalStorage'))
                <script>
                    localStorage.removeItem("courseFormData");
                </script>
            @endif
            <div class="card-header font-weight-bold">
                Thêm Khóa Học Mới
            </div>
            <div class="card-body">
                <form id="courseForm" action="{{ route('admin.course.store') }}" method="POST" enctype="multipart/form-data"
                    novalidate>
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
                        <label for="name" class="form-label">Tên khóa học<span class="required-label">*</span></label>
                        <input type="text" class="form-control" name="course_name" id="course_name" required>
                        @error('course_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <small class="error" id="course_name_error">Vui lòng nhập tên khóa học</small>
                    </div>

                    <div class="form-group">
                        <label for="short-desc" class="form-label">Mô tả ngắn<span class="required-label">*</span></label>
                        <textarea class="form-control" name="short_desc" id="short-desc" rows="4"></textarea>
                        @error('short_desc')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <small class="error" id="short_desc_error">Vui lòng nhập nội dung mô tả ngắn cho khóa học</small>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Loại khóa học<span class="required-label">*</span></label>
                        <select class="form-control" name="course_type" id="course_type" required>
                            <option value="offline" {{ old('course_type') == 'offline' ? 'selected' : '' }}>Offline</option>
                            <option value="online" {{ old('course_type') == 'online' ? 'selected' : '' }}>Online</option>
                        </select>
                        <small class="error" id="course_type_error">Vui lòng chọn loại khóa học online hoặc offline</small>
                    </div>

                    <div class="form-group" id="location_field" style="display: none">
                        <label for="location" class="form-label">Địa điểm (Offline)</label>
                        <input type="text" class="form-control" name="location" id="location"
                            value="{{ old('location', 'Trung Chánh, Hóc Môn, tp Hồ Chí Minh') }}">
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label">Mô Tả Khóa Học</label>
                        <textarea class="form-control" id="description" name="description" rows="20"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="grade_level" class="form-label">Khối lớp<span class="required-label">*</span></label>
                        <input type="number" class="form-control" name="grade_level" id="grade_level" min="1"
                            max="12" required>
                        @error('grade_level')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <small class="error" id="grade_level_error">Vui lòng chọn khối lớp từ 1 đến 12</small>
                    </div>

                    <div class="form-group">
                        <label for="max-students" class="form-label">Số lượng học sinh tối đa<span
                                class="required-label">*</span></label>
                        <input type="number" class="form-control" name="max_students" id="max-students" step="1"
                            min="1" max="1000" required>
                        @error('max_students')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <small class="error" id="max_students_error">Vui lòng chọn số lượng học sinh tối đa cho khóa
                            học</small>
                    </div>

                    <div class="form-group">
                        <label for="start_date" class="form-label">Ngày Bắt Đầu<span class="required-label">*</span></label>
                        <input type="date" class="form-control" id="startDate" name="start_date" required>
                        @error('start_date')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <small class="error" id="start_date_error">Vui lòng chọn ngày bắt đầu</small>
                    </div>

                    <div class="form-group">
                        <label for="end_date" class="form-label">Ngày Kết Thúc<span
                                class="required-label">*</span></label>
                        <input type="date" class="form-control" id="endDate" name="end_date" required>
                        @error('end_date')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <small class="error" id="end_date_error_require">Vui lòng chọn ngày kết thúc</small>
                        <small class="error" id="end_date_error">Ngày kết thúc phải sau ngày bắt đầu ít nhất 1
                            tháng</small>
                    </div>

                    <div class="form-group">
                        <label for="formatted_price" class="form-label">Giá Khóa Học <span
                                class="required-label">*</span></label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="formatted_price" required>
                            <span class="input-group-text">VNĐ</span>
                        </div>
                        @error('price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <input type="hidden" name="price" id="price">
                    </div>

                    <div class="form-group">
                        <label for="">Ảnh khóa học<span class="required-label">*</span></label><br>
                        <label for="imageCourse" class="custom-file-upload">Chọn ảnh</label>
                        <input type="file" name="image_course" id="imageCourse" accept="image/*">
                        <img id="previewImage" src="" alt="Ảnh xem trước" style="max-width: 200px">
                        <small class="error" id="image_course_error">Vui lòng chọn ảnh</small>
                        @error('image_course')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <h4>Thêm Lịch Học <span class="required-label">*</span></h4>
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
                                <option value="0">Chủ Nhật</option>
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

    <style scoped>
        .required-label {
            color: red;
            margin-left: 5px;
        }

        .error {
            color: red;
            font-size: 14px;
            display: none;
        }

        /* Ẩn input file gốc */
        #imageCourse {
            display: none;
        }

        /* Nút chọn ảnh tùy chỉnh */
        .custom-file-upload {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .custom-file-upload:hover {
            background-color: #0056b3;
        }

        /* Hiển thị ảnh xem trước */
        #previewImage {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
            display: none;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
    </style>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const googleCheckTokenUrl = "{{ secure_url(route('google.check_token', [], false)) }}";

        document.addEventListener("DOMContentLoaded", function() {
            restoreFormData();

            let course_type = document.getElementById('course_type').value;
            document.getElementById('location_field').style.display = (course_type === 'offline') ? 'block' :
                'none';

            document.getElementById("add-schedule").addEventListener("click", function() {
                console.log("aaaa");
                addSchedule();
            });
            document.querySelectorAll(".remove-schedule").forEach(button => {
                button.addEventListener("click", function() {
                    this.parentElement.remove();
                    saveFormData();
                });
            });


            // =============== validate ngày ===================== // 
            let today = new Date().toISOString().split("T")[0];
            let startDate = document.getElementById("startDate");
            let endDate = document.getElementById("endDate");
            startDate.setAttribute("min", today);
            startDate.addEventListener("change", function() {
                if (!startDate.value) return;
                let start = new Date(startDate.value);
                let minEndDate = new Date(start);
                minEndDate.setMonth(minEndDate.getMonth() + 1);
                let minEndDateStr = minEndDate.toISOString().split("T")[0];
                endDate.setAttribute("min", minEndDateStr);
                if (!endDate.value || endDate.value < minEndDateStr) {
                    endDate.value = minEndDateStr;
                }
            });
            endDate.addEventListener("change", function() {
                if (!startDate.value || !endDate.value) return;
                let start = new Date(startDate.value);
                let end = new Date(endDate.value);
                let minEndDate = new Date(start);
                minEndDate.setMonth(minEndDate.getMonth() + 1);
                if (end < minEndDate) {
                    alert("Ngày kết thúc phải sau ngày bắt đầu ít nhất 1 tháng!");
                    endDate.value = minEndDate.toISOString().split("T")[0];
                }
            });
            // Ngăn người dùng nhập thủ công ngày trong quá khứ
            startDate.addEventListener("input", function() {
                if (startDate.value < today) {
                    startDate.value = today;
                }
            });
            endDate.addEventListener("input", function() {
                if (endDate.value < today) {
                    endDate.value = today;
                }
            });
        });


        document.getElementById('imageCourse').addEventListener('change', function(event) {
            let file = event.target.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    let preview = document.getElementById('previewImage');
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });

        // trigger event remove schedule
        function triggerEventRemobeSchedule() {
            document.querySelectorAll(".remove-schedule").forEach(button => {
                button.addEventListener("click", function() {
                    this.parentElement.remove();
                    saveFormData();
                });
            });
        }

        // ============ Validate submit form =================== //
        document.getElementById("courseForm").addEventListener("submit", function(e) {
            e.preventDefault();
            let isValid = true;

            // Validate tên khóa học
            let courseName = document.getElementById("course_name").value.trim();
            if (courseName === "") {
                document.getElementById("course_name_error").style.display = "block";
                isValid = false;
            } else {
                document.getElementById("course_name_error").style.display = "none";
            }

            // Validate mô tả ngắn
            let shortDesc = document.getElementById("short-desc").value.trim();
            if (shortDesc === "") {
                document.getElementById("short_desc_error").style.display = "block";
                isValid = false;
            } else {
                document.getElementById("short_desc_error").style.display = "none";
            }

            // Validate khối lớp
            let gradeLevel = parseInt(document.getElementById("grade_level").value, 10);
            if (isNaN(gradeLevel) || gradeLevel < 1 || gradeLevel > 12) {
                document.getElementById("grade_level_error").style.display = "block";
                isValid = false;
            } else {
                document.getElementById("grade_level_error").style.display = "none";
            }


            // Validate số lượng học sinh tối đa
            let maxStudents = parseInt(document.getElementById("max-students").value, 10);
            if (isNaN(maxStudents) || gradeLevel < 1 || gradeLevel > 1000) {
                document.getElementById("max_students_error").style.display = "block";
                isValid = false;
            } else {
                document.getElementById("max_students_error").style.display = "none";
            }

            // Validate giá khóa học
            // let price = parseInt(document.getElementById("price").value, 10);
            // if (isNaN(price) || price <= 0 || price > 50000000) {
            //     document.getElementById("price_error").style.display = "block";
            //     isValid = false;
            // } else {
            //     document.getElementById("price_error").style.display = "none";
            // }

            // Validate ngày bắt đầu
            let startDate = document.getElementById("startDate").value;
            let endDate = document.getElementById("endDate").value;
            if (startDate === "") {
                document.getElementById("start_date_error").style.display = "block";
                isValid = false;
            } else {
                document.getElementById("start_date_error").style.display = "none";
            }

            if (endDate === "") {
                document.getElementById("end_date_error_require").style.display = "block";
                isValid = false;
            } else {
                document.getElementById("end_date_error_require").style.display = "none";
            }

            // Validate ngày kết thúc (phải sau ngày bắt đầu ít nhất 1 tháng)
            if (startDate && endDate) {
                let start = new Date(startDate);
                let end = new Date(endDate);
                let minEndDate = new Date(start);
                minEndDate.setMonth(minEndDate.getMonth() + 1);

                if (end < minEndDate) {
                    document.getElementById("end_date_error").style.display = "block";
                    isValid = false;
                } else {
                    document.getElementById("end_date_error").style.display = "none";
                }
            }

            // validate ảnh
            let imageCourse = document.getElementById('imageCourse');
            if (!imageCourse.files.length) {
                isValid = false;
                document.getElementById("image_course_error").style.display = "block";
            } else {
                document.getElementById("image_course_error").style.display = "none";
            }


            // Validate lịch học
            if (!validateSchedules()) {
                isValid = false;
            }
            if (isValid) {
                saveFormData();
                this.submit();
            }
        });


        $('.check-all').click(function() {
            $(this).closest('.card').find('.permission').prop('checked', this.checked)
        });

        document.getElementById("formatted_price").addEventListener("input", function(e) {
            let rawValue = e.target.value.replace(/\D/g, "");
            let formattedValue = new Intl.NumberFormat("vi-VN").format(rawValue);
            e.target.value = formattedValue;
            document.getElementById("price").value = rawValue;
        });

        document.getElementById('course_type').addEventListener('change', function() {
            let type = this.value;
            if (type == 'online') {
                checkGoogleToken();
            }
            document.getElementById('location_field').style.display = (type === 'offline') ? 'block' : 'none';
        });


        function validateSchedules() {
            let schedules = [];
            let isValid = true;

            document.querySelectorAll("#schedule-container .schedule-item").forEach(item => {
                let dayOfWeek = item.querySelector('select[name^="schedules"]').value;
                let startTime = item.querySelector('input[name^="schedules"][name*="start_time"]').value;
                let endTime = item.querySelector('input[name^="schedules"][name*="end_time"]').value;
                if (startTime >= endTime) {
                    alert("Giờ bắt đầu phải nhỏ hơn giờ kết thúc!");
                    isValid = false;
                    return;
                }
                let isOverlap = schedules.some(schedule =>
                    schedule.dayOfWeek === dayOfWeek &&
                    ((startTime >= schedule.startTime && startTime < schedule.endTime) ||
                        (endTime > schedule.startTime && endTime <= schedule.endTime) ||
                        (startTime < schedule.startTime && endTime > schedule.endTime))
                );
                if (isOverlap) {
                    alert("Thời gian học trong ngày bị trùng!");
                    isValid = false;
                    return;
                }
                schedules.push({
                    dayOfWeek,
                    startTime,
                    endTime
                });
            });
            return isValid;
        }


        function checkGoogleToken() {
            fetch(googleCheckTokenUrl)
                .then(response => response.json())
                .then(data => {
                    if (data.valid) {
                        console.log("✅ Google Access Token còn hạn.");
                    } else {
                        console.log("❌ Google Access Token đã hết hạn. Chuyển hướng đến OAuth...");
                        saveFormData();
                        window.location.href = "/auth/google";
                    }
                })
                .catch(error => console.error("Lỗi khi kiểm tra token:", error));
        }




        // ✅ Lưu toàn bộ dữ liệu form vào localStorage (bao gồm lịch học)
        function saveFormData() {
            let formData = {};

            // Lưu các field thông thường
            document.querySelectorAll("#courseForm input, #courseForm select, #courseForm textarea").forEach(input => {
                if (input.name.startsWith("schedules[")) return; // Bỏ qua lịch học (xử lý riêng)
                if (input.type === "checkbox" || input.type === "radio") {
                    formData[input.name] = input.checked;
                } else {
                    formData[input.name] = input.value;
                }
            });

            // Lưu lịch học (schedules)
            let schedules = [];
            document.querySelectorAll("#schedule-container .schedule-item").forEach((item, index) => {
                schedules.push({
                    day_of_week: item.querySelector('select[name^="schedules"]').value,
                    start_time: item.querySelector('input[name^="schedules"][name*="start_time"]').value,
                    end_time: item.querySelector('input[name^="schedules"][name*="end_time"]').value
                });
            });
            formData['schedules'] = schedules;
            localStorage.setItem("courseFormData", JSON.stringify(formData));
        }

        // ✅ Khôi phục dữ liệu từ localStorage khi tải lại trang
        function restoreFormData() {
            let storedData = localStorage.getItem("courseFormData");
            if (storedData) {
                let formData = JSON.parse(storedData);

                // Khôi phục các field thông thường
                document.querySelectorAll("#courseForm input, #courseForm select, #courseForm textarea").forEach(input => {
                    if (input.name.startsWith("schedules[")) return; // Bỏ qua lịch học
                    if (formData.hasOwnProperty(input.name)) {
                        if (input.type === "checkbox" || input.type === "radio") {
                            input.checked = formData[input.name];
                        } else if (input.type !== "file") {
                            input.value = formData[input.name];
                        }
                    }
                });

                // Khôi phục lịch học
                if (formData.schedules) {
                    document.getElementById('schedule-container').innerHTML = ""; // Xóa lịch cũ
                    formData.schedules.forEach((schedule, index) => {
                        addSchedule(schedule);
                    });
                }
                localStorage.removeItem("courseFormData"); // Xóa sau khi khôi phục để tránh lỗi nhập form mới
            }
        }

        // ✅ Thêm lịch học mới (hoặc từ dữ liệu đã lưu)
        function addSchedule(data = {}) {
            let index = document.querySelectorAll("#schedule-container .schedule-item").length;
            let scheduleHTML = `
                <div class="schedule-item border p-3 mb-2">
                    <label class="form-label">Ngày trong tuần</label>
                    <select class="form-control" name="schedules[${index}][day_of_week]" required>
                        <option value="1" ${data.day_of_week == "1" ? "selected" : ""}>Thứ Hai</option>
                        <option value="2" ${data.day_of_week == "2" ? "selected" : ""}>Thứ Ba</option>
                        <option value="3" ${data.day_of_week == "3" ? "selected" : ""}>Thứ Tư</option>
                        <option value="4" ${data.day_of_week == "4" ? "selected" : ""}>Thứ Năm</option>
                        <option value="5" ${data.day_of_week == "5" ? "selected" : ""}>Thứ Sáu</option>
                        <option value="6" ${data.day_of_week == "6" ? "selected" : ""}>Thứ Bảy</option>
                        <option value="0" ${data.day_of_week == "0" ? "selected" : ""}>Chủ Nhật</option>
                    </select>

                    <label class="form-label mt-2">Giờ bắt đầu</label>
                    <input type="time" class="form-control" name="schedules[${index}][start_time]" value="${data.start_time || ""}" required>

                    <label class="form-label mt-2">Giờ kết thúc</label>
                    <input type="time" class="form-control" name="schedules[${index}][end_time]" value="${data.end_time || ""}" required>

                    <button type="button" class="btn btn-danger btn-sm mt-2 remove-schedule">Xóa</button>
                </div>`;
            document.getElementById('schedule-container').insertAdjacentHTML("beforeend", scheduleHTML);
            triggerEventRemobeSchedule();
            saveFormData();
        }
    </script>
@endsection
