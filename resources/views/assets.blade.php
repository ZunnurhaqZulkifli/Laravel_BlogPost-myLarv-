@extends('layout')

@section('title' , 'Assets Page')

@section('content')

<p class="display-3 text-light mb-0">Zunnurhaq - Assets</p>

        <h5 class="text-center fs-4">" This is where all of your assets "</h5>

        <hr class="p-2 text-center text-muted">

        <div class="card p-4">
            <p class="fs-2 text-center mb-1 mt-1">" 1. List Item In a Card Body"</p>
        {{-- <div class="card card-outline-dark p-4 mb-1 mt-1"> --}}
            <h6>These are some of the menu routes</h6>
            <ul class="list-group">
                <li class="list-group-item" aria-disabled="true">List Of Menus</li>
                <a class="list-group-item" href="{{ route('contact') }}">Contacts</a>
                <a class="list-group-item" href="{{ route('posts.index') }}">Blog Posts</a>
                <a class="list-group-item" href="{{ route('zunnur') }}">Zunnurhaq's Media</a>
                <li class="list-group-item">And a fifth one</li>
              </ul>
            {{-- </div> --}}
        </div>
        
        <hr class="text-muted">

        <div class="mt-4 mb-4">

            <div class="card">
                <p class="fs-2 text-center mb-1 mt-1">"2. A Singular Item In a Card Body"</p>
                <div class="card-body mx-auto">
                  This is some text within a card body.
                </div>
              </div>

        </div>

        <hr class="text-muted">

        <div class="card p-4">
            <a class="text-decoration-none text-dark mt-0 fs-2 text-center mb-1">"3. A Template card in a Card Body"</a>
        <div class="card">
            <div class="card-header">
              Featured
            </div>
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="{{ route('home') }}" class="btn btn-outline-zunnur">Go Home</a>
            </div>
          </div>
          </div>
        
        <hr class="text-muted">

    <div class="card p-3 mb-1">
        <a class="text-decoration-none text-dark mt-0 fs-2 text-center mb-1">"4. Card Body"</a>
        <div class="card">
                <div class="p-4 row g-0">
                    <div class="col-sm-2 col-md-3">
                        <div class="card bg-limez mb-3 p-2" style="max-width: 18rem;">
                            <button type="button" class="btn-close position-absolute opacity-100 bg-danger rounded-circle top-0 start-100 translate-middle" data-bs-dismiss="modal" aria-label="Close"></button>
                                <div class="text-dark card-header">Header</div>
                                <div class="card-body">
                            <h5 class="text-bold card-title">Primary card title</h5>
                        <p class="text-muted card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="https://www.douyin.com/discover?modal_id=7019990084174810398" class="btn btn-sm btn-outline-zunnur">Xiang Ling</a>
                    </div>
                </div>
            </div>
            
            <div class="p-1 col-2 col-md-4">
                {{-- <div class="card"> --}}
                    <div class="fs-4">Card Components.</div>
                        <div class="fs-5"> " <---- card's header"</div>
                        <div class="fs-5 mt-4"> " <---- card's body"</div>
                            <br>
                            <br>
                        <div class="fs-5 mt-4"> " <---- card's button"</div>
                    {{-- <div class="fs-4">This is an example of a card template.</div> --}}
                    {{-- </div> --}}
                </div>
            </div>
    </div>
</div>
    
    <hr class="text-muted">

    <div class="card p-4">
            <div class="fs-4">This is an example of a card template.</div>
                <div class="hstack gap-3">
                    <input class="form-control me-auto" type="text" placeholder="Add your item here..." aria-label="Add your item here...">
                        <button type="button" class="btn btn-secondary">Submit</button>
                    <div class="vr"></div>
                <button type="button" class="btn btn-outline-danger">Reset</button>
            </div>
        </div>

      <hr class="text-muted">

      <br>

    <div class="card p-4">
        <div class="fs-4">Gutters</div>
      <div class="row g-0">
        <div class="col-sm-6 col-md-7">
            <div class="card p-4">
                <div class="card-body">
                    This is a test
                </div>
                </div>
            </div>
        <div class="col-6 col-md-4" style="margin-right: 4rem">
            <div class="card p-4">
                <div class="card-body">
                    This is a test
                </div>
            </div>
        </div>
      </div>
    </div>

    <hr class="text-muted">

        <br>

    <div class="card bg-light">
    
    <p class="mt-2 fs-2 mx-auto">This is a table and a thread</p>
        <div class="card mt-2 mb-2 bg-light">
            <table class="table p-4 text-dark">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    </tr>
                    <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    </tr>
                    <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection('content')