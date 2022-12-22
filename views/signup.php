<!doctype html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./dist/output.css" rel="stylesheet">
</head>

<body>
<div class="auth-container"
     style="background-image:url('https://images.pexels.com/photos/380169/pexels-photo-380169.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2')">
    <div class="rounded-xl bg-gray-800 bg-opacity-50 px-16 py-10 shadow-lg backdrop-blur-md max-sm:px-8">
        <div class="text-white">
            <div class="mb-8 flex flex-col items-center">
                <img src="assets/image/logo.png" width="150"
                     alt="" srcset=""/>
                <h1 class="mb-2 text-2xl">Ship Cruise</h1>
                <span class="text-gray-300">Enter Sign up Details</span>
            </div>
            <form action="#">
                <div class="fields-container">
                    <input
                            class="form-field"
                            type="text" name="name" placeholder="First Name"/>
                    <input
                            class="form-field md:ml-2"
                            type="text" name="name" placeholder="Last Name"/>
                </div>
                <div class="fields-container">
                    <input
                            class="form-field"
                            type="email" name="name" placeholder="email"/>
                    <input
                            class="form-field md:ml-2"
                            type="email" name="name" placeholder="Confirm Email"/>
                </div>
                <div class="fields-container">
                    <input
                            class="form-field"
                            type="password" name="name" placeholder="password"/>
                    <input
                            class="form-field md:ml-2 "
                            type="text" name="name" placeholder="Confirm Password"/>
                </div>

                <div class="mt-8 flex justify-center text-lg">
                    <button type="submit"
                            class="form-submit">
                        Sign Up
                    </button>
                </div>
                <div class="mt-2 flex justify-center text-lg">
                    <button type="reset"
                            class="form-reset">
                        Reset
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

</html>