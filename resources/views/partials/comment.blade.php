{{--<div class="col-12 d-flex flex-row align-items-center justify-content-between">--}}
{{--    <div class="col-12 d-flex flex-column commentBorder mt-2 p-2">--}}
{{--        <div class="d-flex justify-content-end align-items-center">--}}
{{--            <i class="fa-solid fa-calendar pr-2 pl-2"></i> {{$com->created_at}}--}}

{{--            @if($com->user_id == session()->get('user')->id || $com->tabowner == session()->get('user')->id)--}}
{{--                <a href="index.php?page=editComment&id=" class="mr-2"><i class="far fa-edit pr-2 pl-2"></i>edit</a>--}}
{{--                <form method="post" action="{{route('comment.destroy',$com->id)}}">--}}
{{--                    @csrf--}}
{{--                    @method('DELETE')--}}
{{--                <button type="submit" class="btn text-light"><i class="far fa-trash-alt pr-2"></i>delete</button>--}}
{{--                </form>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--        <div class="d-flex">--}}
{{--            <div class="d-flex flex-column justify-content-center align-items-center col-3">--}}
{{--                <img src="{{asset('assets/img/'.$com->userimg)}}" alt="" class="img-fluid postIco mb-1">--}}
{{--                <p><a href="{{route('account',$com->user_id)}}">{{$com->username}}</a></p>--}}
{{--            </div>--}}
{{--            <div class="d-flex align-items-center p-2 col-9">--}}
{{--                <p>{{$com->text}}</p>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
