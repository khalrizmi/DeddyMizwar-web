<?php 

namespace App\Transformers;

use App\Question;
use League\Fractal\TransformerAbstract;
use App\Transformers\AnswerTransformer;


class QuestionTransformer extends TransformerAbstract
{
	protected $availableIncludes = [
		'answers'
	];

	public function transform(Question $question)
	{
		return [
			'id' => $question->id,
			'question' => $question->question,
		];
	}

	public function includeAnswers(Question $question)
	{
		$answers = $question->answers->get();

		return $this->collection($answers, new AnswerTransformer);
	}
}
