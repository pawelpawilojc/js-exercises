<html>

<body>
   

    <div>
        <ul>
            <li>id: {{ $photo->id }}</li>
            <li>name: {{ $photo->name }}</li>
            <li>created_at: {{ $photo->created_at }}</li>
            <li>updated_at: {{ $photo->updated_at }}</li>
            
        </ul>  
       
    </div>

   
        <form action=""https://pawilojc.pl/laravel/api/photos/{{$photo}}" method="post">
            @csrf
            @method('delete')
            
            <button type="submit">Skasuj</button>
            <a href="https://pawilojc.pl/laravel/api/photos" >Powrot do wszystkich</a>
        </form>
</body>
</html>