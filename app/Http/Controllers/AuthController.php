<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Hiển thị form login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Xử lý login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // TODO: Implement authentication logic
        // For now, just redirect to home
        return redirect('/')->with('success', 'Đăng nhập thành công!');
    }

    // Logout
    public function logout()
    {
        // TODO: Implement logout logic
        return redirect('/')->with('success', 'Đã đăng xuất!');
    }

    // Commit 1: Hiển thị form đăng ký
    public function signIn()
    {
        return view('auth.signin');
    }

    // Commit 1: Kiểm tra dữ liệu đăng ký
    public function checkSignIn(Request $request)
    {
        // Lấy dữ liệu từ form
        $username = $request->input('username');
        $password = $request->input('password');
        $repass = $request->input('repass');
        $mssv = $request->input('mssv');
        $lopmonhoc = $request->input('lopmonhoc');
        $gioitinh = $request->input('gioitinh');

        // Dữ liệu sinh viên mẫu
        $sinhViens = [
            ['username' => 'Hieulx', 'mssv' => '26867', 'lopmonhoc' => '67PM1', 'gioitinh' => 'nam'],
            ['username' => 'nguyenanhquan', 'mssv' => '0238967', 'lopmonhoc' => '67PM2', 'gioitinh' => 'nam'],
        ];

        // Kiểm tra password == repass
        if ($password !== $repass) {
            return "Đăng ký thất bại";
        }

        // Kiểm tra thông tin sinh viên
        $found = false;
        foreach ($sinhViens as $sv) {
            if ($sv['username'] === $username && 
                $sv['mssv'] === $mssv && 
                $sv['lopmonhoc'] === $lopmonhoc && 
                $sv['gioitinh'] === $gioitinh) {
                $found = true;
                break;
            }
        }

        if ($found) {
            return "Đăng ký thành công!";
        } else {
            return "Đăng ký thất bại";
        }
    }

    // Commit 2: Hiển thị form nhập tuổi
    public function showAgeForm()
    {
        return view('auth.age-form');
    }

    // Commit 2: Lưu tuổi vào session
    public function saveAge(Request $request)
    {
        $age = $request->input('age');

        // Kiểm tra xem có phải số không
        if (!is_numeric($age) || $age < 0) {
            return "Không được phép truy cập";
        }

        // Lưu vào session
        session(['age' => $age]);

        return redirect('/')->with('success', 'Tuổi đã được lưu!');
    }
}
