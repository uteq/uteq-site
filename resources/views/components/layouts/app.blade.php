<!DOCTYPE html>
<html class="scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="antialiased" x-data="{ showMenu : false }">
<div
    x-transition
    x-show="showMenu"
    x-cloak
    class="fixed top-0 left-0 backdrop-blur w-full h-full z-10 bg-black/30 transition-all"
></div>

<header
    class="fixed inset-x-0 top-0 z-10 bg-secondary"
>
    <nav class="border-b border-gray-600" aria-label="Global">
        <div class="flex max-w-6xl mx-auto items-center justify-between p-6 lg:px-8">
            <div class="flex lg:flex-auto">
                <a href="/" class="-m-1.5 p-1.5">
                    <span class="sr-only">{{ config('app.name') }}</span>
                    <div class="">
                        <svg class="h-10 w-auto" viewBox="0 0 187 66" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M36.6695 7.22359L18.3348 17.8092L12.2232 21.3377V49.5661L6.11158 46.0393V46.0375H6.10979L0 42.5108V14.2807L24.4463 0.166504L36.6695 7.22359ZM64.8547 54.8839C61.9949 58.4251 60.2746 60.1183 56.8953 62.3545C53.169 64.2742 50.8772 65.1083 45.9142 65.5612C42.3875 65.5612 39.7577 65.0382 32.9001 62.3545C28.7155 60.627 26.341 59.9494 22.0125 59.615C13.3089 59.2717 9.04519 60.3484 2.76644 64.9734C4.44173 61.6426 9.44244 55.5886 17.4091 54.1577C17.4091 54.1577 18.1551 53.9381 19.6274 53.8433L18.3342 53.097V53.0952H18.3324L12.2226 49.5684V49.5667L36.669 35.4525V7.22415L42.7805 10.7527H42.7823L48.8921 14.2812V42.5096L27.9447 54.6036C29.5509 54.9447 30.5993 55.265 30.5993 55.265C31.6221 55.5472 32.7438 55.8906 34.02 56.2878C35.8894 56.8765 37.387 57.4933 38.8102 58.0794C41.398 59.1451 43.7398 60.1096 47.6237 60.6198C55.6658 60.7223 59.5718 59.7049 64.8511 54.8839H64.8547Z" fill="#3EE88C"/>
                            <path d="M89.5102 36.8118V20.2286H95.7909V36.7722C95.7909 43.1717 91.1349 47.8078 83.9627 47.8078C77.2858 47.8078 72.1147 43.5877 72.1147 36.7722V20.2286H78.3755V36.792C78.3755 40.0214 80.337 42.4584 83.9627 42.4584C87.5092 42.4584 89.5102 40.0413 89.5102 36.8118ZM109.588 47.1738V25.6176H102.059V20.2286H123.377V25.6176H115.848V47.1738H109.588ZM129.962 47.1738V20.2286H148.943V25.6374H136.243V31.1454H147.14V36.5344H136.243V41.7848H149.121V47.1738H129.962ZM161.372 33.6814C161.372 38.6346 165.176 42.399 169.832 42.399C174.568 42.399 178.312 38.6346 178.312 33.6814C178.312 28.7084 174.568 24.9638 169.832 24.9638C165.176 24.9638 161.372 28.7084 161.372 33.6814ZM155.112 33.6616C155.112 25.8157 161.689 19.5549 169.832 19.5549C177.956 19.5549 184.573 25.8157 184.573 33.6616C184.573 36.891 183.444 39.8629 181.542 42.2405L185.425 46.1039L181.264 50.3439L176.965 46.0247C174.845 47.154 172.408 47.788 169.832 47.788C161.689 47.788 155.112 41.4876 155.112 33.6616Z" fill="white"/>
                        </svg>
                    </div>
                </a>
            </div>
            <div class="flex lg:hidden">
                <button x-on:click="showMenu = ! showMenu" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
                <div class="absolute right-0 top-0 w-full p-4" x-show="showMenu" x-cloak>
                    <button x-on:click.prevent="showMenu = !showMenu " class="px-2 pt-2 pb-6 font-bold flex justify-between text-primary-900 w-full border-b border-gray-100 border-primary-900 bg-white rounded-t-2xl">
                        <div class="text-secondary">
                            <svg class="h-10 w-auto" viewBox="0 0 187 66" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M36.6695 7.22359L18.3348 17.8092L12.2232 21.3377V49.5661L6.11158 46.0393V46.0375H6.10979L0 42.5108V14.2807L24.4463 0.166504L36.6695 7.22359ZM64.8547 54.8839C61.9949 58.4251 60.2746 60.1183 56.8953 62.3545C53.169 64.2742 50.8772 65.1083 45.9142 65.5612C42.3875 65.5612 39.7577 65.0382 32.9001 62.3545C28.7155 60.627 26.341 59.9494 22.0125 59.615C13.3089 59.2717 9.04519 60.3484 2.76644 64.9734C4.44173 61.6426 9.44244 55.5886 17.4091 54.1577C17.4091 54.1577 18.1551 53.9381 19.6274 53.8433L18.3342 53.097V53.0952H18.3324L12.2226 49.5684V49.5667L36.669 35.4525V7.22415L42.7805 10.7527H42.7823L48.8921 14.2812V42.5096L27.9447 54.6036C29.5509 54.9447 30.5993 55.265 30.5993 55.265C31.6221 55.5472 32.7438 55.8906 34.02 56.2878C35.8894 56.8765 37.387 57.4933 38.8102 58.0794C41.398 59.1451 43.7398 60.1096 47.6237 60.6198C55.6658 60.7223 59.5718 59.7049 64.8511 54.8839H64.8547Z" fill="#3EE88C"/>
                                <path d="M89.5102 36.8118V20.2286H95.7909V36.7722C95.7909 43.1717 91.1349 47.8078 83.9627 47.8078C77.2858 47.8078 72.1147 43.5877 72.1147 36.7722V20.2286H78.3755V36.792C78.3755 40.0214 80.337 42.4584 83.9627 42.4584C87.5092 42.4584 89.5102 40.0413 89.5102 36.8118ZM109.588 47.1738V25.6176H102.059V20.2286H123.377V25.6176H115.848V47.1738H109.588ZM129.962 47.1738V20.2286H148.943V25.6374H136.243V31.1454H147.14V36.5344H136.243V41.7848H149.121V47.1738H129.962ZM161.372 33.6814C161.372 38.6346 165.176 42.399 169.832 42.399C174.568 42.399 178.312 38.6346 178.312 33.6814C178.312 28.7084 174.568 24.9638 169.832 24.9638C165.176 24.9638 161.372 28.7084 161.372 33.6814ZM155.112 33.6616C155.112 25.8157 161.689 19.5549 169.832 19.5549C177.956 19.5549 184.573 25.8157 184.573 33.6616C184.573 36.891 183.444 39.8629 181.542 42.2405L185.425 46.1039L181.264 50.3439L176.965 46.0247C174.845 47.154 172.408 47.788 169.832 47.788C161.689 47.788 155.112 41.4876 155.112 33.6616Z" fill="currentColor"/>
                            </svg>
                        </div>

                        <div class="mt-1">
                            <svg class="w-8 h-8" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </div>
                    </button>
                    <nav class="flex flex-col bg-white rounded-b-2xl">
                        <a href="#how" x-on:click="showMenu = false" class="px-2 py-4 text-primary-600 bg-white flex justify-between w-full border-primary-900 hover:text-primary-100 hover:bg-primary-600">
                            Ons proces
                            <svg class="w-6 h-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M9 5l7 7-7 7"></path></svg>
                        </a>
                        <a href="#projects" x-on:click="showMenu = false" class="px-2 py-4 text-primary-600 bg-white flex justify-between w-full border-primary-900 hover:text-primary-100 hover:bg-primary-600">
                            Producten
                            <svg class="w-6 h-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M9 5l7 7-7 7"></path></svg>
                        </a>
                        <a href="#services" x-on:click="showMenu = false" class="px-2 py-4 text-primary-600 bg-white flex justify-between w-full border-primary-900 hover:text-primary-100 hover:bg-primary-600">
                            Diensten
                            <svg class="w-6 h-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M9 5l7 7-7 7"></path></svg>
                        </a>
{{--                        <a href="#" x-on:click="showMenu = false" class="px-2 py-4 text-primary-600 bg-white flex justify-between w-full border-primary-900 hover:text-primary-100 hover:bg-primary-600">--}}
{{--                            Over ons--}}
{{--                            <svg class="w-6 h-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M9 5l7 7-7 7"></path></svg>--}}
{{--                        </a>--}}
                        <a href="#footer" x-on:click="showMenu = false" class="px-2 py-4 text-primary-600 bg-white flex justify-between w-full border-primary-900 hover:text-primary-100 hover:bg-primary-600">
                            Contact
                            <svg class="w-6 h-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </nav>
                </div>
            </div>
            <div class="hidden lg:flex lg:gap-x-16 lg:flex-grow lg:justify-end">
                <a href="#how" class="text-lg leading-6 font-sregs text-white">Ons proces</a>
                <a href="#projects" class="text-lg leading-6 font-sregs text-white">Producten</a>
                <a href="#services" class="text-lg leading-6 font-sregs text-white">Diensten</a>
{{--                <a href="#" class="text-lg leading-6 font-sregs text-white">Over ons</a>--}}
                <a href="#footer" class="text-lg leading-6 font-sregs text-white">Contact</a>
            </div>
        </div>

    </nav>

</header>

{{ $slot }}

@filamentScripts
@vite('resources/js/app.js')

<div class="">
    @livewire('wire-elements-modal')
</div>
</body>
</html>
