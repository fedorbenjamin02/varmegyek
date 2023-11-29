<!-- resources/views/counties/index.blade.php -->
<link rel="stylesheet" href="css/index.css">
<div class="container">
    <div class="content">
        <a href="{{ url('/') }}" title="Kezdőlap"><i class="fa fa-home"></i></a>
        <h1>Vármegyék</h1>
    </div>
    <div class="content"> 
        <div class="hozzaad">
            <a href="{{ route('counties.create') }}">Vármegye hozzáadás</a>
        </div>
        
        <form action="{{ route('counties.filter') }}" method="GET">
            <input type="text" name="filter" placeholder="Szűrés név szerint">
            <button type="submit">Szűrő</button>
        </form>
    </div>
    <div class="content">
    <ul>
        @foreach ($counties as $county)
            <li>
                {{ $county->name }}
                <a href="{{ route('counties.edit', $county) }}">szerkesztés</a>
                <form action="{{ route('counties.destroy', $county) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Törlés</button>
                </form>
            </li>
        @endforeach
    </ul>
    </div>
</div>

