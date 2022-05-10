<div aria-live="assertive" class="fixed inset-0 flex items-end px-4 py-6 pointer-events-none sm:p-6 sm:items-start">
    <div class="w-full flex flex-col items-center space-y-4 sm:items-end">
        <!--
          Notification panel, dynamically insert this into the live region when it needs to be displayed

          Entering: "transform ease-out duration-300 transition"
            From: "translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
            To: "translate-y-0 opacity-100 sm:translate-x-0"
          Leaving: "transition ease-in duration-100"
            From: "opacity-100"
            To: "opacity-0"
        -->
        @if (session('flash_data'))

            @if(session('flash_data.type') === 'success')
                @php
                    $background = 'bg-green-50';
                    $titleColor = 'text-green-800';
                    $textColor = 'text-green-700';
                    $closeButton = 'text-green-500';
                    $onHover = 'hover:bg-green-100';
                    $loadingBarColor = 'bg-green-600';
                @endphp
            @endif

            @if(session('flash_data.type') === 'info')
                @php
                    $background = 'bg-blue-50';
                    $titleColor = 'text-blue-800';
                    $textColor = 'text-blue-700';
                    $closeButton = 'text-blue-500';
                    $onHover = 'hover:bg-blue-100';
                    $loadingBarColor = 'bg-blue-600';
                @endphp
            @endif

            @if(session('flash_data.type') === 'warning')
                @php
                    $background = 'bg-yellow-50';
                    $titleColor = 'text-yellow-800';
                    $textColor = 'text-yellow-700';
                    $closeButton = 'text-yellow-500';
                    $onHover = 'hover:bg-yellow-100';
                    $loadingBarColor = 'bg-yellow-600';
                @endphp
            @endif

            @if(session('flash_data.type') === 'error')
                @php
                    $background = 'bg-red-50';
                    $titleColor = 'text-red-800';
                    $textColor = 'text-red-700';
                    $closeButton = 'text-red-500';
                    $onHover = 'hover:bg-red-100';
                    $loadingBarColor = 'bg-red-600';
                @endphp
            @endif

            <div id="notification" class="max-w-sm w-full {{ $background }} shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
                <div class="{{ $background }} w-full h-2">
                    <div id="progressBar" class="{{ $loadingBarColor }} h-2"></div>
                </div>
                <div class="p-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">

                            @if(session('flash_data.type') === 'success')
                                <!-- Heroicon name: solid/check-circle -->
                                <svg class="h-8 w-8 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            @endif

                            @if(session('flash_data.type') === 'info')
                                <!-- Heroicon name: solid/information-circle -->
                                <svg class="h-8 w-8 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                </svg>
                            @endif

                            @if(session('flash_data.type') === 'warning')
                                <!-- Heroicon name: solid/exclamation -->
                                <svg class="h-8 w-8 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            @endif

                            @if(session('flash_data.type') === 'error')
                                <!-- Heroicon name: solid/x-circle -->
                                <svg class="h-8 w-8 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                </svg>
                            @endif

                        </div>
                        <div class="ml-3 w-0 flex-1 pt-0.5">
                            <p class="text-md font-bold {{ $titleColor }}">{{ session('flash_data.title') }}</p>
                            <p class="mt-3 text-sm {{ $textColor }}">{{ session('flash_data.message') }}</p>
                            <div class="mt-3 flex space-x-7">
                                <button type="button"
                                        class="{{ $background }} {{ $titleColor }} {{ $onHover }} p-2 rounded-md text-sm font-medium">
                                    Undo
                                </button>
                                <button type="button"
                                        class="{{ $background }} {{ $titleColor }} {{ $onHover }} p-2 rounded-md text-sm font-medium"
                                        onclick="dismissNotification()">
                                    Dismiss
                                </button>
                            </div>
                        </div>
                        <div class="ml-4 flex-shrink-0 flex">
                            <button
                                class="p-2 rounded-md inline-flex {{ $closeButton }} {{ $onHover }}" onclick="dismissNotification()">
                                <span class="sr-only">Close</span>
                                <!-- Heroicon name: solid/x -->
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                     fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        @endif

    </div>
</div>

<style>
    #progressBar {
        animation-name: progress;
        animation-duration: 4s;
        animation-timing-function: ease-in-out;
    }

    @keyframes progress {
        0% {
            width: 0;
        }
        100% {
            width: 100%;
        }
    }
</style>

<script>
    const notification = document.getElementById('notification');

    setTimeout(function() {
        notification.remove();
    }, 4100);

    function dismissNotification() {
        notification.remove();
    }
</script>
