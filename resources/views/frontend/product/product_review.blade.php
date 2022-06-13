<div class="pro__review">
    <div class="review__thumb">
        @if (optional($product_review->user->userProfile)->image)
            <img src="{{ asset('images/user_profile/'.$product_review->user->userProfile->image) }}" alt="review images">
        @else
            <img src="{{ asset('assets/frontend/images/review/1.jpg') }}" alt="review images">
        @endif
    </div>
    <div class="review__details">
        <div class="review__info">
            <h4><a href="#">{{$product_review->user->name}}</a></h4>
            <ul class="rating">
                <li><i class="zmdi zmdi-star"></i></li>
                <li><i class="zmdi zmdi-star"></i></li>
                <li><i class="zmdi zmdi-star"></i></li>
                <li><i class="zmdi zmdi-star-half"></i></li>
                <li><i class="zmdi zmdi-star-half"></i></li>
            </ul>
            <div class="rating__send" id="form-review-reply">
                <a href="#" class="comment-reply" ><i class="zmdi zmdi-mail-reply"></i></a>
                
            <form action="{{route('product.review_destroy',['id'=>$product_review->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <a href="#" class="delete-product-review"><i class="zmdi zmdi-close" ></i></a>
            </form>

            </div>
        </div>
        <div class="review__date">
            <span>{{$product_review->created_at->diffForHumans()}}</span>
        </div>
        <p>{{$product_review->comment}}</p>
    </div>
</div>

