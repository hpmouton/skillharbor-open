<x-app-layout>
    <div class="mt-6 max-w-lg mx-auto">
<form action="{{ route('jcp.update', $jcp->id) }}" method="POST">
    @csrf
    
    <div class="mb-4">
        <label for="assessment_title" class="block text-sm font-medium text-gray-700">JCP Name</label>
        <input type="text" name="assessment_title" id="assessment_title" value="{{ $jcp->title}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
    </div>
    <div class="mb-4">
        <label for="assessment_title" class="block text-sm font-medium text-gray-700">Position Title</label>
        <input type="text" name="assessment_title" id="assessment_title" value="{{ $jcp->position_title}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"> 
    </div>
    <div class="mb-4">
        <label for="assessment_title" class="block text-sm font-medium text-gray-700">Grade</label>
        <select name="grade" id="grade" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            @foreach($jobGrades as $jobGrade)
                <option value="{{ $jobGrade->id }}" {{ $jcp->grade == $jobGrade->id ? 'selected' : '' }}>{{ $jobGrade->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-4">
        <label for="assessment_title" class="block text-sm font-medium text-gray-700">Job Purpose</label>
        <input type="text" name="assessment_title" id="assessment_title" value="{{ $jcp->job_purpose}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">    
    </div>
    <div class="mb-4">
        <label for="assessment_title" class="block text-sm font-medium text-gray-700">Is Active</label>
        <input type="text" name="assessment_title" id="assessment_title" value="{{ $jcp->is_active}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">  
    </div>
    <div class="mb-4">
        <label for="assessment_title" class="block text-sm font-medium text-gray-700">Created By</label>
        <input type="text" name="assessment_title" id="assessment_title" value="{{ $jcp->created_by}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">         
    </div>

    <div class="mb-4">
        <label for="assessment_title" class="block text-sm font-medium text-gray-700">Description</label>
        <input type="text" name="assessment_title" id="assessment_title" value="{{ $jcp->description}}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
    </div>

    <button type="submit">Update JCP</button>
</form>
    </div>
</x-app-layout>