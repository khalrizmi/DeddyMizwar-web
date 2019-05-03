<?php 

namespace App\Transformers;

use App\Activity;
use League\Fractal\TransformerAbstract;


class ActivityTransformer extends TransformerAbstract
{
	
	public function transform(Activity $activity)
	{
		return [
			'id' => $activity->id,
			'title' => $activity->title,
			'image' => url("/images/activity/{$activity->image}"),
			'date'  => $activity->date,
			'description' => $activity->description,
		];
	}
}
