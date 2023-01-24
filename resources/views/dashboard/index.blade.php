@extends('dashboard.layouts.main')

@section('container')
<style>
    .btn-register{
  text-align: center;
  border-radius: 4px;
  color:#FFFFFF;
  background-color: #3a3737;
  border: none;
  outline: none;
}
p{
    font-size: 25px
}
</style>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome back, {{ auth()->user()->username }} </h1>
    </div>
    <p>selamat datang pada menu dashboard, pada menu ini anda dapat menambah admin baru dan dapat mengelolah data TK</p>
    <a href="/register"><button class="btn-register bg-success fs-4">Tambah Admin Baru</button></a>
    @endsection