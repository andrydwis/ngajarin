@extends('layouts.admin.app')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4>Data Tag</h4>
                <a href="{{route('admin.tag.create')}}" class="btn btn-primary">Tambah Tag</a>
            </div>
            <div class="card-body">
                <table id="datatables" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama Tag</th>
                            <th>Icon</th>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tags as $tag)
                        <tr>
                            <td>{{$tag->name}}</td>
                            <td>
                                <img src="{{asset('storage/'.$tag->icon)}}" alt="" class="img-thumbnail">
                            </td>
                            <td>
                                <a href="{{route('admin.tag.edit', ['tag' => $tag])}}" class="btn btn-success">Update</a>
                                <form action="{{route('admin.tag.destroy', ['tag' => $tag])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </div>
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
@endsection

@section('customCSS')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.css" />
@endsection

@section('customJS')
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#datatables').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.22/i18n/Indonesian.json"
            }
        });
    });
</script>
@endsection