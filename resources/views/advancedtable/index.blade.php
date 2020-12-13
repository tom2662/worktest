@extends('layout.testlayout')
@section('title', 'Advanced Table')
@section('content')
<div class="upload-files">
<div><h3>Advanced Input Field</h3></div>

<div class="well clearfix">
        <a class="btn btn-primary pull-right add-record" data-added="0"><i class="glyphicon glyphicon-plus"></i> Add Row</a>
      </div>
<form enctype="multipart/form-data">
      <table class="table table-bordered" id="tbl_posts">
        <thead>
          <tr>
            <th>#</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Amount</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="tbl_posts_body">
          <tr id="rec-1">
            <td><span class="sn">1</span>.</td>
            <td><textarea class="form-control" name="description[0]"></textarea></td>
            <td><input type="text" class="form-control" name="quantity[0]"></td>
            <td><input type="text" class="form-control" name="unitPrice[0]"></td>
            <td><input type="text" class="form-control" name="amount[0]"></td>
            <td><a class="btn btn-xs delete-record" data-id="1"><i class="glyphicon glyphicon-trash"></i></a></td>
          </tr>
        </tbody>
      </table>
    </div> 
  </form>


	
<div style="display:none;">
    <table id="sample_table">
      <tr id="">
       <td><span class="sn"></span>.</td>
       <td><textarea class="form-control" id="description" name="" ></textarea></td>
       <td><input type="text" class="form-control" id="quantity" name=""></td>
       <td><input type="text" class="form-control" id="unitPrice" name=""></td>
       <td><input type="text" class="form-control" id="amount" name=""></td>
       <td><a class="btn btn-xs delete-record" data-id="0"><i class="glyphicon glyphicon-trash"></i></a></td>
     </tr>
   </table>
 </div>


      <script>
    //    $(document).ready(function(){
    //     $(".add-record").click(function(){
              
          

    //         var markup = "<tr><td>"+size+"</td><td><textarea class='form-control' id='description' name='description' ></textarea></td></td><td><input type='text' class='form-control' id='quantity' name=''></td><td><input type='text' class='form-control' id='unitPrice' name=''></td><td><input type='text' class='form-control' id='unitAmount' name=''></td></tr>";
    //         $("table tbody").append(markup);
    //     });
    //    });

        jQuery(document).delegate('a.add-record', 'click', function(e) {
           
            var content = jQuery('#sample_table tr'),
              size = jQuery('#tbl_posts >tbody >tr').length + 1,
              element = null,    
              element = content.clone();
              element.attr('id', 'rec-'+size);
              element.find('#description').attr('name', 'description['+size+']');
              element.find('#quantity').attr('name', 'quantity['+size+']');
              element.find('#unitPrice').attr('name', 'unitPrice['+size+']');
              element.find('#amount').attr('name', 'amount['+size+']');
              element.find('.delete-record').attr('data-id', size);
              element.appendTo('#tbl_posts_body');
              element.find('.sn').html(size);
           
        });
	
        jQuery(document).delegate('a.delete-record', 'click', function(e) {
            e.preventDefault();    
            var didConfirm = confirm("Are you sure You want to delete");
            if (didConfirm == true) {
            var id = jQuery(this).attr('data-id');
            var targetDiv = jQuery(this).attr('targetDiv');
            jQuery('#rec-' + id).remove();
            
            //regnerate index number on table
            $('#tbl_posts_body tr').each(function(index) {
            //alert(index);
            $(this).find('span.sn').html(index+1);
            });
            return true;
        } else {
            return false;
        }
        });
    </script>

</div>
@endsection