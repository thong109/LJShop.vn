<a href="/user">User</a> |
<a href="/product">Product</a> |
<a href="/news">News</a> |
<a href="/service">Service</a>

<br>
<ul>
    <li><a href="/news/1/category/100">Test1</a></li>
    <li><a href="/news/2/category/200">Test2</a></li>
    <li><a href="/news/3/category/300">Test3</a></li>
    <li><a href="/news/4/category/400">Test4</a></li>
    <li><a href="/news/5/category/500">Test5</a></li>
</ul>

<br>
<a href="{{route('user')}}">User</a> |
<a href="/product">Product</a> |
<a href="/news">News</a> |
<a href="/service">Service</a>
<br>
<a href="{{ route('user.show', ['id' =>1])}}">User-test</a>
<a href="{{ route('user.show', ['id' =>2])}}">User-1</a>
<a href="{{ route('user.show', ['id' => 'OK'])}}">User-1</a>
<a href="{{ route('user.show', ['id' =>'alo'])}}">User-1</a>
<br>
<a href="{{ route('user.show.branch', ['id' =>1, 'branchId' => 1])}}">Branch-1</a>
<br>
<ul>
    <li><a href="{{ route('backend.user')}}">User management</a></li>
    <li><a href="{{ route('backend.product')}}">Product management</a></li>
    <li><a href="{{ route('backend.category')}}">Category management</a></li>
    <li><a href="{{ route('backend.news')}}">News management</a></li>
</ul>
