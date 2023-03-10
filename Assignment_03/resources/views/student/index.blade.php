{{-- Create Success Msg --}}
@if (session('success'))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success d-flex justify-content-between" role="alert">
                {{ session('success') }}
                <a href="{{ url('/student') }}" class="btn btn-outline-dark">&times;</a>
            </div>
        </div>
    </div>
@endif
{{-- Update Success Msg --}}
@if (session('update'))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success d-flex justify-content-between" role="alert">
                {{ session('update') }}
                <a href="{{ url('/student') }}" class="btn btn-outline-dark">&times;</a>
            </div>
        </div>
    </div>
@endif
{{-- Delete Success Msg --}}
@if (session('delete'))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger d-flex justify-content-between" role="alert">
                {{ session('delete') }}
                <a href="{{ url('/student') }}" class="btn btn-outline-dark">&times;</a>
            </div>
        </div>
    </div>
@endif
{{-- Import Success Msg --}}
@if(session('import'))
<div class="row">
  <div class="col-12">
      <div class="alert alert-success d-flex justify-content-between" role="alert">
          {{ session('import') }}
          <a href="{{ url('/student') }}" class="btn btn-outline-dark">&times;</a>
      </div>
  </div>
</div>
@endif
@extends('./../include.template')
@section('contents')
    <div class="col-10 offset-1">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3>Students</h3>
                <form action={{url('student/search')}} method="POST">
                    @csrf
                    <div class="form-group d-inline-block">
                        <input type="text" name="search" class="form-control" placeholder="Search..." />
                    </div>
                    <button type="submit" class="btn btn-sm btn-outline-primary d-inline">Search</button>
                </form>
            </div>
            <div class="card-body">
                <div class="mb-3 d-flex justify-content-between">
                   <div>
                     <a href={{ url('/') }} class="btn btn-secondary">Back</a>
                     <a href={{ url('student/create') }} class="btn btn-primary">Create</a>
                   </div>
                   <div>
                     <a href={{url('student/import')}} class="btn btn-primary">Import</a>
                     <a href={{url('student/export')}} class="btn btn-primary">Export</a>
                   </div>
                </div>
                <table class="table table-striped">
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Major</th>
                        <th>Created_at</th>
                        <th>Actions</th>
                    </tr>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->phone }}</td>
                            <td>{{ $student->address }}</td>
                            <td>{{ $student->major->name }}</td>
                            <td>{{ $student->created_at->format('Y-M-d') }}</td>
                            <td>
                                <a href={{ url('student/edit/' . $student->id) }} class="btn btn-sm btn-info">Update</a>
                                <div class="btn btn-sm btn-danger delete-btn">Delete</div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection


@foreach ($students as $student)
<div class="w-100 vh-100 position-absolute top-0 start-0 d-none justify-content-center align-items-center delete-box" style="z-index:3;background-color:rgba(0,0,0,0.3);">
<form action={{ url('student/delete/' . $student->id) }} method="POST">
    @csrf
    @method('DELETE')
    <div class="alert alert-danger col-md-12" role="alert">
    <small>Are You Sure Want To Delete?</small>
    <div class="d-flex justify-content-between mt-3">
        <a href="{{ url('/student') }}" class="btn btn-sm btn-secondary">Cancel</a>
        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
    </div>
</div>
</form>
</div>
@endforeach
