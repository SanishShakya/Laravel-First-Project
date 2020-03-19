<nav class="main-nav">
    <ul class="menu">
        <li>
            <a href="{{route('frontend.index')}}">Home</a>
        </li>
        @foreach($menu_categories as $category)
            @if($category->subcategories()->count()>0)
        <li class="sf-with-ul">
            <a href="#">{{$category->name}}</a>
            <ul>
                @foreach($category->subcategories as $subcategory)
                <li><a href="{{route('frontend.subcategory',$subcategory->slug)}}">{{$subcategory->name}}</a></li>
                @endforeach
            </ul>
        </li>
            @endif

        @endforeach
    </ul>
</nav>
