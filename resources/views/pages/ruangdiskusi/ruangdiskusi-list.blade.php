 @extends('layouts.app')

@section('style')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('css/chat.css')}}">
@endsection

@section('content')
<div class="col">
<h5 class=" text-right">Ruang Diskusi</h5>
<div class="messaging">
  <div class="inbox_msg">
  <div class="mesgs">
    <div class="msg_history" id="diskusi">
    @foreach($diskusi as $v)
    {{ csrf_field() }}
      @if($v->user_id == Auth::user()->id)
      <div class="outgoing_msg">
        <div class="sent_msg">
        <p>{{$v->text}}</p>
        <div class="clearfix">
          <span class="time_date float-left">{{$v->user->nama}} | {{Carbon\Carbon::parse($v->created_at)->format('Y-m-d')}}</span> 
          <button class="time_date float-right mr-2 delete-modal" 
          data-id="{{$v->id}}"
          data-text="{{$v->text}}"> <i class="fa fa-times"></i> </button>
          <button class="time_date float-right mr-3 edit-modal "
          data-id="{{$v->id}}"
          data-text="{{$v->text}}"> <i class="fa fa-pencil"></i> </button>
        </div>
        </div>
      </div>
      @else
      <div class="incoming_msg">
        <div class="received_msg">
        <div class="received_withd_msg">
          <p>{{$v->text}}</p>
          <span class="time_date">{{$v->user->nama}}  | {{Carbon\Carbon::parse($v->created_at)->format('Y-m-d')}}</span></div>
        </div>
      </div>
      @endif
    @endforeach
    </div>
    <div class="type_msg">
    <div class="input_msg_write">
      <form method="POST" action="{{route('simpan-diskusi')}}">
        {{ csrf_field() }}
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        <input type="text" name="text" class="write_msg" placeholder="Type a message" />
        <button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
      </form>
    </div>
    </div>
  </div>
  </div>
</div>

</div>
{{-- Modal Edit --}}
@include('pages.ruangdiskusi.popup.edit')
{{-- Modal Delete --}}
@include('pages.ruangdiskusi.popup.delete')
@endsection

@section('footer-script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    $(window).on('load', function(){
        $('#diskusi').removeAttr('style');
    })
</script>
<script type="text/javascript">
    // Edit Data
    $(document).on('click', '.edit-modal', function() {
        $('.modal-title').text('Edit Chatting');
        $('#edit_id').val($(this).data('id'));
        $('#edit_text').val($(this).data('text'));
        id = $('#edit_id').val();
        $('#edit_data').modal('show');
    });
    $('.btn-group').on('click', '.edit', function() {
        $.ajax({
            type: 'PUT',
            url: '/ruang/diskusi/update/' + id,
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#edit_id").val(),
                'text': $('#edit_text').val()
            },
            success: function(data) {
                $('.invalid-text').addClass('hidden');

                if ((data.errors)) {
                    setTimeout(function () {
                        toastr.error('Telah Terjadi Kesalahan!', 'Error', {timeOut: 5000});
                    }, 500);

                    if (data.errors.text) {
                        $('.error_text').addClass('is-invalid');
                        $('.invalid-text').addClass('invalid-feedback');
                        $('.invalid-text').removeClass('hidden');
                        $('.invalid-text').text(data.errors.text);
                    } 
                } else {
                    toastr.success('Edit Data Berhasil!', 'Success', {timeOut: 5000});
                    setTimeout(function(){
                       window.location.reload(1);
                    }, 5000);
                }
            }
        });
    });
</script>
<script type="text/javascript">
    // Hapus Data
    $(document).on('click', '.delete-modal', function() {
        $('.modal-title').text('Form Hapus Data');
        $('#del_id').val($(this).data('id'));
        $('#delete_data').modal('show');
        id = $('#del_id').val();
    });
    $('.btn-group').on('click', '.delete', function() {
        $.ajax({
            type: 'DELETE',
            url: '/ruang/diskusi/hapus/' + id,
            data: {
                '_token': $('input[name=_token]').val(),
            },
            success: function(data) {
                toastr.success('Penghapusan Data Berhasil!', 'Success Alert', {timeOut: 5000});
                    setTimeout(function(){
                       window.location.reload(1);
                    }, 5000);
                $('#delete_data').modal('hide');
            }
        });
    });
</script>
@endsection