@extends('app')
@section('content')
    @if (session()->has('message'))
        <p class="alert alert-info">{{ session('message') }}</p>
    @endif
    <div class="card-mb-3">
        <div class="card-header">
            <form class="row row-cols-auto g-1">
                <div class="col">
                    <input class="form-control" name='keyword' value="{{ $keyword }}" placeholder="Pencarian...">
                </div>
                <div class="col">
                    <select name="perPage" class="form-control" onchange="this.form.submit()">
                        <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ $perPage == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ $perPage == 100 ? 'selected' : '' }}>100</option>
                    </select>
                </div>
                <div class="col">
                    <a class="btn btn-info" href="{{ route('rate') }}"><i class="fa-solid fa-plus"></i> Rating</a>
                </div>
                
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Book Name</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>Average Rating</th>
                        <th>Voter</th>
                        
                    </tr>
                </thead>
                @foreach ($books as $index => $book)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $book['book_name'] }}</td>
                        <td>{{ $book['category_name'] }}</td>
                        <td>{{ $book['author_name'] }}</td>
                        <td>{{ number_format($book['average_rating'], 2) }}</td>
                        <td>{{ $book['total_voters'] }}</td>
                    </tr>
                @endforeach


            </table>
        </div>
    </div>
    @if ($books->hasPages())
        <div class="card-footer">
            {{ $books->links() }}
        </div>
    @endif
@endsection











{{-- @extends('app')
@section('content')
    @if (session()->has('massage'))
        <p class="alert alert-info">{{ session('massage') }}</p>
    @endif
    <div class="card-mb-3">
        <div class="card-header">
            <form class="row row-cols-auto g-1">
                <div class="col">
                    <input class="form-control" name='keyword' value="{{ $keyword }}" placeholder="Pencarian...">
                </div>
                <div class="col">
                    <a class="btn btn-info" href="{{ route('rate') }}"><i class="fa-solid fa-plus"></i> Rating</a>
                </div>
                
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Book Name</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>Average Rating</th>
                        <th>Voter</th>
                        
                    </tr>
                </thead>
                @foreach ($books as $index => $book)
                    <tr>
                        <td>{{ $books->firstItem() + $index }}</td>
                        <td>{{ $book->book_name }}</td>
                        <td>{{ $book->category_name }}</td>
                        <td>{{ $book->author_name }}</td>
                        <td>{{ number_format($book->average_ratings, 2) }}</td>
                        <td>{{ $book->total_voters }}</td>
                    </tr>
                @endforeach


            </table>
        </div>
    </div>
    @if ($books->hasPages())
        <div class="card-footer">
            {{ $books->links() }}
        </div>
    @endif
@endsection --}}

{{-- backup --}}
{{-- <div class="col">
    <button class="btn btn-success"><i class="fa-solid fa-arrows-rotate"></i> Refresh</button>
</div>
<div class="col">
    <a class="btn btn-primary" href="#"><i class="fa-solid fa-plus"></i> Tambah</a>
</div> --}}
