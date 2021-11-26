

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Encrypt form data in PHP </title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <div class="container py-4">
            <div class="row">
                <div class="col-xl-6 col-lg-8 m-auto">
                    <form method="POST" id="regForm">
                        <div class="card shadow">
                            <div class="card-header">
                                <h5 class="card-title font-weight-bold"> Encrypt Form Data </h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Your name" required/>
                                </div>

                                <div class="form-group">
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Your Email" required/>
                                </div>

                                <div class="form-group">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Your Password" required/>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Save </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        
        <!-- Encryption js -->
        <script type="module">
            import AesCtr from './aes-ctr.js'
            $(document).ready(function() {
                // Submit form
                $("#regForm").submit(function (event) {
                    event.preventDefault();

                    var name = $("#name").val();
                    var email = $("#email").val();
                    var password = $("#password").val();                    
                    // Encrypt form data
                    let nameEnc = AesCtr.encrypt(name, 'L0ck it up saf3', 256);
                    let emailEnc = AesCtr.encrypt(email, 'L0ck it up saf3', 256);
                    let passEnc = AesCtr.encrypt(password, 'L0ck it up saf3', 256);
                    // Submit form using Ajax
                    $.ajax({
                        url: 'results.php',
                        method: 'POST',
                        data: {
                            name: nameEnc,
                            email: emailEnc,
                            password: passEnc
                        },
                        success:function(res) {
                            console.log(res);
                        }
                    });

                });
            });
        </script>
    </body>
</html>