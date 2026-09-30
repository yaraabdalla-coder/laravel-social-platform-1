@extends('layout.app')

@section('title', 'Create Post')

@section('content')

    <div class="mx-auto max-w-3xl">

        <a href="{{ route('posts.index') }}"
           class="mb-6 inline-flex text-sm font-semibold
                  text-indigo-600 hover:text-indigo-800">

            ← Back to Posts

        </a>


        <div class="overflow-hidden rounded-2xl
                    border border-slate-200 bg-white shadow-xl">

            <div class="bg-gradient-to-r
                        from-indigo-600 to-purple-600
                        px-6 py-6 text-white">

                <h1 class="text-2xl font-bold">
                    Create New Post
                </h1>

                <p class="mt-1 text-indigo-100">
                    Share your thoughts with the community.
                </p>

            </div>


            <form action="{{ route('posts.store') }}"
                  method="POST"
                  class="space-y-6 p-6">

                @csrf


                <!-- Title -->
                <div>

                    <label for="title"
                           class="mb-2 block text-sm font-semibold">

                        Post Title

                    </label>

                    <input
                        type="text"
                        name="title"
                        id="title"
                        value="{{ old('title') }}"
                        placeholder="Enter post title..."
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 outline-none
                               focus:border-indigo-500
                               focus:ring-4 focus:ring-indigo-100"
                    >

                    @error('title')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                <!-- Body -->
                <div>

                    <label for="body"
                           class="mb-2 block text-sm font-semibold">

                        Post Content

                    </label>

                    <textarea
                        name="body"
                        id="body"
                        rows="7"
                        placeholder="Write your post..."
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 outline-none
                               focus:border-indigo-500
                               focus:ring-4 focus:ring-indigo-100"
                    >{{ old('body') }}</textarea>

                    @error('body')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                <!-- Status -->
                <div>

                    <label for="poststatus_id"
                           class="mb-2 block text-sm font-semibold">

                        Post Status

                    </label>

                    <select
                        name="poststatus_id"
                        id="poststatus_id"
                        class="w-full rounded-xl border border-slate-300
                               bg-white px-4 py-3 outline-none
                               focus:border-indigo-500
                               focus:ring-4 focus:ring-indigo-100"
                    >

                        <option value="" disabled
                            {{ old('poststatus_id') ? '' : 'selected' }}>

                            Select post status

                        </option>

                        @foreach ($post_statuses as $status)

                            <option
                                value="{{ $status->id }}"
                                {{ old('poststatus_id') == $status->id ? 'selected' : '' }}
                            >

                                {{ ucfirst($status->type) }}

                            </option>

                        @endforeach

                    </select>

                    @error('poststatus_id')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                <!-- Buttons -->
                <div class="flex gap-3 border-t pt-6">

                    <a href="{{ route('posts.index') }}"
                       class="flex-1 rounded-xl border border-slate-300
                              px-6 py-3 text-center font-semibold
                              text-slate-600 hover:bg-slate-50">

                        Cancel

                    </a>

                    <button
                        type="submit"
                        class="flex-1 rounded-xl
                               bg-gradient-to-r
                               from-indigo-600 to-purple-600
                               px-6 py-3 font-semibold text-white
                               shadow-md hover:shadow-lg">

                        Publish Post

                    </button>

                </div>

            </form>

        </div>

    </div>

@endsection