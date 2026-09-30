@extends('layout.app')

@section('title', $post->title)

@section('content')

    <div class="mx-auto max-w-3xl">

        <!-- Back -->
        <a href="{{ route('posts.index') }}"
           class="mb-6 inline-flex text-sm font-semibold
                  text-indigo-600 hover:text-indigo-800">

            ← Back to Posts

        </a>


        <!-- Success -->
        @if (session('success'))

            <div class="mb-6 rounded-xl border border-green-200
                        bg-green-50 px-5 py-4 text-green-700">

                ✓ {{ session('success') }}

            </div>

        @endif


        <!-- Post -->
        <article class="overflow-hidden rounded-2xl
                        border border-slate-200
                        bg-white shadow-xl">

            <div class="h-2 bg-gradient-to-r
                        from-indigo-600 to-purple-600">
            </div>


            <div class="p-8">

                <!-- Meta -->
                <div class="mb-5 flex flex-wrap
                            items-center justify-between gap-3">

                    <span class="rounded-full bg-indigo-50
                                 px-4 py-1.5 text-sm font-semibold
                                 text-indigo-600">

                        Post #{{ $post->id }}

                    </span>

                    <span class="text-sm text-slate-400">

                        {{ $post->created_at?->format('M d, Y - h:i A') }}

                    </span>

                </div>


                <!-- Title -->
                <h1 class="mb-6 text-3xl font-bold text-slate-800">

                    {{ $post->title }}

                </h1>


                <div class="mb-6 h-px bg-slate-100"></div>


                <!-- Body -->
                <p class="whitespace-pre-line text-lg
                          leading-8 text-slate-600">

                    {{ $post->body }}

                </p>


                <!-- Info -->
                <div class="mt-8 rounded-2xl bg-slate-50 p-6">

                    <h3 class="mb-5 font-bold text-slate-700">
                        Post Information
                    </h3>

                    <div class="grid gap-5 sm:grid-cols-3">

                        <div>
                            <p class="text-xs uppercase text-slate-400">
                                Post ID
                            </p>

                            <p class="mt-1 font-semibold">
                                #{{ $post->id }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs uppercase text-slate-400">
                                User ID
                            </p>

                            <p class="mt-1 font-semibold">
                                #{{ $post->user_id }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs uppercase text-slate-400">
                                Status ID
                            </p>

                            <p class="mt-1 font-semibold">
                                #{{ $post->poststatus_id }}
                            </p>
                        </div>

                    </div>

                </div>


                <!-- Actions -->
                <div class="mt-8 flex flex-col gap-3 sm:flex-row">

                    <!-- Edit -->
                    <a href="{{ route('posts.edit', $post) }}"
                       class="flex-1 rounded-xl bg-indigo-600
                              px-6 py-3 text-center font-semibold
                              text-white hover:bg-indigo-700">

                        ✏️ Edit Post

                    </a>


                    <!-- Delete -->
                    <form action="{{ route('posts.destroy', $post) }}"
                          method="POST"
                          class="flex-1"
                          onsubmit="return confirm('Are you sure you want to delete this post?');">

                        @csrf

                        @method('DELETE')

                        <button
                            type="submit"
                            class="w-full rounded-xl
                                   bg-red-500 px-6 py-3
                                   font-semibold text-white
                                   hover:bg-red-600">

                            🗑️ Delete Post

                        </button>

                    </form>

                </div>

            </div>

        </article>

    </div>

@endsection