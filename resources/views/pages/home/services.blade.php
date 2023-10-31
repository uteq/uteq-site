<div class="py-32 bg-floral-white" id="services">
    <div class="max-w-6xl mx-auto px-8 lg:px-0">
        <div class="text-5xl font-sregs-bold flex justify-center pb-20">
            Onze Diensten
        </div>

        <div class="flex flex-col gap-20">
            <div class="flex flex-col md:flex-row gap-14">
                <div class="md:w-1/2">
                    <img class="rounded-[40px]" src="{{ Vite::image('superkracht1.webp') }}" alt="uteq optocht">
                </div>
{{--                <div class="md:w-1/2 flex flex-col gap-4 my-auto">--}}
{{--                    <div class="font-sregs-bold text-4xl">SaaS web ontwikkeling en design</div>--}}
{{--                    <div class="leading-7">We beginnen met een ontmoeting en een kopje koffie om elkaar beter te leren kennen. Jij kiest het abonnementsmodel dat het beste bij jou past.</div>--}}
{{--                    --}}
{{--                </div>--}}
                <div>
                    <h3 class="text-lg lg:text-4xl leading-relaxed max-w-4xl mx-auto">
                        <span class="whitespace-nowrap">API integraties</span>
                        · <span class="whitespace-nowrap">Adminpanelen</span>
                        · <span class="whitespace-nowrap">Notificatiesystemen</span>
                        · <span class="whitespace-nowrap">Consultancy</span>
                        · <span class="whitespace-nowrap">UX/UI</span>
                        · <span class="whitespace-nowrap">Grafish ontwerp</span>
                        · <span class="whitespace-nowrap">SaaS- web ontwikkeling en design</span>
                    </h3>

                    <x-contact-form-modal title="Afspraak maken">
                        <button class="mt-8 rounded-xl bg-primary px-8 py-4 font-semibold text-white shadow-sm inline-flex gap-2 items-center">
                            <svg width="20" height="20" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17 12C17 10.3333 18.19 8.66667 20.5717 8.66667C21.8345 8.66667 23.0457 8.16499 23.9387 7.27201C24.8317 6.37902 25.3333 5.16787 25.3333 3.905V2.83333M10.3333 12V11.1667C10.3333 9.84058 10.8601 8.56881 11.7978 7.63113C12.7355 6.69345 14.0073 6.16667 15.3333 6.16667C16.2174 6.16667 17.0652 5.81548 17.6904 5.19036C18.3155 4.56523 18.6667 3.71739 18.6667 2.83333V2M25.3333 16.3333V22C25.3333 24.6522 24.2798 27.1957 22.4044 29.0711C20.529 30.9464 17.9855 32 15.3333 32H12C9.34784 32 6.8043 30.9464 4.92893 29.0711C3.05357 27.1957 2 24.6522 2 22V16.3333C2 16.0681 2.10536 15.8138 2.29289 15.6262C2.48043 15.4387 2.73478 15.3333 3 15.3333H24.3333C24.5986 15.3333 24.8529 15.4387 25.0404 15.6262C25.228 15.8138 25.3333 16.0681 25.3333 16.3333Z" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M23.6666 15.333H27.8332C28.9383 15.333 29.9981 15.772 30.7795 16.5534C31.5609 17.3348 31.9999 18.3946 31.9999 19.4997C31.9999 20.6047 31.5609 21.6646 30.7795 22.446C29.9981 23.2274 28.9383 23.6663 27.8332 23.6663H25.3332" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                            Maak een afspraak
                        </button>
                    </x-contact-form-modal>
                </div>
            </div>

{{--            <div class="flex flex-col md:flex-row gap-14">--}}
{{--                <div class="md:w-1/2 order-2 md:order-1 flex flex-col gap-4 my-auto">--}}
{{--                    <div class="font-sregs-bold text-4xl">Automatie van interne processen</div>--}}
{{--                    <div class="leading-7">We beginnen met een ontmoeting en een kopje koffie om elkaar beter te leren kennen. Jij kiest het abonnementsmodel dat het beste bij jou past.</div>--}}
{{--                    <div>--}}
{{--                        <a href="#contact" class="rounded-xl bg-primary px-8 py-4 font-semibold text-white shadow-sm inline-flex gap-2 items-center">--}}
{{--                            <svg width="20" height="20" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <path d="M17 12C17 10.3333 18.19 8.66667 20.5717 8.66667C21.8345 8.66667 23.0457 8.16499 23.9387 7.27201C24.8317 6.37902 25.3333 5.16787 25.3333 3.905V2.83333M10.3333 12V11.1667C10.3333 9.84058 10.8601 8.56881 11.7978 7.63113C12.7355 6.69345 14.0073 6.16667 15.3333 6.16667C16.2174 6.16667 17.0652 5.81548 17.6904 5.19036C18.3155 4.56523 18.6667 3.71739 18.6667 2.83333V2M25.3333 16.3333V22C25.3333 24.6522 24.2798 27.1957 22.4044 29.0711C20.529 30.9464 17.9855 32 15.3333 32H12C9.34784 32 6.8043 30.9464 4.92893 29.0711C3.05357 27.1957 2 24.6522 2 22V16.3333C2 16.0681 2.10536 15.8138 2.29289 15.6262C2.48043 15.4387 2.73478 15.3333 3 15.3333H24.3333C24.5986 15.3333 24.8529 15.4387 25.0404 15.6262C25.228 15.8138 25.3333 16.0681 25.3333 16.3333Z" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                                <path d="M23.6666 15.333H27.8332C28.9383 15.333 29.9981 15.772 30.7795 16.5534C31.5609 17.3348 31.9999 18.3946 31.9999 19.4997C31.9999 20.6047 31.5609 21.6646 30.7795 22.446C29.9981 23.2274 28.9383 23.6663 27.8332 23.6663H25.3332" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                            </svg>--}}

{{--                            Maak een afspraak--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="md:w-1/2 order-1 md:order-2">--}}
{{--                    <img class="rounded-[40px]" src="{{ Vite::image('superkracht1.webp') }}" alt="uteq optocht">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="flex flex-col md:flex-row gap-14">--}}
{{--                <div class="md:w-1/2">--}}
{{--                    <img class="rounded-[40px]" src="{{ Vite::image('superkracht1.webp') }}" alt="uteq optocht">--}}
{{--                </div>--}}
{{--                <div class="md:w-1/2 flex flex-col gap-4 my-auto">--}}
{{--                    <div class="font-sregs-bold text-4xl">WEB/SaaS ontwikkeling en design</div>--}}
{{--                    <div class="leading-7">We beginnen met een ontmoeting en een kopje koffie om elkaar beter te leren kennen. Jij kiest het abonnementsmodel dat het beste bij jou past.</div>--}}
{{--                    <a href="#" class="bg-primary w-fit flex justify-center py-4 px-8 text-white rounded-xl font-medium mb-3">--}}
{{--                        Maak een afspraak--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
</div>
