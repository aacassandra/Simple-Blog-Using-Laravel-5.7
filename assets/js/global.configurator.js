//Remove Posting by Ajax
function post_detrox(){
  var ok = false;
  var data=$('#btn-post-delete').serialize();
  swal({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.value) {
      $.ajax({
        type: 'GET',
        data: data,
        url: "{{ route('post.destrox') }}",
        success: function(result) {
          var answer = JSON.parse(result);
          if(answer.status=="success"){
            document.location.reload(true);
          }
        }
      });
    }
  })
  return ok;
}

//Remove Comment by Ajax
function comment_destrox(){
  var ok = false;
  var data=$('#btn-comment-delete').serialize();
  swal({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.value) {
      $.ajax({
        type: 'GET',
        data: data,
        url: "{{ route('post.comment.destrox') }}",
        success: function(result) {
          var answer = JSON.parse(result);
          if(answer.status=="success"){
            document.location.reload(true);
          }
        }
      });
    }
  })
  return ok;
}
