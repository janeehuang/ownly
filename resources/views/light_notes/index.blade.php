@extends('app')
@section('content')
    <section class="container">
        <a href="{{ url('light_notes/create')  }}" role="btn" class="btn btn-primary pull-right" >新增</a>

        <table class="table table-hover">

           @foreach($query as $var)
                <tr>
                    <td>{{$var->hap_time}}</td>
                    <td>{{$var->title}}</td>
                    <td>{{$var->content}}</td>
                    <td><a href="{{ url('light_notes/'.$var->id.'/edit')  }}" role="btn" class="btn btn-warning">編輯</a></td>

                    <td><form action="{{ url('light_notes/'.$var->id) }}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="delete">
                            <input type="submit" role="btn" class="btn btn-danger" value="刪除">
                        </form>
                    </td>
                </tr>
            @endforeach




        </table>

    </section>
    @stop