$(function(){
    $('#tb-user').DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": 3,
        }]
    });
    $('#tb-jenis').DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": 2,
        }]
    });
    $('#tb-product').DataTable({
        "columnDefs": [{
            "orderable": false,
            "targets": [3, 6],
        }]
    });
});