@extends('header')

@section('konten')
                <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th>Judul</th>
                        <th>Pengarang</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

<script type="text/javascript">

  $(function () {

    var table = $('.data-table').DataTable({

        processing: true,

        serverSide: true,

        ajax: "{{ route('bk') }}",

        columns: [

            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'judul', name: 'judul'},

            {data: 'pengarang', name: 'pengarang'},

            {data: 'action', name: 'action', orderable: false, searchable: false},

        ]

    });

  });

</script>

@endsection