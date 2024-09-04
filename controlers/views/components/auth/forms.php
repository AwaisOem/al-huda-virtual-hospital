<div id="login-sec" class="lg:w-2/6 md:w-1/2 rounded-lg items-center flex flex-col md:ml-auto w-full mt-10 md:mt-0">
    <div class="flex flex-col w-full max-w-md px-4 py-8 bg-white rounded-lg shadow dark:bg-gray-800 sm:px-6 md:px-8 lg:px-10">
        <div class="self-center mb-6 flex flex-col items-center text-xl font-light text-gray-600 sm:text-2xl dark:text-white">
            <div>
                Welcome Back
            </div>
            Login To Your Account
        </div>
        <div class="mt-8">
            <form id="loginForm" autoComplete="off">
                <div class="flex flex-col mb-2">
                    <div class="flex relative ">
                        <span class="rounded-l-md inline-flex  items-center px-3 border-t bg-white border-l border-b  border-gray-300 text-gray-500 shadow-sm text-sm">
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1792 710v794q0 66-47 113t-113 47h-1472q-66 0-113-47t-47-113v-794q44 49 101 87 362 246 497 345 57 42 92.5 65.5t94.5 48 110 24.5h2q51 0 110-24.5t94.5-48 92.5-65.5q170-123 498-345 57-39 100-87zm0-294q0 79-49 151t-122 123q-376 261-468 325-10 7-42.5 30.5t-54 38-52 32.5-57.5 27-50 9h-2q-23 0-50-9t-57.5-27-52-32.5-54-38-42.5-30.5q-91-64-262-182.5t-205-142.5q-62-42-117-115.5t-55-136.5q0-78 41.5-130t118.5-52h1472q65 0 112.5 47t47.5 113z">
                                </path>
                            </svg>
                        </span>
                        <input required type="text" id="login-username" class=" rounded-r-lg flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none " placeholder="Your username" />
                    </div>
                </div>
                <div class="flex flex-col mb-6">
                    <div class="flex relative ">
                        <span class="rounded-l-md inline-flex  items-center px-3 border-t bg-white border-l border-b  border-gray-300 text-gray-500 shadow-sm text-sm">
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1376 768q40 0 68 28t28 68v576q0 40-28 68t-68 28h-960q-40 0-68-28t-28-68v-576q0-40 28-68t68-28h32v-320q0-185 131.5-316.5t316.5-131.5 316.5 131.5 131.5 316.5q0 26-19 45t-45 19h-64q-26 0-45-19t-19-45q0-106-75-181t-181-75-181 75-75 181v320h736z">
                                </path>
                            </svg>
                        </span>
                        <input required maxlength="20" minlength="6" type="password" id="login-password" class=" rounded-r-lg flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none " placeholder="Your password" />
                    </div>
                </div>
                <!-- <p id='login-error' class="hidden text-red-500 text-sm text-center"></p> -->
                <div class="flex w-full">
                    <button type="submit" class="py-3 px-4 rounded-lg bg-gradient-to-tr from-blue-600 to-blue-400 text-md uppercase shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none text-white w-full transition ease-in duration-200 text-center text-base font-bold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 ">
                        Login
                    </button>
                </div>
            </form>
        </div>
        <div class="flex items-center justify-center mt-6">
            <a id="noAccount" class="inline-flex cursor-pointer items-center text-xs font-thin text-center text-gray-500 hover:text-gray-700 dark:text-gray-100 dark:hover:text-white">
                <span class="ml-2">
                    You don&#x27;t have an account?
                </span>
            </a>
        </div>
    </div>
