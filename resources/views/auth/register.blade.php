<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Create Account</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <div class="container">
    <h1>Create Account</h1>
    <p class="sub">Daftar untuk mengikuti event & workshop.</p>

    @if($errors->any())
      <div class="alert error">
        <ul>
          @foreach($errors->all() as $err)
            <li>{{ $err }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('register.store') }}" method="POST">
      @csrf

      <div style="display:flex;gap:12px">
        <div style="flex:1">
          <label for="first_name">First name</label>
          <input type="text" id="first_name" name="first_name"
                 placeholder="Enter your first name" value="{{ old('first_name') }}" required>
        </div>
        <div style="flex:1">
          <label for="last_name">Last name</label>
          <input type="text" id="last_name" name="last_name"
                 placeholder="Enter your last name" value="{{ old('last_name') }}">
        </div>
      </div>

      <label for="email">Email</label>
      <input type="email" id="email" name="email"
             placeholder="Enter your email" value="{{ old('email') }}" required>

      <label for="password">Password</label>
      <div style="position:relative">
        <input type="password" id="password" name="password" placeholder="Create password"
               required style="padding-right:44px">
        <button type="button" onclick="togglePw('password')"
                style="position:absolute;right:4px;top:50%;transform:translateY(-50%);margin:0;padding:6px 10px;background:none;color:inherit">👁</button>
      </div>
      <small style="display:block;text-align:right;color:#999;font-size:11px;margin-top:4px">
        Must be at least 8 characters
      </small>

      <label style="display:flex;align-items:center;gap:8px;font-weight:normal;margin-top:16px">
        <input type="checkbox" name="agree" value="1" required style="width:auto;margin:0">
        I agree with Terms and Privacy Policy
      </label>

      <button type="submit" style="width:100%">Create Account</button>
    </form>

    <p style="text-align:center;margin-top:20px">
      Already have an account? <a href="{{ route('login') }}">Log in</a>
    </p>
  </div>

  <script>
    function togglePw(id) {
      const el = document.getElementById(id);
      el.type = el.type === 'password' ? 'text' : 'password';
    }
  </script>
</body>
</html>