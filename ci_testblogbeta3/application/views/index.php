
<div class="row">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
    
        <div id="showdata">
            
        <!--<div class="post-preview">        
            <a href="post.html">
                <h2 class="post-title">
                    Man must explore, and this is exploration at its greatest
                </h2>
                <h3 class="post-subtitle">
                    Problems look mighty small from 150 miles up
                </h3>
            </a>
            <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on September 24, 2014</p>
            <a href="" class="btn" style="background-color: #e7e7e7;">&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;</a>
            <button type="submit" class="btn btn-secondary">Delete</button>
        </div>
        <hr>-->

        </div>  
        <!-- Pager -->
            <!--this is version 1 for addPostModal-->
            <!--<ul class="pager">
                <li class="next">
                    <a href="#" data-toggle="modal" data-target="#addPostModal">Add Post &rarr;</a>
                </li>
            </ul>-->
            <ul class="pager">
                <li class="next">
                    <a href="#" id="btnAdd">Add Post &rarr;</a>
                </li>
            </ul>
    </div>
</div>

<!-- Version 1 addPostModal -->
<!--<div class="modal fade" id="addPostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header btn-primary">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
      <div class="alert alert-success" id="postaddedsuccess" style="font-size: 12px; display: none;">
      </div>
      
        <form id="postForm" action="Post/addPost" method="post">

          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
          </div>
          <div class="form-group">
            <label for="postbody">Body</label>
            <textarea class="form-control" id="postBody" name="postBody" rows="3"></textarea>
          </div>
        
      </div>
      <div class="modal-footer">

        <button type="submit" id="btnSubmitPost" class="btn btn-primary">Submit Post</button>
        </form>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>-->
<!--end of addPostmodal-->

<!-- ver 2 of addPostModal -->
<div class="modal fade" id="addPostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header btn-primary">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
      <div class="alert alert-success" id="postaddedsuccess" style="font-size: 12px; display: none;">
      </div>
      
        <form id="postForm" action="" method="post">
        <input type="hidden" name="txtId" value="0">

          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
          </div>
          <div class="form-group">
            <label for="postbody">Body</label>
            <textarea class="form-control" id="postBody" name="postBody" rows="3"></textarea>
          </div>
        </form>
        
      </div>
      <div class="modal-footer">

        <button type="button" id="btnSubmitPost" class="btn btn-primary">Submit Post</button>
        

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!--end of addPostModal ver2 -->

<!--edit modal-->
<!--<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header btn-primary">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
      <div class="alert alert-success" id="postaddedsuccess" style="font-size: 12px; display: none;">
      </div>
      
        <form id="editForm" action="" method="post">
        <input type="hidden" name="txtId" value="0">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
          </div>
          <div class="form-group">
            <label for="postbody">Body</label>
            <textarea class="form-control" id="postBody" name="postBody" rows="3"></textarea>
          </div>
        </form>
        
      </div>
      <div class="modal-footer">

        <button type="button" id="btnEditPost" class="btn btn-primary">Submit Post</button>
        

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>-->




<script>
    $(function() {
        showAllPosts();

        $('#btnAdd').click(function(){
            $('#addPostModal').modal('show');
            $('#addPostModal').find('.modal-title').text('Add New Post');
            $('#postForm').attr('action', '<?php echo base_url(); ?>index.php/Post/add');

        });

        $('#btnSubmitPost').click(function(){
            //validate
            var url = $('#postForm').attr('action');
            var data = $('#postForm').serialize();
            //validate form
            var title = $('input[name=title]');
            var postBody = $('textarea[name=postBody]');
            var result = '';

            if(title.val()==''){
                title.parent().addClass('has-error');
            }else{
                title.parent().removeClass('has-error');
                result +='1';
            }

            if(postBody.val()==''){
                postBody.parent().addClass('has-error');
            }else{
                postBody.parent().removeClass('has-error');
                result +='2';
            }

            if (result=='12') {
                $.ajax({
                    type: 'ajax',
                    method: 'post',
                    url: url,
                    data: data,
                    async: false,
                    dataType: 'json',
                    success: function(response){
                        if(response.success){
                            /*$('#myModal').modal('hide');
                            $('#myForm')[0].reset();
                            if(response.type=='add'){
                                var type = 'added'
                            }else if(response.type=='update'){
                                var type ="updated"
                            }
                            $('.alert-success').html('Employee '+type+' successfully').fadeIn().delay(4000).fadeOut('slow');*/
                            $('#addPostModal').modal('hide');
                            $('#postForm')[0].reset();
                            if(response.type=='add'){
                                var type = 'added'
                            }else if(response.type=='update'){
                                var type ="updated"
                            }
                            $('.alert-success').html('Post '+type+' successfully').fadeIn().delay(4000).fadeOut('slow');

                            showAllPosts();
                            
                        } else {
                            alert('Error');
                        }
                    },
                });
            }//end of if(result == '12')
        });//end  of #btnSubmitPost
        

        $('#showdata').on('click', '.item-edit', function(){
            var id = $(this).attr('data');
            $('#addPostModal').modal('show');
            $('#addPostModal').find('.modal-title').text('Edit Post');
            $('#postForm').attr('action', '<?php echo base_url(); ?>index.php/Post/UpdatePost');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url(); ?>index.php/Post/editPost',
                data: {post_id: id},
                async: false,
                dataType: 'json',
                success: function(data){
                    $('input[name=title]').val(data.post_title);
                    $('textarea[name=postBody]').val(data.post_body);
                    $('input[name=txtId]').val(data.post_id); //input type hidden
                    //$("#addPostModal").modal('show');
                },
                error: function(){
                    alert('Could not Edit Data');
                }
            });

        });//end of edit*/

        function showAllPosts() {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>index.php/post/showAllPosts',
                async: false,
                dataType: 'json',
                success: function(data) {
                    //console.log(data);
                    var html = '';
                    var i;
                    for (i=0; i<data.length; i++) {
                        /*html += '<tr>'+
                                    '<td>'+data[i].emp_id+'</td>'+
                                    '<td>'+data[i].name+'</td>'+
                                    '<td>'+data[i].address+'</td>'+
                                    '<td>'+data[i].created_at+'</td>'+
                                    '<td>'+
                                        '<a href="javascript:;" class="btn btn-info item-edit" style="margin-right: 10px;" data="'+data[i].emp_id+'">Edit</a>'+
                                        '<a href="javascript:;" class="btn btn-danger item-delete" data="'+data[i].emp_id+'">Delete</a>'+
                                    '</td>'+
                                '</tr>';*/
                        html += '<div class="post-preview">'+        
                                    '<a href="post.html">'+
                                        '<h2 class="post-title">'+
                                            data[i].post_title
                                        +'</h2>'+
                                        '<h3 class="post-subtitle">'+
                                            data[i].post_body
                                        +'</h3>'+
                                    '</a>'+
            '<p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on September 24, 2014</p>'+
            '<a href="" class="btn item-edit" style="background-color: #e7e7e7;" data="'+data[i].post_id+'">&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;</a>'+
            '&nbsp;&nbsp'+
            '<button type="submit" class="btn btn-secondary">Delete</button>'+
                                '</div>'+
                                '<hr>';
                    }
                    $('#showdata').html(html);
                },
                error: function() {
                    alert('Could not get data from database');
                }

            });
        }//end of show function




    });//end of function


    

</script>

