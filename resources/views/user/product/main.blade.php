<style>
    .card {
        border-radius: 10px;
        transform: none !important;
    }
</style>
@extends('layouts.main')

@section('main-content')
    <div class="container mt-5" style="margin-top: 100px!important">

        <div class="row">
            <!-- Sidebar bộ lọc -->
            <div class="col-md-3 sidebar">
                <div class="card p-3 shadow-sm">
                    <h5 class="fw-bold">Bộ lọc</h5>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Loại lớp học</label>
                        <select class="form-select" id="filterType">
                            <option value="all">Tất cả</option>
                            <option value="online">Online</option>
                            <option value="offline">Offline</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Khối lớp</label>
                        <select class="form-select" id="filterGrade">
                            <option value="all">Tất cả</option>
                            <option value="9">Lớp 9</option>
                            <option value="10">Lớp 10</option>
                            <option value="11">Lớp 11</option>
                            <option value="12">Lớp 12</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Thời gian bắt đầu</label>
                        <input type="date" class="form-control" id="filterStartTime">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Giá</label>
                        <input type="range" class="form-range" id="filterPrice" min="0" max="5000000"
                            step="100000">
                        <p class="text-muted">Dưới <span id="priceValue">2,500,000</span> đ</p>
                    </div>

                    <button class="btn btn-primary w-100" id="applyFilter">Áp dụng</button>
                </div>
            </div>


            <div class="col-md-9">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="fw-bold">Danh sách lớp học</h4>
                    <input type="text" class="form-control w-25" id="searchCourse" placeholder="Tìm khóa học...">
                </div>
                <div class="row">

                    @foreach ($courses as $item)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="https://res.cloudinary.com/dcnffwcvo/image/upload/v1740369876/o7kjw22mmcqlbynae3ac.jpg"
                                class="card-img-top" alt="">
                            <div class="card-body">
                                <h5 class="card-title">Toán 11</h5>
                                <p class="card-text">Luyện thi toán 11 lên 12 thần tốc</p>
                                <p class="card-text">
                                    <strong>Loại: </strong>
                                    <span class="badge bg-success">Online</span>
                                </p>
                                <p class="card-text">
                                    <strong>Thời gian:</strong>
                                    {{-- {{ date('d/m/Y H:i', strtotime($course->start_time)) }} -
                                    {{ date('d/m/Y H:i', strtotime($course->end_time)) }} --}}
                                    03/10/2025 - 05/10/2025
                                </p>
                                <p class="card-text"><strong>Giá: </strong>1.200.000đ</p>
                                <a href="#" class="btn btn-primary w-100">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    @endforeach                   
                </div>
            </div>
        </div>
    </div>
@endsection
