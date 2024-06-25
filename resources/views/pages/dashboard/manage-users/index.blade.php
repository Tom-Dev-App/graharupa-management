@php
    $component = app(App\View\Components\DashboardLayout::class, ['title' => 'Dashboard User']);
@endphp

@extends('components.dashboard-layout')
@push('head')
{{-- <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" /> --}}
<link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Include jQuery first -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

@endPush
@section('content')

<section class="min-h-screen">
                    <div class="grid grid-cols-1 pb-6">
                        <div class="md:flex items-center justify-between px-[2px]">
                            <h4 class="text-[18px] font-medium text-gray-800 mb-sm-0 grow dark:text-gray-100 mb-2 md:mb-0">Users Data</h4>
                            {{-- <nav class="flex" aria-label="Breadcrumb">
                                <ol class="inline-flex items-center space-x-1 ltr:md:space-x-3 rtl:md:space-x-0">
                                    <li class="inline-flex items-center">
                                        <a href="#" class="inline-flex items-center text-sm text-gray-800 hover:text-gray-900 dark:text-zinc-100 dark:hover:text-white">
                                            Dashboard
                                        </a>
                                    </li>
                                    <li>
                                        <div class="flex items-center rtl:mr-2">
                                           <i class="font-semibold text-gray-600 align-middle far fa-angle-right text-13 rtl:rotate-180 dark:text-zinc-100"></i>
                                            <a href="#" class="text-sm font-medium text-gray-500 ltr:ml-2 rtl:mr-2 hover:text-gray-900 ltr:md:ml-2 rtl:md:mr-2 dark:text-gray-100 dark:hover:text-white">Dashboard</a>
                                        </div>
                                    </li>
                                </ol>
                            </nav> --}}
                            <span></span>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-12">
                            <div class="card dark:bg-zinc-800 dark:border-zinc-600">
                                   
                                    <div class="relative overflow-x-auto card-body">
                                        <table id="datatable" class="table w-full pt-4 text-gray-700 dark:text-zinc-100" id="usersTable">
                                            <thead>
                                                <tr>
                                                    <th class="p-4 pr-8 border rtl:border-l-0  border-gray-50 dark:border-zinc-600">NO</th>
                                                    <th class="p-4 pr-8 border rtl:border-l-0  border-gray-50 dark:border-zinc-600">Name</th>
                                                    <th class="p-4 pr-8 border rtl:border-l-0  border-gray-50 dark:border-zinc-600">Email</th>
                                                    <th class="p-4 pr-8 border rtl:border-l-0  border-gray-50 dark:border-zinc-600">Status</th>
                                                    <th class="p-4 pr-8 border rtl:border-l-0  border-gray-50 dark:border-zinc-600">Role</th>
                                                    <th class="p-4 pr-8 border rtl:border-l-0  border-gray-50 dark:border-zinc-600">Actions</th>
                                                </tr>
                                            </thead>
                                            {{-- <tbody>
                                                <tr>
                                                    <td class="p-4 pr-8 border border-t-0 rtl:border-l-0 border-gray-50 dark:border-zinc-600">Tiger Nixon</td>
                                                    <td class="p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600">System Architect</td>
                                                    <td class="p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600">Edinburgh</td>
                                                    <td class="p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600">61</td>
                                                    <td class="p-4 pr-8 border border-t-0 border-l-0 border-gray-50 dark:border-zinc-600">2011/04/25</td>
                                                    <td class="p-4 pr-8 border border-t-0 border-l-0 rtl:border-l border-gray-50 dark:border-zinc-600">$320,800</td>
                                                </tr>
                                            </tbody> --}}
                                    </div>
                               
                            </div>
                        </div>
                    </div>
                    </section>
@push('footer')
<!-- Include DataTables CSS and JS -->
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- Required datatable js -->
<link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
<script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script  src="{{ asset('assets/js/pages/datatables.init.js') }}"></script> --}}

