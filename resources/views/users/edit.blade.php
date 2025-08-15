@extends('layout')
@section('title', 'Update user' . $user->username)
@section('header', 'Update user: ' . $user->name . ' ' . $user->lastname)

@section('content')
    <div class="card">
        <div class="card-body">
            <form class="needs-validation" method="post" action="{{ route('users.update', [$user]) }}" novalidate>
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" name="name" type="text"
                        class="@error('name') error-border @enderror form-control" value="{{ old('name', $user->name) }}"
                        required />
                    @error('name')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="lastname">Lastname</label>
                    <input id="lastname" name="lastname" type="text"
                        class="@error('lastname') error-border @enderror form-control"
                        value="{{ old('lastname', $user->lastname) }}" required />
                    @error('lastname')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" name="username" type="text"
                        class="@error('username') error-border @enderror form-control"
                        value="{{ old('username', $user->username) }}" required />
                    @error('username')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="text"
                        class="@error('email') error-border @enderror form-control" value="{{ old('email', $user->email) }}"
                        required />
                    @error('email')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="role">User role</label>
                    <select id="role" name="role" class=" @error('role') error-border @enderror form-control"
                        required>
                        @foreach (App\Enums\UserRoles::values() as $key => $value)
                            <option value="{{ $value }}" @if ($value == $user->role->value) selected @endif>
                                {{ $key }}</option>
                        @endforeach
                        @error('role')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">update</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    @if ($user->role->value == 2 || $user->role->value == 1)
        <div class="card">
            <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="patients_table" class="table table-bordered table-striped dataTable dtr-inline"
                                role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="patients_table"
                                            aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                            first name
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="patients_table"
                                            aria-label="Browser: activate to sort column ascending">
                                            last name
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="patients_table"
                                            aria-label="Platform(s): activate to sort column ascending">
                                            email
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="patients_table"
                                            aria-label="CSS grade: activate to sort column ascending">
                                            phone
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="patients_table"
                                            aria-label="CSS grade: activate to sort column ascending">
                                            date of birth
                                        </th>
                                        <th>
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $counter = 1;
                                    @endphp
                                    @foreach ($patients as $patient)
                                        <tr role="row" class="{{ $counter % 2 == 0 ? 'even' : 'odd' }}">
                                            <td class="dtr-control sorting_1" tabindex="0">
                                                {{ $patient['name'] }}</td>
                                            <td>{{ $patient['lastname'] }}</td>
                                            <td>{{ $patient['email'] }}</td>
                                            <td>{{ $patient['phone'] }}</td>
                                            <td>{{ $patient['dob'] }}</td>
                                            <td>
                                                <a href="{{ route('patients.show', [$patient]) }}"
                                                     class="btn btn-app btn-modify"
                                                     style="height: 41px;min-width: 46px;margin: 0px;padding: 0px;">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @php
                                            $counter++;
                                        @endphp
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('scripts')
    <script>
        $(function () {
            $('#patients_table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
