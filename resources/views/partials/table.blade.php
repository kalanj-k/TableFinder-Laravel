<div class="mt-4 mb-2 col-12 col-xl-5 p-3 testdiv d-flex flex-column justify-content-between">
    <span class="text-left w-100 p-2 infoBorder"><h3>{{$table->name}}</h3></span>
    <div class="d-flex">
        <div class="col-6 d-flex justify-content-center align-items-center">
            <img src="{{asset('assets/img/'.$table->image)}}" alt="{{$table->alt}}" class="img-fluid pSlika">
        </div>
        <div class="col-6 p-0 d-flex justify-content-center align-items-center">
            <p class="pt-3">
                <i class="fa-solid fa-hat-wizard"></i> Game Master : <br> @if($table->game_master) Required<br> @else Not Required<br> @endif
                <i class="fa-solid fa-gear"></i> Level required : <br>{{$table->l_name}}<br>
                <i class="fa-solid fa-calendar"></i> Availability : <br>
                @foreach($table->days as $day)
                    {{substr($day->name,0,3)}}
                @endforeach
                <br>
                <i class="fa-solid fa-book"></i> Game System : <br>{{$table->gs_name}}<br>
            </p>
        </div>
    </div>

    <div class="text-right tableActions pt-3">
        <a href="{{route('table',$table->id)}}"><i class="fa-solid fa-eye pr-2 pl-2"></i>see more</a>
        @if(session()->get('user')->id==$table->user_id)
            <a href="{{route('table.edit',$table->id)}}"><i class="far fa-edit pr-2 pl-2"></i>edit</a>
            <form method="post" action="{{route('table.destroy',$table->id)}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="p-0 btn text-light"><i class="far fa-trash-alt pr-2 pl-2"></i>delete</button>
            </form>
        @endif
    </div>
</div>
