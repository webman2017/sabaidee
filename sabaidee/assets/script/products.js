$('document').ready(function(){
    var data = {job_id:"", cat_name:"", cat_name: "", endDate: ""};
    generate_all(data);


    function generate_all(element){
        $.ajax({
          url: baseurl + 'Products/get_all',
          data: {'d' : element.id,'cat_name':element.cat_name,'endDate':element.endDate},
          type:"post",
          dataType: 'json',
        //  beforeSend: function () {
            // jQuery('#render-list-of-order').html('<div class="text-center"><i class="fa fa-spinner fa-pulse fa-4x fa-fw"></i></div>');
        //  },
        success: function (html) {
           var dataTable='<table id="order-datatable" class="table table-bordered table-striped table-hover table-staper" cellspacing="0" width="100%"></table>';
           $('#render-list-of-order').html(dataTable);
           var table = $('#order-datatable').DataTable({
            data: html.data,
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": false,
            "bInfo": true,
            "bAutoWidth": true,
            "order": [[ 0, "desc" ]],
            columns: [
            { title: "No", "width": "5%"},
            { title: "รูปภาพ", "width": "10%"},
            { title: "ชื่อ", "width": "30%"},
            { title: "รายละเอียดหมวดหมู่", "width": "40%"},
            { title: "คลัง", "width": "10%"},
            { title: "จัดการ", "width": "10%"},
             ],
          });
        }
     });
     }
});