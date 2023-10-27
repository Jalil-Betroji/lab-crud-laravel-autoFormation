@extends('layouts.layout')
@extends('layouts.nav')
@section('content')

<div class="container"> 
    <table class="table"> 
        <div class="container" style="margin-top:30px;"> 
        @if(session('success'))
        <div style="margin-bottom:30px;"> <span class="font-medium text-success">{{session('success')}}</span> 
        @endif 
    </div>
<thead> 
    <tr> 
        <th scope="col">Nom</th> 
        <th scope="col">Prenom</th> 
        <th scope="col">Email</th> 
        <th scope="col">Action</th>
    </tr> </thead> <tbody id="search-result">
    @foreach($stagiaires as $stagiaire)
    <tr>
    <th>{{$stagiaire->nom}}</th>
    <td>{{$stagiaire->prenom}}</td>
    <td>{{$stagiaire->email}}</td>
    <td>
        <a href="{{route('edit.stagiaire' , ['id' => $stagiaire->id])}}" class="btn btn-success">Modifier</a>
        <a href="{{route('delete.stagaire' , ['id' => $stagiaire->id])}}" class="btn btn-danger">Supprimer</a>
    </td>
    </tr> @endforeach </tbody> </table> <div id="pagination-links">
    {{$stagiaires->links()}}
    </div>
    </div>

    <script type="module"> 
    $(document).ready(function () { $('#search-input').on('keyup', function () { var
    searchInput=$('#search-input').val(); 
    $.ajax({ type: 'POST' , url: '/search-stagiaire' , data: { search:
    searchInput, _token: '{{ csrf_token() }}' , }, success: function (response) { $('#search-result').empty();
    console.log(response.data); response.data.forEach(function (stagiaire) { var stagiaireId=stagiaire.id; var
    editLinkHref=editLink(stagiaireId); var rowHtml=` <tr>
        <td>${stagiaire.nom}</td>
        <td>${stagiaire.prenom}</td>
        <td>${stagiaire.email}</td>
        <td>
        <a href="${editLinkHref}" class="btn btn-success">Editer</a>
        <button type="button" class="btn btn-danger">Supprimer</button>
        </td>
        </tr>
        `;
        $('#search-result').append(rowHtml);
        });
        $('#pagination-links').html(response.links);


        },
        error: function (xhr, status, error) {
        console.error('AJAX error:', error);
        }
        });
        });
        });

        function editLink(stagiaireId) {
        return `{{ route('edit.stagiaire', ['id' => ':value']) }}`.replace(':value', stagiaireId);
        }


        </script>
        @endsection