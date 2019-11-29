<div class="container max-w-md mx-auto xl:max-w-3xl h-full flex bg-white rounded-lg shadow overflow-hidden">
    <div class="relative hidden xl:block xl:w-1/2 h-full">
        <img class="absolute h-auto w-full object-cover" src="https://images.unsplash.com/photo-1555527127-5d23f6f8e154?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=975&q=80" />
    </div>
    <div class="w-full xl:w-1/2 p-8">
        <form method="post" action="..\logic\signin.dom.php">
            <h1 class=" text-2xl font-bold">Sign in to your account</h1>
            <div>
                <span class="text-gray-600 text-sm">
                    Don't have an account?
                </span>
                <span class="text-gray-700 text-sm font-semibold">
                    <a href="signup.php">Sign up</a>
                </span>
            </div>
            <div class="mb-4 mt-6">
                <label class="block text-gray-700 text-sm font-semibold mb-2">
                    Email
                </label>
                <input class="text-sm appearance-none rounded w-full py-2 px-3 text-gray-700 bg-gray-200 leading-tight h-10" name="email" type="text" placeholder="Your email address" />
            </div>
            <div class="mb-6 mt-6">
                <label class="block text-gray-700 text-sm font-semibold mb-2" >
                    Password
                </label>
                <input class="text-sm bg-gray-200 appearance-none rounded w-full py-2 px-3 text-gray-700 mb-1 leading-tight focus:shadow-outline h-10" name="password" type="password" placeholder="Your password" />

            </div>
            <div class="flex w-full mt-8">
                <button class="w-full bg-gray-800 hover:bg-grey-900 text-white text-sm py-2 px-4 font-semibold rounded h-10" type="submit">
                    Sign in
                </button>
            </div>
        </form>
    </div>
</div>