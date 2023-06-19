@extends('AMS.backend.admin-layouts.sidebar')

@section('page-title')
    Schedules
@endsection

@section('contents')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header d-flex justify-content-between border-bottom-0">
                        <h3 class="text-maroon">@yield('page-title')</h3>
                        <button class="btn btn-outline-maroon" data-bs-toggle="modal" data-bs-target="#add">Add Schedule</button>
                        @include('AMS.backend.admin-layouts.academics.schedule.modal._add')
                    </div>
                    <div class="card-body">

                        <!-- Table with stripped rows -->
                        <table class="table" id="schedules-table">
                            <thead>
                                <tr>
                                    <th scope="col">Teacher</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Section</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Semester</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schedules as $schedule)
                                    <tr>
                                        <td>
                                            {{ $schedule->teacher->getFullName() }}
                                        </td>

                                        <td>
                                            {{ $schedule->subject->subject_name }}
                                        </td>
                                        <td>
                                            {{ $schedule->section->section_name }}
                                        </td>

                                        <td>
                                            {{ date('F d, Y',strtotime($schedule->date)) }}
                                            <br>
                                            At {{ date('h:i:a', strtotime($schedule->start_time)) }} - {{ date('h:i:a', strtotime($schedule->end_time)) }}
                                        </td>

                                        <td>
                                            {{ $schedule->semester->name }}
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center px-2 py-1">
                                                <button class="btn btn-link text-primary px-3 mb-0" type="button"
                                                    data-bs-toggle="modal" data-bs-target="#edit{{ $schedule->id }}">
                                                    <i class="ri-edit-line text-primary me-2" aria-hidden="true""></i>
                                                </button>
                                                <button class="btn btn-link text-danger px-3 mb-0" type="button"
                                                    data-bs-toggle="modal" data-bs-target="#delete{{ $schedule->id }}">
                                                    <i class="ri-delete-bin-6-line text-danger me-2" aria-hidden="true"></i>
                                                </button>
                                                @include('AMS.backend.admin-layouts.academics.schedule.modal._delete')

                                                @include('AMS.backend.admin-layouts.academics.schedule.modal._edit')

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#schedules-table').DataTable({
                "ordering": false
            });
        });
    </script>
@endsection
