@extends('app') 
@section('content')
    <div class="card-mb-3">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Author Name</th>
                        <th>Voters</th>
                    </tr>
                </thead>
                @foreach ($authors as $index => $author)
                    <tr>
                        <td>{{ $authors->firstItem() + $index }}</td>
                        <td>{{ $author->author_name }}</td>
                        <td>{{ $author->total_voters }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
