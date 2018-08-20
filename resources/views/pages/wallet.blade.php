@extends('templates.master')

@section('content')
<div class="container mt-5">
  <div class="row">
    <div class="col-lg-12">
      <h1>กระเป๋าเงินของฉัน</h1><hr>
      <h3>เงินที่อยู่ระหว่างรอดำเนินการ: {{$wallet->wallet_hold}} บาท</h3>
      <h3>เงินที่ถอนได้: {{$wallet->wallet_rent}} บาท</h3>
    </div>
  </div>
</div>
@endsection
