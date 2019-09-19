@extends('backend.layout.app')

@section('title','Bütün Kateqoriyalar')

@section('whereiam','Bütün Kateqoriyalar')

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
                    <a href="{{ url('admin/elankat/add') }}" class="btn gredient-btn" title="Yeni Kateqoriya">
                        Yeni Kateqoriya
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-table-advance" class="table table-lg table-hover">
                            <thead>
                            <tr>
                                <th>Kateqoriya İkonu</th>
                                <th>Kateqoriya Adı ( Azəricə )</th>
                                <th>Kateqoriya Adı ( Rusca )</th>
                                <th>Əlavə tarixi</th>
                                <th>Ayarlar</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($data as $category)
                                <tr>
                                    <td><a href="{{ asset('storage/'.$category->icon) }}" target="_blank"><img width="28" height="27" src="{{ asset('storage/'.$category->icon) }}" class="avatar" alt="Avatar"></a></td>
                                    <td>{{ $category->az_name }}</td>
                                    <td>{{ $category->ru_name }}</td>
                                    <td>{{ date('Y/m/d',strtotime($category->created_at)) }}</td>
                                    <td>
                                        <a href="{{ url('admin/elankat/'.$category->id) }}" class="settings" title="" data-toggle="tooltip" data-original-title="Katqoriya Redaktə Et"><i class="ti-settings"></i></a>
                                        <a href="{{ url('admin/elankat/sil/'.$category->id) }}" class="delete" title="" data-toggle="tooltip" data-original-title="Katqoriya Sil"><i class="ti-trash"></i></a>
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
