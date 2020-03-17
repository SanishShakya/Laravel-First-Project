<nav class="main-nav">
    <ul class="menu">
        <li>
            <a href="{{route('frontend.index')}}">Home</a>
        </li>
        @foreach($menu_categories as $category)
        <li class="sf-with-ul">
            <a href="#">{{$category->name}}</a>
            <ul>
                @foreach($category->subcategories as $subcategory)
                <li><a href="cart.html">{{$subcategory->name}}</a></li>
                @endforeach
            </ul>
        </li>
        @endforeach
    </ul>
</nav>
