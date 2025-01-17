<x-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('JCP Details') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Ensure the Job COmpetency Profile Details are correct and assigned to the right user') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="position_title" value="{{ __('Position Title') }}" />
            <x-input id="position_title" type="text" class="mt-1 block w-full" wire:model.defer="position_title"
                required autocomplete="position_title" />
            <x-input-error for="position_title" class="mt-2" />
        </div>



        <!-- Duty Station -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="duty_station" value="{{ __('Duty Station') }}" />
            <x-input id="duty_station" type="text" class="mt-1 block w-full" wire:model.defer="duty_station" required
                autocomplete="duty_station" />
            <x-input-error for="duty_station" class="mt-2" />
        </div>

        <!-- Employee Selection -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="user" value="{{ __('Employee') }}" />
            <select id="user" wire:model.defer="user_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                <option selected>Choose an employee to assign the JCP to.</option>
                @forelse ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                @empty
                    <option value="">No Employees Found</option>
                @endforelse
            </select>
            <x-input-error for="user_id" class="mt-2" />
        </div>

        <!-- Job Grade -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="job_grade" value="{{ __('Job Grade') }}" />
            <select id="job_grade" wire:model.defer="job_grade"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                <option selected>Choose the job grade.</option>
                @foreach (['a1', 'a2', 'a3', 'a4', 'b1', 'b2', 'b3', 'b4', 'bu', 'c1', 'c2', 'c3', 'c4', 'cu', 'd1', 'd2', 'd3', 'd4', 'du'] as $grade)
                    <option value="{{ $grade }}">{{ strtoupper($grade) }}</option>
                @endforeach
            </select>
            <x-input-error for="job_grade" class="mt-2" />
        </div>

        <!-- Job Purpose -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="job_purpose" value="{{ __('Job Purpose') }}" />
            <textarea id="job_purpose" wire:model.defer="job_purpose" rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-sky-500 focus:border-sky-500"
                placeholder="Write your job purpose here..."></textarea>
            <x-input-error for="job_purpose" class="mt-2" />
        </div>

        <!-- Active Checkbox -->
        <div class="col-span-6 sm:col-span-4">
            <label class="inline-flex items-center cursor-pointer">
                <input type="checkbox" name="is_active" id="is_active" class="sr-only peer">
                <div
                    class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-sky-300 dark:peer-focus:ring-sky-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-sky-600">
                </div>
                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">JCP Active</span>
            </label>
        </div>

        <!-- Qualifications Section -->
        <div class="col-span-6 sm:col-span-4">
            <label for="qualifications" value="{{ __('Qualifications') }}">Qualifications</label>
            <select id="qualifications" name="qualifications" data-placeholder="Select Qualifications" multiple
                data-multi-select>
                @foreach ($qualifications as $qualification)
                    <div class="flex items-center mb-2">
                        <option wire:model.defer="jcp_qualifications"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500"
                            value="{{ $qualification->id }}">{{ $qualification->qualification_title }}</option>

                    </div>
                @endforeach

            </select>
        </div>


        <!-- Prerequisites Section -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="prerequisites" value="{{ __('Prerequisites') }}" />
            <select id="prerequisites" name="jcp_prerequisites[]" data-placeholder="Select Prerequisites" multiple data-multi-select>
                @forelse ($prerequisites as $prerequisite)
                    <option
                        wire:model.defer="jcp_prerequisites"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500"
                        value="{{ $prerequisite->id }}">{{ $prerequisite->prerequisite_title }}
                    </option>
                @empty
                    <option disabled>No Prerequisites Loaded</option>
                @endforelse
            </select>
            <x-input-error for="jcp_prerequisites" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button>
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
