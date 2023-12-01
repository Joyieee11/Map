<!-- login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <meta name="description" content="Login to BFP Cabuyao's portal. Choose your user position, enter your account number and password to access the portal.">


    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

</head>
<body>
    <div class="top-nav">
        <p class="brand-text"></p>
        <div class="icons">
            <div class="icons-container">
                <a href="https://www.facebook.com/bfp.cabuyao" aria-label="Visit our Facebook Page" title="Visit our Facebook Page">
                    <i class="fa-brands fa-facebook"></i>
                </a>
            </div>  
        </div>
    </div>
    <section class="banner-area">
        <img src="image/banner.webp" alt="Image" class="img-fluid"> 
    </section>

    <div class="loginForm-container" id="loginForm">
        <div class="page-wrapper">
            <div class="login-container">
                    
                <div class="logo-banner">   
                    <img class="login-logo" src="image/logo.webp" alt="Logo">
                </div>
                <div class="login-form-container">
                    <button class="go-back-button" id="goBackButton" aria-label="Go Back to Home">
                        <a href="{{ url('/home') }}" class="go-back-link" aria-label="Go Back to Home">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </button>

                    <div class="login-text">
                        <h2>Login</h2>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                    @csrf
                        <div class="form-group">
                            <label for="position">User Position</label>
                            <select name="position" id="position" required>
                                <option value="select-user">Select User</option>
                                <option value="bfp-admin">BFP Admin</option>
                                <option value="responder">BFP Responder</option>
                                <option value="cabwad-admin">Cabwad Admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="idNum" placeholder="Account Number" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" id="password" placeholder="Password" required>
                            <span class="toggle-password" onclick="togglePasswordVisibility()">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                        <button class="login-button" type="submit">Login</button>
                    </form>
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>                
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="{{ asset('js/style.js') }}"></script>
</body>
</html>
