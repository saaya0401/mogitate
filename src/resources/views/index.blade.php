@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
<div class="products-overview">
    <div class="products-heading">
        <h1 class="products-heading__title">
            商品一覧
        </h1>
        <div class="products-heading__button">
            <button class="products-heading__button-add">+ 商品を追加</button>
        </div>
    </div>
    <div class="products-content">
        <form action="/products/search" method="get" class="products-search__form">
            @csrf
            <input type="text" name="name" placeholder="商品名で検索" value="" class="search__form--input">
            <div class="search__form--button">
                <button class="search__form--button-submit" type="submit">検索</button>
            </div>
            <div class="search__form--sort">
                <h2 class="search__form--sort-title">価格順で表示</h2>
                <div class="search__form--sort-select">
                    <select name="" class="sort__select">
                    <option value="">価格で並べ替え</option>
                </select>
                </div>
                
            </div>
        </form>
        <div class="products-list">
            <div class="products-list__group">
                <div class="products-list__group--line">
                    <div class="products-list__card">
                        <img src="{{asset('fruits-img/banana.png')}}" alt="商品画像" class="products-card__img">
                        <div class="products-card__content">
                            <span class="products-card__name">キウイ</span>
                            <span class="products-card__price">&yen;800</span>
                        </div>
                    </div>
                    <div class="products-list__card">
                        <img src="{{asset('fruits-img/strawberry.png')}}" alt="商品画像" class="products-card__img">
                        <div class="products-card__content">
                            <span class="products-card__name">キウイ</span>
                            <span class="products-card__price">&yen;800</span>
                        </div>
                    </div>
                    <div class="products-list__card">
                        <img src="{{asset('fruits-img/orange.png')}}" alt="商品画像" class="products-card__img">
                        <div class="products-card__content">
                            <span class="products-card__name">キウイ</span>
                            <span class="products-card__price">&yen;800</span>
                        </div>
                    </div>
                </div>
                <div class="products-list__group--line">
                    <div class="products-list__card">
                        <img src="{{asset('fruits-img/watermelon.png')}}" alt="商品画像" class="products-card__img">
                        <div class="products-card__content">
                            <span class="products-card__name">キウイ</span>
                            <span class="products-card__price">&yen;800</span>
                        </div>
                    </div>
                    <div class="products-list__card">
                        <img src="{{asset('fruits-img/peach.png')}}" alt="商品画像" class="products-card__img">
                        <div class="products-card__content">
                            <span class="products-card__name">キウイ</span>
                            <span class="products-card__price">&yen;800</span>
                        </div>
                    </div>
                    <div class="products-list__card">
                        <img src="{{asset('fruits-img/muscat.png')}}" alt="商品画像" class="products-card__img">
                        <div class="products-card__content">
                            <span class="products-card__name">キウイ</span>
                            <span class="products-card__price">&yen;800</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="products-list__pagination">

            </div>
        </div>
    </div>
    
</div>
@endsection
