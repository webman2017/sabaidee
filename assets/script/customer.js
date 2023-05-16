$('document').ready(function(){
    var data = {job_id:"", cat_name:"", cat_name: "", endDate: ""};
    generate_all(data);


    function generate_all(element){
        $.ajax({
          url: baseurl + 'Customer/get_all',
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
            { title: "ช่องทางการขาย", "width": "10%"},
            { title: "ชื่อ", "width": "30%"},
            { title: "โทรศัพท์", "width": "40%"},
            { title: "จังหวัด", "width": "10%"},
            { title: "อีเมล", "width": "10%"},
            { title: "แท็ก", "width": "10%"},
            { title: "จำนวน", "width": "10%"},
            { title: "คะแนนสะสม", "width": "10%"},
            { title: "ดำเนินการ", "width": "10%"},
            { title: "วันที่สั่งซื้อล่าสุด", "width": "10%"},
            { title: "วันที่สร้าง", "width": "10%"},
             ],
          });
        }
     });
     }
});