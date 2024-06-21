
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../cssfolder/register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>
    <div class="contact-wrapper">
        <header class="login-cta">
            <h2>Sign Up</h2>
        </header>
        <form id="registrationForm" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-row">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                <span>Name</span>
            </div>
            <div class="form-row">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email">
                <span>Username or Email</span>
            </div>
            <div class="form-row">
                <input id="age" type="number" class="form-control" name="age" required autocomplete="age">
                <span>Age</span>
            </div>
            <div class="form-row">
                <input id="state" type="text" class="form-control" name="state" required autocomplete="state">
                <span>State</span>
            </div>
            <div class="form-row">
                <input id="city" type="text" class="form-control" name="city" required autocomplete="city">
                <span>City</span>
            </div>
            <div class="form-row">
                <input id="mobile" type="number" class="form-control" name="mobile" required autocomplete="mobile">
                <span>Mobile Number</span>
            </div>
            <div class="form-row">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">
                <span>Password</span>
            </div>
            <div class="form-row">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password">
                <span>Confirm Password</span>
            </div>
            <div class="form-row">
                <button title="𝐬𝐡𝐚𝐛𝐚𝐬 𝐦𝐞𝐫𝐚 𝐛𝐞𝐜𝐡𝐚 😉" type="submit">Create your First Account!</button>
            </div>
        </form>
        <div class="socials-wrapper">
            <header></header>
            <a href="/login" style="color: #4CAF50">Already have any account</a>
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
    
    <script>
        document.getElementById('registrationForm').addEventListener('submit', function() {
            document.getElementById('loader').style.display = 'block';
        });
    </script>
</body>
</html>





{{-- 

/* Loader CSS */
.loader {
  border: 8px solid #f3f3f3;
  border-top: 8px solid #3498db;
  border-radius: 50%;
  width: 60px;
  height: 60px;
  animation: spin 2s linear infinite;
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  display: none; /* Hidden by default */
  z-index: 1000;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
    
    <!-- Loader -->
    <div class="loader" id="loader"></div>


<script>
    document.getElementById('registrationForm').addEventListener('submit', function() {
        document.getElementById('loader').style.display = 'block';
    });
</script> --}}
