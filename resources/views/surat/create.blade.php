@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New Surat</div>
                    <div class="panel-body">
                        <a href="{{ url('/surat') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        <form action="{{ route('surat.store') }}" method="post">
              
                        @include ('surat.form')
                        </form>
                     

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        jQuery(document).ready(function () {
            if ($('.tipe').val()=='keluar') {
                $('.tglTerima').hide();
            } else {
                $('.tglTerima').show();
            }
            $('.tipe').on('change', function () {
                if ($(this).val()=='keluar') {
                    $('.tglTerima').hide();
                } else {
                    $('.tglTerima').show();
                }
            })
        });
    </script>
    <script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    </script>
@endsection