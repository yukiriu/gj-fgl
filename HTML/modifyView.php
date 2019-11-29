<?php
include "../classes/user/user.php";
$TDG = new UserTDG();
$res = $TDG->get_by_id($_SESSION["userID"]);

$id = $res['userId'];
$email = $res['email'];
$username = $res['username'];
$imagepath = $res['image'];

?>



<div class="container max-w-md mx-auto xl:max-w-3xl h-full flex bg-white rounded-lg shadow overflow-hidden">
  <div class="xl:block xl:w-1/2 h-100 bg-gray-400 flex items-center justify-center">

    <div class="relative m-auto mt-32 w-64 h-64 rounded-full bg-gray-100 overflow-hidden">

      <img src="<?php echo "../". $imagepath ?>" class="h-auto w-full object-contain">
    </div>
    <div class="relative m-auto mt-20 w-64">
      <button class="bg-gray-800 hover:bg-grey-900 text-white text-sm font-semibold rounded h-full w-full m-auto p-1" type="button">
        Modify
      </button>
    </div>
  </div>
  <div class="w-full xl:w-1/2 p-8">
    <form method="post" action="#" onSubmit="return false">
      <h1 class=" text-2xl font-bold">Modify your info</h1>
      <div class="mb-4 mt-6">
        <label class="block text-gray-700 text-sm font-semibold mb-2">
          Email
        </label>
        <input class="text-sm appearance-none rounded w-full py-2 px-3 text-gray-700 bg-gray-200 leading-tight h-10" id="email" type="text" placeholder="<?php echo $email ?>" />
      </div>
      <div class="mb-4 mt-6">
        <label class="block text-gray-700 text-sm font-semibold mb-2">
          Username
        </label>
        <input class="text-sm appearance-none rounded w-full py-2 px-3 text-gray-700 bg-gray-200 leading-tight h-10" id="username" type="text" placeholder="<?php echo $username ?>" />
      </div>
      <div class="mb-6 mt-6">
        <label class="block text-gray-700 text-sm font-semibold mb-2">
          New Password
        </label>
        <input class="text-sm bg-gray-200 appearance-none rounded w-full py-2 px-3 text-gray-700 mb-1 leading-tight focus:shadow-outline h-10" id="newPassword" type="password" placeholder="Your password" />
      </div>
      <div class="mb-6 mt-6">
        <label class="block text-gray-700 text-sm font-semibold mb-2">
          New Password Validation
        </label>
        <input class="text-sm bg-gray-200 appearance-none rounded w-full py-2 px-3 text-gray-700 mb-1 leading-tight focus:shadow-outline h-10" id="newPasswordValidation" type="password" placeholder="Your password" />
      </div>
      <div class="mb-6 mt-6">
        <label class="block text-gray-700 text-sm font-semibold mb-2">
          Current Password
        </label>
        <input class="text-sm bg-gray-200 appearance-none rounded w-full py-2 px-3 text-gray-700 mb-1 leading-tight focus:shadow-outline h-10" id="currentPassword" type="password" placeholder="Your password" />
      </div>
      <div class="flex w-full mt-8">
        <button class="w-full bg-gray-800 hover:bg-grey-900 text-white text-sm py-2 px-4 font-semibold rounded h-10" type="button">
          Modify
        </button>
      </div>
    </form>
  </div>
</div>
