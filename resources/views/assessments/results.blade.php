<x-app-layout>
    <div class="flex-1 justify-start pb-24 pt-6 mb-6 font-inter">
        <div class="container mx-auto p-12">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3 mb-3">
                    <li class="inline-flex items-center">
                        <a href="/"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-fuchsia-900 ">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                </path>
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <a href="{{ route('user.assessment',['user' => Crypt::encrypt($user->id)]) }}"
                                class="ml-1 text-sm font-medium text-gray-700 hover:text-fuchsia-900 md:ml-2 ">My Assessments</a>
                        </div>
                    </li>

                </ol>
            </nav>
            <div class="flex  rounded-3xl mx-auto">


                <div class="mt-3 mx-4 flex flex-wrap">

                    <div class="w-full px-4 sm:w-1/2 lg:w-6/12 text-grey-500 mb-10">
                        <div class="grow-1 shrink-0 basis-auto w-10/12 md:pl-6 mt-6">
                            <h4 class="text-dark mb-2 text-lg text-fuchsia-500 font-semibold">Job Competency Profile
                                Details
                            </h4>
                            <p>
                                <strong class="text-fuchsia-500">Employee Name:
                                </strong>{{ $user->first_name . ' ' . $user->last_name }}
                            </p>
                            <p>
                                <strong class="text-fuchsia-500">Job title: </strong>{{ $jcp->position_title }}
                            </p>
                            <p>
                                <strong class="text-fuchsia-500">Job Purpose: </strong>{{ $jcp->job_purpose }}
                            </p>
                            <p>
                                <strong class="text-fuchsia-500">Job Grade: </strong>{{ $jcp->job_grade }}
                            </p>


                        </div>
                    </div>

                    <div class="w-full px-4 sm:w-1/2 lg:w-6/12 text-grey-500 mb-10">
                        <div class="grow-1 shrink-0 basis-auto w-10/12 md:pl-6 mt-6">
                            <h4 class="text-dark mb-2 text-lg text-fuchsia-500 font-semibold">Required Qualifications
                            </h4>

                            <div class="flex">

                                <div class="h-auto">



                                    @foreach ($qualificationsData as $qualificationData)
                                        <div class="flex border-b my-3 mx-auto items-center p-2">
                                            <h3>{{ $qualificationData['name'] }}</h3>
                                            @if ($qualificationData['attained'])
                                                <x-iconoir-check class="text-green-500 ml-3" />
                                                <!-- Green tick icon for attained -->
                                            @else
                                                <x-iconoir-xmark  class="text-red-500 ml-3"/>


                                                <!-- Red X icon for not attained -->
                                            @endif
                                        </div>
                                    @endforeach


                                </div>



                            </div>
                        </div>

                    </div>


                </div>
                <div class="w-full px-4 sm:w-1/2 lg:w-6/12 text-grey-500 mb-10 mt-3">
                    <a class="inline-flex items-center text-sm font-semibold rounded-lg border pb-3 pt-2 px-3 text-fuchsia-600 hover:bg-fuchsia-800 hover:text-white disabled:opacity-50 disabled:pointer-events-none " href="{{route('supervisor.result',['user_id' => Crypt::Encrypt($user->id), 'assessment_id' => Crypt::Encrypt($assessment->id)])}}">
                        Download
                        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                      </a>
                </div>



            </div>

            {{--  --}}

            <div class="flex bg-white border py-6 px-4 rounded-3xl grid mt-12">
                <div class="header flex items-center justify-between my-3 text-2xl text-slate-800 font-medium">
                    <h1><span><i class="fas fa-file-contract"></i></span> {{ $user->first_name }}s' Assessment
                    </h1>

                </div>
                <table class="mt-6 w-full">
                    <thead >
                        <tr>
                            <th class="py-3 px-5 text-left bg-fuchsia-800 text-white font-medium">Category</th>
                            <th class="py-3 px-5 text-left bg-fuchsia-800 text-white font-medium">Skill</th>
                            <th class="py-3 px-5 text-left bg-fuchsia-800 text-white font-medium">User Rating</th>
                            <th class="py-3 px-5 text-left bg-fuchsia-800 text-white font-medium">Supervisor Rating</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jcp->skills->groupBy('category.category_title') as $category => $skills)
                        <tr>
                            <td colspan="4" class="py-3 px-5 border-b bg-fuchsia-500 text-white">{{ $category }}</td>
                        </tr>
                        @foreach ($skills as $index => $question)
                        <tr class="{{ $index % 2 === 0 ? 'bg-gray-100' : 'bg-white' }}">
                            <td></td>
                            <td class="py-3 px-5">{{ $question->skill_title }}</td>
                            <td class="py-3 px-5">
                                <div class="flex items-center">
                                    @if ($jcp->skills->find($question->id)->pivot->user_rating === 1)
                                        Not Competent
                                    @elseif ($jcp->skills->find($question->id)->pivot->user_rating === 2)
                                        Basic Skills
                                    @elseif ($jcp->skills->find($question->id)->pivot->user_rating === 3)
                                        Competent
                                    @elseif ($jcp->skills->find($question->id)->pivot->user_rating === 4)
                                        Developed Skills
                                    @elseif ($jcp->skills->find($question->id)->pivot->user_rating === 5)
                                        Expert
                                    @endif
                                </div>
                            </td>
                            <td class="py-3 px-5">
                                <div class="flex items-center">
                                    @if ($jcp->skills->find($question->id)->pivot->supervisor_rating === 1)
                                        Not Competent
                                    @elseif ($jcp->skills->find($question->id)->pivot->supervisor_rating === 2)
                                        Basic Skills
                                    @elseif ($jcp->skills->find($question->id)->pivot->supervisor_rating === 3)
                                        Competent
                                    @elseif ($jcp->skills->find($question->id)->pivot->supervisor_rating === 4)
                                        Developed Skills
                                    @elseif ($jcp->skills->find($question->id)->pivot->supervisor_rating === 5)
                                        Expert
                                    @endif
                                </div>
                            </td>
                            </td>
                        </tr>
                        @endforeach
                        @empty
                        <tr>
                            <td class="py-3 px-5 border-b" colspan="3">No questions were added to this assessment.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>




        </div>





    </div>
</x-app-layout>
