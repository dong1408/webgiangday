<style>
    .card {
        border-radius: 10px;
        transform: none !important;
    }
</style>
@extends('layouts.main')

@section('main-content')
    <div class="container mt-5" style="margin-top: 70px!important">
        <div class="breadcrumbs-wrapper">
            <div class="container">
                <ul class="breadcrumbs" id="breadcrumbs">
                    <li><a href="{{ route('home') }}">Home</a><span class="separator"></span></li>
                    <li>Shop toán lý</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <!-- Sidebar bộ lọc -->
            <div class="col-md-3 sidebar">
                <div class="card p-3 shadow-sm">
                    <form action="{{ route('product.main') }}" method="GET" id="filterForm">
                        <h5 class="fw-bold">Bộ lọc</h5>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Loại lớp học</label>
                            <select class="form-select" id="filterType" name="type">
                                <option value="all" <?= $type == 'all' ? 'selected' : '' ?>>Tất cả</option>
                                <option value="online" <?= $type == 'online' ? 'selected' : '' ?>>Online</option>
                                <option value="offline" <?= $type == 'offline' ? 'selected' : '' ?>>Offline</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Khối lớp</label>
                            <select class="form-select" id="filterGrade" name="grade">
                                <option value="all">Tất cả</option>
                                <option value="9" <?= $grade == 9 ? 'selected' : '' ?>>Lớp 9</option>
                                <option value="10" <?= $grade == 10 ? 'selected' : '' ?>>Lớp 10</option>
                                <option value="11" <?= $grade == 11 ? 'selected' : '' ?>>Lớp 11</option>
                                <option value="12" <?= $grade == 12 ? 'selected' : '' ?>>Lớp 12</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Thời gian bắt đầu từ</label>
                            <input type="date" class="form-control" id="filterStartTime" name="start_date"
                                value="<?= !empty($startDate) ? $startDate : '' ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Giá</label>
                            <select class="form-select" name="price" id="price">
                                <option value="all">Tất cả giá</option>
                                <option value="under_1m" <?= $price == 'under_1m' ? 'selected' : '' ?>>Dưới 1 triệu</option>
                                <option value="1m_2m5" <?= $price == '1m_2m5' ? 'selected' : '' ?>>Từ 1triệu tới 2.5 triệu
                                </option>
                                <option value="2m5_5m" <?= $price == '2m5_5m' ? 'selected' : '' ?>>Từ 2.5 triệu tới 5 triệu
                                </option>
                                <option value="above_5m" <?= $price == 'above_5m' ? 'selected' : '' ?>>Trên 5 triệu</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary w-100" id="applyFilter">Áp dụng</button>
                    </form>
                </div>
            </div>


            <div class="col-md-9">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="fw-bold">Danh sách lớp học</h4>
                    <div class="form-search form-inline">
                        <form action="" method="GET" id="searchForm">
                            <div class="input-group" style="width: 300px">
                                <input type="" name="q" class="form-control form-search search-input"
                                    placeholder="Tìm khóa học..." value="<?= !empty($q) ? $q : '' ?>">
                            </div>
                        </form>
                    </div>
                </div>
                <?php if (!$courses->isEmpty()) { ?>
                <div class="row course-list">
                    @foreach ($courses as $course)
                        <div class="col-md-4 mb-4 course-card">
                            <div class="card">
                                <img src="{{ $course->image_url ?? '' }}" class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $course->name }}</h5>
                                    <p class="card-text">{{ $course->short_desc }}</p>
                                    <p class="card-text">
                                        <strong>Loại: </strong>
                                        <span
                                            class="badge {{ $course->course_type == 'online' ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $course->course_type == 'online' ? 'Online' : 'Offline' }}
                                        </span>
                                    </p>
                                    <p class="card-text">
                                        <strong>Thời gian:</strong>
                                        {{ date('d/m/Y', strtotime($course->start_date)) }} -
                                        {{ date('d/m/Y', strtotime($course->end_date)) }}
                                    </p>
                                    <p class="card-text"><strong>Giá:
                                        </strong>{{ number_format($course->price, 0, '.', '.') }}đ</p>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('product.detail', $course->id) }}" class="btn btn-primary w-100">Xem
                                        chi tiết</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="d-flex justify-content-center">
                        {{ $courses->links() }}
                    </div>
                </div>
                <?php
                } else {
                    ?>
                <div>
                    <h3>Không có kết quả</h3>
                </div>
                <?php
                }?>

            </div>
        </div>
    </div>

    <style scoped>
        .breadcrumbs-wrapper {
            font-size: var(--thim-breacrumb-font-size, 1em);
            color: var(--thim-breacrumb-color, #666);
            background-color: var(--thim-breacrumb-bg-color, transparent);
            padding-bottom: 30px;
        }

        .breadcrumbs-wrapper #breadcrumbs {
            padding: 13px 0;
            margin: 0;
            border-bottom: 1px solid #adb5bd;
        }

        .separator::before {
            content: "❯";
            margin: 0px 8px 0px 0px;
            color: #999;
        }

        .breadcrumbs-wrapper #breadcrumbs li {
            line-height: 25px;
            display: inline-block;
            color: black;
            list-style: none;
        }

        .breadcrumbs-wrapper #breadcrumbs a {
            line-height: 25px;
            display: inline-block;
            color: var(--thim-breacrumb-color, #666);
            margin-right: 12px;
            text-decoration: none;
        }

        .course-list {
            display: flex;
            flex-wrap: wrap;
        }

        .course-card {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .course-card .card {
            min-height: 615px;
        }

        .course-card .card-body {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .course-card .card-footer {
            margin-top: auto;
        }

        .course-card img {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }

        .search-input {
            background-image: url('https://cdn-icons-png.flaticon.com/512/622/622669.png');
            background-position: right 10px center;
            background-repeat: no-repeat;
            background-size: 16px;
            padding-right: 35px;
        }

        #carouselExampleIndicators {
            /* display: none; */
            height: 400px;
        }
    </style>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchForm = document.getElementById("searchForm");
            const filterForm = document.getElementById("filterForm");

            function syncForms(sourceForm, targetForm) {
                const params = new URLSearchParams(new FormData(sourceForm));
                for (const [key, value] of params.entries()) {
                    let input = targetForm.querySelector(`[name="${key}"]`);
                    if (input) {
                        input.value = value;
                    } else {
                        // Nếu không có input, tạo hidden input để lưu
                        let hiddenInput = document.createElement("input");
                        hiddenInput.type = "hidden";
                        hiddenInput.name = key;
                        hiddenInput.value = value;
                        targetForm.appendChild(hiddenInput);
                    }
                }
            }

            // Khi submit form tìm kiếm -> sao chép dữ liệu từ bộ lọc
            searchForm.addEventListener("submit", function() {
                syncForms(filterForm, searchForm);
            });

            // Khi submit form bộ lọc -> sao chép dữ liệu từ tìm kiếm
            filterForm.addEventListener("submit", function() {
                syncForms(searchForm, filterForm);
            });
        });
    </script>
@endsection
