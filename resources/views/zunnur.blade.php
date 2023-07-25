@extends('layout')

@section('title' , 'Zunnur Page')

@section('content')

{{-- <a>This is a test</a> --}}

<div>

    <h2>This is a test</h2>
    <div class="card">

        <h5 class="mx-auto text-weight-bold">Usernames & Passwords</h5>

        <table class="p-1 mb-3 table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Email</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Zurge98</td>
                <td>Saa7998a</td>
                <td>zunnurclash24@gmail.com</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>H4CK3RZzZ</td>
                <td>secret</td>
                <td>zunnurhaq123@gmail.com</td>
              </tr>
              <tr>
                <th scope="row">-</th>
                <td colspan="2">-</td>
                <td>-</td>
              </tr>
            </tbody>
          </table>
        
        </div>
        
          <p>
            <h6>These are some of the menu routes</h6>
            <ul class="list-group">
                <li class="list-group-item disabled" aria-disabled="true">List Of Menus</li>
                <a class="list-group-item" href="{{ route('contact') }}">Contacts</a>
                <a class="list-group-item" href="{{ route('posts.index') }}">Blog Posts</a>
                <li class="list-group-item">A fourth item</li>
                <li class="list-group-item">And a fifth one</li>
              </ul>
        </p>

        {{-- <div>
            
            <p class="">This is a test</p>

        <br>

        <hr>
            <p class="display-4 mx-auto" style="width:1200px;">This is a test</p>

            <form method="POST" action="{{ route('posts.store') }}">
        
            @csrf
        
            @include('posts.form2')
        
            <br>

            <button class="mx-auto btn btn-success btn-sm btn-block" type="submit" style="width:1300px;">Create!</button>

    </div> --}}
    
    <br>

    

</div>

@endsection('content')