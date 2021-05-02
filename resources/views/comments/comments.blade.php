@foreach ($comments as $item)
    <div class="col-md-9 m-auto" @if ($item->parent_id != null)
        style="margin-left:60px;color:red"
    @endif>
        <!-- Comments Items-->
        <div class="comments-section-content">
            <div class="card comment mb-3">
                <div class="row no-gutters">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4>{{$item->user->name}}</h4>
                            <p class="card-text">{{$item->description}}</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                    {{-- <div class="col-md-4">
                        <div class="comment-replay">
                            <ul class="list-unstyled">
                                <li class="item">12 Feb 2021 &VerticalBar; </li>
                                <li class="item">
                                    <a href="">Replay</a>
                                </li>
                            </ul>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- End of comments of item -->
        <div class="comments-form">
            <form action="{{route('comment.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="description">Comment</label>
                    <textarea class="form-control" id="description" name="description" cols="30" rows="10"></textarea>
                </div>
                <input class="form-control" type="hidden" name="post_id" value="{{$post_id}}">
                <input class="form-control" type="hidden" name="parent_id" value="{{$item->id}}">
                <div class="form-group">
                    <button class="btn-comment btn" type="submit">Replay</button>
                </div>
            </form>

            @include('comments.comments', ['comments'=>$item->replies])
        </div>
    </div>
@endforeach
