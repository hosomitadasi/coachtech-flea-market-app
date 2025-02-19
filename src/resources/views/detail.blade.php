@extends('layouts.app')

@section('main')
<div class="main flex">
    <div class="item-detail">
        <img class="item-detail__img" src="" alt="" width="100%" />
    </div>
    <div class="item-overview">
        <form class="overview-card" action="" method="">
            @csrf
            <div class="overview-card__content">
                <h2 class="overview-card__content__name"></h2>
                <>
            </div>
        </form>
    </div>
</div>
@endsection