@extends('layouts.app')
{{-- resources/views/home.blade.php --}}
{{--{{ Breadcrumbs::render('login') }}--}}

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div style="display: inline-block; float:left">
                            <h3 id="h3">{{ __('Vármegyék') }}</h3>
                        </div>
                        <div style="display: inline-block; float:right">
                               <form method="post" action="{{route('searchMegyekk')}}" accept-charset="UTF-8">
                                @csrf
                                <input type="text" name="needle" placeholder="Keresés"><button class="btn" type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    <div>
                        <table id="table">
                            
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="search-field">Megnevezés</th>
                                    <th>Művelet&nbsp;
                                        <a href="{{route('createMegyek')}}"><i class="fa-solid fa-plus" style="color: #000000;" title={{ __("ÚJ") }}></i></a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($entities as $entity)
                                <tr>
                                    <td id="{{ $entity->id }}">{{$entity->id}}</td>
                                    <td>{{$entity->name}}</td>
                                    <td style="display: flex">

                                        <form method="post" action="{{ route('editMegyek', $entity->id) }}">
                                            <button class="btn btn-sm" type="submit"><i class="fa fa-edit"></i></button>
                                           @csrf
                                        </form>
                                        <form method="post" action="{{ route('deleteMegyek', $entity->id) }}"><button class="btn btn-sm" type="submit"><i class="fa fa-trash"></i></button>
                                            @csrf
                                            @method('delete')
                                        </form>

</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
