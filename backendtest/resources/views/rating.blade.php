@extends('app')

@section('content')
    <form method="GET" action="{{ route('rate') }}">
        <div class="mb-3">
            <label for="author_id" class="form-label">Book Author</label>
            <select name="author_id" id="author_id" class="form-control" onchange="this.form.submit()" required>
                <option value="">-- Select Author --</option>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}" {{ $authorId == $author->id ? 'selected' : '' }}>
                        {{ $author->author_name }}
                    </option>
                @endforeach
            </select>
        </div>
    </form>

    @if (!empty($authorId))
        <form method="POST" action="{{ route('rate.store') }}">
            @csrf
            <div class="mb-3">
                <label for="book_id" class="form-label">Book Name</label>
                <select name="book_id" id="book_id" class="form-control" required>
                    @if ($books->isEmpty())
                        <option value="">No books available for this author</option>
                    @else
                        @foreach ($books as $book)
                            <option value="{{ $book->id }}">{{ $book->book_name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <select name="rating" id="rating" class="form-control" required>
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endif
@endsection
        




{{-- @extends('app')

@section('content')
    @if (session('message'))
        <p class="alert alert-success">{{ session('message') }}</p>
    @endif

    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{ route('rate.store', $book) }}">
                @csrf

                <div class="mb-3">
                    <label for="author_id" class="form-label">Book Author</label>
                    <input type="text" id="author_id" class="form-control" value="{{ $book->author->author_name }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="book_name" class="form-label">Book Name</label>
                    <input type="text" id="book_name" class="form-control" value="{{ $book->book_name }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="rating" class="form-label">Rating</label>
                    <select name="rating" id="rating" class="form-control">
                        @for ($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('index') }}" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const authorSelect = document.getElementById('author_id');
        const bookSelect = document.getElementById('book_id');
        const bookOptions = Array.from(bookSelect.options);

        // Enable book selection based on selected author
        authorSelect.addEventListener('change', function () {
            const selectedAuthor = this.value;

            // Clear current book selection and disable if no author is selected
            bookSelect.value = '';
            bookSelect.disabled = selectedAuthor === '';

            // Show/hide books based on the selected author
            bookOptions.forEach(option => {
                const authorId = option.getAttribute('data-author');
                option.style.display = authorId === selectedAuthor || selectedAuthor === '' ? '' : 'none';
            });
        });
    });
</script> --}}


{{-- 
@extends('app')
@section('content')
    <div class="row">
        <div class="col-md-6">
            @if ($errors->any())
                <div class="alert alert-info">
                    <ul>
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="GET" action="{{ route('rate', $book) }}">
                <div class="mb-3">
                    <label>Book Author</label>
                    <select class="form-select" name="author_id">
                        @foreach ($authors as $author)
                            @if (old('author_id', $book->author_id) === $author->id)
                                <option value="{{ $author->id }}" selected> {{ $author->author_name }} </option>
                            @else
                                <option value="{{ $author->id }}">{{ $author->author_name }} </option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="book_id" class="form-label">Book Name</label>
                    <select name="book_id" id="book_id" class="form-control" {{ $books->isEmpty() ? 'disabled' : '' }}>
                        <option value="">-- Select Book --</option>
                        @foreach ($books as $singleBook)
                            <option value="{{ $singleBook->id }}" data-author="{{ $singleBook->author_id }}" {{ old('book_id') == $singleBook->id ? 'selected' : '' }}>
                                {{ $singleBook->book_name }}
                            </option>
                        @endforeach
                    
                    </select>
                </div>

            </form>
            <form method="POST" action="{{ route('rate.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="rating" class="form-label">Rating</label>
                    <select name="rating" id="rating" class="form-control">
                        @for ($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">Simpan</button>
                    <a class="btn btn-danger" href="{{ route('index') }}">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection --}}




{{-- BACKUP --}}
{{-- @extends('app')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('rate.store', $book) }}">
        @csrf
        <div class="mb-3">
            <label for="author_id" class="form-label">Book Author</label>
            <input type="text" id="author_id" class="form-control" value="{{ $book->author->author_name }}" readonly>
        </div>
        <div class="mb-3">
            <label for="book_name" class="form-label">Book Name</label>
            <input type="text" id="book_name" class="form-control" value="{{ $book->book_name }}" readonly>
        </div>
        <div class="mb-3">
            <label for="rating" class="form-label">Rating (1-10)</label>
            <select name="rating" id="rating" class="form-control">
                @for ($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
@endsection --}}












{{-- @extends('app')
@section('content')
    <div class="row">
        <div class="col-md-6">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="GET" action="{{ route('rate') }}">
                <div class="mb-3">
                    <label for="author_id" class="form-label">Book Author</label>
                    <select name="author_id" id="author_id" class="form-control" onchange="this.form.submit()">
                        <option value="">-- Select Author --</option>
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}" {{ isset($authorId) && $authorId == $author->id ? 'selected' : '' }}>
                                {{ $author->author_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </form>
            <form method="POST" action="{{ route('rate.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="book_id" class="form-label">Book Name</label>
                    <select name="book_id" id="book_id" class="form-control" {{ $books->isEmpty() ? 'disabled' : '' }}>
                        <option value="">-- Select Book --</option>
                        @foreach ($books as $book)
                            <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>
                                {{ $book->book_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="rating" class="form-label">Rating</label>
                    <select name="rating" id="rating" class="form-control">
                        @for ($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" {{ $books->isEmpty() ? 'disabled' : '' }}>
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
 --}}
