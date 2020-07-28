@extends('BackOfficeAdmin.layout.layoutAdmin')

@section('linkcss')

@endsection


@section('body')

<div id="content" class="p-4 p-md-5 pt-5">

</div>
@endsection

@section('scripts')

<script>
    $(document).ready(function() {
        $('#linkStats').addClass('activeLink');
    });
</script>
@endsection