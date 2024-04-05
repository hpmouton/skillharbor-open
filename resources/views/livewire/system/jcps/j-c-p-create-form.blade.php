<x-form-section submit="createJCPInformation">
    <x-slot name="title">
        {{ __('Job Competency Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Make sure the information you enter coresponds to the Job Description.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->


        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="position_title" value="{{ __('Position Title') }}" />
            <x-input id="position_title" type="text" class="mt-1 block w-full" wire:model="state.position_title" required autocomplete="position_title" />
            <x-input-error for="position_title" class="mt-2" />


        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="job_grade" value="{{ __('Job Grade') }}" />
            <select id="job_grade" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              <option selected>Choose the job grade.</option>
              <option value="a1">A1</option>
              <option value="a2">A2</option>
              <option value="a3">A3</option>
              <option value="a4">A4</option>
              <option value="b1">B1</option>
              <option value="b2">B2</option>
              <option value="b3">B3</option>
              <option value="b4">B4</option>
              <option value="bu">BU</option>
              <option value="c1">C1</option>
              <option value="c2">C2</option>
              <option value="c3">C3</option>
              <option value="c4">C4</option>
              <option value="cu">CU</option>
            </select>
        </div>

        <!-- Job Purpose -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="job_prupose" value="{{ __('Job Purpose') }}" />
            <textarea id="job_purpose" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <label class="inline-flex items-center cursor-pointer">
                <input type="checkbox" value="" class="sr-only peer">
                <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">JCP Active</span>
              </label>


        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
