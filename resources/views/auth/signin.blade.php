<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký Tài Khoản</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .signin-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
        }

        .signin-container h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 28px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 500;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 5px rgba(102, 126, 234, 0.1);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .form-row .form-group {
            margin-bottom: 0;
        }

        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s;
            margin-top: 20px;
        }

        button:hover {
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="signin-container">
        <h1>Đăng Ký Tài Khoản</h1>

        <form action="{{ route('auth.checkSignIn') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="username">Username</label>
                <input 
                    type="text" 
                    id="username" 
                    name="username" 
                    placeholder="VD: Hieulx"
                    required
                >
            </div>

            <div class="form-group">
                <label for="mssv">MSSV</label>
                <input 
                    type="text" 
                    id="mssv" 
                    name="mssv" 
                    placeholder="VD: 26867"
                    required
                >
            </div>

            <div class="form-group">
                <label for="lopmonhoc">Lớp môn học</label>
                <input 
                    type="text" 
                    id="lopmonhoc" 
                    name="lopmonhoc" 
                    placeholder="VD: 67PM1"
                    required
                >
            </div>

            <div class="form-group">
                <label for="gioitinh">Giới tính</label>
                <select id="gioitinh" name="gioitinh" required>
                    <option value="">-- Chọn giới tính --</option>
                    <option value="nam">Nam</option>
                    <option value="nu">Nữ</option>
                    <option value="khac">Khác</option>
                </select>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="VD: 123abc"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="repass">Nhập lại mật khẩu</label>
                    <input 
                        type="password" 
                        id="repass" 
                        name="repass" 
                        placeholder="Nhập lại"
                        required
                    >
                </div>
            </div>

            <button type="submit">Sign In</button>
        </form>
    </div>
</body>
</html>
