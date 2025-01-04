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
            <a href="/products/register" class="products-heading__button-register">+ 商品を追加</a>
        </div>
    </div>
    <div class="products-content">
        <form action="/products/search" method="get" class="products-search__form">
            @csrf
            <input type="text" name="keyword" placeholder="商品名で検索" value="{{old('keyword', request('keyword'))}}" class="search__form--input">
            <div class="search__form--button">
                <button class="search__form--button-submit" type="submit">検索</button>
            </div>
            <div class="search__form--sort">
                <h2 class="search__form--sort-title">価格順で表示</h2>
                <div class="search__form--sort-select">
                    <select name="" class="sort__select">
                    <option value="">価格で並べ替え</option>
                    <option value="">高い順に表示</option>
                    <option value="">低い順に表示</option>
                </select>
                </div>
            </div>
        </form>
        <div class="products-list">
            <div class="products-list__grid">
                    @foreach($products as $product)
                    <div class="products-list__card">
                        <a href="{{url('/products/' . $product['id'])}}" class="products-list__link">
                            <img src="{{asset($product['image'])}}" alt="商品画像" class="products-card__img">
                            <div class="products-card__content">
                                <span class="products-card__name">{{$product['name']}}</span>
                                <span class="products-card__price">&yen;{{$product['price']}}</span>
                            </div>
                        </a>
                    </div>
                    @endforeach
            </div>
            <div class="products-list__pagination">
                @if($products->onFirstPage())
                    <div class="previous"><span >&lt;</span></div>
                @else
                    <div class="previous"><a class="pagination-link" href="{{$products->previousPageUrl()}}" rel="preview">&lt;</a></div>
                @endif
                @for($page=1; $page<= $products->lastPage(); $page++)
                @if($products->currentPage()== $page)
                    <div class="active"><span>{{$page}}</span></div>
                @else
                    <div class="other"><a href="{{$products->url($page)}}">{{$page}}</a></div>
                @endif
                @endfor
                @if($products->hasMorePages())
                    <div class="next"><a class="pagination-link" href="{{$products->nextPageUrl()}}" rel="next">&gt;</a></div>
                @else
                    <div class="next"><span>&gt;</span></div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
