<div>
    <div class="form__image-area">
        @if($imageUrl)
        <img class="form__image" src="{{$imageUrl}}" alt="Uploaded Image">
        @endif
    </div>
    <div class="form__image-title">
        <label class="form__image-label"><input type="file" wire:model="image" class="form__image-input">ファイルを選択</label>
        <div class="form__image-name">
            @if($imageName)
            {{$imageName}}
            @endif
        </div>
    </div>
    <input type="hidden" name="image" value="{{$imagePath}}">
</div>
