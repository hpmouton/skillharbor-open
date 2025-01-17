<div>
        <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('JCP Creation Form') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                @livewire('system.jcps.jcp-details-form')

                <x-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('system.jcps.skills-select-form')
                </div>

                <x-section-border />


        </div>
    </div>
</div>
