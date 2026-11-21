<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <div class="container">
    <h1>Login</h1>
    <p class="sub">Please enter your login details to log in.</p>

    @if($errors->any())
      <div class="alert error">
        <ul>
          @foreach($errors->all() as $err)
            <li>{{ $err }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('login.store') }}" method="POST">
      @csrf

      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Email Address"
             value="{{ old('email') }}" required autofocus>

      <label for="password">Password</label>
      <div style="position:relative">
        <input type="password" id="password" name="password" placeholder="Password"
               required style="padding-right:44px">
        <button type="button" onclick="togglePw('password')"
                style="position:absolute;right:4px;top:50%;transform:translateY(-50%);margin:0;padding:6px 10px;background:none;color:inherit">👁</button>
      </div>

      <label style="display:flex;align-items:center;gap:8px;font-weight:normal;margin-top:16px">
        <input type="checkbox" name="remember" value="1" style="width:auto;margin:0">
        Keep me logged in
      </label>

      <button type="submit" style="width:100%">Log in</button>
    </form>

    <p style="text-align:center;margin-top:20px">
      Don't have an account? <a href="{{ route('register') }}">Create account</a>
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