<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>@yield('title', 'Posts App')</title>
</head>

<body class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-purple-50 text-slate-800">

    <!-- Navbar -->
    <nav class="border-b border-white/60 bg-white/80 shadow-sm backdrop-blur-md">
        <div class="mx-auto flex max-w-6xl items-center justify-between px-6 py-4">

            <!-- Logo -->
            <a href="{{ route('posts.index') }}" class="flex items-center gap-3">

                <div class="flex h-11 w-11 items-center justify-center rounded-xl
                            bg-gradient-to-br from-indigo-600 to-purple-600
                            font-bold text-white shadow-lg">
                    P
                </div>

                <div>
                    <h1 class="text-lg font-bold text-slate-800">
                        Posts App
                    </h1>

                    <p class="text-xs text-slate-500">
                        Share your ideas
                    </p>
                </div>

            </a>

            <!-- Navigation -->
            <div class="flex items-center gap-3">

                <a href="{{ route('posts.index') }}"
                   class="rounded-xl px-4 py-2 text-sm font-semibold
                          text-slate-600 transition
                          hover:bg-indigo-50 hover:text-indigo-600">
                    All Posts
                </a>

                <a href="{{ route('posts.create') }}"
                   class="rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600
                          px-5 py-2.5 text-sm font-semibold text-white
                          shadow-md transition
                          hover:-translate-y-0.5 hover:shadow-lg">
                    + Create Post
                </a>

            </div>

        </div>
    </nav>


    <!-- Main Content -->
    <main class="min-h-[calc(100vh-150px)] px-4 py-10 sm:px-6 lg:px-8">

        <div class="mx-auto max-w-5xl">

            @yield('content')

        </div>

    </main>


    <!-- Footer -->
    <footer class="border-t border-slate-200 bg-white/70">

        <div class="mx-auto max-w-6xl px-6 py-6 text-center">

            <p class="text-sm text-slate-500">
                © {{ date('Y') }} Posts App.
                Built with
                <span class="font-semibold text-indigo-600">
                    Laravel
                </span>
            </p>

        </div>

    </footer>

</body>
</html>