<div class="mb-2">
    @auth
        <form method="POST" action="{{ $route }}">
            @csrf
                <br>
        
                    <div class="form-group mb-2">    
                        <textarea type="text" name="content" class="border-orange bg-light text-dark form-control"></textarea>
                    </div>
        
            <button class="mx-auto btn btn-outline-zunnur w-100 shadow-sm" type="submit">Add Comment</button>
        
        </form>
    
        @else
            <div class="card border-outline text-center mt-1 mb-1">
                <a class="fs-7 col-6 mx-auto btn btn-outline-zunnur btn-smz mt-1 mb-1" href="{{ route('login') }}">Sign-in</a> to post comment!
            </div>
        @endauth
    
    </div>
    
    @errors 
    
    @enderrors