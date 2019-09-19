@extends('backend.layout.app')

@section('title','Bütün Aktiv Elanlar')

@section('whereiam','Bütün Aktiv Elanlar')

@section('content')
    @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" >
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('status') }}...
        </div>
    @endif
    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="flexbox padd-10 bb-1">
                    <h4 class="mb-0"></h4>
                    <a href="{{ url('admin/elan/add') }}" class="btn gredient-btn" title="Yeni Elan">
                        Yeni Elan
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-table-advance" class="table table-lg table-hover">
                            <thead>
                            <tr>
                                <th>Başlıq</th>
                                <th>Kateqoriya</th>
                                <th>E-mail</th>
                                <th>Qiymət</th>
                                <th>Ölkə</th>
                                <th>Şəhər</th>
                                <th>Əlavə Edən</th>
                                <th>Əlavə Edildi</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($elanlar as $elan)
                                <tr>
                                    <td><a href="{{ url('/admin/elan/'.$elan->id) }}"><img src="{{ asset('storage/'.$elan->photo) }}" class="avatar" alt="Avatar">{{ strlen($elan->title) > 15 ? mb_substr($elan->title,0,15).'...' : $elan->title  }}</a></td>
                                    <td>{{ $elan->cat->az_name }}</td>
                                    <td>{{ $elan->email }}</td>
                                    <td>{{ $elan->price }}</td>
                                    <td>{{ $elan->country }}</td>
                                    <td>{{ $elan->city }}</td>
                                    <td>{{ $elan->name }}</td>
                                    <td>{{ date('d/m/Y', strtotime(explode(" ",$elan->created_at)[0])) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

@endsection

@section('css')

    <link href="{{ asset('backend/assets/plugins/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <style id="__web-inspector-hide-shortcut-style__" type="text/css">
        .__web-inspector-hide-shortcut__, .__web-inspector-hide-shortcut__ *, .__web-inspector-hidebefore-shortcut__::before, .__web-inspector-hideafter-shortcut__::after
        {
            visibility: hidden !important;
        }
    </style>

@endsection

@section('js')

    <script src="{{ asset('backend/assets/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#data-table-advance').DataTable({
                'language' : {
                    "sEmptyTable":     "Cədvəldə heç bir məlumat yoxdur",
                    "sInfo":           " _TOTAL_ Nəticədən _START_ - _END_ Arası Nəticələr",
                    "sInfoEmpty":      "Nəticə Yoxdur",
                    "sInfoFiltered":   "( _MAX_ Nəticə İçindən Tapılanlar)",
                    "sInfoPostFix":    "",
                    "sInfoThousands":  ",",
                    "sLengthMenu":     "Göstər _MENU_",
                    "sLoadingRecords": "Yüklənir...",
                    "sProcessing":     "Gözləyin...",
                    "sSearch":         "Axtarış:",
                    "sZeroRecords":    "Nəticə Tapılmadı.",
                    "oPaginate": {
                        "sFirst":    "İlk",
                        "sLast":     "Axırıncı",
                        "sNext":     "Sonraki",
                        "sPrevious": "Öncəki"
                    },
                    "oAria": {
                        "sSortAscending":  ": sütunu artma sırası üzərə aktiv etmək",
                        "sSortDescending": ": sütunu azalma sırası üzərə aktiv etmək"
                    }
                }
            });
        } );
    </script>

@endsection
