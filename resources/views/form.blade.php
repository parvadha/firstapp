<html>
    <head>
        <title>URL Shortner</title>
        <link rel="stylesheet" href="{{url('assets/style.css')}}">
    </head>
    <body>
        <div id="container">
            <h2>URL Shortner</h2>
            @if (Session::has('errors'))
                <h3>{{$errors->first('link')}}</h3>
            @endif
            @if (Session::has('message'))
                <h3>{{Session::get('message')}}</h3>
            @endif
            @if (Session::has('link'))
                <h3><a href="{{url(Session::get('link'))}}">{{url(Session::get('link'))}}</a> is your short URL</h3>
            @endif
            <form action="{{url('/')}}" method="POST">
                @csrf

            <input type="text" name="link" placeholder="Insert URL and press Enter ">
            </form>
        </div>
    </body>
</html>