</div>
<script defer>
    $('#loginForm').submit(async e => {
    e.preventDefault();
    let formData = new URLSearchParams();
    formData.append('username', $('#login-username').val());
    formData.append('password', $('#login-password').val());
    // fetch request from client to server
    try {
        const res = await fetch('/api/user/login.php', {
            method: 'POST',
            body: formData
        });
        let data = await res.json();
        if (!res.ok)
            throw new Error(data.message);
        Swal.fire({
            icon: 'success',
            timerProgressBar: true,
            title: 'Successfully logged in',
            showConfirmButton: false,
            timer: 2000
        })
        setTimeout(() => {
            window.location.href = '/';
        }, 1800);
    } catch (err) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: err.message,
            timer: 2000,
            showConfirmButton: false
        })
    }
    })
</script>
<!-- Sign up -->
<div id="signup-sec" class="lg:w-2/6 md:w-1/2 rounded-lg items-center flex flex-col md:ml-auto w-full mt-10 md:mt-0">

    <div class="flex flex-col w-full max-w-md px-4 py-8 bg-white rounded-lg shadow dark:bg-gray-800 sm:px-6 md:px-8 lg:px-10">
        <div class="self-center  flex flex-col items-center mb-6 text-xl font-light text-gray-600 sm:text-2xl dark:text-white">

            <span class="h-8 flex gap-1">
                Welcome
                <svg width="30" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve">
                    <path style="fill:#F9A926;" d="M497.012,292.953c-19.478-19.59-51.31-19.59-70.788,0c-19.478,19.478-19.478,51.311,0,70.79
                                   c9.46,9.461,22.038,14.692,35.394,14.692s25.935-5.231,35.394-14.692C516.601,344.264,516.601,312.431,497.012,292.953z
                                    M473.465,340.059c-6.752,6.763-17.151,6.545-23.63,0.076c-6.391-6.391-6.391-17.184,0-23.577c6.564-6.589,17.101-6.489,23.5-0.066
                                   C480.105,323.239,479.797,333.768,473.465,340.059z" />
                    <path style="fill:#FFC033;" d="M333.54,324.119l-11.13,11.13L193.853,463.694c-9.682,9.795-22.595,14.692-35.394,14.692
                                   c-12.8,0-25.6-4.897-35.394-14.692L87.67,428.299l-35.396-35.395c-19.59-19.59-19.59-51.311,0-70.901L191.85,182.428l70.901,70.901
                                   L333.54,324.119z" />
                    <path style="fill:#F26D76;" d="M368.935,288.613l-35.394,35.506l-70.79-70.79l-70.901-70.901l35.394-35.395
                                   c6.568-6.567,17.141-6.567,23.598,0l59.101,58.991l58.99,58.991C375.503,271.583,375.503,282.156,368.935,288.613z" />
                    <path style="fill:#D7EBFF;" d="M134.974,444.327c-6.901,20.48-25.934,34.282-47.527,34.282H50.383
                                   c-9.128,0-16.696,7.457-16.696,16.696S26.23,512,16.992,512c-3.563,0-6.902-1.113-9.685-3.339
                                   c-4.228-2.783-7.011-7.791-7.011-13.357c0-27.603,22.483-50.087,50.087-50.087h37.064c7.123,0,13.579-4.563,15.805-11.464
                                   c2.894-8.682,12.354-13.468,21.147-10.463C133.081,426.184,137.867,435.645,134.974,444.327z" />
                    <path style="fill:#BDDEFF;" d="M134.974,444.327c-6.901,20.48-25.934,34.282-47.527,34.282H50.383
                                   c-9.128,0-16.696,7.457-16.696,16.696S26.23,512,16.992,512c-3.563,0-6.902-1.113-9.685-3.339l63.445-63.443h16.696
                                   c7.123,0,13.579-4.563,15.805-11.464c2.894-8.682,12.354-13.468,21.147-10.463C133.081,426.184,137.867,435.645,134.974,444.327z" />
                    <path style="fill:#E65C64;" d="M368.935,288.613l-35.394,35.506l-70.79-70.79l47.193-47.304l58.99,58.991
                                   C375.503,271.583,375.503,282.156,368.935,288.613z" />
                    <path style="fill:#F9A926;" d="M333.54,324.119L193.853,463.694c-9.682,9.795-22.595,14.692-35.394,14.692
                                   c-12.8,0-25.6-4.897-35.394-14.692L87.67,428.299l164.063-163.951l11.019-11.019L333.54,324.119z" />
                    <path style="fill:#FFC033;" d="M345.337,187.288c-4.272,0-8.544-1.631-11.804-4.892c-6.521-6.516-6.521-17.087,0-23.609
                                   L475.196,17.12c6.521-6.521,17.087-6.521,23.609,0c6.521,6.516,6.521,17.087,0,23.609L357.142,182.397
                                   C353.88,185.658,349.608,187.288,345.337,187.288z" />
                    <path style="fill:#E65C64;" d="M489.5,231.316c-3.369,0-6.761-1.011-9.707-3.12c-26.923-19.256-62-22.044-91.571-7.25
                                   c-8.233,4.104-18.272,0.777-22.402-7.467c-4.119-8.25-0.777-18.277,7.467-22.402c40.663-20.332,88.924-16.538,125.94,9.967
                                   c7.5,5.364,9.228,15.793,3.859,23.294C499.826,228.892,494.696,231.316,489.5,231.316z" />
                    <path style="fill:#F26D76;" d="M309.929,151.876c-1.457,0-2.935-0.19-4.402-0.592c-8.897-2.43-14.141-11.603-11.717-20.5
                                   c9.43-34.581,2.799-71.071-18.206-100.119c-5.403-7.473-3.723-17.913,3.75-23.315c7.479-5.403,17.913-3.723,23.315,3.75
                                   c26.946,37.277,35.456,84.098,23.358,128.467C324,146.995,317.272,151.876,309.929,151.876z" />
                    <circle style="fill:#36D9D9;" cx="383.744" cy="38.734" r="16.696" />
                    <circle style="fill:#43BFBF;" cx="472.788" cy="138.908" r="16.696" />
                    <rect x="175.271" y="307.423" style="fill:#36D9D9;" width="33.391" height="33.391" />
                    <path style="fill:#F9A926;" d="M333.557,182.413c3.258,3.247,7.516,4.875,11.779,4.875c4.272,0,8.544-1.631,11.804-4.892
                                   L498.803,40.728c6.514-6.514,6.515-17.064,0.018-23.582L333.557,182.413z" />
                    <polygon style="fill:#43BFBF;" points="208.658,307.424 208.658,340.815 175.267,340.815 " />
                    <path style="fill:#FFC033;" d="M213.186,14.692c-19.478-19.59-51.31-19.59-70.788,0c-19.478,19.478-19.478,51.311,0,70.79
                                   c9.46,9.461,22.038,14.692,35.394,14.692c13.355,0,25.935-5.231,35.394-14.692C232.775,66.003,232.775,34.17,213.186,14.692z
                                    M189.639,61.804c-6.78,6.78-17.182,6.508-23.63,0.07c-6.391-6.391-6.391-17.184,0-23.576c6.564-6.589,17.101-6.489,23.5-0.066
                                   C196.306,44.997,195.942,55.542,189.639,61.804z" />
                </svg>
            </span>
            <span class="text-md">
                Create New Account
            </span>

        </div>
        <div class="mt-8">
            <form id="signupForm" autoComplete="off">
                <div class="flex flex-col mb-2">
                    <div class="flex relative ">
                        <span class="rounded-l-md inline-flex  items-center px-3 border-t bg-white border-l border-b  border-gray-300 text-gray-500 shadow-sm text-sm">
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1792 710v794q0 66-47 113t-113 47h-1472q-66 0-113-47t-47-113v-794q44 49 101 87 362 246 497 345 57 42 92.5 65.5t94.5 48 110 24.5h2q51 0 110-24.5t94.5-48 92.5-65.5q170-123 498-345 57-39 100-87zm0-294q0 79-49 151t-122 123q-376 261-468 325-10 7-42.5 30.5t-54 38-52 32.5-57.5 27-50 9h-2q-23 0-50-9t-57.5-27-52-32.5-54-38-42.5-30.5q-91-64-262-182.5t-205-142.5q-62-42-117-115.5t-55-136.5q0-78 41.5-130t118.5-52h1472q65 0 112.5 47t47.5 113z">
                                </path>
                            </svg>
                        </span>
                        <input required type="text" id="signup-name" class="rounded-r-lg flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Your Name" />
                    </div>
                </div>
                <div class="flex flex-col mb-2">
                    <div class="flex relative ">
                        <span class="rounded-l-md inline-flex  items-center px-3 border-t bg-white border-l border-b  border-gray-300 text-gray-500 shadow-sm text-sm">
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1792 710v794q0 66-47 113t-113 47h-1472q-66 0-113-47t-47-113v-794q44 49 101 87 362 246 497 345 57 42 92.5 65.5t94.5 48 110 24.5h2q51 0 110-24.5t94.5-48 92.5-65.5q170-123 498-345 57-39 100-87zm0-294q0 79-49 151t-122 123q-376 261-468 325-10 7-42.5 30.5t-54 38-52 32.5-57.5 27-50 9h-2q-23 0-50-9t-57.5-27-52-32.5-54-38-42.5-30.5q-91-64-262-182.5t-205-142.5q-62-42-117-115.5t-55-136.5q0-78 41.5-130t118.5-52h1472q65 0 112.5 47t47.5 113z">
                                </path>
                            </svg>
                        </span>
                        <input required type="text" id="signup-username" class=" rounded-r-lg flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Create username" />
                    </div>
                </div>
                <div class="flex flex-col mb-2">
                    <div class="flex relative ">
                        <span class="rounded-l-md inline-flex  items-center px-3 border-t bg-white border-l border-b  border-gray-300 text-gray-500 shadow-sm text-sm">
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1376 768q40 0 68 28t28 68v576q0 40-28 68t-68 28h-960q-40 0-68-28t-28-68v-576q0-40 28-68t68-28h32v-320q0-185 131.5-316.5t316.5-131.5 316.5 131.5 131.5 316.5q0 26-19 45t-45 19h-64q-26 0-45-19t-19-45q0-106-75-181t-181-75-181 75-75 181v320h736z">
                                </path>
                            </svg>
                        </span>
                        <input required maxlength="20" minlength="6" type="password" id="signup-password" class=" rounded-r-lg flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Create password" />
                    </div>
                </div>
                <div class="flex flex-col mb-6">
                    <div class="flex relative ">
                        <span class="rounded-l-md inline-flex  items-center px-3 border-t bg-white border-l border-b  border-gray-300 text-gray-500 shadow-sm text-sm">
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1376 768q40 0 68 28t28 68v576q0 40-28 68t-68 28h-960q-40 0-68-28t-28-68v-576q0-40 28-68t68-28h32v-320q0-185 131.5-316.5t316.5-131.5 316.5 131.5 131.5 316.5q0 26-19 45t-45 19h-64q-26 0-45-19t-19-45q0-106-75-181t-181-75-181 75-75 181v320h736z">
                                </path>
                            </svg>
                        </span>
                        <input required maxlength="20" minlength="6" type="password" id="signup-confirm" class=" rounded-r-lg flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Confirm password" />
                    </div>
                </div>
                <div class="flex w-full">
                    <button type="submit" class="py-3 px-4 rounded-lg bg-gradient-to-tr from-blue-600 to-blue-400 text-md uppercase shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none text-white w-full transition ease-in duration-200 text-center text-base font-bold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 ">
                        Register
                    </button>
                </div>
            </form>
        </div>
        <div class="flex items-center justify-center mt-6">
            <a id="haveAccount" class="inline-flex cursor-pointer items-center text-xs font-thin text-center text-gray-500 hover:text-gray-700 dark:text-gray-100 dark:hover:text-white">
                <span class="ml-2">
                    You already have an account?
                </span>
            </a>
        </div>
    </div>

