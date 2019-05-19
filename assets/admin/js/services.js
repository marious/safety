$(function () {
    $('#service-table').DataTable({
        "processing":true,
        "serverSide":true,
        "pageLength": 15,
        "searching": true,
        "order":[],
        "ajax": {
            url: 'load_all_services',
            type: "POST",
        },
        "columnDefs":[
            // {"width": "80px", "height": "60px", "targets":5},
            {
                "targets":[1,2,3,4,5,7],
                "orderable":false,
            },
        ]

    });
});