@extends('dashboard.layouts.main')

@section('container')
      @foreach ($projects as $project)
          <h1 class="h2">Welcome back, {{ auth()->user()->name }}</h1>
          <div class="card">
              <div class="position-relative">
                <form action="/projects/{{ $project->id }}" method="post" class="d-inline" enctype="multipart/form-data">
                  @method('delete')
                  @csrf
                  <button class="hapus position-absolute bg-danger px-2 py-1 text-white" onclick="return confirm('Are you sure?');">hapus</button>
                </form>
              </div>
              <div class="position-relative">
                <a href="/projects/{{ $project->id }}/edit" class="edit position-absolute bg-warning px-2 py-1 text-decoration-none text-white" style="left: 40px">
                  edit
                </a>
              </div>
              @if ($project->image)
              <img src="{{ asset('storage/' . $project->image) }}" alt="foto_project" class="img-fluid"> 
              @else
              <img src="https://source.unsplash.com/1200x400?{{ $project->nama_project }}" alt="" class="img-fluid">
              @endif
              <div class="card-body">
                <h5 class="card-title"><a href="/projects/{{ $project->id }}/tasks" class="text-decoration-none text-dark">{{ $project->nama_project }}</a></h5> 
                <p class="card-text">{{ $project->deskripsi_project }}</p>
              </div>
            </div>
          </div>
              
      @endforeach
@endsection