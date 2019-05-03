<?php 

namespace App\Transformers;

use App\Gallery;
use League\Fractal\TransformerAbstract;


class GalleryTransformer extends TransformerAbstract
{
	
	public function transform(Gallery $gallery)
	{
		return [
			'id' => $gallery->id,
			'image' => url("/images/gallery/{$gallery->image}"),
			'description' => $gallery->description,
		];
	}
}
