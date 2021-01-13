<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Styles -->
    <link href="{{ mix('css/app.css', 'build') }}" rel="stylesheet">
    <livewire:styles />
</head>
<body class="container mx-auto">

<div class="my-8">
    <nav class="bg-white shadow">
        <div class="mx-auto px-2 sm:px-4 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex px-2 lg:px-0">
                    <div class="flex-shrink-0 flex items-center">
                        <img class="block lg:hidden h-8 w-auto"
                             src="https://via.placeholder.com/160x16?text=Workflow" alt="Workflow">
                        <img class="hidden lg:block h-8 w-auto"
                             src="https://via.placeholder.com/16x16?text=WF" alt="Workflow">
                    </div>
                    <div class="hidden lg:ml-6 lg:flex">
                        <a href="#"
                           class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-500 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out">
                            Dashboard
                        </a>
                        <a href="#"
                           class="ml-8 inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            Team
                        </a>
                        <a href="#"
                           class="ml-8 inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            Projects
                        </a>
                        <a href="#"
                           class="ml-8 inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            Calendar
                        </a>
                    </div>
                </div>

                <livewire:search-dropdown />

                <div class="flex items-center lg:hidden">
                    <!-- Mobile menu button -->
                    <button
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                        aria-label="Main menu" aria-expanded="false">
                        <!-- Icon when menu is closed. -->
                        <!-- Menu open: "hidden", Menu closed: "block" -->
                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <!-- Icon when menu is open. -->
                        <!-- Menu open: "block", Menu closed: "hidden" -->
                        <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="hidden lg:ml-4 lg:flex lg:items-center">
                    <button
                        class="flex-shrink-0 p-1 border-2 border-transparent text-gray-400 rounded-full hover:text-gray-500 focus:outline-none focus:text-gray-500 focus:bg-gray-100 transition duration-150 ease-in-out"
                        aria-label="Notifications">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>

                    <!-- Profile dropdown -->
                    <div class="ml-4 relative flex-shrink-0">
                        <div>
                            <button
                                class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out"
                                id="user-menu" aria-label="User menu" aria-haspopup="true">
                                <img class="h-8 w-8 rounded-full"
                                     src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                     alt="">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>

<livewire:counter/>

<hr>
<livewire:contact-form/>

<hr>
<h2 class="mt-4 text-lg font-semibold">Livewire Data Tables</h2>
<livewire:data-tables/>

<div class="my-8">
    <hr>
    <h2 class="text-lg font-semibold mt-4">Livewire Blog Posts with Comments</h2>

    <ul class="list-disc mt-4">
        @foreach ($posts as $post)
            <li class="my-1">
                <a href="{{ route('post.show', $post) }}" class="text-blue-600">
                    {{ $post->title }}
                </a>
                <a href="{{ route('post.edit', $post) }}" class="bg-blue-400 text-white rounded px-4 py-1">Edit</a>
            </li>
        @endforeach
    </ul>
</div>

<div class="my-8">
    <hr>
    <h2 class="text-lg font-semibold mt-4">Polling example</h2>

    <livewire:poll-example/>
</div>

<div class="my-8">
    <hr>
    <h2 class="text-lg font-semibold mt-4">Events example with tags</h2>
    <div class="mt-4">
        <div
            class="w-1/2 border px-4 py-2 textarea"
            x-data
            x-init="
            new Taggle($el, {
                tags: ['there', 'are', 'prefilled', 'tags'],
                onTagAdd: function(e, tag) {
                    console.log('You added: ' + tag);
                }
            })
        "
        >

        </div>
        <div class="h-96"></div>
    </div>
</div>

<!-- Scripts -->
<livewire:scripts />
<script src="{{ mix('js/app.js', 'build') }}"></script>
</body>
</html>
