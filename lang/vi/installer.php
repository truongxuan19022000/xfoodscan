<?php


return [
    'title' => 'Trình cài đặt Quét Thực phẩm',
    'next'  => 'Bước tiếp theo',
    'welcome' => [
        'templateTitle' => 'Chào mừng',
        'title'         => 'Trình cài đặt Quét Thực phẩm',
        'message'       => 'Cài đặt dễ dàng và Trình hướng dẫn thiết lập.',
        'next'          => 'Kiểm tra Yêu cầu',
    ],
    'requirement' => [
        'templateTitle' => 'Bước 1 | Yêu cầu máy chủ',
        'title'         => 'Yêu cầu máy chủ',
        'next'          => 'Kiểm tra quyền',
        'version'       => 'phiên bản',
        'required'      => 'required'
    ],
    'permission' => [
        'templateTitle'       => 'Bước 2 | Quyền hạn',
        'title'               => 'Quyền hạn',
        'next'                => 'Cài đặt giấy phép',
        'permission_checking' => 'Permission Checking'
    ],
    'license' => [
        'templateTitle'       => 'Bước 3 | Giấy phép',
        'title'               => 'Cài đặt giấy phép',
        'next'                => 'Cài đặt trang',
        'active_process'      => 'Quá trình hoạt động',
        'label'               => [
            'license_key' => 'Khóa cấp phép',
            'license_code' => 'License Code'
        ]
    ],
    'site'     => [
        'templateTitle' => 'Bước 4 | Thiết lập trang web',
        'title'         => 'Cài đặt trang web',
        'next'          => 'Cài đặt cơ sở dữ liệu',
        'label'         => [
            'app_name' => 'Tên Ứng Dụng',
            'app_url'  => 'URL Ứng Dụng',
        ]
    ],
    'database' => [
        'templateTitle' => 'Bước 5 | Thiết lập cơ sở dữ liệu',
        'title'         => 'Cài đặt cơ sở dữ liệu',
        'next'          => 'Cài đặt cuối cùng',
        'fail_message'  => 'Không thể kết nối với cơ sở dữ liệu.',
        'label'         => [
            'database_connection' => 'Kết nối cơ sở dữ liệu',
            'database_host'       => 'Máy chủ cơ sở dữ liệu',
            'database_port'       => 'Cổng cơ sở dữ liệu',
            'database_name'       => 'Tên cơ sở dữ liệu',
            'database_username'   => 'Tên người dùng cơ sở dữ liệu',
            'database_password'   => 'Mật khẩu cơ sở dữ liệu',
        ]
    ],
    'final'    => [
        'templateTitle'   => 'Bước 6 | Thiết lập cuối cùng',
        'title'           => 'Cài đặt cuối cùng',
        'success_message' => 'Ứng dụng đã được cài đặt thành công.',
        'login_info'      => 'Thông tin đăng nhập',
        'email'           => 'Thư điện tử',
        'password'        => 'Mật khẩu',
        'email_info'      => 'admin@example.com',
        'password_info'   => '123456',
        'next'            => 'Hoàn thành',
    ],
    'installed' => [
        'success_log_message' => 'Trình cài đặt Food Scan đã được CÀI ĐẶT thành công trên',
        'update_log_message'  => 'Trình cài đặt Food Scan đã CẬP NHẬT thành công vào',
    ],
];
