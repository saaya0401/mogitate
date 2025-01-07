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
                @livewire('image-uploader', ['product'=>$product])
                <div class="detail__group">
                    <div class="detail__group-item">
                        <p class="detail-item__title">商品名</p>
                        <div class="detail-item__input-area">
                            <input type="text" name="name"  class="detail-item__input" value="{{$product['name']}}" placeholder="商品名を入力">
                        </div>
                        <div class="item__error">
                            @error('name')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="detail__group-item">
                        <p class="detail-item__title">値段</p>
                        <div class="detail-item__input-area">
                            <input type="text" name="price"  class="detail-item__input" value="{{$product['price']}}" placeholder="値段を入力">
                        </div>
                        <div class="item__error">
                            @error('price')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="detail__group-item">
                        <p class="detail-item__title">季節</p>
                        <div class="detail-item__input-area">
                            @foreach($seasons as $season)
                            <label class="checkbox__label">
                                <input type="checkbox" name="seasons[]" class="detail-item__checkbox" value="{{$season['id']}}" {{in_array($season['id'], $selectedSeasons) ? 'checked' : ''}} >
                                {{$season['name']}}
                            </label>
                            @endforeach
                        </div>
                        <div class="item__error">
                            @error('seasons')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="detail__description">
                <p class="detail-item__title">商品説明</p>
                <div class="detail-item__description-area">
                    <textarea name="description" class="detail-item__description-textarea" placeholder="商品の説明を入力">{{$product['description']}}</textarea>
                </div>
                <div class="item__error">
                    @error('description')
                    {{$message}}
                    @enderror
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