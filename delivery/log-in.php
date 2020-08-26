<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Log In</title>
</head>
<body>
<main class="sign-up-main p-5 bg-success text-white" style="min-height: 100vh;">
    <section id="signup-box" class="container py-5 px-4 border">
        <h1 class="text-uppercase text-center pb-3">Log In</h1>
        <p class="bolder p-1 text-center"><?php echo isset($_GET['err']) ? $_GET['err'] : ""?></p>
        <form id="signup-form" action="./controller/loginCtrl.php" method="POST">
            
        <div class="form-group">
        <label for="userid">User Id</label><br>
        <input required class="p-2 w-100" type="text" name="userid"  placeholder="Enter Your User Id">
        </div>
        <div class="form-group">
        <label class="" for="password">Password</label><br>
        <input class="p-2 mb-4 w-100" required type="password" name="password" placeholder="Password" autocomplete="off"><br>
        </div>

          <button type="submit" class="btn btn-light btn-block" name="loginSubmitBtn">Log In</button>
          
        </form>
      </section>
    </main>
</body>
</html>
    