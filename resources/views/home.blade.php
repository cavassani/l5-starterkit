@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Usuário logado com sucesso</div>

                <div class="panel-body text-left">
                    <h3>Listagem dos estados para teste:</h3>
                    @if(isset($data) && !empty($data))
                        <ol>
                        @foreach($data as $k => $v)
                            <li>{{sprintf("%s",  $v['name'])}}</li>
                        @endforeach
                        </ol>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
