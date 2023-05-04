@extends('AMS.backend.faculty-layouts.sidebar')

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
                    </div>
                    <div class="card-body">

                        <!-- Table with stripped rows -->
                        <table class="table" id="schedules-table">
                            <thead>
                                <tr>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Section</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schedules as $schedule)
                                    @php
                                        $status = $schedule
                                            ->scheduleRequest->status
                                    @endphp
                                    <tr>
                                        <td>
                                            {{ $schedule->subject->subject_name }}
                                        </td>
                                        <td>
                                            <a href="{{ route('faculty.schedule.show', ['id' => $schedule->id]) }}"
                                                class="btn-link text-primary">
                                                {{ $schedule->section->section_name }}
                                            </a>
                                        </td>

                                        <td>
                                            {{ date('F d, Y', strtotime($schedule->date)) }}
                                            <br>
                                            At {{ date('h:i:a', strtotime($schedule->start_time)) }} -
                                            {{ date('h:i:a', strtotime($schedule->end_time)) }}
                                        </td>

                                        <td>
                                            @if ($status == 'pending')
                                                <span class="badge bg-warning">Pending</span>
                                            @elseif($status == 'approved')
                                                <span class="badge bg-success">Approved</span>
                                            @elseif($status == 'declined')
                                                <span class="badge bg-danger">Declined</span>
                                            @else
                                                <span class="badge bg-info">No Request</span>
                                            @endif
                                        </td>

                                        <td>
                                            <div class="d-flex justify-content-center px-2 py-1">
                                                @php
                                                    $scheduledDate = \Carbon\Carbon::parse($schedule->date);
                                                    $isPast = strtotime($schedule->date) < strtotime(date('Y-m-d')) ? true : false;
                                                @endphp

                                                <button
                                                    class="btn btn-link text-primary px-3 mb-0 {{ $status === 'pending' || $status === 'approved' ||$isPast? 'disabled': '' }}"
                                                    type="button" data-bs-toggle="modal"
                                                    data-bs-target="#edit{{ $schedule->id }}">
                                                    <i class="ri-edit-line text-primary me-2" aria-hidden="true"></i>
                                                    Reschedule
                                                </button>

                                                @include('AMS.backend.faculty-layouts.schedule.modal._edit')
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
