<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;

class ImageUploader extends Component
{
    use WithFileUploads;
    public $image;
    public $imageName;
    public $imageUrl;
    public $imagePath;
    public $product;

    protected $Listeners=['imageUploaded'=>'updateImage'];

    public function mount($product=null){
        $this->product=$product;
        if($product && isset($product['image'])){
            $this->imageUrl=asset('storage/' . $product['image']);
            $this->imageName=basename($product['image']);
        }else{
            $this->imageUrl=null;
            $this->imageName=null;
        }
    }

    public function updatedImage(){
        $this->imageName=$this->image->getClientOriginalName();
        $this->image->storeAs('public/fruits-img', $this->imageName);
        $this->imagePath='fruits-img/' . $this->imageName;
        $this->imageUrl = asset('storage/' . $this->imagePath);
        $this->emit('imageUploaded', 'fruits-img/' . $this->imageName);
    }
    public function render()
    {
        return view('livewire.image-uploader');
    }
}
