
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../cssfolder/loginregister.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="col-left">
                <div class="login-text">
                    <h2 >Sign Up</h2>
                    <p>
                      𝙎𝙖𝙗 𝙨𝙖𝙘𝙝 𝙗𝙝𝙖𝙧𝙖 𝙝𝙖𝙞 𝙣𝙖? 𝙈𝙪𝙢𝙢𝙮 𝙠𝙖𝙨𝙖𝙢 𝙠𝙝𝙖 𝙣𝙝𝙞 𝙩𝙤𝙝 𝙚𝙨 𝙥𝙚 𝙘𝙡𝙞𝙘𝙠 𝙠𝙚𝙧 𝙙𝙚
                    </p>
                    <a class="btn" title="𝐞𝐱 𝐤𝐚 𝐧𝐮𝐦𝐛𝐞𝐫 𝐭𝐨𝐡 𝐛𝐝𝐚 𝐲𝐚𝐚𝐝 𝐫𝐡𝐭𝐚 𝐡𝐚𝐢 🤨" href="/register">Sign Up</a>
                </div>
            </div>
            <div class="col-right">
                <div class="login-form">
                    <h2>Sign In</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <p>
                            <input id="email" type="email" placeholder="Email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </p>
                        <p>
                            <input id="password" type="password" placeholder="Password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">
                        </p>
                        <p>
                            <input title="𝐂𝐥𝐢𝐜𝐤 𝐤𝐞𝐫 𝐝𝐞 𝐞𝐬 𝐩𝐞" class="btn" type="submit" value="Sign In" />
                        </p>
                    </form>

  
                </div>
            </div>
        </div>
    </div>
  <!-- Loader -->
  <div class="loader" id="loader"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @if (session('toaster-alert'))
        <script>
            toastr.error("{{ session('toaster-alert') }}");
        </script>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                toastr.error("{{ $error }}");
            </script>
        @endforeach
    @endif
</body>
</html>
