<?php 

namespace App\Transformers;

use App\Video;
use League\Fractal\TransformerAbstract;


class VideoTransformer extends TransformerAbstract
{
	
	public function transform(Video $video)
	{
		return [
			'id' => $video->id,
			'video' => $video->video,
			'description' => $video->description,
		];
	}
}
