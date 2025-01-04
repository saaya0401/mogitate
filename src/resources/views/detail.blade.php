@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('css/detail.css')}}">
@endsection

@section('content')
<div class="detail">
    <div class="detail-content">
        <div class="detail-title">
            <a href="/products" class="detail-title__link">商品一覧</a>
            <span class="detail-title__name">&gt; {{$product['name']}}</span>
        </div>
        <form method="post" action="{{url('/products/' . $product['id'] . '/update')}}" class="detail-edit__form">
            @csrf
            @method('patch')
            <div class="detail-group__top">
                <div class="detail__image-area">
                    <img src="{{asset($product['image'])}}" alt="商品画像" class="detail__img">
                    <div class="detail__img-text">
                        <label class="detail__img-label"><input type="file" name="image" class="detail__img-input">ファイルを選択</label>
                        <span class="detail__img-title">{{basename($product['image'])}}</span>
                    </div>
                </div>
                <div class="detail__group">
                    <div class="detail__group-item">
                        <p class="detail-item__title">商品名</p>
                        <div class="detail-item__input-area">
                            <input type="text" name="name"  class="detail-item__input" value="{{$product['name']}}">
                        </div>
                        <div class="detail-item__error">

                        </div>
                    </div>
                    <div class="detail__group-item">
                        <p class="detail-item__title">値段</p>
                        <div class="detail-item__input-area">
                            <input type="text" name="price"  class="detail-item__input" value="{{$product['price']}}">
                        </div>
                        <div class="detail-item__error">
                        
                        </div>
                    </div>
                    <div class="detail__group-item">
                        <p class="detail-item__title">季節</p>
                        <div class="detail-item__input-area">
                            @foreach($seasons as $season)
                            <label class="checkbox__label"><input type="checkbox" name="seasons[]" class="detail-item__checkbox" value="{{$season['id']}}" {{in_array($season['id'], $selectedSeasons) ? 'checked' : ''}} >{{$season['name']}}</label>
                            @endforeach
                        </div>
                        <div class="detail-item__error">
                        
                        </div>
                    </div>
                </div>
            </div>
            <div class="detail__description">
                <p class="detail-item__title">商品説明</p>
                <div class="detail-item__description-area">
                    <textarea name="description" value="{{$product['description']}}" class="detail-item__description-textarea">{{$product['description']}}</textarea>
                </div>
                <div class="detail-item__error">
                        
                </div>
            </div>
            <div class="detail__action-button">
                    <a href="/products" class="detail__back">戻る</a>
                    <button class="detail__edit" type="submit">変更を保存</button>
            </div>
        </form>
        <form action="{{url('/products/' . $product['id'] . '/delete')}}" class="detail-delete__form" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="detail-delete__button">
                <img src="{{asset('icon/TiTrash.png')}}" alt="ゴミ箱" class="detail-delete__icon">
            </button>
        </form>
    </div>
</div>
@endsection