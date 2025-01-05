@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('css/register.css')}}">
@endsection

@section('content')
<div class="register">
    <h1 class="register-title">商品登録</h1>
    <form class="register-form" action="/products/register" method="post">
        @csrf
        <div class="register-form__item">
            <div class="register-form__item--title">
                <span class="register-form__item--name">商品名</span>
                <span class="register-form__item--require">必須</span>
            </div>
            <div class="register-form__item--input-area">
                <input type="text" name="name" placeholder="商品名を入力" class="register-form__item--input" value="{{old('name')}}">
            </div>
            <div class="register-form__error">
                @error('name')
                {{$message}}
                @enderror
            </div>
        </div>
        <div class="register-form__item">
            <div class="register-form__item--title">
                <span class="register-form__item--name">値段</span>
                <span class="register-form__item--require">必須</span>
            </div>
            <div class="register-form__item--input-area">
                <input type="text" name="price" placeholder="値段を入力" class="register-form__item--input" value="{{old('price')}}">
            </div>
            <div class="register-form__error">
                @error('price')
                {{$message}}
                @enderror
            </div>
        </div>
        <div class="register-form__item">
            <div class="register-form__item--title">
                <span class="register-form__item--name">商品画像</span>
                <span class="register-form__item--require">必須</span>
            </div>
            @livewire('image-uploader')
            <div class="register-form__error">
                @error('image')
                {{$message}}
                @enderror
            </div>
        </div>
        <div class="register-form__item">
            <div class="register-form__item--title">
                <span class="register-form__item--name">季節</span>
                <span class="register-form__item--require">必須</span>
                <span class="register-form__item--select">複数選択可</span>
            </div>
            <div class="register-form__item--input-area">
                @foreach($seasons as $season)
                <label class="checkbox__label"><input type="checkbox" name="seasons[]" class="register-item__checkbox" value="{{$season['id']}}" @if(in_array($season['id'], old('seasons', []))) checked @endif>{{$season['name']}}</label>
                @endforeach
            </div>
            <div class="register-form__error">
                @error('seasons')
                {{$message}}
                @enderror
            </div>
        </div>
        <div class="register-form__item">
            <div class="register-form__item--title">
                <span class="register-form__item--name">商品説明</span>
                <span class="register-form__item--require">必須</span>
            </div>
            <div class="register-form__item--input-area">
                <textarea name="description" class="register-form__item--textarea" placeholder="商品の説明を入力">{{old('description')}}</textarea>
            </div>
            <div class="register-form__error">
                @error('description')
                {{$message}}
                @enderror
            </div>
        </div>
        <div class="register-action__button">
            <a href="/products" class="register-back__button">戻る</a>
            <button class="register-add__button" type="submit">登録</button>
        </div>
    </form>
</div>
@endsection