<!-- DataTables Buttons JS -->
{{-- <script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script> --}}
{{-- <script>
    $(document).ready(function() {
        var table = $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('dashboard.users.index') }}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: true, searchable: true },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'status', name: 'status', orderable: false, searchable: false },
                { data: 'roles', name: 'roles', orderable: false, searchable: false },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ],
            order: [[0, 'asc']] // Default ordering on the first column
        });

        $('body').on('change', '.role-dropdown', function() {
            var userId = $(this).data('user-id');
            var roleName = $(this).val();
            
            $.ajax({
                url: '/users/' + userId + '/change-role',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    role: roleName
                },
                success: function(response) {
                    alert(response.message);
                    table.ajax.reload();
                },
                error: function(xhr) {
                    alert(xhr.responseJSON.message);
                }
            });
        });
    });
</script> --}}
{{-- <script>
    $(document).ready(function() {
        var table = $('#users-table').DataTable({ // Change this line to match the ID in your HTML
            processing: true,
            serverSide: true,
            ajax: '{{ route('dashboard.users.index') }}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: true, searchable: true },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'status', name: 'status', orderable: true, searchable: true },
                { data: 'roles', name: 'roles', orderable: true, searchable: true },
                { data: 'action', name: 'action', orderable: true, searchable: true },
            ],
            order: [[0, 'asc']] // Default ordering on the first column
        });

        $('body').on('change', '.role-dropdown', function() {
            var userId = $(this).data('user-id');
            var roleName = $(this).val();
            
            $.ajax({
                url: '/users/' + userId + '/change-role',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    role: roleName
                },
                success: function(response) {
                    alert(response.message);
                    table.ajax.reload();
                },
                error: function(xhr) {
                    alert(xhr.responseJSON.message);
                }
            });
        });
    });
</script> --}}
{{-- <script>
    $(document).ready(function() {
        var table = $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('dashboard.users.index') }}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: true, searchable: true },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'status', name: 'status', orderable: false, searchable: false },
                { data: 'roles', name: 'roles', orderable: false, searchable: false },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ],
            order: [[0, 'asc']] // Default ordering on the first column
        });

        $('body').on('change', '.role-dropdown', function() {
            var userId = $(this).data('user-id');
            var roleName = $(this).val();
            
            $.ajax({
                url: '/users/' + userId + '/change-role',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    role: roleName
                },
                success: function(response) {
                    alert(response.message);
                    table.ajax.reload();
                },
                error: function(xhr) {
                    alert(xhr.responseJSON.message);
                }
            });
        });
    });
</script> --}}
{{-- <script>
    $(document).ready(function() {
        var table = $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('dashboard.users.index') }}',
                dataSrc: function(json) {
                    console.log(json); // Debugging line to see the received data
                    return json.data;
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: true, searchable: true },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'status', name: 'status', orderable: true, searchable: true },
                { data: 'roles', name: 'roles', orderable: true, searchable: true },
                { data: 'action', name: 'action', orderable: true, searchable: true },
            ],
            order: [[0, 'asc']], // Default ordering on the first column
            columnDefs: [
                {
                    targets: [3, 4, 5], // Status, Roles, Action columns
                    render: function(data, type, row) {
                        return data;
                    }
                }
            ]
        });
    });
</script> --}}



<!-- DataTables CSS -->
<link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">

<!-- DataTables JS -->
<script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>

<!-- DataTables Buttons JS -->
<script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
        var table = $('#usersTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('dashboard.users.index') }}',
                dataSrc: function(json) {
                    console.log(json.data); // Debugging line to see the received data
                    return json.data;
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: true, searchable: true },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'status', name: 'status', orderable: true, searchable: true },
                { data: 'roles', name: 'roles', orderable: true, searchable: true },
                { data: 'action', name: 'action', orderable: true, searchable: true },
            ],
            order: [[0, 'asc']], // Default ordering on the first column
            columnDefs: [
                {
                    targets: [3, 4, 5], // Status, Roles, Action columns
                    render: function(data, type, row) {
                        return data;
                    }
                }
            ]
        });
    });
</script>

@endPush
@endSection