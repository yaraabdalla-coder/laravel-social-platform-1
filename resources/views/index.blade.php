@extends('layout.app')

@section('title', 'All Posts')

@section('content')

    <!-- Header -->
    <div class="mb-8 flex flex-col gap-5 md:flex-row md:items-end md:justify-between">

        <div>
            <span class="text-sm font-semibold uppercase tracking-wider text-indigo-600">
                Community
            </span>

            <h1 class="mt-1 text-3xl font-bold text-slate-800">
                All Posts
            </h1>

            <p class="mt-2 text-slate-500">
                Browse and manage your posts.
            </p>
        </div>

        <a href="{{ route('posts.create') }}"
           class="rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600
                  px-5 py-3 text-center font-semibold text-white shadow-md
                  transition hover:-translate-y-0.5 hover:shadow-lg">

            + Create Post

        </a>

    </div>


    <!-- Success -->
    @if (session('success'))

        <div class="mb-6 rounded-xl border border-green-200
                    bg-green-50 px-5 py-4 text-green-700">

            ✓ {{ session('success') }}

        </div>

    @endif


    <!-- Error -->
    @if (session('error'))

        <div class="mb-6 rounded-xl border border-red-200
                    bg-red-50 px-5 py-4 text-red-700">

            {{ session('error') }}

        </div>

    @endif


    <!-- Search -->
    <form action="{{ route('posts.index') }}"
          method="GET"
          class="mb-8 rounded-2xl border border-slate-200
                 bg-white p-4 shadow-sm">

        <div class="flex flex-col gap-3 sm:flex-row">

            <input
                type="text"
                name="search"
                value="{{ $search }}"
                placeholder="Search by title or content..."
                class="flex-1 rounded-xl border border-slate-300
                       px-4 py-3 outline-none transition
                       focus:border-indigo-500
                       focus:ring-4 focus:ring-indigo-100"
            >

            <button
                type="submit"
                class="rounded-xl bg-indigo-600 px-6 py-3
                       font-semibold text-white
                       transition hover:bg-indigo-700">

                Search

            </button>

            @if ($search)

                <a href="{{ route('posts.index') }}"
                   class="rounded-xl border border-slate-300
                          px-6 py-3 text-center
                          font-semibold text-slate-600
                          hover:bg-slate-50">

                    Clear

                </a>

            @endif

        </div>

    </form>


    <!-- Posts -->
    @if ($posts->count())

        <div class="grid gap-6 md:grid-cols-2">

            @foreach ($posts as $post)

                <article class="group overflow-hidden rounded-2xl
                                border border-slate-200 bg-white
                                shadow-sm transition
                                hover:-translate-y-1 hover:shadow-xl">

                    <div class="h-2 bg-gradient-to-r
                                from-indigo-600 to-purple-600">
                    </div>

                    <div class="p-6">

                        <div class="mb-4 flex items-center justify-between">

                            <span class="rounded-full bg-indigo-50
                                         px-3 py-1 text-xs font-semibold
                                         text-indigo-600">

                                Post #{{ $post->id }}

                            </span>

                            <span class="text-xs text-slate-400">

                                {{ $post->created_at?->format('M d, Y') }}

                            </span>

                        </div>


                        <h2 class="mb-3 text-xl font-bold
                                   text-slate-800
                                   group-hover:text-indigo-600">

                            {{ $post->title }}

                        </h2>


                        <p class="mb-6 leading-7 text-slate-600">

                            {{ \Illuminate\Support\Str::limit($post->body, 120) }}

                        </p>


                        <div class="flex items-center justify-between
                                    border-t border-slate-100 pt-4">

                            <span class="text-sm text-slate-400">

                                User #{{ $post->user_id }}

                            </span>


                            <a href="{{ route('posts.show', $post) }}"
                               class="rounded-lg bg-indigo-50 px-4 py-2
                                      text-sm font-semibold text-indigo-600
                                      transition hover:bg-indigo-600
                                      hover:text-white">

                                View Post →

                            </a>

                        </div>

                    </div>

                </article>

            @endforeach

        </div>


        <!-- Pagination -->
        <div class="mt-8">

            {{ $posts->links() }}

        </div>

    @else

        <div class="rounded-2xl border border-dashed
                    border-slate-300 bg-white p-12
                    text-center shadow-sm">

            <div class="mx-auto mb-5 flex h-16 w-16
                        items-center justify-center rounded-full
                        bg-indigo-50 text-2xl">

                📝

            </div>

            <h2 class="text-xl font-bold text-slate-800">
                No Posts Found
            </h2>

            <p class="mt-2 text-slate-500">
                Try another search or create a new post.
            </p>

            <a href="{{ route('posts.create') }}"
               class="mt-6 inline-block rounded-xl
                      bg-indigo-600 px-6 py-3
                      font-semibold text-white">

                Create Post

            </a>

        </div>

    @endif

@endsection