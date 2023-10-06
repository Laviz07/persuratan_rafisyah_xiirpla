<html>

<head>
    @vite(['resources/sass/app.scss','resources/js/app.js'])
    <style>
        .login {
        min-height: 100vh;
        }

        .bg-image {
        background-image: url('https://img.freepik.com/premium-vector/vector-seamless-blue-pattern-with-line-envelopes_182787-1424.jpg');
        background-size: cover;
        background-position: center;
        }

        .login-heading {
        font-weight: 300;        }

        .btn-login {
        font-size: 0.9rem;
        letter-spacing: 0.05rem;
        padding: 0.75rem 1rem;
        }

    </style>
</head>

<body>
    <div class="container-fluid ps-md-0">
        <div class="row g-0">
          <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
          <div class="col-md-8 col-lg-6">
            <div class="login d-flex align-items-center py-5">
              <div class="container">
                <div class="row">
                  <div class="col-md-9 col-lg-8 mx-auto">
                    <div class="text-center">
                        <img src="https://cdn.icon-icons.com/icons2/3566/PNG/512/mail_email_logo_icon_225397.png"
                        class="img-fluid profile-image-pic my-2" width="60px" alt="profile">
                        <h3 class="login-heading mb-4 "> Welcome To Nyurat!</h3>
                    </div>
                    <!-- Login Form -->
                    <form  action="login" method="POST">
                      @csrf
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="username" 
                                placeholder="Your Username" name="username" required>
                        <label for="username">Username</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" 
                                placeholder="Password" name="password" required>
                        <label for="password">Password</label>
                      </div>
      
                      <div class="d-grid">
                        <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit">Login</button>
                        
                      </div>
      
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
   <script type="module" >
        $('form').submit(async function (e) {
                    e.preventDefault();
                    let username = $('#username').val();
                    let password = $('#password').val();

                    await axios({
                        method: 'post',
                        url: 'http://localhost:8000/login',
                        data: {
                            username,
                            password
                        }
                    }).then(async () => {
                        await swal.fire({
                            title: 'Login berhasil!',
                            text: 'Redirecting to dashboard...',
                            icon: 'success',
                            timer: 1000,
                            showConfirmButton: false
                        })
                        window.location = '/dashboard'  
                        console.log('success')
                    }).catch(({response}) => {
                        if (!$('.err-message').text()) {
                            $('.err-message').append(document.createTextNode(response.data.errors.message))
                        }
                    })

                })
   </script>
             
</body>

</html>