</div>
<script defer>
    $('#signupForm').submit(async e => {
        e.preventDefault();
        if ($('#signup-password').val() != $('#signup-confirm').val()) {
            $('#signup-error').text('Password does not match').show();
            return;
        }
        let formData = new URLSearchParams();
        formData.append('name', $('#signup-name').val());
        formData.append('username', $('#signup-username').val());
        formData.append('password', $('#signup-password').val());


        // fetch request from client to server
        try {

            const res = await fetch('/api/user/signup.php', {
                method: 'POST',
                body: formData
            });
            let data = await res.text();
            if (!res.ok)
                throw new Error(data.message);
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Account created successfully',
                timer: 2000,
                showConfirmButton: false
            })
            setTimeout(() => {
                window.location.href = '/';
            }, 1800);
        } catch (err) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: err.message,
                timer: 2000,
                showConfirmButton: false
            })
        }
    })
</script>
<!-- Forget password -->
<form id="resetPassword" class="hidden lg:w-2/6 md:w-1/2 rounded-lg items-center flex flex-col md:ml-auto w-full mt-10 md:mt-0">

    <div class="flex flex-col w-full max-w-md px-4 py-8 bg-white rounded-lg shadow dark:bg-gray-800 sm:px-6 md:px-8 lg:px-10">
        <div class="self-center  flex flex-col items-center mb-6 text-xl font-light text-gray-600 sm:text-2xl dark:text-white">
            Forget Password
        </div>
        <div class="mt-8">
            <form action="#" autoComplete="off">
                <div class="flex flex-col mb-2">
                    <div class="flex relative ">
                        <span class="rounded-l-md inline-flex  items-center px-3 border-t bg-white border-l border-b  border-gray-300 text-gray-500 shadow-sm text-sm">
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1792 710v794q0 66-47 113t-113 47h-1472q-66 0-113-47t-47-113v-794q44 49 101 87 362 246 497 345 57 42 92.5 65.5t94.5 48 110 24.5h2q51 0 110-24.5t94.5-48 92.5-65.5q170-123 498-345 57-39 100-87zm0-294q0 79-49 151t-122 123q-376 261-468 325-10 7-42.5 30.5t-54 38-52 32.5-57.5 27-50 9h-2q-23 0-50-9t-57.5-27-52-32.5-54-38-42.5-30.5q-91-64-262-182.5t-205-142.5q-62-42-117-115.5t-55-136.5q0-78 41.5-130t118.5-52h1472q65 0 112.5 47t47.5 113z">
                                </path>
                            </svg>
                        </span>
                        <input type="text" id="sign-in-email" class=" rounded-r-lg flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Your email" />
                    </div>
                </div>
                <div class="flex w-full">
                    <button type="submit" class="py-3 px-4 rounded-lg bg-gradient-to-tr from-blue-600 to-blue-400 text-md uppercase shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none text-white w-full transition ease-in duration-200 text-center text-base font-bold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 ">
                        Send OTP
                    </button>
                </div>
            </form>
        </div>
        <div class="flex items-center justify-center mt-6">
            <a id="noAccount" class="inline-flex cursor-pointer items-center text-xs font-thin text-center text-gray-500 hover:text-gray-700 dark:text-gray-100 dark:hover:text-white">
                <span class="ml-2">
                    Create New Account?
                </span>
            </a>
        </div>
    </div>
</form>

<script defer>
    $('#login-sec').hide();
    $('#resetPassword').hide();
    $('#haveAccount').click(() => {
        $('#login-sec').show();
        $('#signup-sec').hide();
    });
    $('#noAccount').click(() => {
        $('#login-sec').hide();
        $('#signup-sec').show();
    });
</script>