<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Sign Up</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&amp;display=swap" rel="stylesheet" />
    <!-- Material Symbols -->
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <!-- Tailwind Configuration -->
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#197fe6",
                        "background-light": "#f6f7f8",
                        "background-dark": "#111921",
                    },
                    fontFamily: {
                        "display": ["Manrope", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display antialiased text-slate-900 dark:text-white">
    <div class="flex min-h-screen w-full overflow-hidden">
        <!-- Left Side: Hero Image & Branding -->
        <div class="relative hidden lg:flex w-1/2 flex-col justify-end p-16 bg-slate-900">
            <!-- Background Image -->
            <div class="absolute inset-0 z-0 h-full w-full bg-cover bg-center"
                data-alt="Modern electric car driving on a scenic coastal road at sunset"
                style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCAhfuNBlCdWyj0Ak8YUz2n9cbDXNt_4m7UkRmJ8jzLLqeMdbrXEkrxyfzISL860sh9sVVRBdjrQAES9CDv4PosPf5iaVL8qWUycdQZWqMJJIb5ljD9lN19-vnKio3BfmzmElIyT3OGfYLfIdd2RH84RaKKNkiAGWTUhh-IuEb-bJjMZEeL6DJ566eKE-iXHlldzv8vBAzBSvwnjb2zH3-RKTbrp45X3KSQAEsvFDzeSUl-YFSO5sL-UIW9_LdEXXSg-6iryTOC8Q');">
            </div>
            <!-- Gradient Overlay -->
            <div class="absolute inset-0 z-10 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
            <!-- Content -->
            <div class="relative z-20 flex flex-col gap-6 max-w-xl">
                <div class="flex items-center gap-3 text-white">
                    <div class="size-8">
                        <svg class="w-full h-full" fill="none" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_6_319)">
                                <path
                                    d="M8.57829 8.57829C5.52816 11.6284 3.451 15.5145 2.60947 19.7452C1.76794 23.9758 2.19984 28.361 3.85056 32.3462C5.50128 36.3314 8.29667 39.7376 11.8832 42.134C15.4698 44.5305 19.6865 45.8096 24 45.8096C28.3135 45.8096 32.5302 44.5305 36.1168 42.134C39.7033 39.7375 42.4987 36.3314 44.1494 32.3462C45.8002 28.361 46.2321 23.9758 45.3905 19.7452C44.549 15.5145 42.4718 11.6284 39.4217 8.57829L24 24L8.57829 8.57829Z"
                                    fill="currentColor"></path>
                            </g>
                        </svg>
                    </div>
                    <span class="text-2xl font-bold tracking-tight">MaBagnole</span>
                </div>
                <h1 class="text-white text-5xl font-black leading-tight tracking-[-0.033em]">
                    Drive your dream today.
                </h1>
                <p class="text-slate-200 text-lg font-medium leading-relaxed max-w-md">
                    Premium cars at unbeatable prices. Join thousands of happy travelers exploring the world with
                    MaBagnole.
                </p>
                <div class="flex gap-2 pt-4">
                    <div class="h-1.5 w-12 rounded-full bg-primary"></div>
                    <div class="h-1.5 w-12 rounded-full bg-white/30"></div>
                    <div class="h-1.5 w-12 rounded-full bg-white/30"></div>
                </div>
            </div>
        </div>
        <!-- Right Side: Form Area -->
        <div
            class="relative flex w-full lg:w-1/2 flex-col items-center justify-center overflow-y-auto bg-background-light dark:bg-background-dark px-6 py-12 lg:px-20">
            <div class="w-full max-w-[440px] flex flex-col gap-8">
                <!-- Mobile Logo (Only visible on small screens) -->
                <div class="lg:hidden flex justify-center mb-4">
                    <div class="flex items-center gap-2 text-slate-900 dark:text-white">
                        <div class="size-8">
                            <svg class="w-full h-full text-primary" fill="none" viewbox="0 0 48 48"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_6_319_mobile)">
                                    <path
                                        d="M8.57829 8.57829C5.52816 11.6284 3.451 15.5145 2.60947 19.7452C1.76794 23.9758 2.19984 28.361 3.85056 32.3462C5.50128 36.3314 8.29667 39.7376 11.8832 42.134C15.4698 44.5305 19.6865 45.8096 24 45.8096C28.3135 45.8096 32.5302 44.5305 36.1168 42.134C39.7033 39.7375 42.4987 36.3314 44.1494 32.3462C45.8002 28.361 46.2321 23.9758 45.3905 19.7452C44.549 15.5145 42.4718 11.6284 39.4217 8.57829L24 24L8.57829 8.57829Z"
                                        fill="currentColor"></path>
                                </g>
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold">MaBagnole</h2>
                    </div>
                </div>
                <!-- Header Text -->
                <div class="flex flex-col gap-2 text-center lg:text-left">
                    <h2 class="text-3xl font-black leading-tight tracking-[-0.033em] text-slate-900 dark:text-white">
                        Welcome Back</h2>
                    <p class="text-slate-500 dark:text-slate-400 text-base font-normal">Enter your details to manage
                        your bookings.</p>
                </div>
                <!-- Tabs -->
                <div class="w-full">
                    <div class="flex border-b border-slate-200 dark:border-slate-700">
                        <a href="login.php" class="flex flex-1 flex-col items-center justify-center border-b-[3px] border-transparent pb-3 pt-2 hover:border-slate-300 dark:hover:border-slate-600 transition-colors">
                            <span class="text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-slate-300 text-sm font-bold leading-normal tracking-[0.015em]">Log In</span>
                        </a>
                        <a href="register.php" class="flex flex-1 flex-col items-center justify-center border-b-[3px] border-primary pb-3 pt-2">
                            <span
                                class="text-primary text-sm font-bold leading-normal tracking-[0.015em]">Sign
                                Up</span>
                        </a>
                    </div>
                </div>
                <!-- Form -->
                <form class="flex flex-col gap-5" method="POST">
                    <div class="flex flex-col gap-1.5">
                        <label class="text-slate-900 dark:text-white text-sm font-bold leading-normal">Full
                            Name</label>
                        <div class="relative flex items-center">
                            <input name="fname" class="flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-slate-900 dark:text-white bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 focus:border-primary focus:ring-1 focus:ring-primary h-12 text-base placeholder:text-slate-400 dark:placeholder:text-slate-500 transition-all shadow-sm"
                                placeholder="Full name" type="text" />
                        </div>
                    </div>
                    
                    <!-- Email Field -->
                    <div class="flex flex-col gap-1.5">
                        <label class="text-slate-900 dark:text-white text-sm font-bold leading-normal" for="email">Email
                            Address</label>
                        <div class="relative flex items-center">
                            <span
                                class="material-symbols-outlined absolute left-4 text-slate-400 text-[20px]">mail</span>
                            <input name="email"
                                class="flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-slate-900 dark:text-white bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 focus:border-primary focus:ring-1 focus:ring-primary h-12 pl-11 pr-4 text-base placeholder:text-slate-400 dark:placeholder:text-slate-500 transition-all shadow-sm"
                                id="email" placeholder="name@example.com" type="email" />
                        </div>
                    </div>
                    <!-- Password Field -->
                    <div class="flex flex-col gap-1.5">
                        <label class="text-slate-900 dark:text-white text-sm font-bold leading-normal"
                            for="password">Password</label>
                        <div class="relative flex items-center">
                            <span
                                class="material-symbols-outlined absolute left-4 text-slate-400 text-[20px]">lock</span>
                            <input name="password"
                                class="flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-slate-900 dark:text-white bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 focus:border-primary focus:ring-1 focus:ring-primary h-12 pl-11 pr-11 text-base placeholder:text-slate-400 dark:placeholder:text-slate-500 transition-all shadow-sm"
                                id="password" placeholder="Enter your new password" type="password" />
                            <button
                                class="absolute right-4 text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 flex items-center justify-center"
                                type="button">
                                <span class="material-symbols-outlined text-[20px]">visibility</span>
                            </button>
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <button name="register"
                        class="flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 bg-primary hover:bg-blue-600 transition-colors text-white text-base font-bold leading-normal tracking-[0.015em] shadow-md shadow-blue-500/20">
                        Sign up
                    </button>
                </form>
                <!-- Footer Text -->
                <div class="mt-4 flex items-center justify-center gap-2">
                    <span class="text-slate-500 dark:text-slate-400 text-sm">already have an account?</span>
                    <a class="text-primary text-sm font-bold hover:underline" href="login.php">Login</a>
                </div>
                <!-- Trust Badge -->
                <div class="mt-8 flex items-center justify-center gap-2 text-slate-400 dark:text-slate-600">
                    <span class="material-symbols-outlined text-lg">verified_user</span>
                    <span class="text-xs font-medium uppercase tracking-widest">Secure Login</span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>