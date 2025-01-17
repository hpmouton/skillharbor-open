<x-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('JCP Skills') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Please select the relevant skills along with the required level that are suited for the Job Competency Profile and Employee.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-full sm:col-span-full">
            <x-label for="jcp_skills" value="{{ __('Skills') }}" class="block text-lg font-medium text-gray-700 mb-4" />

            <div class="overflow-x-auto ">
                <table class="min-w-full">
                    <thead class="">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-lg font-semibold text-gray-600 ">
                                Skill Title
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-600">
                                Required Rating
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-600">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($jcp_skills as $index => $skill)
                            <tr class="">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <select
                                        wire:model.defer="jcp_skills.{{ $index }}.skill_id"
                                        class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-300 focus:border-blue-300 sm:text-sm cursor-pointer">
                                        <option selected>Choose a skill</option>
                                        @foreach ($skills as $availableSkill)
                                            <option value="{{ $availableSkill->id }}">{{ $availableSkill->skill_title }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error for="jcp_skills.{{ $index }}.skill_id" class="mt-1 text-sm text-red-500" />
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <select
                                        wire:model.defer="jcp_skills.{{ $index }}.required_rating"
                                        class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-300 focus:border-blue-300 sm:text-sm cursor-pointer">
                                        <option selected>Choose a required rating</option>
                                        <option value="1">Not Competent</option>
                                        <option value="2">Basic Skills</option>
                                        <option value="3">Competent</option>
                                        <option value="4">Developed Skills</option>
                                        <option value="5">Expert</option>
                                    </select>
                                    <x-input-error for="jcp_skills.{{ $index }}.required_rating" class="mt-1 text-sm text-red-500" />
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <button
                                        type="button"
                                        wire:click.prevent="removeSkill({{ $index }})"
                                        class="rounded-md text-gray-500 p-2 border border-red-200 text-xs focus:outline-none">
                                        Remove
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                <x-button
                    type="button"
                    wire:click.stop="addSkill"
                    class="bg-blue-600 text-white font-medium px-4 py-2 rounded-md shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    {{ __('Add Skill') }}
                </x-button>
            </div>
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
