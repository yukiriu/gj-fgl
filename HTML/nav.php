<?php
    if(isset($_SESSION["userID"])){
        $navItems = '
          <a href="modifyProfile.php" class="hover:text-gray-600 mr-4">'.$_SESSION["username"].'</a>
          <span class="mr-4 cursor-default" > | </span>
          <a href="signup.php" class="hover:text-gray-600">Logout</a>
        ';
    }
    else{
    $navItems = '
          <a href="signin.php" class="hover:text-gray-600 mr-4">Sign in</a>
          <span class="mr-4 cursor-default" > | </span>
          <a href="signup.php" class="hover:text-gray-600">Sign up</a>
          ';
    }
?>

<div class="w-screen bg-gray-400">
<div class="container mx-auto px-4 text-xl h-32 ">
    <div class="flex items-center justify-between text-gray-700 h-32" style="padding:auto 0">
        <div class="hover:text-gray-600 h-20" style="font-size:50px">gj/fgl</div>
        <div class="w-1/4 flex items-center justify-between">
            <a class="hover:text-gray-600">TEST</a>
            <a class="hover:text-gray-600">TEST</a>
            <a class="hover:text-gray-600">TEST</a>
        </div>
        <div class="flex justify-between items-center w-1/10">
          <?php echo $navItems ?>
        </div>
    </div>
</div>
</div>
