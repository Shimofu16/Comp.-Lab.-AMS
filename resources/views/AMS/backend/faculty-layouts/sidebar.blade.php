@extends('AMS.backend.layouts.master')

@section('sidebar')
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link {{ Route::is('faculty.dashboard.index') ? 'active' : '' }}"
                    href="{{ route('faculty.dashboard.index') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed {{ Route::is('faculty.academic.*') ? 'active' : '' }}"
                    data-bs-target="#academics" data-bs-toggle="collapse" href="#">
                    <i class="ri-book-open-line"></i>
                    <span>Academics</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="academics" class="nav-content collapse p-2" data-bs-parent="#sidebar-nav">
                    <li class="{{ Route::is('faculty.academic.course.index') ? 'collapse-active' : '' }}">
                        <a href="{{ route('faculty.academic.course.index') }}">
                            <i class="ri-book-open-line"></i>
                            <span>Course</span>
                        </a>
                    </li>
                    <li class="{{ Route::is('faculty.academic.section.index') ? 'collapse-active' : '' }}">
                        <a href="{{ route('faculty.academic.section.index') }}">
                            <i class="ri-home-3-line"></i>
                            <span>Section</span>
                        </a>
                    </li>
                    <li class="{{ Route::is('faculty.academic.subject.index') ? 'collapse-active' : '' }}">
                        <a href="{{ route('faculty.academic.subject.index') }}">
                            <i class="ri-book-2-line"></i>
                            <span>Subject</span>
                        </a>
                    </li>

                </ul>

            </li>

            <!-- End Forms Nav -->

            <li class="nav-item">
                <a class="nav-link {{ Route::is('faculty.faculty.index') ? 'active' : '' }}"
                    href="{{ route('faculty.faculty.index') }}">
                    <i class="ri-user-2-line"></i>
                    <span>Faculty</span>
                </a>
            </li><!-- End Tables Nav -->

            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('faculty.student.index') ? 'active' : '' }}"
                    href="{{ route('faculty.student.index') }}">
                    <i class="ri-user-line"></i>
                    <span>Students</span>
                </a>
            </li>



    </aside>
@endsection
