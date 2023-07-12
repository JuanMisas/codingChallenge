<div class="my-2 shadow  text-white bg-dark p-1" id="">
  <div class="d-flex justify-content-between">
    <table class="ms-1">
      <td class="align-middle">{{ $suggestion->name }}</td>
      <td class="align-middle"> - </td>
      <td class="align-middle">{{  $suggestion->email }}</td>
      <td class="align-middle"> 
    </table>
    <div>
      <form method="POST" action="{{ route('request.store', $suggestion->id) }}" id="form_create_request_{{ $suggestion->id }}">
      <input type="hidden" name="value_create_request" id="value_create_request">
        @csrf
        <!-- <button id="create_request_btn_" class="btn btn-primary me-1" onclick="sendRequest({{ $suggestion->id }})">Connect</button> -->
        <button id="create_request_btn_" class="btn btn-primary me-1" onclick="sendRequest({{ $suggestion->id }})">Connect</button>
      </form>
    </div>
  </div>
</div>
